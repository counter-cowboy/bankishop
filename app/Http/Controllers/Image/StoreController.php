<?php

namespace App\Http\Controllers\Image;

use App\Http\Controllers\Controller;
use App\Http\Requests\Image\StoreRequest;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        foreach ($data['images'] as $image) {

            $imageName = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $originalFileName = pathinfo($imageName, PATHINFO_FILENAME);
            $fileNameToLowerEn = Str::lower(Str::ascii($originalFileName, 'en'));
            $uniqueFileName = $fileNameToLowerEn . '.' . $extension;

            while (Storage::disk('local')->exists('images/'.$uniqueFileName)) {
                $uniqueFileName = $originalFileName . '_'
                    . time() . Str::random(5) . '.' . $extension;
            }

            $pathToImage = $image->storeAs('images',$uniqueFileName);

            $imageSaved = Image::create(['image' => $pathToImage]);

//            dd($imageSaved);

        }
        return redirect()->route('image.index');

    }


}