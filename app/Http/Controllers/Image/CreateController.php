<?php

namespace App\Http\Controllers\Image;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke()
    {
        $images = Image::all();
        return view('images.index', compact('images'));
    }
}
