
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="panel-body">
        @include('common.errors')
        @include('common.status')
        <button class="btn btn-info" onclick="btn_toggle()"><i class="fa fa-btn fa-plus"></i>Добавить продукт</button>

        <form id="create" action="{{ url('product') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="photo" class="col-sm-3 control-label">Фото</label>

                <div class="col-sm-6">
                    <input type="file" name="photo" id="product-photo" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label for="product" class="col-sm-3 control-label">Название</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="product-name" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="description" class="col-sm-3 control-label">Описание</label>

                <div class="col-sm-6">
                    <textarea name="description" id="description" class="form-control"></textarea>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Добавить продукт
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>


@if (count($products) > 0)
    <div class="container">
        <div class="panel panel-default">

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <thead>
                    <th>Название</th>
                    <th>Описание</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    </thead>

                    <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td class="table-text">
                                <a href="{{ url('detail',$product->id) }}">{{ $product->name }}</a>
                            </td>
                            <td class="table-text">
                                <div>{!! $product->description !!}</div>
                            </td>
                            <td class="btns">
                                <a class="btn btn-warning" href="{{ url('edit', $product->id) }}"><i class="fa fa-btn fa-edit"></i>Изменить</a>
                            </td>
                            <td class="btns">
                                <form action="{{ url('product/'.$product->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" id="delete-task-{{ $product->id }}" class="btn btn-danger" onclick="if(!confirm('Вы хотите удалить?')){
                                    event.preventDefault();
                                    }">
                                        <i class="fa fa-btn fa-trash"></i>Удалить
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endif
<script>
    var x = document.getElementById('create');
    x.style.display = 'none';
    function btn_toggle() {
        if (x.style.display === 'none') {
            x.style.display = 'block';
        } else {
            x.style.display = 'none';
        }
    }
</script>
@endsection