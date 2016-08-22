<?php

namespace App\Http\Controllers\Handle;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class UploadController extends Controller {      

    public function upload_crop_image ($file, $file_name, $file_path) {
        $file = explode('base64,', $file)[1];        
        $img = str_replace(' ', '+', $file);
        $data = base64_decode($img);
        $file = $file_path . $file_name;
        try {
            $success = file_put_contents($file, $data);            
            $image = Image::make(file_get_contents($file));
            if ($success)                
                return true;
        } catch (Exception $e) {
            return false;
        }

        return false;
    }  

    public function test () {
    	echo 'test';
    }
}
