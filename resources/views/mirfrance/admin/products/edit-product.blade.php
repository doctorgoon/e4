@extends('templates.layout-admin')

@section('title') Modifier la fiche de {{ $product->name }}  @endsection

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-head style-primary">
                <h3>
                    <a href="{{ action('AdminProductsController@showProduct', [$product->id] )}}" class="btn btn-icon">
                        <i class="glyphicon glyphicon-arrow-left" style="display: inline; font-size: 18px; line-height: 0px;"></i>
                    </a>
                     &nbsp;
                </h3>
            </div>
            <div class="card-body">

                @include('mirfrance.admin.products.form-products', ['submitButtonText' => 'Modifier Produit', 'product' => $product])

            </div>
        </div>
    </div>
</div>

 @stop




