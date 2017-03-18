@if(Session::has('flash_message'))
    <div class="alert alert-success" role="alert">
        {!! Session::get('flash_message') !!}
    </div>
@elseif(Session::has('flash_error'))
    <div class="alert alert-danger" role="alert">
        {!! Session::get('flash_error') !!}
    </div>
@endif
