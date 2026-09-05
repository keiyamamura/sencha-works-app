<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Services\CheckForm;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Job;
use App\Models\Applicant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Jobs\SendConsentMail;
use App\Jobs\SendApplicantMail;
use App\Mail\NotAdoptedMail;
use Illuminate\Support\Facades\DB;

class ApplicantController extends Controller
{
    public function index()
    {
        $applicants = Applicant::where('owner_id', Auth::id())->where('consent_flg', 0)
        ->join('users', 'users.id', '=', 'applicants.user_id')
        ->join('jobs', 'jobs.id', '=', 'applicants.job_id')
        ->orderby('applicants.created_at', 'desc')
        // ->get();
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

        $prefecture = CheckForm::prefecture($job->prefectures_id);
        $status     = CheckForm::status($job->status);
        $experience = CheckForm::experience($job->experience);
        $license    = CheckForm::license($job->license);
        $age_limit  = CheckForm::age_limit($job->age);
        $user_age  = CheckForm::age($user->age);
        $user_gender = CheckForm::gender($user->gender);
        $user_prefecture  = CheckForm::prefecture($user->prefectures_id);
        $user_current_job  = CheckForm::current_job($user->current_job);

        return view('owner.applicant.show', compact('user', 'job','prefecture', 'status', 'experience', 'license', 'age_limit', 'user_age', 'user_gender', 'user_prefecture', 'user_current_job'));
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
        $user     = User::findOrFail(Auth::id());

        SendApplicantMail::dispatch($user, $job_info->owner);

        Applicant::create([
            'user_id' => Auth::id(),
            'job_id' => $job
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
        $applicant = Applicant::where('user_id', $user)->where('job_id', $job)->first();
        if (is_null($applicant)) {
            return redirect()
            ->route('owner.applicant.index')
            ->with([
                'message' => '不正な操作が行われました',
                'status' => 'alert'
            ]);
        }

        $consent = Applicant::findOrFail($applicant->id);

        $consent->consent_flg = 1;
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
        $applicant = Applicant::where('user_id', $user)->where('job_id', $job)->first();
        if (is_null($applicant)) {
            return redirect()
                ->route('owner.applicant.index')
                ->with([
                    'message' => '不正な操作が行われました',
                    'status' => 'alert'
                ]);
        }

        $applicant = Applicant::findOrFail($applicant->id);
        $applicant->delete();

        Mail::to($applicant->user)->send(new NotAdoptedMail($applicant));

        return redirect()
            ->route('owner.applicant.index')
            ->with([
                'message' => '承諾しませんでした',
                'status' => 'alert'
            ]);
    }
}
