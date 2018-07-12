@extends('layouts.website')

@section('content')
    <div class="container-fluid">
        <banner class="banner_default" :page="'{{ Route::currentRouteName() }}'"></banner>        
    </div>
    <div class="container corpo mt-green">
        <div class="bradcrump">
            <p class="text-uppercase">home / {{$data['title-category']}} / {{$data['title']}}</p>            
        </div>

        <div class="content">
            <h1 class="text-center text-uppercase" >{{$data['title']}}</h1>
            <text-content :page="'{{ Route::currentRouteName() }}'"></text-content>
        </div>
        
        <div class="row justify-content-center icones">
            <services :page="'servicos'" class="col-md-10 list_services" ></services>
        </div>
    </div>
@endsection