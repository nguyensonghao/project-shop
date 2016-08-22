<?php

namespace App\Http\Controllers\Validate;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ValidateFormAuth extends Controller {
    
    public function rule_login () {
    	return [
    		'name' => 'required',
    		'password' => 'required | min:6'
    	];
    }

}
