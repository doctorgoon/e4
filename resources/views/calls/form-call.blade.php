
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-head @if(isset($call)) style-{{ Config::get("status_color." .$call->status) }} @else style-primary @endif">
                <h3>
                    @if(isset($call))
                        <a href="{{ action('CallsController@showCall', [$call->id]) }}" class="btn btn-icon">
                            <i class="glyphicon glyphicon-arrow-left" style="display: inline; font-size: 18px; line-height: 0px;"></i>
                        </a>
                        &nbsp Appel de {{$call->client_name}} &nbsp-&nbsp {{get_french_date($call->created_at)}}
                    @elseif(isset($client))
                        <a href="{{ action('ClientsController@showClient', [$client->id]) }}" class="btn btn-icon">
                            <i class="glyphicon glyphicon-arrow-left" style="display: inline; font-size: 18px; line-height: 0px;"></i>
                        </a>
                        &nbsp Appel de {{$client->firstname}} {{$client->lastname}}
                    @else
                        <a href="{{ action('CallsController@calls') }}" class="btn btn-icon">
                            <i class="glyphicon glyphicon-arrow-left" style="display: inline; font-size: 18px; line-height: 0px;"></i>
                        </a>
                        &nbsp Ajouter un appel
                    @endif
                </h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">

                        {!! Form::open() !!}

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    {!! Form::label('user_id', 'Destinataire : ') !!}
                                    {!! Form::select('user_id', getUsersById(), null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    {!! Form::label('client_name', 'Nom du client : ') !!}
                                    @if(isset($client))
                                        {!! Form::text('client_name', $client->firstname . " " . $client->lastname, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
                                    @else
                                        {!! Form::text('client_name', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    {!! Form::label('company', 'Nom de l\'entreprise : ') !!}
                                    @if(isset($client->company))
                                        {!! Form::text('company', $client->company, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
                                    @else
                                        {!! Form::text('company', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    {!! Form::label('email', 'E-mail : ') !!}
                                    @if(isset($client->email))
                                        {!! Form::text('email', $client->email, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
                                    @else
                                        {!! Form::text('email', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    {!! Form::label('phone', 'Numéro de téléphone : ') !!}
                                    @if(isset($client->phone))
                                        {!! Form::text('phone', $client->phone, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
                                    @else
                                        {!! Form::text('phone', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    {!! Form::label('mobile', 'Numéro de mobile : ') !!}
                                    @if(isset($client->mobile))
                                        {!! Form::text('mobile', $client->mobile, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
                                    @else
                                        {!! Form::text('mobile', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('object', 'Objet de l\'appel : ') !!}
                            {!! Form::textarea('object', null, ['class' => 'form-control autosize', 'rows' => 2, 'autocomplete' => 'off']) !!}
                        </div>

                        @if(!isset($edit))
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    {!! Form::label('intervention', 'Intervention : ') !!}
                                    {!! Form::textarea('intervention', null, ['class' => 'form-control autosize', 'rows' => 1, 'autocomplete' => 'off']) !!}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    {!! Form::label('duration', 'Durée de l\'appel (en minutes) : ') !!}
                                    {!! Form::text('duration', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        @endif

                        <div class="form-group">
                            <div class="radio radio-styled">

                                @for($i = 0; $i < 4; $i++)
                                    <label>
                                        {!! Form::radio('status', $i) !!} <span>{{ Config::get('call_status.' . $i) }}</span>
                                    </label>
                                    <br />
                                @endfor
                            </div>
                        </div><br>

                        <div class="form-group">
                            {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary ink-reaction']) !!}
                        </div>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>