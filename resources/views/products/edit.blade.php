@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel-body">
            @include('common.errors')

            <form id="update" action="{{ url('update', $product->id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Фото</label>
                    <div class="col-sm-6">
                        <img src="{{asset('/assets/images/products/'.$product->photo)}}" style="width: 150px; height: 150px;">
                    </div>
                    <div class="col-sm-6 col-sm-offset-3">
                        <input type="file" name="photo" id="product-photo" class="form-control">
                        <input type="hidden" name="image" value="{{$product->photo}}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="product" class="col-sm-3 control-label">Название</label>

                    <div class="col-sm-6">
                        <input type="text" name="name" id="product-name" class="form-control" value="{{$product->name}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="description" class="col-sm-3 control-label">Описание</label>

                    <div class="col-sm-6">
                        <textarea name="description" id="description" class="form-control">{{$product->description}}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-default">
                            <i class="fa fa-check"></i> Сохранить
                        </button>
                        <a class="btn btn-warning" href="{{url('/products')}}">
                            <i class="fa fa-arrow-left"></i> Назад
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection