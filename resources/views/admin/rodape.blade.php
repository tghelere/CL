@extends('adminlte::page')

@section('title', $data['title'])

@section('content_header')
    <h1 class="text-center">{{$data['title']}}</h1>
    <hr>
@stop

@section('content')
    <admin-form-text-content 
        :page="'footer'" 
        :title="'Campo de texto do rodapé do site'"
    ></admin-form-text-content>
    <admin-ebook></admin-ebook>
@stop