<?php

namespace App\Services\Image;

use App\Models\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Service
{
    public function Store($data)
    {
        try {
            DB::beginTransaction();

            foreach ($data['images'] as $image) {

                $imageName = $image->getClientOriginalName();
                $extension = $image->getClientOriginalExtension();

                $originalFileName = pathinfo($imageName, PATHINFO_FILENAME);
                $fileNameToLowerEn = Str::lower(Str::ascii($originalFileName, 'en'));

                $uniqueFileName = $fileNameToLowerEn . '.' . $extension;

                while (Storage::disk('local')->exists('images/'.$uniqueFileName))
                {
                    $uniqueFileName = $uniqueFileName . '_'
                        . time() . Str::random(5) . '.' . $extension;
                }

                $image->storeAs('images',$uniqueFileName);
                Image::create(['image' => $uniqueFileName]);
            }

            DB::commit();
        }
        catch (\Exception $exception)
        {
            DB::rollBack();
            return $exception->getMessage();
        }
    }
}