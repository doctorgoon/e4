@include('partials.form-error')


<div class="row">
    <div class="col-lg-12">
        @if(isset($edit))
            {!! Form::model($edit) !!}
        @else
            {!! Form::open() !!}
        @endif

        <div class="card">
                <div class="card-head style-primary">
                </div>
                <div class="card-body">

                    <div class="form-group">
                        {!! Form::label('firstname', 'Prénom de l\'utilisateur') !!}
                        {!! Form::text('firstname', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('lastname', 'Nom de l\'utilisateur') !!}
                        {!! Form::text('lastname', null, ['class' => 'form-control']) !!}
                    </div>

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">


                @if(!isset($edit))
                        <div class="form-group">
                            {!! Form::label('email', 'Adresse e-mail de l\'utilisateur') !!}
                            {!! Form::text('email', null, ['class' => 'form-control']) !!}
                        </div>
                @endif

                </div><!--end .card-body -->
                <div class="card-actionbar">
                    <div class="card-actionbar-row">
                        {!! Form::submit('Valider', ['class' => 'btn btn-primary ink-reaction']) !!}
                    </div>
                </div>
            </div><!--end .card -->
            {!! Form::close() !!}
</div>
    </div>