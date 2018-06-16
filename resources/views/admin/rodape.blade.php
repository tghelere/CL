@extends('adminlte::page')

@section('title', ' - Rodapé')

@section('content_header')
    <h1 class="text-center">Rodapé</h1>
    <hr>
    <admin-form-text-content 
        :page="'footer'" 
        :title="'Campo de texto do rodapé do site'"
    ></admin-form-text-content>
@stop

@section('content')
    
@stop