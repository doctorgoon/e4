@extends('templates.layout-admin')

@section('title') Modifier le statut de l'appel #{{ $call->id }} @endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-head style-{{ Config::get('status_color.' . $call->status)}}">
                    <h2 style="padding-left: 10px; padding-bottom: 10px ">
                        <a href="{{ action('CallsController@showCall', [$call->id]) }}" class="btn btn-icon">
                            <i class="glyphicon glyphicon-arrow-left" style="display: inline; font-size: 18px; line-height: 0px;"></i>
                        </a>
                        &nbsp Appel de {{$call->client_name}} &nbsp-&nbsp {{get_french_date($call->created_at)}}
                    </h2>
                </div>
                <div class="card-body">
                    {!! Form::model($call) !!}

                    {!! Form::hidden('call_id', $call->id) !!}

                    <div class="form-group">
                        <div class="radio radio-styled">
                            @for($i = 0; $i < 4; $i++)
                                <label>
                                    {!! Form::radio('status', $i) !!} <span>{{ Config::get('call_status.' . $i)}}</span>
                                </label>
                                <br />
                            @endfor
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Valider', ['class' => 'btn btn-flat btn-default ink-reaction']) !!}
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop