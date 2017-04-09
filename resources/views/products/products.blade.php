@extends('templates.layout-admin')

@section('title') Produits  @endsection

@section('content')

    <section>
        <div class="section-header">
            <ol class="breadcrumb">
                <li class="active"><h2>Produits</h2></li>
            </ol>
        </div>

        <div class="section-body">
            <div class="card">

                <!-- BEGIN SEARCH HEADER -->
                <div class="card-head style-primary">
                    <div class="tools pull-left">
                        {!! Form::open(['method'=>'GET','url'=>'administration/produits','class'=>'navbar-search','role'=>'search'])  !!}
                        <div class="form-group">
                            <input type="text" class="form-control" name="contactSearch" placeholder="Rechercher...">
                        </div>
                        <button type="submit" class="btn btn-icon-toggle ink-reaction"><i class="fa fa-search"></i></button>
                        {!! Form::close() !!}
                    </div>
                    <div class="tools pull-left" style="padding: 8px">
                        <a href="{{action('ProductsController@products')}}">
                            <button type="submit" class="btn btn-icon-toggle ink-reaction">
                                <i class="fa fa-refresh" style="font-size: 12pt"></i>
                            </button>
                        </a>
                    </div>
                    <div class="tools" style="padding-top: 5px">
                        <a class="btn btn-floating-action btn-default-light" href="{{ action('ProductsController@addProduct') }}"><i class="fa fa-plus"></i></a>
                    </div>
                </div><!--end .card-head -->
                <!-- END SEARCH HEADER -->

                <!-- BEGIN SEARCH RESULTS -->
                <div class="card-body tab-content">

                    <div class="card-head">
                        <ul class="nav nav-tabs" data-toggle="tabs">
                            <li class="active"><a href="#available">Disponibles / {{$countAvailable}}</a></li>
                            <li><a href="#expedited">Expédiés / {{$countExpedited}}</a></li>
                        </ul>
                    </div>

                    <div class="tab-pane active" id="available">
                        <div class="row">
                            <div class="col-sm-8 col-md-9 col-lg-12">
                                <!-- BEGIN SEARCH RESULTS LIST -->
                                <ul class="list divider-full-bleed">
                                    @if(count($products) < 1)
                                        AUCUN PRODUIT TROUVÉ
                                    @else
                                        @foreach( $products as $product )
                                            @if($product->expedited != 1)
                                                <li class="tile">
                                                    <a href="{{ action('ProductsController@showProduct', [$product->id]) }}" class="tile-content ink-reaction">
                                                        <div class="tile-icon">
                                                            <img src="{{ $product->image }}" alt="">
                                                        </div>

                                                        <div class="tile-text">
                                                            {{ $product->name}}
                                                            <small>
                                                                #{{ $product->ref}}
                                                            </small>
                                                        </div>
                                                    </a>
                                                    <a href="{{ action('ProductsController@destroyProduct', [$product->id]) }}" class="pull-right" style="padding-bottom: 10px; padding-right: 20px">Supprimer
                                                        <button type="button" class="btn ink-reaction btn-icon-toggle"><i class="glyphicon glyphicon-trash" style="font-size: 14px"></i></button>
                                                    </a>
                                                    <a href="{{ action('ProductsController@expeditProduct', [$product->id]) }}" style="padding-bottom: 10px; padding-right: 20px" class="pull-right">Expédier
                                                        <button type="button" class="btn ink-reaction btn-icon-toggle"><i class="glyphicon glyphicon-arrow-right" style="font-size: 14px"></i></button>
                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach
                                    @endif
                                </ul>
                            </div><!--end .col -->
                        </div><!--end .row -->
                    </div>

                    <div class="tab-pane" id="expedited">
                        <div class="row">
                            <div class="col-sm-8 col-md-9 col-lg-12">
                                <!-- BEGIN SEARCH RESULTS LIST -->
                                <ul class="list divider-full-bleed">
                                    @if(count($products) < 1)
                                        AUCUN PRODUIT TROUVÉ
                                    @else
                                        @foreach( $products as $product )
                                            @if($product->expedited == 1)
                                                <li class="tile">
                                                    <a href="{{ action('ProductsController@showProduct', [$product->id]) }}" class="tile-content ink-reaction">
                                                        <div class="tile-icon">
                                                            <img src="{{ $product->image }}" alt="">
                                                        </div>
                                                        <div class="tile-text">
                                                            {{ $product->name}}
                                                            <small>
                                                                #{{ $product->ref}}
                                                            </small>
                                                        </div>
                                                    </a>
                                                        <a href="{{ action('ProductsController@destroyProduct', [$product->id]) }}" class="pull-right" style="padding-bottom: 10px; padding-right: 20px">Supprimer
                                                            <button type="button" class="btn ink-reaction btn-icon-toggle"><i class="glyphicon glyphicon-trash" style="font-size: 14px"></i></button>
                                                        </a>
                                                        <a href="{{ action('ProductsController@expeditProduct', [$product->id]) }}" style="padding-bottom: 10px; padding-right: 20px" class="pull-right">Stocker
                                                            <button type="button" class="btn ink-reaction btn-icon-toggle"><i class="glyphicon glyphicon-arrow-down" style="font-size: 14px"></i></button>
                                                        </a>
                                                        <div></div>

                                                </li>
                                            @endif
                                        @endforeach
                                    @endif
                                </ul>
                            </div><!--end .col -->
                        </div><!--end .row -->
                    </div>

                </div><!--end .card-body -->
                <!-- END SEARCH RESULTS -->

            </div><!--end .card -->
        </div><!--end .section-body -->
    </section>

@stop
