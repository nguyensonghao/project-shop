@extends('admin.layout')

@section('title', trans('admin.add_article'))
@section('title-content', trans('admin.add_article'))

@section('content')
	<form class="form-horizontal form-label-left input_mask" action="{{route('admin.article.add')}}" method="post">
    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

    <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
      <span class="label col-md-2 col-sm-2" for="article-title">
        {{trans('admin.title')}}<span class="required">*</span>
      </span>
      <div class="col-md-10 col-sm-10">
        <input type="text" name="title" class="form-control has-feedback-left" id="article-title">
      </div>
    </div>

    <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
      <span class="label col-md-2 col-sm-2" for="article-cover">
        {{trans('admin.cover')}}<span class="required">*</span>
      </span>
      <div class="col-md-10 col-sm-10">
        <input type="file" class="form-control has-feedback-left" id="article-cover" onchange="onImagePicked(this)">
      </div>

      <div class="col-md-10 col-sm-10 col-cropper-image">        
        <img class="croper-image" src="{{Asset('assets/image/avatar-default.jpg')}}">
      </div>

      <input type="hidden" name="image_encode" id="image_encode">
    </div>

    <div class="col-md-12 col-sm-12 form-group col-sx-12">
      <span class="label col-md-2 col-sm-2" for="product-description">
        {{trans('admin.description')}}<span class="required">*</span>
      </span>      
      <div class="col-md-12">
        <textarea id="editor" name="description"></textarea>
      </div>
    </div>

    <div class="col-md-8 col-sm-8 col-xs-12">
        <hr>
        <button type="submit" class="btn btn-primary" onclick="addDescription()">{{trans('admin.add')}}</button>
        <button type="reset" class="btn btn-default">{{trans('admin.reset')}}</button>      
    </div>    

  </form>
@endsection