@extends('admin.layout')

@section('title', trans('admin.list_product'))

@section('title-content', trans('admin.list_product'))

@section('content')
  @if (count($products) > 0)
  <div class="table-responsive list-product">
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
          @foreach ($products as $key => $product)
            @if ($key % 2 == 0)
              <tr class="even pointer">
            @else
              <tr class="odd pointer">
            @endif
                <td class="a-center">{{$key + 1}}</td>
                <td class="product-name">{{$product->name}}</td>
                <td class="product-avatar">
                  <img src="{{Asset('assets/resources/products') . '/' . $product->avatar}}">
                </td>
                <td class="product-active td-action">
                  {{ Form::open(['route' => 'admin.product.active']) }}
                    <input type="hidden" name="id" value="{{$product->id}}">
                    <input type="checkbox" id="active" name="active" value=1 {{$product->status ? "checked" : ""}}  onclick="this.form.submit()">
                  {{ Form::close() }}
                </td>
                <td class="product-edit td-action">
                  <a class="btn btn-primary btn-smallest" href="{{route('admin.product.view', $product->id)}}">
                    <i class="fa fa-pencil" aria-hidden="true"></i> {{trans('admin.edit')}}
                  </a>
                </td>                
                <td class="product-delete td-action">
                  <a class="btn btn-danger btn-smallest" data-toggle="modal" href='#modal-delete-product' onclick="deleteRecord({{$product->id}})">
                    <i class="fa fa-times" aria-hidden="true"></i> {{trans('admin.delete')}}
                  </a>                  
                </td>
              </tr>              
          @endforeach
        </tbody>
        <div class="modal fade modal-delete" id="modal-delete-product">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">{{trans('admin.confirm_delete', ['name' => trans('admin.product')])}}</h4>
              </div>
              <div class="modal-footer">
                {{Form::open(['route' => 'admin.product.delete'])}}
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
      {{$products->links()}}
    </div>
  @else
    <div class="alert alert-danger">
      <strong>{{trans('admin.notify')}}!</strong> {{trans('admin.no_record')}}
    </div>
  @endif
@endsection