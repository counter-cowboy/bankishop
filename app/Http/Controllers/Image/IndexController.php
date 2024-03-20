<?php

namespace App\Http\Controllers\Image;

use App\Models\Image;

class IndexController extends BaseController
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
