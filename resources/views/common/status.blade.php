@if(session()->has('status'))
    <div class="alert alert-{{ session('status') }}">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {!! session('content') !!}
    </div>
@endif