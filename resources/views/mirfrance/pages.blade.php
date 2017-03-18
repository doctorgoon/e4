@extends('templates.layout-mirfrance')

@section('title')
    {{ $page->title }}
@endsection

@section('content')
    {!!  $page->content !!}

@stop