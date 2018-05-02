@extends('layouts.website')

@section('content')
    <!-- {{$data['title']}} -->

    <div class="container-fluid">
        <home-banners></home-banners>
    </div>

    <div class="container">
        
        <div class="row justify-content-center">
            <div class="col-md-10">
                <home-text></home-text>
            </div>
        </div>

        <div class="row">
            <div class="col-md-9">
                <home-solutions></home-solutions>
            </div>
            <div class="col-md-3">
                <home-two-posts></home-two-posts>
                <div class="recruitment">
                    <p class="text-uppercase text-center">Trabalhe conosco</p>
                    <a class="text-uppercase" title="Cadastre seu curriculo" href="{{ route('trabalhe-conosco') }}">Cadastre seu curriculo</a>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <home-services></home-services>
        </div>
    </div>
    <home-testimonies></home-testimonies>
@endsection