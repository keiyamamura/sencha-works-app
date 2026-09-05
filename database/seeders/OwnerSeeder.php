<?php

namespace Database\Seeders;

use App\Models\Owner;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Owner::factory()->count(3)->create();

        DB::table('owners')->insert([
            [
                'name' => 'owner_test1',
                'age' => '19',
                'gender' => '0',
                'email' => 'test1@test.com',
                'prefectures_id' => '1',
                'municipalities' => '◯◯市',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'owner_test2',
                'age' => '30',
                'gender' => '0',
                'email' => 'test2@test.com',
                'prefectures_id' => '2',
                'municipalities' => '◯◯市',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'owner_test3',
                'age' => '40',
                'gender' => '1',
                'email' => 'test3@test.com',
                'prefectures_id' => '3',
                'municipalities' => '◯◯市',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
