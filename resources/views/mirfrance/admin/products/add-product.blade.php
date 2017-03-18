@extends('templates.layout-admin')

@section('title') Ajouter un nouveau produit @endsection

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-head style-primary">
                    <h3>
                        <a href="{{ action('AdminProductsController@products') }}" class="btn btn-icon">
                            <i class="glyphicon glyphicon-arrow-left" style="display: inline; font-size: 25px; line-height: 0px; padding-top: 800px"></i>
                        </a>
                    </h3>
                </div>
                <div class="card-body">
                    @include('mirfrance.admin.products.form-products', ['submitButtonText' => 'Ajouter nouveau produit'])
                </div>
            </div>
        </div>
    </div>



 @stop


