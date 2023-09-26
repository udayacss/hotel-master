<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use File;


class ImageController extends Controller
{
    public function upload(Request $request)
    {
        $folder_name = $request->folder;
        $imageName = time() . '.' . $request->image->getClientOriginalExtension();
        // $path =  Storage::putFile('images/' . $folder_name, $request->image);


        $request->image->move(storage_path('images/' . $folder_name), $imageName);
        // $request->image->move(public_path('images'), $imageName);


        $url = $this->getUrl(storage_path('images/' . $folder_name), $imageName);

        return response()->json(['success' => 'You have successfully upload image.', 'url' => $url]);
    }

    public function getUrl($path, $imageName)
    {
        return $path . '/' . $imageName;
    }

    public function delete(Request $request)
    {
        $image_path = $request->path;
        if (File::exists($image_path)) {
            File::delete($image_path);
        }

        return response()->json(['success' => true]);
    }
}
