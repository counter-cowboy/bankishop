<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;

class ApiIndexController extends Controller
{
    public function __invoke()
    {
        $images = Image::all();
        $resultForJson=[];
        foreach ($images as $image)
        {
            $resultForJson[]=[
                'id'=>$image->id,
                'filename'=>$image->image,
                'created'=>$image->created_at
            ];
        }

        return $resultForJson ? json_encode($resultForJson) : abort(404);
    }
}
