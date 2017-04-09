@include('partials.form-error')

@if(isset($user))
    {!! Form::model($user, array('class'=>'form-group', 'files' => true)) !!}
@else
    {!! Form::open(array('class'=>'form-group', 'files' => true)) !!}
@endif

<div class="form-group">
    {!! Form::label('firstname', 'Prénom') !!}
    {!! Form::text('firstname', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('lastname', 'Nom') !!}
    {!! Form::text('lastname', null, ['class' => 'form-control']) !!}
</div>

<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="form-group">
    {!! Form::label('email', 'Adresse e-mail') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    <br>
    {!! Form::submit('Ajouter',  ['class' => 'btn btn-primary ink-reaction']) !!}
</div>

{!! Form::close() !!}