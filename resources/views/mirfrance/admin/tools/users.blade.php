@extends('templates.layout-admin')

@section('title') Gestion des utilisateurs @endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        @if(count($users) > 0)
                        <table class="table no-margin">
                            <thead>
                                <tr>
                                    <th>Prénom</th>
                                    <th>Nom</th>
                                    <th>Adresse e-mail</th>
                                    <th>Dernière IP</th>
                                    <th>Dernière connexion</th>
                                    <th>Créé le</th>
                                    <th>Modifier</th>
                                    <th>Supprimer</th>
                                </tr>
                            </thead>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->firstname }}</td>
                                    <td>{{ $user->lastname }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->ip }}</td>
                                    <td>{{ $user->last_access }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td><a href="{{ action('AdminToolsController@editUser', [$user->id]) }}"> <center> <span style="color:#848484; font-size: 25px"><i class="glyphicon glyphicon-edit"></i></span></center></a></td>
                                    <td><a href="{{ action('AdminToolsController@deleteUser', [$user->id]) }}"><center> <span style="color:#848484; font-size: 25px"><i class="glyphicon glyphicon-trash"></i></span></center></a></td>
                                </tr>
                            @endforeach
                        </table>
                        @endif
                    </div><!--end .table-responsive -->
                </div><!--end .card-body -->
            </div><!--end .card -->
            <a href="{{ action('AdminToolsController@addUser') }}" class="btn btn-primary pull-right">Ajouter un utilisateur</a>
        </div>
    </div>
@stop