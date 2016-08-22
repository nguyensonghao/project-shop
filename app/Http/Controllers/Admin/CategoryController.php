<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use App\Http\Controllers\Handle\ServiceController;

class CategoryController extends Controller {

	public $page_paginate;
	public $service;

	public function __construct () {
        $this->middleWare('auth');
		$this->service = new ServiceController();
	}
    
    public function show_list () {
    	$categorys = category::paginate($this->page_paginate);
    	return view('admin.product.category.list', compact('categorys'));
    }

    public function show_add () {
    	return view('admin.product.category.add');
    }

    public function show_detail ($id) {
    	$category = category::find($id);
    	return view('admin.product.category.view', compact('category'));
    }

    public function action_delete (Request $request) {
    	$id = $request->id;
    	if (category::destroy($id))
    		flash(trans('admin.delete_success', ['name' => trans('admin.category')]), 'info');
    	else
    		flash(trans('admin.error_systerm'), 'danger');
    	
    	return back();
    }

    public function action_add (Request $request) {    	
    	$avatar_name = $this->service->get_name_image('category');
    	if ($request->avatar->move(public_path() . '/assets/resources/categorys', $avatar_name)) {
    		$category = new category();
	    	$category->name = $request->name;	    	
	    	$category->avatar = $avatar_name;
	    	$category->description = $request->description;
	    	if ($category->save()) {
	    		flash(trans('admin.add_success', ['name' => trans('admin.category')]), 'info');
	    		return back();
	    	} else {
	    		flash(trans('admin.error_systerm'), 'danger');
	    		return back()->withInput();
	    	}
    	} else {
    		flash(trans('admin.error_systerm'), 'danger');
    		return back()->withInput();
    	}
    }

    public function action_update (Request $request) {
    	$id = $request->id;
    	$avatar_name = category::find($id)->avatar;
    	if ($request->hasFile('avatar')) {
    		if (!$request->file('avatar')->move(public_path() . '/assets/resources/categorys', $avatar_name)) {
    			flash(trans('admin.error_systerm'), 'danger');
    			return back();
    		}
    	}

    	$category = array(
    		'name' => $request->name,
    		'description' => $request->description
    	);

    	if (category::where('id', $id)->update($category))
    		flash(trans('admin.update_success', ['name' => trans('admin.category')]), 'info');
    	else
    		flash(trans('admin.error_systerm'), 'danger');

    	return back();
    }

    public function action_active (Request $request) {
    	$id = $request->id;
    	$active = $request->active;
    	if (is_null($active) || $active != 1) 
    		$active = 0;

    	if (category::where('id', $id)->update(array('status' => $active)))
    		flash(trans('admin.update_success', ['name' => trans('admin.category')]), 'info');
    	else
    		flash(trans('admin.error_systerm'), 'danger');
    	
    	return back();
    }
}
