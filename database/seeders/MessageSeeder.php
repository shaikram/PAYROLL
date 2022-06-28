<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Message;
use Illuminate\Support\Facades\Hash;//for hash or encryption
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Arr; //for array Fucntions
use laravel\helpers; // for helpers
use Faker\Generator;
use Faker\Factory as Faker;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 20; $i++) {
          Message::create([
            "name" => $faker->name,
            "email" => $faker->email,
            "message" => $faker->realText,
            "status" => 1,
            "subject" => 'Subject Section',
            "userFkey" => $i
          ]);
      }

    }
}
