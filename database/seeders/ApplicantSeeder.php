<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApplicantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('applicants')->insert([
            [
                'user_id' => '1',
                'job_id' => '1',
                'consent_flg' => '0',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => '2',
                'job_id' => '1',
                'consent_flg' => '0',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => '2',
                'job_id' => '2',
                'consent_flg' => '0',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => '3',
                'job_id' => '3',
                'consent_flg' => '0',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
