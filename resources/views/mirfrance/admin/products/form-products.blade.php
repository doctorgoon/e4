
@if(isset($product))
    {!! Form::model($product, array('class'=>'form-group', 'files' => true)) !!}
@else
    {!! Form::open(array('class'=>'form-group', 'files' => true)) !!}
@endif

<div class="form-group">
    {!! Form::label('name', 'Nom') !!}
    {!! Form::text('name', null , ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('ref', 'Référence') !!}
    {!! Form::text('ref', null , ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('image', 'URL de l\'image') !!}
    {!! Form::text('image', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('upload', 'Upload de l\'image') !!}
    <br><br>
    {!! Form::file('upload', null, ['class' => 'form-control']) !!}
</div>
<br>

<div class="form-group">
    <div class="checkbox checkbox-styled">
        <label>
            {!! Form::checkbox('available', 0) !!} <span>Disponible</span> &nbsp;
        </label>
        <label>
            {!! Form::checkbox('expedited', 0) !!} <span>Expédié</span>
        </label>
    </div>
</div>


<div class="form-group">
    <br>
    {!! Form::submit($submitButtonText,  ['class' => 'btn btn-primary ink-reaction']) !!}
</div>



{!! Form::close() !!}