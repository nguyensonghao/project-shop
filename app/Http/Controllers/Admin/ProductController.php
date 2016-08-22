<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;
use App\Category;
use App\Label;
use App\Http\Controllers\Controller;

class ProductController extends Controller {

    public $page_paginate = 10;

    public function __construct () {
        $this->middleWare('auth');
    }

	public function show_list () {
        $products = Product::paginate($this->page_paginate);
        return view('admin.product.list', compact('products'));
	}
    
    public function show_add () {
    	$products = Product::all();
        $labels = Label::all();
        $categorys = Category::all();
    	return view('admin.product.add', compact(['products', 'labels', 'categorys']));
    }

    public function show_detail ($id) {
    	$product = Product::find($id);
    	return view('admin.product.edit', compact('product'));
    }
}
