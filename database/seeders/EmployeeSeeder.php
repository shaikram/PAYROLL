<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;//for hash or encryption
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Arr; //for array Fucntions
use laravel\helpers; // for helpers
use Faker\Generator;
use Faker\Factory as Faker;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i=1; $i < 9; $i++) {
          $position = [
            "",
            "Security Guard",
            "Lady Guard",
            "Security Officer",
            "Assistant Detachment Commander",
            "Detachment Commander",
            "Inspector",
            "Body Guard",
            "VIP Escort",
            "Operations Manager"
          ];
          $int = 36 * $i;
          Employee::create([
          "username" => $faker->firstNameMale." ".$faker->lastName,
          "fname" => $faker->firstNameMale,
          "mname" => $faker->lastName,
          "lname" => $faker->lastName,
          "designation" => $position[$i],
          "contactNo" => $faker->phoneNumber,
          "address" => $faker->address,
          "sss" => "34-456".$int."56-828",
          "hmdf" => "5469".$int."6457",
          "philhealth" => "5469".$int."6457",
          "tin" => "000-5".$int."-888-7".$int,
          "status" => 0,
          "addedBy" => $i
        ]);
        }
    }
}
