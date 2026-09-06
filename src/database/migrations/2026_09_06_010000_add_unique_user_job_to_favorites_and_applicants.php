<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddUniqueUserJobToFavoritesAndApplicants extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->deleteDuplicateRows('favorites');
        $this->deleteDuplicateRows('applicants');

        Schema::table('favorites', function (Blueprint $table) {
            $table->unique(['user_id', 'job_id'], 'favorites_user_id_job_id_unique');
        });

        Schema::table('applicants', function (Blueprint $table) {
            $table->unique(['user_id', 'job_id'], 'applicants_user_id_job_id_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('favorites', function (Blueprint $table) {
            $table->dropUnique('favorites_user_id_job_id_unique');
        });

        Schema::table('applicants', function (Blueprint $table) {
            $table->dropUnique('applicants_user_id_job_id_unique');
        });
    }

    private function deleteDuplicateRows(string $table): void
    {
        DB::table($table)
            ->select('user_id', 'job_id', DB::raw('MIN(id) as keep_id'))
            ->groupBy('user_id', 'job_id')
            ->havingRaw('COUNT(*) > 1')
            ->orderBy('keep_id')
            ->each(function ($duplicate) use ($table) {
                DB::table($table)
                    ->where('user_id', $duplicate->user_id)
                    ->where('job_id', $duplicate->job_id)
                    ->where('id', '<>', $duplicate->keep_id)
                    ->delete();
            });
    }
}
