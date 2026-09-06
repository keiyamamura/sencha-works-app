<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Services\CheckForm;
use App\Models\Applicant;
use App\Models\Job;
use App\Models\Owner;
use Illuminate\Support\Facades\Auth;

class InfoController extends Controller
{
    public function show($id)
    {
        $owner = Owner::findOrFail($id);
        if ($owner->id !== Auth::id()) {
            return redirect()
                ->route('owner.dashboard')
                ->with([
                    'message' => '許可されていない操作です。',
                    'status' => 'alert'
                ]);
        }

        $age = CheckForm::age($owner->age);
        $prefecture = CheckForm::prefecture($owner->prefectures_id);
        $gender = CheckForm::gender($owner->gender);
        $jobsCount = Job::where('owner_id', Auth::id())->count();
        $applicantsCount = Applicant::whereHas('job', function ($query) {
            $query->where('owner_id', Auth::id());
        })->count();
        $pendingApplicantsCount = Applicant::where('consent_flg', Applicant::STATUS_PENDING)
            ->whereHas('job', function ($query) {
                $query->where('owner_id', Auth::id());
            })
            ->count();

        return view('owner.info.show', compact('owner', 'age', 'prefecture', 'gender', 'jobsCount', 'applicantsCount', 'pendingApplicantsCount'));
    }

    public function edit($id)
    {
        $owner = Owner::findOrFail($id);
        if ($owner->id !== Auth::id()) {
            return redirect()
                ->route('owner.dashboard')
                ->with([
                    'message' => '許可されていない操作です。',
                    'status' => 'alert'
                ]);
        }

        return view('owner.info.edit', compact('owner'));
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:20',
            'age' => 'required|string|max:2',
            'gender' => 'required|string|max:2',
            'email' => 'required|string|email|max:255|unique:owners,email,' . Auth::id(),
            'prefectures_id' => 'required|string|max:2',
            'municipalities' => 'required|string|max:255',
        ]);

        $owner = Owner::findOrFail($id);
        if ($owner->id !== Auth::id()) {
            return redirect()
                ->route('owner.dashboard')
                ->with([
                    'message' => '許可されていない操作です。',
                    'status' => 'alert'
                ]);
        }
        $owner->name = $request->name;
        $owner->age = $request->age;
        $owner->gender = $request->gender;
        $owner->email = $request->email;
        $owner->prefectures_id = $request->prefectures_id;
        $owner->municipalities = $request->municipalities;
        $owner->save();

        return redirect()
            ->route('owner.info.show', Auth::id())
            ->with([
                'message' => '更新が完了しました',
                'status' => 'info'
            ]);
    }
}
