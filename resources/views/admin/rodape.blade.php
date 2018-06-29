@extends('adminlte::page')

@section('title', ' - Rodapé')

@section('content_header')
    <h1 class="text-center">Rodapé</h1>
    <hr>
@stop

@section('content')
    <admin-form-text-content 
    :page="'footer'" 
    :title="'Campo de texto do rodapé do site'"
    ></admin-form-text-content>
@stop