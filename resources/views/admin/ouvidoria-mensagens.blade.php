@extends('adminlte::page')

@section('title', $data['title'])

@section('content_header')
    <h1 class="text-center">{{$data['title']}}</h1>
    <hr>
@stop

@section('content')
    <admin-ombud-messages></admin-ombud-messages>
@stop