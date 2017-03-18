@extends('templates.layout-admin')

@section('title') Supprimer la note {{ $myNote->title }} @endsection
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-head style-primary">
                    <h3>Supprimer la note {{ $myNote->title }}</h3>
                </div>
                <div class="card-body">
                    ATTENTION : La suppression est définitive. Êtes vous sûr(e) ?
                    {!! Form::open() !!}
                        {!! Form::submit('Supprimer', ['class' => 'btn btn-primary btn']) !!}
                        {!! Form::button('Annuler', ['class' => 'btn btn-primary btn-flat', 'onclick' => 'document.location.href=\'' . action('AdminController@myNotes') . '\'']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop
