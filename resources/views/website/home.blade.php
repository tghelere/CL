@extends('layouts.website')

@section('content')
    <!-- {{$data['title']}} -->

    <div class="container-fluid">
        <home-banners class="home_banners"></home-banners>
    </div>

    <div class="container">
        
        <div class="row justify-content-center">
            <div class="col-md-10">
                <text-content :page="'home'" :classe="'home-text'"></text-content>
            </div>
        </div>
    </div>
    <div class="goDown" id="down">
        <a class="text-uppercase" href="#down">
            <span>Role para baixo</span>
        </a>
    </div>
</div>

    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <home-solutions class="home_solutions"></home-solutions>
            </div>
            <div class="col-md-3">
                <home-two-posts class="two_posts no_mobile"></home-two-posts>
                <div class="recruitment">
                    <h5 class="text-uppercase text-center">Trabalhe conosco</h5>
                    <a class="text-uppercase button" title="Cadastre seu curriculo" href="{{ route('trabalhe-conosco') }}">Cadastre seu curriculo</a>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <services :page="'home'" class="col-md-10 list_services" ></services>
        </div>
    </div>
    <div class="container-fluid blue-bg py-4">
        <div class="container">
            <home-testimonies class="home_testimonies"></home-testimonies>
        </div>
    </div>
@endsection