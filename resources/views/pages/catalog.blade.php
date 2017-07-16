@extends('pages.index')

@section('catalog')

<ul class="shell-left">
    @foreach ($products as $product)
    <li class="rigth">
        <div class="ones">
            <img src="{{asset('assets/images/products/'.$product->photo)}}"
                 alt="" class="catalog-content-main-1" style="width: 150px; height: 150px;">
        </div>
        <div class="twos" style="clear:left;">
            <h4 style="color:#40E0D0;"><a href="{{url('detail', $product->id)}}">{{$product->name}}</a></h4>

            <p style="color:grew;">{!! $product->description !!}</p>
        </div>
    </li>
    @endforeach

</ul>

@endsection