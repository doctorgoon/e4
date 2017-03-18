@extends('templates.layout-admin')

@section('title') Suivi des clients @endsection

@section('header')


@endsection

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-head style-primary">
                    <h3>&ensp; Suivi des Clients</h3>
                    <a class="btn ink-reaction btn-floating-action btn-lg btn-default btn-fixed-right"  href="{{ action('AdminClientsController@addClient') }}"><i class="glyphicon glyphicon-plus"></i></a>
                </div>

                <div class="card-body">

                    @include('partials.clients-search-bar', ['all' => true])

                        <script>
                            $(document).ready(function() {
                                searchClientByName('', '*');
                            });
                        </script>

                </div>
            </div>
        </div>
    </div>

@stop




