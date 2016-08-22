@extends('admin.layout')

@section('title', trans('admin.add_category'))
@section('title-content', trans('admin.add_category'))

@section('content')
	<form id="form-add-category" class="form-horizontal form-label-left input_mask" action="{{route('admin.category.add')}}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

    <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
      <span class="label col-md-2 col-sm-2" for="name">
        {{trans('admin.name')}}<span class="required">*</span>
      </span>
      <div class="col-md-10 col-sm-10">
        <input type="text" name="name" class="form-control has-feedback-left" id="name" value="{{old('name')}}">
      </div>
    </div>

    <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
      <span class="label col-md-2 col-sm-2" for="category-cover">
        {{trans('admin.cover')}}<span class="required">*</span>
      </span>
      <div class="col-md-10 col-sm-10">
        <input type="file" class="form-control has-feedback-left" name="avatar" accept="image/png, image/gif, image/jpeg" id="avatar" value="{{old('avatar')}}">
      </div>
    </div>

    <div class="col-md-12 col-sm-12 form-group col-sx-12">
      <span class="label col-md-2 col-sm-2" for="product-description">
        {{trans('admin.description')}}<span class="required">*</span>
      </span>      
      <div class="col-md-12">
        <textarea id="editor" name="description">{{old("description")}}</textarea>
      </div>
    </div>

    <div class="col-md-8 col-sm-8 col-xs-12">
        <hr>
        <button type="submit" class="btn btn-primary" onclick="addDescription()">{{trans('admin.add')}}</button>
        <button type="reset" class="btn btn-default">{{trans('admin.reset')}}</button>      
    </div>

  </form>
@endsection