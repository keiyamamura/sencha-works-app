<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\Applicant;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\JobContactRequest;
use App\Http\Controllers\Services\CheckForm;
use App\Http\Controllers\Services\Lib;

class JobController extends Controller
{
    private $formItems = [
        'title',
        'description',
        'prefectures_id',
        'status',
        'recruitment_status',
        'public_status',
        'wage_type',
        'salary_amount',
        'age',
        'license',
        'experience',
        'company_name',
        'company_tel',
        'company_email',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::withCount([
            'applicants',
            'applicants as pending_applicants_count' => function ($query) {
                $query->where('consent_flg', Applicant::STATUS_PENDING);
            },
            'applicants as accepted_applicants_count' => function ($query) {
                $query->where('consent_flg', Applicant::STATUS_ACCEPTED);
            },
            'applicants as rejected_applicants_count' => function ($query) {
                $query->where('consent_flg', Applicant::STATUS_REJECTED);
            },
        ])
            ->whereOwner_id(Auth::id())
            ->orderby('created_at', 'desc')
            ->get();

        $prefecture = [];
        $status = [];
        $recruitment_status = [];
        $public_status = [];
        $experience = [];
        $license = [];
        $age_limit = [];

        foreach ($jobs as $key => $job) {
            $prefecture[] = CheckForm::prefecture($job->prefectures_id);
            $status[]     = CheckForm::status($job->status);
            $recruitment_status[] = CheckForm::recruitment_status($job->recruitment_status);
            $public_status[] = CheckForm::public_status($job->public_status);
            $experience[] = CheckForm::experience($job->experience);
            $license[]    = CheckForm::license($job->license);
            $age_limit[]  = CheckForm::age_limit($job->age);
        }

        return view('owner.dashboard', compact('jobs', 'prefecture', 'status', 'recruitment_status', 'public_status', 'experience', 'license', 'age_limit'));
    }

    public function list(Request $request)
    {
        $filters = $request->validate([
            'prefectures_id' => 'nullable|integer|between:1,47',
            'status' => 'nullable|integer|between:1,3',
            'recruitment_status' => 'nullable|integer|between:1,2',
            'wage_type' => 'nullable|in:0,1',
            'salary_min' => 'nullable|integer|min:0',
            'salary_max' => 'nullable|integer|min:0|gte:salary_min',
            'age' => 'nullable|integer|between:1,5',
            'license' => 'nullable|integer|between:1,3',
            'experience' => 'nullable|integer|between:1,2',
        ]);

        $jobsQuery = Job::where('public_status', Job::PUBLIC_OPEN);

        if ($request->filled('prefectures_id')) {
            $jobsQuery->where('prefectures_id', $filters['prefectures_id']);
        }

        if ($request->filled('status')) {
            $jobsQuery->where('status', $filters['status']);
        }

        if ($request->filled('recruitment_status')) {
            $jobsQuery->where('recruitment_status', $filters['recruitment_status']);
        }

        if ($request->has('wage_type') && $request->input('wage_type') !== '') {
            $jobsQuery->where('wage_type', $filters['wage_type']);
        }

        if ($request->filled('salary_min')) {
            $jobsQuery->where('salary_amount', '>=', $filters['salary_min']);
        }

        if ($request->filled('salary_max')) {
            $jobsQuery->where('salary_amount', '<=', $filters['salary_max']);
        }

        if ($request->filled('age')) {
            $jobsQuery->where('age', $filters['age']);
        }

        if ($request->filled('license')) {
            $jobsQuery->where('license', $filters['license']);
        }

        if ($request->filled('experience')) {
            $jobsQuery->where('experience', $filters['experience']);
        }

        $jobs = $jobsQuery->orderby('created_at', 'desc')
            ->paginate(5)
            ->appends($request->query());

        $prefecture = [];
        $status = [];
        $recruitment_status = [];
        $experience = [];
        $license = [];
        $age_limit = [];
        $applicant_list = [];
        $favorite = [];

        foreach ($jobs as $key => $job) {
            $prefecture[] = CheckForm::prefecture($job->prefectures_id);
            $status[]     = CheckForm::status($job->status);
            $recruitment_status[] = CheckForm::recruitment_status($job->recruitment_status);
            $experience[] = CheckForm::experience($job->experience);
            $license[]    = CheckForm::license($job->license);
            $age_limit[]  = CheckForm::age_limit($job->age);
            $applicant_list[] = Applicant::where('user_id', Auth::id())->where('job_id', $job->id)->first();
            $favorite[] = Favorite::where('user_id', Auth::id())->where('job_id', $job->id)->first();
        }

        $searchOptions = [
            'prefectures' => CheckForm::prefectureOptions(),
            'statuses' => CheckForm::statusOptions(),
            'recruitmentStatuses' => CheckForm::recruitmentStatusOptions(),
            'wageTypes' => CheckForm::wageTypeOptions(),
            'ageLimits' => CheckForm::ageLimitOptions(),
            'licenses' => CheckForm::licenseOptions(),
            'experiences' => CheckForm::experienceOptions(),
        ];

        return view('user.dashboard', compact('jobs', 'prefecture', 'status', 'recruitment_status', 'experience', 'license', 'age_limit', 'applicant_list', 'favorite', 'filters', 'searchOptions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Log::emergency("create ログ!");
        return view('owner.job.create');
    }

    public function confirm(JobContactRequest $request)
    {
        // Log::emergency("confirm ログ!");

        $input = $request->only($this->formItems);

        //セッションに値が無い時はフォームに戻る
        if (!$input) {
            return redirect()->route('owner.dashboard');
        }

        $imageFile = $request->img;
        $imagePath = '';
        $file_name = '';
        if (!is_null($imageFile) && $imageFile->isValid()) {
            $dir = 'jobs';
            $file_path = $request->file('img')->store('public/' . $dir);
            $file_name = str_replace('public/' . $dir . '/', '', $file_path);
            $imagePath = 'storage/' . $dir . '/' . $file_name;
        }
        $input['img_name'] = $file_name;
        $input['img_path']  = $imagePath;

        $request->session()->put("form_input", $input);

        $prefecture = CheckForm::prefecture($input['prefectures_id']);
        $status     = CheckForm::status($input['status']);
        $recruitment_status = CheckForm::recruitment_status($input['recruitment_status']);
        $public_status = CheckForm::public_status($input['public_status']);
        $experience = CheckForm::experience($input['experience']);
        $license    = CheckForm::license($input['license']);
        $age_limit  = CheckForm::age_limit($input['age']);

        return view('owner.job.confirm', compact('input', 'prefecture', 'status', 'recruitment_status', 'public_status', 'experience', 'license', 'age_limit', 'imagePath'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Log::emergency("store ログ!");
        $input = $request->session()->get("form_input");
        $input['owner_id'] = Auth::id();

        //戻るボタンが押された時
        if ($request->has("back")) {
            Lib::deleteImage($input['img_name']);
            return redirect()->route('owner.job.create')
                ->withInput($input);
        }

        //セッションに値が無い時はフォームに戻る
        if (!$input) {
            return redirect()->route('owner.dashboard');
        }
        // 値を保存
        Job::create($input);

        //セッションを空にする
        $request->session()->forget("form_input");

        return redirect()
            ->route('owner.dashboard')
            ->with([
                'message' => '求人登録が完了しました',
                'status' => 'info'
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $job = Job::findOrFail($id);
        if (!$job->isPublished()) {
            return redirect()
                ->route('user.dashboard')
                ->with([
                    'message' => 'この求人は現在公開されていません',
                    'status' => 'alert'
                ]);
        }

        $prefecture = CheckForm::prefecture($job->prefectures_id);
        $status     = CheckForm::status($job->status);
        $recruitment_status = CheckForm::recruitment_status($job->recruitment_status);
        $experience = CheckForm::experience($job->experience);
        $license    = CheckForm::license($job->license);
        $age_limit  = CheckForm::age_limit($job->age);
        $favorite   = Favorite::where('user_id', Auth::id())->where('job_id', $job->id)->first();


        $applicant_list = Applicant::where('user_id', Auth::id())->where('job_id', $id)->get();

        return view('user.job.show', compact('job', 'prefecture', 'status', 'recruitment_status', 'experience', 'license', 'age_limit', 'applicant_list', 'favorite'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job = Job::findOrFail($id);
        if ($job->owner_id !== Auth::id()) {
            return redirect()
                ->route('owner.dashboard')
                ->with([
                    'message' => '許可されていない操作です。',
                    'status' => 'alert'
                ]);
        }

        return view('owner.job.edit', compact('job'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(JobContactRequest $request, $id)
    {
        $job = Job::findOrFail($id);
        if ($job->owner_id !== Auth::id()) {
            return redirect()
                ->route('owner.dashboard')
                ->with([
                    'message' => '許可されていない操作です。',
                    'status' => 'alert'
                ]);
        }

        $input = [];
        $imageFile = $request->img;
        if (!is_null($imageFile) && $imageFile->isValid()) {
            Lib::deleteImage($job->img_name);
            [$input['img_name'], $input['img_path']] = Lib::storeImage($request);
            $job->img_name   = $input['img_name'];
            $job->img_path   = $input['img_path'];
        }

        $job->title          = $request->title;
        $job->description    = $request->description;
        $job->prefectures_id = $request->prefectures_id;
        $job->status         = $request->status;
        $job->recruitment_status = $request->recruitment_status;
        $job->public_status = $request->public_status;
        $job->wage_type      = $request->wage_type;
        $job->salary_amount  = $request->salary_amount;
        $job->age            = $request->age;
        $job->license        = $request->license;
        $job->experience     = $request->experience;
        $job->company_name   = $request->company_name;
        $job->company_tel    = $request->company_tel;
        $job->company_email  = $request->company_email;
        $job->save();

        return redirect()
            ->route('owner.dashboard')
            ->with([
                'message' => '求人情報の更新が完了しました。',
                'status'  => 'info'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $job = Job::findOrFail($id);
        if ($job->owner_id !== Auth::id()) {
            return redirect()
                ->route('owner.dashboard')
                ->with([
                    'message' => '許可されていない操作です。',
                    'status' => 'alert'
                ]);
        }
        Lib::deleteImage($job->img_name);
        $job->delete();

        return redirect()
            ->route('owner.dashboard')
            ->with([
                'message' => '求人情報の削除が完了しました。',
                'status'  => 'info'
            ]);
    }

    public function togglePublicStatus($id)
    {
        $job = Job::findOrFail($id);
        if ($job->owner_id !== Auth::id()) {
            return redirect()
                ->route('owner.dashboard')
                ->with([
                    'message' => '許可されていない操作です。',
                    'status' => 'alert'
                ]);
        }

        $job->public_status = $job->isPublished() ? Job::PUBLIC_CLOSED : Job::PUBLIC_OPEN;
        $job->save();

        return redirect()
            ->route('owner.dashboard')
            ->with([
                'message' => '公開状態を更新しました。',
                'status' => 'info'
            ]);
    }

    public function toggleRecruitmentStatus($id)
    {
        $job = Job::findOrFail($id);
        if ($job->owner_id !== Auth::id()) {
            return redirect()
                ->route('owner.dashboard')
                ->with([
                    'message' => '許可されていない操作です。',
                    'status' => 'alert'
                ]);
        }

        $job->recruitment_status = $job->isRecruiting() ? Job::RECRUITMENT_CLOSED : Job::RECRUITMENT_OPEN;
        $job->save();

        return redirect()
            ->route('owner.dashboard')
            ->with([
                'message' => '募集状態を更新しました。',
                'status' => 'info'
            ]);
    }
}
