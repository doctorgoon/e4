@extends('templates.layout-admin')

@section('title') {{ $product->name }}  @endsection

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-head style-primary">
                <h3>
                    <a href="{{ action('AdminProductsController@products') }}" class="btn btn-icon">
                        <i class="glyphicon glyphicon-arrow-left" style="display: inline; font-size: 22px; line-height: 0px"></i>
                    </a>
                    {{ $product->name }}
                    <a href="{{ action('AdminProductsController@editProduct', [$product->id]) }}" style="padding-top: 10px; padding-right: 20px" class="btn btn-icon pull-right">
                        <i class="glyphicon glyphicon-pencil" style="display: inline; font-size: 27px; line-height: 0px"></i>
                    </a>
                </h3>
            </div>
            <div class="card-body">
                <ul class="list divider-full-bleed">
                    <div class="row">
                        <div class="col-lg-6">
                            @include('partials.lists-text', ['key' => 'Catégorie', 'value' => $categorie_id[$product->categorie_id]])
                        </div>
                        <div class="col-lg-6">
                            @if (! empty($product->ref)) @include('partials.lists-text', ['key' => 'Référence', 'value' => $product->ref]) @else @include('partials.lists-text', ['key' => 'Référence', 'value' => "..."]) @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            @if (! empty($product->price)) @include('partials.lists-text', ['key' => 'Référence', 'value' => $product->ref]) @else @include('partials.lists-text', ['key' => 'Référence', 'value' => "..."]) @endif
                        </div>
                        <div class="col-lg-6">
                            @if($product->online == 1)
                                @include('partials.lists-text', ['key' => 'Statut', 'value' => 'En ligne'])
                            @else
                                @include('partials.lists-text', ['key' => 'Statut', 'value' => 'Hors ligne'])
                            @endif
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-12">
                            @if (! empty($product->description)) @include('partials.lists-text', ['key' => 'Description', 'value' => $product->description]) @else @include('partials.lists-text', ['key' => 'Description', 'value' => $product->description]) @endif
                        </div>
                    </div>
                </ul>
                @if ( !empty($product->image)) <br /><img  src="{{ $product->image }}" style="max-height:300px;"><br /><br />@endif
            </div>
        </div>
    </div>
</div>

@stop
