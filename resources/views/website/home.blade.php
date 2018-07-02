@extends('layouts.website')

@section('content')
    <!-- {{$data['title']}} -->

    <div class="container-fluid">
        <home-banners></home-banners>
    </div>

    <div class="container">
        
        <div class="row justify-content-center">
            <div class="col-md-10">
                <text-content :page="'home'" :classe="'home-text'"></text-content>
            </div>
        </div>

        <div class="row">
            <div class="col-md-9">
                <home-solutions></home-solutions>
            </div>
            <div class="col-md-3">
                <home-two-posts></home-two-posts>
                <div class="recruitment">
                    <h5 class="text-uppercase text-center">Trabalhe conosco</h5>
                    <a class="text-uppercase button" title="Cadastre seu curriculo" href="{{ route('trabalhe-conosco') }}">Cadastre seu curriculo</a>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <services :page="'home'" class="col-md-10" ></services>
        </div>
    </div>
    <div class="container-fluid blue-bg py-4">
        <div class="container">
            <home-testimonies></home-testimonies>
        </div>
    </div>
@endsection