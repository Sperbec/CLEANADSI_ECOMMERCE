<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * @throws FileNotFoundException
     */
    public function getImg(Request $request)
    {
        // retrieve image from s3 storage
        $image = Storage::disk('s3')->get($request->path);

        // return image
        return response($image, 200)
            ->header('Content-Type', 'image/jpeg');
    }
}
