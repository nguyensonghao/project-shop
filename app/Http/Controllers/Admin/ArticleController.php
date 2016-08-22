<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Handle\UploadController;
use App\Http\Controllers\Handle\ServiceController;
use App\Article;

class ArticleController extends Controller {
    
    public $page_paginate = 10;
    public $upload;
    public $service;

    public function __construct () {
        $this->middleWare('auth');
    	$this->upload = new UploadController();
    	$this->service = new ServiceController();
    }

    public function show_list () {

    }

    public function show_add () {
    	return view('admin.article.add');    	
    }

    public function action_add (Request $request) {
    	$article = new Article ();
    	$article->title = $request->title;
    	$article->content = $request->description;    
    	$article_image_name = $this->service->get_file_name_current('article');
    	$article->cover = $article_image_name;
    	$file = $request->image_encode;
    	$article->user_id = 1;
    	$path = public_path() . '/assets/resouces/articles/';
    	if ($this->upload_crop_image($file, $article_image_name, $path)) {
    		if ($article->save()) {
    			
    		} else {

    		}
    	} else {

    	}
    	return back()->withInput();
    }    

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

}
