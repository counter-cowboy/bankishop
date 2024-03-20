<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Image;

class ApiShowController extends Controller
{
    public function __invoke($id)
    {
        $data = Image::find($id);
        $image=[
            'id'=>$data->id,
            'filename'=>$data->image,
            'created'=>$data->created_at
        ];

        return $data ? json_encode($image) : abort(404);
    }
}
