<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Validate\ValidateFormAuth;
use Validator;
use Auth;
use App\Input;

class AuthController extends Controller {

	public $rules;

	public function __construct () {
		$this->rules = new ValidateFormAuth();
	}
    
    public function show_login () {
    	return view('admin.login');
    }

    public function action_login (Request $request) {
    	$data = $request->only(['name', 'password']);
    	$rule = $this->rules->rule_login();
    	$validation = Validator::make($data, $rule);

    	if (!$validation->fails()) {
    		if (Auth::attempt($data)) {
	    		return redirect('admin/product/list');
	    	} else {
	    		echo 'Nt';
	    	}
    	} else {
    		return back()->withErrors($validation);
    	}
    }

    public function action_logout () {
        Auth::logout();
        return redirect('login');
    }
}
