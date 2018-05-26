@extends('layouts.website')

@section('content')

    <div class="container-fluid">
        <banner :page="'{{ Route::currentRouteName() }}'" ></banner>        
    </div>
    <div class="container corpo">
        <div class="bradcrump">
            <p class="text-uppercase">home / {{$data['title']}}</p>           
        </div>

        <div class="content">
            <h1 class="text-center text-uppercase" >{{$data['title']}}</h1>
            <div class="row">
                <div class="col-md-6 mt-50">
                    <text-content class="text-center" :page="'{{ Route::currentRouteName() }}'"></text-content>
                    <img src="/img/pages/ouvidoria/megafone.png" class="img-responsive mx-auto d-block mt-50" alt="{{$data['title']}}">
                </div>
                <div class="col-md-6">
                    <form-ombuds></form-ombuds>
                </div>
            </div>
        </div>
    </div>
    
@endsection