<?php

namespace App\Http\Controllers;

use File;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Upload an Image or Update it
     * 
     * @param \Illuminate\Http\Request $requestImage
     * @param string $uplPath
     * @param bool $update
     * @param string $oldImage
     * @return string
     */
    protected function uploadImage($requestImage, $uplPath, $update = false, $oldImage = '')
    {
        $image      = $requestImage;

        # Delete Old Image
        if ($update != false) {
            File::delete($oldImage);
        }

        $imageName  = $image->getClientOriginalName();
        $extension  = $image->getClientOriginalExtension();

        $uploadPath = public_path($uplPath);
        $newName    = 'image_' . time().'_' . mt_rand(1, 1000000000) . '.' . $extension;
        
        if ($image->move($uploadPath, $newName)) {
            return $newName;
        }

        return 'error';
    }
}
