<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Services\CheckForm;
use App\Models\User;
use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Jobs\SendThanksMail;

class InfoController extends Controller
{
    public function show($id)
    {
        // 同期処理
        // Mail::to('test@example.com')->send(new TestMail());

        // 非同期処理
        SendThanksMail::dispatch();
        
        $user = User::findOrFail($id);
        if ($user->id !== Auth::id()) {
            return redirect()
                ->route('user.dashboard')
                ->with([
                    'message' => '許可されていない操作です。',
                    'status' => 'alert'
                ]);
        }

        $age         = CheckForm::age($user->age);
        $prefecture  = CheckForm::prefecture($user->prefectures_id);
        $gender      = CheckForm::gender($user->gender);
        $current_job = CheckForm::current_job($user->current_job);

        return view('user.info.show', compact('user', 'age', 'prefecture', 'gender', 'current_job'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        if ($user->id !== Auth::id()) {
            return redirect()
                ->route('user.dashboard')
                ->with([
                    'message' => '許可されていない操作です。',
                    'status' => 'alert'
                ]);
        }

        return view('user.info.edit', compact('user'));
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:20',
            'age' => 'required|string|max:2',
            'gender' => 'required|string|max:2',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            'prefectures_id' => 'required|string|max:2',
            'municipalities' => 'required|string|max:255',
            'current_job' => 'required|string|max:2',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->age = $request->age;
        $user->gender = $request->gender;
        $user->email = $request->email;
        $user->prefectures_id = $request->prefectures_id;
        $user->municipalities = $request->municipalities;
        $user->current_job = $request->current_job;
        $user->save();

        return redirect()
            ->route('user.info.show', Auth::id())
            ->with([
                'message' => '更新が完了しました',
                'status' => 'info'
            ]);
    }
}
