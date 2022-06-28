<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\userTable;
use Illuminate\Support\Facades\Hash;//for hash or encryption
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Arr; //for array Fucntions
use laravel\helpers; // for helpers

class userTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      userTable::create([
      "username" => "Shaikram Abdulguro",
      "firstName" => "Shaikram",
      "middleName" => "Ampaso",
      "lastName" => "Abdulguro",
      "email" => "shaikram02@gmail.com",
      "password" => Hash::make('showforce'),
      "address" => "179 santan st. san roque II Brgy. Bagong Pag-asa Q.C.",
      "position" => "Chief Executive Officer",
      "positionNum" => 1,
      "status" => "active",
      "contactNo" => "09279940264",
      "remember_token" => Str::random(10, 'Webslesson')
    ]);
    }
}
