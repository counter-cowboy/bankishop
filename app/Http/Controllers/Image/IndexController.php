<?php

namespace App\Http\Controllers\Image;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $result = Image::all();

      /*
      $images = $result->sortBy('image');
      */

        $images=$result->sortBy('created_at');

        return view('images.index', compact('images'));
    }
}
