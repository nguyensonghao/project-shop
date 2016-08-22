<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Label;
use App\Http\Controllers\Handle\ServiceController;

class LabelController extends Controller {

	public $page_paginate;
	public $service;

	public function __construct () {
        $this->middleWare('auth');
		$this->service = new ServiceController();
	}
    
    public function show_list () {
    	$labels = Label::paginate($this->page_paginate);
    	return view('admin.product.label.list', compact('labels'));
    }

    public function show_add () {
    	return view('admin.product.label.add');
    }

    public function show_detail ($id) {
    	$label = Label::find($id);
    	return view('admin.product.label.view', compact('label'));
    }

    public function action_delete (Request $request) {
    	$id = $request->id;
    	if (Label::destroy($id))
    		flash(trans('admin.delete_success', ['name' => trans('admin.label')]), 'info');
    	else
    		flash(trans('admin.error_systerm'), 'danger');
    	
    	return back();
    }

    public function action_add (Request $request) {    	
    	$avatar_name = $this->service->get_name_image('label');
    	if ($request->avatar->move(public_path() . '/assets/resources/labels', $avatar_name)) {
    		$label = new Label();
	    	$label->name = $request->name;	    	
	    	$label->avatar = $avatar_name;
	    	$label->description = $request->description;
	    	if ($label->save()) {
	    		flash(trans('admin.add_success', ['name' => trans('admin.label')]), 'info');
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
    	$avatar_name = Label::find($id)->avatar;
    	if ($request->hasFile('avatar')) {
    		if (!$request->file('avatar')->move(public_path() . '/assets/resources/labels', $avatar_name)) {
    			flash(trans('admin.error_systerm'), 'danger');
    			return back();
    		}
    	}

    	$label = array(
    		'name' => $request->name,
    		'description' => $request->description
    	);

    	if (Label::where('id', $id)->update($label))
    		flash(trans('admin.update_success', ['name' => trans('admin.label')]), 'info');
    	else
    		flash(trans('admin.error_systerm'), 'danger');

    	return back();
    }

    public function action_active (Request $request) {
    	$id = $request->id;
    	$active = $request->active;
    	if (is_null($active) || $active != 1) 
    		$active = 0;

    	if (Label::where('id', $id)->update(array('status' => $active)))
    		flash(trans('admin.update_success', ['name' => trans('admin.label')]), 'info');
    	else
    		flash(trans('admin.error_systerm'), 'danger');
    	
    	return back();
    }
}

