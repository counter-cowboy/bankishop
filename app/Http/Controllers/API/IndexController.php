<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {

        $result=Image::all();
//        dd(json_encode( $result));
        return json_encode($result);
        // TODO: Implement __invoke() method.
    }
}
