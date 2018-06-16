@extends('adminlte::page')

@section('title', $data['title'])

@section('content_header')
    <h1 class="text-center">{{$data['title']}}</h1>
    <hr>
    @include('partials.adminText') 
@stop

@section('content')
    
@stop