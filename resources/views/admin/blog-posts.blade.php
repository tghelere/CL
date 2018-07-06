@extends('adminlte::page')

@section('title', $data['title'])

@section('content_header')
    <h1 class="text-center">{{$data['title']}}</h1>
    <hr>
@stop

@section('content')
    <admin-blog-posts></admin-blog-posts>
    <admin-banner 
    :page="'blog-post'" 
    :title="'Banner dos posts do blog'"
    :height="300"
    ></admin-banner>
@stop