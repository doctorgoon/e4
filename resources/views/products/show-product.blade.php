@extends('templates.layout-admin')

@section('title') {{ $product->name }}  @endsection

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-head style-primary">
                <h3 style="padding-left: 24px">
                    {{ $product->name }}
                    <a href="{{ action('ProductsController@editProduct', [$product->id]) }}" style="padding-top: 10px; padding-right: 20px" class="btn btn-icon pull-right">
                        <i class="glyphicon glyphicon-pencil" style="display: inline; font-size: 20px; line-height: 0px"></i>
                    </a>
                </h3>
            </div>
            <div class="card-body">
                <ul class="list divider-full-bleed">
                    @if ( !empty($product->image)) <br /><img  src="{{ $product->image }}" style="max-height:300px;"><br /><br />@endif
                    <div class="row">
                        <div class="col-lg-12">
                            @if (! empty($product->ref)) @include('partials.lists-text', ['key' => 'Référence', 'value' => $product->ref]) @else @include('partials.lists-text', ['key' => 'Référence', 'value' => "..."]) @endif
                        </div>
                    </div>
                    &nbsp;
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <div class="checkbox checkbox-styled">
                                    <label>
                                        <input @if($product->available == 1)checked="checked"@endif type="checkbox" class="checkbox checkbox-styled" value="{{ $product->available }}" disabled> <span>Disponible</span> &nbsp;
                                    </label>
                                    <label>
                                        <input @if($product->expedited == 1)checked="checked"@endif type="checkbox" class="checkbox checkbox-styled" value="{{ $product->expedited }}" disabled> <span>Expédié</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </ul>
            </div>
        </div>
    </div>
</div>

@stop
