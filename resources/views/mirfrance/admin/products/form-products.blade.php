
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
    {!! Form::label('categorie_id', 'Catégorie ') !!}
        {!! Form::select('categorie_id', array_merge(['' => ''] + $categorie_id), null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
</div>

<div class="form-group">
    {!! Form::label('description', 'Description') !!}
    {!! Form::textarea('description', null , ['class' => 'form-control', 'rows' => 3]) !!}
</div>

<div class="form-group">
    {!! Form::label('price', 'Prix') !!}
    {!! Form::text('price', null, ['class' => 'form-control']) !!}
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
    <div class="radio radio-styled">
        <label>
            {!! Form::radio('online', 0) !!} <span>Hors ligne</span> &nbsp;
        </label>
        <label>
            {!! Form::radio('online', 1) !!} <span>En ligne</span>
        </label>
    </div>
</div>


<div class="form-group">
    <br>
    {!! Form::submit($submitButtonText,  ['class' => 'btn btn-flat btn-primary ink-reaction']) !!}
</div>



{!! Form::close() !!}