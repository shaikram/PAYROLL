<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;//for hash or encryption
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Arr; //for array Fucntions
use laravel\helpers; // for helpers
use Faker\Generator;
use Faker\Factory as Faker;
use App\Models\Search;

class SearchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $array = [
        '',
        'BASIC SERVICE FEATURE',
        'TECHNICAL & OPERATIONAL CAPABILITY',
        'VISION',
        'MISSION',
        'VALUE',
        'SECTION OF PERSONEL',
        'COMMUNICATION',
        'VIP PROTECTION',
        'TRAINING & FITNESS PROGRAM',
        'QUALITY ASSURANCE',
        'STANDARD  FOR QUALITY PERFORMANCE',
        'IMPROVEMENT FOR QUALITY SERVICE',
        'PROGRAM ELEMENTS FOR SAFETY'
      ];
        for ($i=1; $i <= 13; $i++) {
          Search::create([
          "search" => $array[$i]
        ]);
        }
    }
}
