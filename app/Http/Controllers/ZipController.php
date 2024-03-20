<?php

namespace App\Http\Controllers;

use App\Models\Image;
use ZipArchive;

class ZipController extends Controller
{
    public function __invoke(string $id)
    {
        $dataDB=Image::find($id);
        $imageFile=$dataDB['image'];

        $zip = new ZipArchive();
        $zipName = public_path('storage/images/' . $imageFile . '.zip');

        if ($zip->open($zipName, ZipArchive::CREATE) === true)
        {
            $imagePath = public_path('storage/images/' . $imageFile);

            $zip->addFile($imagePath, $imageFile);
            $zip->close();

            return response()->download($zipName)->deleteFileAfterSend();
        }
        else
            return "Failed to be zipped";
    }
}
