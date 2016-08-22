<?php

namespace App\Http\Controllers\Handle;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ServiceController extends Controller {
    
    public function get_file_name_current ($prefix) {
    	return $prefix . '_' . time() . '.jpg';
    }

    public function get_name_image ($prefix) {
    	return $prefix . '_' . time() . '.png';	
    }
}
