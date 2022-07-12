<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;//for hash or encryption
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Arr; //for array Fucntions
use laravel\helpers; // for helpers
use Faker\Generator;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create();

      // for ($i=1; $i < 10; $i++) {
      //   $position = [
      //     "",
      //     "General Manager",
      //     "Marketing Manager",
      //     "Admin Manager",
      //     "Finance Manager",
      //     "Operation Manager",
      //     "Inspector",
      //     "IT Staff",
      //     "Security Officer",
      //     "Detachment Commander",
      //     "Security Guard"
      //   ];
      //   User::create([
      //   "username" => $faker->name,
      //   "firstName" => $faker->firstNameMale,
      //   "middleName" => $faker->lastName,
      //   "lastName" => $faker->lastName,
      //   "email" => $faker->email,
      //   "password" => Hash::make('faker'),
      //   "address" => $faker->address,
      //   "position" => $position[$i],
      //   "positionNum" => 2 + $i,
      //   "status" => "deactivate",
      //   "contactNo" => $faker->phoneNumber,
      //   "remember_token" => Str::random(10, 'Webslesson')
      // ]);
      // }
          User::create([
          "restriction" => "super admin",
          "username" => "Robert Kiyosaki",
          "picture" => "1112252461.jpg",
          "firstName" => "Robert",
          "middleName" => "Jones",
          "lastName" => "Kiyosaki",
          "email" => "robertkiyosaki@gmail.com",
          "password" => Hash::make('showforce'),
          "address" => $faker->address,
          "position" => "Chief Executive Officer",
          "positionNum" => 1,
          "status" => "active",
          "contactNo" => "09279948794",
          "remember_token" => Str::random(10, 'Webslesson')
        ]);
    }
}
