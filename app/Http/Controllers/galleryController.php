<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;//for hash or encryption
use Illuminate\Contracts\Auth\Authenticatable;
use App\Extensions\MongoSessionHandler;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;
use App\Models\User;
use App\Models\Gallery;
use Carbon\Carbon;
use DB;

class galleryController extends Controller
{
    public function store(Request $request){

      // $gallery = new Gallery();
      // $section = $request->section;
      // $photo = $request->file('file');
      // return "Hello ".$section." ".$photo ;

      $request->validate([
        'images' => 'required'
      ]);

      if ($request->hasfile('images')) {
            $images = $request->file('images');
            $section = $request->input('section');
            $uploader = $request->input('uploader');

            foreach($images as $image) {
                $name = $image;
                $new_name = rand().'.'. $name->getClientOriginalExtension();
                $name->move(public_path('photo'), $new_name);

                Gallery::create([
                    'image' => $new_name,
                    'section' => $section,
                    'uploader' => $uploader
                   ]);
            }
        }
        return back()->with('success', 'Images uploaded successfully');

    }
}
