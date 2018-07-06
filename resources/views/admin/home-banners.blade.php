@extends('adminlte::page')

@section('title', $data['title'])

@section('content_header')
    <h1 class="text-center">{{$data['title']}}</h1>
    <hr>
@stop

@section('content')
    <admin-banners-home :height="300"></admin-banners-home>
@stop