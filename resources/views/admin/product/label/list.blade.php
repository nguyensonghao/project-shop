@extends('admin.layout')

@section('title', trans('admin.list_label'))

@section('title-content', trans('admin.list_label'))

@section('content')
  @if (count($labels) > 0)
	<div class="table-responsive list-label">
      <table class="table table-striped jambo_table bulk_action">
        <thead>
          <tr class="headings">
            <th>#</th>
            <th class="column-title">{{trans('admin.name')}}</th>
            <th class="column-title">{{trans('admin.avatar')}}</th>
            <th class="column-title td-action">{{trans('admin.active')}}</th>
            <th class="column-title td-action">{{trans('admin.edit')}}</th>
            <th class="column-title td-action">{{trans('admin.delete')}}</th>
          </tr>
        </thead>

        <tbody>
          @foreach ($labels as $key => $label)
            @if ($key % 2 == 0)
              <tr class="even pointer">
            @else
              <tr class="odd pointer">
            @endif
                <td class="a-center">{{$key + 1}}</td>
                <td class="label-name">{{$label->name}}</td>
                <td class="label-avatar">
                  <img src="{{Asset('assets/resources/labels') . '/' . $label->avatar}}">
                </td>
                <td class="label-active td-action">
                  {{ Form::open(['route' => 'admin.label.active']) }}
                    <input type="hidden" name="id" value="{{$label->id}}">
                    <input type="checkbox" id="active" name="active" value=1 {{$label->status ? "checked" : ""}}  onclick="this.form.submit()">
                  {{ Form::close() }}
                </td>
                <td class="label-edit td-action">
                  <a class="btn btn-primary btn-smallest" href="{{route('admin.label.view', $label->id)}}">
                    <i class="fa fa-pencil" aria-hidden="true"></i> {{trans('admin.edit')}}
                  </a>
                </td>                
                <td class="label-delete td-action">
                  <a class="btn btn-danger btn-smallest" data-toggle="modal" href='#modal-delete-label' onclick="deleteRecord({{$label->id}})">
                    <i class="fa fa-times" aria-hidden="true"></i> {{trans('admin.delete')}}
                  </a>                  
                </td>
              </tr>              
          @endforeach
        </tbody>
        <div class="modal fade modal-delete" id="modal-delete-label">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">{{trans('admin.confirm_delete', ['name' => trans('admin.label')])}}</h4>
              </div>
              <div class="modal-footer">
                {{Form::open(['route' => 'admin.label.delete'])}}
                  <input type="hidden" name="id" id="id-record">
                  <button type="submit" class="btn btn-primary">{{trans('admin.accept')}}</button>
                {{Form::close()}}
                <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('admin.cancel')}}</button>
              </div>
            </div>
          </div>
        </div>
      </table>
      <!-- paginate product -->
      {{$labels->links()}}
    </div>
  @else
    <div class="alert alert-danger">
      <strong>{{trans('admin.notify')}}!</strong> {{trans('admin.no_record')}}
    </div>
  @endif
@endsection