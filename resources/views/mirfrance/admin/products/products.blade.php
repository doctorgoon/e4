@extends('templates.layout-admin')

@section('title') Produits  @endsection

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <a class="btn ink-reaction btn-floating-action btn-lg btn-default btn-fixed-right"  href="{{ action('AdminProductsController@addProduct') }}"><i class="glyphicon glyphicon-plus"></i></a>

            <div class="card">
                <div class="card-head style-primary"><h3>&ensp;Les Appareils</h3></div>
                <div class="card-body no-padding">
                    <ul class="list divider-full-bleed">
                        @foreach( $products as $product )
                            <li class="tile">
                                <a href="{{ action('AdminProductsController@showProduct', [$product->id]) }}" class="tile-content ink-reaction">
                                    <div class="tile-icon">
                                        <img src="{{ $product->image }}" alt="">
                                    </div>

                                    <div class="tile-text">
                                        {{ $product->name}}
                                        <small>
                                            {{ $categorie_id[$product->categorie_id] }}
                                            @if($product->online == 1)
                                                <i style="padding-right: 20px; font-size: 20px" class="md md-public pull-right"></i>
                                            @endif
                                        </small>

                                        <small>
                                            #{{ $product->ref}}
                                        </small>
                                    </div>

                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

@stop
