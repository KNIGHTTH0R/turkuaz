@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel panel-default">

            <div class="panel-body">
                {{$product->name}}
                {{$product->description}}
            </div>
        </div>
    </div>
@endsection