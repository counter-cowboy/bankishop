<?php

namespace App\Http\Controllers\Image;

use App\Http\Controllers\Controller;
use App\Http\Requests\Image\StoreRequest;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();



        foreach ($data['images'] as $image) {

            $imageName=$image->    getClientOriginalName();
            $extension=$image->getClientOriginalExtension();

            dd($extension);

        }

    }

    public function fileName($data)
    {

    }


}