<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Applicant;
use App\Models\Favorite;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Services\CheckForm;

class FavoriteController extends Controller
{
    public function list()
    {
        $favorites = Favorite::where('user_id', Auth::id())
        ->join('jobs', 'jobs.id', '=', 'favorites.job_id')
        ->orderby('favorites.created_at', 'desc')
        ->paginate(10);

        $prefecture = [];
        $status = [];
        $recruitment_status = [];
        $experience = [];
        $license = [];
        $age_limit = [];
        $applicant_list = [];
        $favorite = [];

        foreach ($favorites as $key => $job) {
            $prefecture[] = CheckForm::prefecture($job->prefectures_id);
            $status[]     = CheckForm::status($job->status);
            $recruitment_status[] = CheckForm::recruitment_status($job->recruitment_status);
            $experience[] = CheckForm::experience($job->experience);
            $license[]    = CheckForm::license($job->license);
            $age_limit[]  = CheckForm::age_limit($job->age);
            $applicant_list[] = Applicant::where('user_id', Auth::id())->where('job_id', $job->id)->first();
            $favorite[] = Favorite::where('user_id', Auth::id())->where('job_id', $job->id)->first();
        }

        return view('user.favorite.list', compact('favorites', 'prefecture', 'status', 'recruitment_status', 'experience', 'license', 'age_limit', 'applicant_list', 'favorite'));
    }

    public function store(int $user, $job)
    {
        if (!DB::table('jobs')->where('id', $job)->exists() || $user != Auth::id()) {
            return redirect()
                ->route('user.dashboard')
                ->with([
                    'message' => '不正な操作が行われました',
                    'status'  => 'alert'
                ]);
        }

        if (Favorite::where('user_id', Auth::id())->where('job_id', $job)->exists()) {
            return redirect()
                ->route('user.dashboard')
                ->with([
                    'message' => 'すでにお気に入り登録済みです。',
                    'status' => 'alert'
                ]);
        }

        try {
            Favorite::create([
                'user_id' => Auth::id(),
                'job_id'  => $job
            ]);
        } catch (QueryException $e) {
            return redirect()
                ->route('user.dashboard')
                ->with([
                    'message' => 'すでにお気に入り登録済みです。',
                    'status' => 'alert'
                ]);
        }

        return redirect()
            ->route('user.dashboard')
            ->with([
                'message' => 'お気に入り登録が完了しました。',
                'status' => 'info'
            ]);
    }

    public function destroy(int $user, $job)
    {
        if (!DB::table('jobs')->where('id', $job)->exists() || $user !== Auth::id()) {
            return redirect()
                ->route('user.dashboard')
                ->with([
                    'message' => '不正な操作が行われました',
                    'status'  => 'alert'
                ]);
        }

        $favorite = Favorite::where('user_id', Auth::id())->where('job_id', $job)->first();
        if (is_null($favorite)) {
            return redirect()
                ->route('user.dashboard')
                ->with([
                    'message' => 'お気に入り登録されていません。',
                    'status' => 'alert'
                ]);
        }

        $favorite->delete();

        return redirect()
            ->route('user.dashboard')
            ->with([
                'message' => 'お気に入り登録から削除しました。',
                'status' => 'alert'
            ]);
    }
}
