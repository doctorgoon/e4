@extends('templates.layout-admin')

@section('title') Modifier la fiche de {{ $product->name }}  @endsection

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-head style-primary">
                <h3 style="padding-left: 24px">
                    Modifier le produit
                </h3>
            </div>
            <div class="card-body">

                @include('mirfrance.admin.products.form-products', ['submitButtonText' => 'Modifier Produit', 'product' => $product])

            </div>
        </div>
    </div>
</div>

 @stop




