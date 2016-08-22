@extends('admin.layout')

@section('title', trans('admin.view_category'))
@section('title-content', trans('admin.view_category'))

@section('content')	
  {{Form::open(['route' => 'admin.category.update', 'class' => 'form-horizontal form-label-left input_mask', 'id' => 'form-update-category', 'enctype' => 'multipart/form-data'])}}

    <input type="hidden" name="id" value="{{$category->id}}">
    <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
      <span class="label col-md-2 col-sm-2" for="name-category">
        {{trans('admin.name')}}<span class="required">*</span>
      </span>
      <div class="col-md-10 col-sm-10">
        <input type="text" name="name" class="form-control has-feedback-left" id="name" value="{{$category->name}}">
      </div>
    </div>

    <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
      <span class="label col-md-2 col-sm-2" for="category-cover">
        {{trans('admin.cover')}}<span class="required">*</span>
      </span>
      <div class="col-md-10 col-sm-10">
        <button type="button" class="btn btn-dark btn-smallest" role="button" data-toggle="collapse" href="#collapseUpload" aria-expanded="false" aria-controls="collapseUpload">{{trans('admin.edit')}}</button>        
        <div class="collapse" id="collapseUpload">
          <input type="file" class="form-control has-feedback-left" name="avatar" accept="image/png, image/gif, image/jpeg" id="avatar">
        </div>
        <br>
        <img src="{{Asset('assets/resources/categorys') . '/' . $category->avatar . '?' .time()}}" class="img-responsive">        
      </div>
    </div>

    <div class="col-md-12 col-sm-12 form-group col-sx-12">
      <span class="label col-md-2 col-sm-2" for="category-description">
        {{trans('admin.description')}}<span class="required">*</span>
      </span>      
      <div class="col-md-12">
        <textarea id="editor" name="description">{{$category->description}}</textarea>
      </div>
    </div>

    <div class="col-md-8 col-sm-8 col-xs-12">
        <hr>
        <button type="submit" class="btn btn-primary" onclick="addDescription()">{{trans('admin.update')}}</button>
        <button type="button" class="btn btn-default" onclick="location.reload();">{{trans('admin.reset')}}</button>      
    </div>

  {{Form::close()}}
@endsection