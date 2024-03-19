<?php

namespace App\Http\Controllers;

use App\Models\Image;
use hulang\Zip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use ZipArchive;

class ZipController extends Controller
{
    public function __invoke(string $id)
    {

        $dataDB=Image::find($id);

        $imageFile=$dataDB['image'];

//        $zipName = substr($imageFile, 7);
        $zipName=$imageFile;

        $zip = new ZipArchive();
        $zipName = public_path('storage/' . $zipName . '.zip');


        if ($zip->open($zipName, ZipArchive::CREATE) === true)
        {
            $imagePath = public_path('storage/' . $imageFile);
//           dd($imagePath);
            $zip->addFile($imagePath, $imageFile);
            $zip->close();

            return response()->download($zipName)->deleteFileAfterSend();
        }
        else
            return "Failed to be zipped";

    }
}
