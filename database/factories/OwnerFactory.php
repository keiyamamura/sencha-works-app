<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Model\Owner;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;


class OwnerFactory extends Factory
{
    protected $mod = Owner::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'age' => $this->faker->numberBetween(19, 70),
            'gender' => $this->faker->boolean(),
            'email' => $this->faker->unique()->email(),
            'prefectures_id' => $this->faker->numberBetween(1, 47),
            'municipalities' => $this->faker->city(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }
}
