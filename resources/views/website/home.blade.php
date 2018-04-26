@extends('layouts.website')

@section('content')
    <!-- {{$data['title']}} -->

    <div class="container-fluid">
        <home-banners></home-banners>
    </div>

    <div class="container">
        
        <div class="row justify-content-center">
            <div class="col-md-10">
                <p class="text-center">Texto</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <home-solutions></home-solutions>
            </div>
            <div class="col-md-4">
                <home-two-posts></home-two-posts>
            </div>
        </div>

        <div class="row justify-content-center">
            <home-services></home-services>
        </div>
    </div>
    <home-testimonies></home-testimonies>
@endsection