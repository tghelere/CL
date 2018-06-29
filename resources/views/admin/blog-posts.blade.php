@extends('adminlte::page')

@section('title', $data['title'])

@section('content_header')
    <h1 class="text-center">{{$data['title']}}</h1>
    <hr>
@stop

@section('content')
    <admin-blog-posts></admin-blog-posts>
    {{-- <admin-data-tables 
        :get="'posts'"
        :post="'post'"
        :put="'post'"
        :delete="'post'"
    ></admin-data-tables> --}}
@stop