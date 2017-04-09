@extends('templates.layout-admin')

@section('title')

    @if(isset($note))
        Modifier la note {{ $note->title }}
    @else
        Ajouter une note
    @endif

@endsection
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-head style-primary">
                    <h3>
                        @if(isset($note))
                            <a href="{{ action('AdminController@readANote', [$note->id]) }}" class="btn btn-icon">
                                <i class="glyphicon glyphicon-arrow-left" style="display: inline; font-size: 18px; line-height: 0px;"></i>
                            </a>
                            Modifier la note {{ $note->title }}
                        @else
                            <a href="{{ action('AdminController@myNotes') }}" class="btn btn-icon">
                                <i class="glyphicon glyphicon-arrow-left" style="display: inline; font-size: 18px; line-height: 0px;"></i>
                            </a>
                            Ajouter une note
                        @endif
                    </h3>
                </div>
                <div class="card-body">
                    @if(isset($note))
                        {!! Form::model($note) !!}
                    @else
                        {!! Form::open() !!}
                    @endif

                    <div class="form-group">
                        {!! Form::label('title', 'Titre de la note') !!}
                        {!! Form::text('title', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('task', 'Tâche(s) à faire') !!}
                        {!! Form::textarea('task', null, ['class' => 'form-control autosize', 'rows' => 2]) !!}
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                {!! Form::label('progress', 'Avancement de la note') !!}
                                {!! Form::select('progress', $progress, null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Enregistrer', ['class' => 'btn btn-primary btn-flat']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
