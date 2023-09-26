<?php

namespace App\Services;

use File;

class ImageService
{
    public function delete($image_path)
    {
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
    }
}
