<?php

namespace App\Http\Controllers\Image;

class CreateController extends BaseController
{
    public function __invoke()
    {
        return view('images.create');
    }
}
