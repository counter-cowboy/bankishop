<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke($id)
    {
        $image = Image::find($id);
        return json_encode($image );
        // TODO: Implement __invoke() method.
    }
}
