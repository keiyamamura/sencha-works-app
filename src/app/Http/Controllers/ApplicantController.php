<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Services\CheckForm;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Job;
use App\Models\Applicant;
use Illuminate\Support\Facades\Auth;
use App\Jobs\SendConsentMail;
use App\Jobs\SendApplicantMail;
use App\Jobs\SendNotAdoptedMail;

class ApplicantController extends Controller
{
    public function index()
    {
        $applicants = Applicant::with(['user', 'job'])
            ->where('consent_flg', Applicant::STATUS_PENDING)
            ->whereHas('job', function ($query) {
                $query->where('owner_id', Auth::id());
            })
            ->orderby('created_at', 'desc')
            ->paginate(10);

        $current_jobs = [];
        foreach($applicants as $applicant) {
            $current_jobs[] = CheckForm::current_job($applicant->user->current_job);
        }

        return view('owner.applicant.index', compact('applicants', 'current_jobs'));
    }

    public function create($job)
    {
        $applicant_list = Applicant::where('user_id', Auth::id())->where('job_id', $job)->get();
        if ($applicant_list->isNotEmpty()) {
            return redirect()
                ->route('user.dashboard')
                ->with([
                    'message' => '不正な操作が行われました',
                    'status' => 'alert'
                ]);
        }

        $user = User::findOrFail(Auth::id());
        $job = Job::findOrFail($job);
        if (!$job->isRecruiting()) {
            return redirect()
                ->route('user.dashboard')
                ->with([
                    'message' => '募集終了した求人には応募できません',
                    'status' => 'alert'
                ]);
        }

        $prefecture = CheckForm::prefecture($job->prefectures_id);
        $status     = CheckForm::status($job->status);
        $experience = CheckForm::experience($job->experience);
        $license    = CheckForm::license($job->license);
        $age_limit  = CheckForm::age_limit($job->age);
        $user_age  = CheckForm::age($user->age);
        $user_gender = CheckForm::gender($user->gender);
        $user_prefecture  = CheckForm::prefecture($user->prefectures_id);
        $user_current_job  = CheckForm::current_job($user->current_job);

        return view('user.applicant.create', compact('user', 'job', 'prefecture', 'status', 'experience', 'license', 'age_limit', 'user_age', 'user_gender', 'user_prefecture', 'user_current_job'));
    }

    public function show($user, $job)
    {
        $user = User::findOrFail($user);
        $job  = Job::where('owner_id', Auth::id())->findOrFail($job);
        $applicant = Applicant::where('user_id', $user->id)
            ->where('job_id', $job->id)
            ->firstOrFail();

        $prefecture = CheckForm::prefecture($job->prefectures_id);
        $status     = CheckForm::status($job->status);
        $experience = CheckForm::experience($job->experience);
        $license    = CheckForm::license($job->license);
        $age_limit  = CheckForm::age_limit($job->age);
        $user_age  = CheckForm::age($user->age);
        $user_gender = CheckForm::gender($user->gender);
        $user_prefecture  = CheckForm::prefecture($user->prefectures_id);
        $user_current_job  = CheckForm::current_job($user->current_job);

        return view('owner.applicant.show', compact('user', 'job', 'applicant', 'prefecture', 'status', 'experience', 'license', 'age_limit', 'user_age', 'user_gender', 'user_prefecture', 'user_current_job'));
    }

    public function store($job)
    {
        $applicant_list = Applicant::where('user_id', Auth::id())->where('job_id', $job)->get();

        if ($applicant_list->isNotEmpty()) {
            return redirect()
                ->route('user.dashboard')
                ->with([
                    'message' => '不正な操作が行われました',
                    'status' => 'alert'
                ]);
        }

        $job_info = Job::findOrFail($job);
        if (!$job_info->isRecruiting()) {
            return redirect()
                ->route('user.dashboard')
                ->with([
                    'message' => '募集終了した求人には応募できません',
                    'status' => 'alert'
                ]);
        }

        $user     = User::findOrFail(Auth::id());

        SendApplicantMail::dispatch($user, $job_info->owner);

        Applicant::create([
            'user_id' => Auth::id(),
            'job_id' => $job,
            'consent_flg' => Applicant::STATUS_PENDING,
        ]);

        return redirect()
            ->route('user.dashboard')
            ->with([
                'message' => '応募が完了しました。',
                'status' => 'info'
            ]);
    }

    public function consent($user, $job)
    {
        $applicant = Applicant::where('user_id', $user)
            ->where('job_id', $job)
            ->whereHas('job', function ($query) {
                $query->where('owner_id', Auth::id());
            })
            ->first();
        if (is_null($applicant)) {
            return redirect()
                ->route('owner.applicant.index')
                ->with([
                    'message' => '不正な操作が行われました',
                    'status' => 'alert'
                ]);
        }

        if (!$applicant->isPending()) {
            return redirect()
                ->route('owner.applicant.index')
                ->with([
                    'message' => '処理済みの応募です',
                    'status' => 'alert'
                ]);
        }

        $consent = Applicant::findOrFail($applicant->id);

        $consent->consent_flg = Applicant::STATUS_ACCEPTED;
        $consent->save();

        SendConsentMail::dispatch($applicant);

        return redirect()
            ->route('owner.applicant.index')
            ->with([
                'message' => '承諾しました',
                'status' => 'info'
            ]);
    }

    public function destroy($user, $job)
    {
        $applicant = Applicant::where('user_id', $user)
            ->where('job_id', $job)
            ->whereHas('job', function ($query) {
                $query->where('owner_id', Auth::id());
            })
            ->first();
        if (is_null($applicant)) {
            return redirect()
                ->route('owner.applicant.index')
                ->with([
                    'message' => '不正な操作が行われました',
                    'status' => 'alert'
                ]);
        }

        $applicant = Applicant::with(['user', 'job'])->findOrFail($applicant->id);
        if (!$applicant->isPending()) {
            return redirect()
                ->route('owner.applicant.index')
                ->with([
                    'message' => '処理済みの応募です',
                    'status' => 'alert'
                ]);
        }

        $user = $applicant->user;
        $job = $applicant->job;

        $applicant->consent_flg = Applicant::STATUS_REJECTED;
        $applicant->save();

        SendNotAdoptedMail::dispatch($user, $job);

        return redirect()
            ->route('owner.applicant.index')
            ->with([
                'message' => '承諾しませんでした',
                'status' => 'alert'
            ]);
    }

    public function cancel($job)
    {
        $applicant = Applicant::where('user_id', Auth::id())
            ->where('job_id', $job)
            ->first();

        if (is_null($applicant)) {
            return redirect()
                ->route('user.dashboard')
                ->with([
                    'message' => '不正な操作が行われました',
                    'status' => 'alert'
                ]);
        }

        if (!$applicant->isPending()) {
            return redirect()
                ->route('user.dashboard')
                ->with([
                    'message' => '処理済みの応募はキャンセルできません',
                    'status' => 'alert'
                ]);
        }

        $applicant->consent_flg = Applicant::STATUS_CANCELLED;
        $applicant->save();

        return redirect()
            ->route('user.dashboard')
            ->with([
                'message' => '応募をキャンセルしました',
                'status' => 'info'
            ]);
    }
}
