@extends('templates.layout-admin')

@section('title') Supprimer @endsection
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-head style-info">
                    <h3>Supprimer : {{ $product->name }} #{{ $product->ref }} </h3>
                </div>
                <div class="card-body">
                    <h3>ATTENTION : La suppression est définitive. Êtes vous sûr(e) ?</h3><br>
                    {!! Form::open() !!}
                    {!! Form::submit('Supprimer', ['class' => 'btn btn-info btn']) !!}
                    {!! Form::button('Annuler', ['class' => 'btn btn-info btn-flat', 'onclick' => 'document.location.href=\'' . action('ProductsController@products') . '\'']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop
