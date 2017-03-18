@extends('templates.layout-admin')

@if(isset($ticket))
    @section('title')Modifier Ticket @endsection
@else
    @section('title')Ajouter Ticket @endsection
@endif

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-head style-{{ Config::get('status_color.' . $call->status) }}">
                <h3>
                    <a href="{{ action('AdminCallsController@showCall', [$call->id]) }}" class="btn btn-icon">
                        <i class="glyphicon glyphicon-arrow-left" style="display: inline; font-size: 18px; line-height: 0px;"></i>
                    </a>
                {{ \Carbon\Carbon::parse($call->updated_at)->format('d/m/Y H:i') }} - {{ $call->client_name }}
                </h3>
            </div>
            <div class="card-body">

                @if(isset($ticket))
                    {!! Form::model($ticket) !!}
                @else
                    {!! Form::open() !!}
                @endif

                {!! Form::hidden('call_id', $call->id) !!}

                <div class="form-group">
                    {!! Form::label('description', 'Intervention : ') !!}
                    {!! Form::textarea('description', null, ['class' => 'form-control autosize', 'rows' => 2]) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('duration', 'Durée de l\'appel (en minutes) : ') !!}
                    {!! Form::text('duration', null, ['class' => 'form-control']) !!}
                </div>

                @if(isset($ticket))
                        <div class="form-group">
                            {!! Form::submit('Modifier', ['class' => 'btn btn-flat btn-' . Config::get('status_color.' . $call->status). ' ink-reaction']) !!}
                        </div>
                @else
                        <div class="form-group">
                            {!! Form::submit('Ajouter', ['class' => 'btn btn-flat btn-' . Config::get('status_color.' . $call->status). 'ink-reaction']) !!}
                        </div>
                @endif

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@stop