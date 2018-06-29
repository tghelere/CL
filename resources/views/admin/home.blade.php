@extends('adminlte::page')

@section('title', $data['title'])

@section('content_header')
    <h1 class="text-center">{{$data['title']}}</h1>
    <hr>
@stop

@section('content')
    @include('partials.adminText') 
    <admin-form-text-content 
        :page="'home-solutions'" 
        :title="'Campo de texto da página Home - Soluções'"
    ></admin-form-text-content>
    <admin-form-text-content 
        :page="'home-testimonies'" 
        :title="'Campo de texto da página Home - Opiniões de Clientes'"
    ></admin-form-text-content>
@stop