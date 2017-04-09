@extends('templates.layout-admin')

@section('title') Ajouter un nouveau produit @endsection

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-head style-primary">
                    <h3 style="padding-left: 24px">
                        Ajouter un nouveau produit
                    </h3>
                </div>
                <div class="card-body">
                    @include('products.form-products', ['submitButtonText' => 'Ajouter'])
                </div>
            </div>
        </div>
    </div>


 @stop


