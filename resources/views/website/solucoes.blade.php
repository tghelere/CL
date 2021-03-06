@extends('layouts.website')

@section('content')
    <div class="container-fluid">
        <banner class="banner_default" :page="'<?= str_replace('solucoes-', '', Route::currentRouteName()) ?>'"></banner>        
    </div>
    <div class="container corpo mt-blue">
        <div class="bradcrump">
            <p class="text-uppercase">home / {{$data['title-category']}} / {{$data['title']}}</p>            
        </div>

        <div class="content">
            <h1 class="text-center text-uppercase" >{{$data['title']}}</h1>
            <text-content :page="'<?= str_replace('solucoes-', '', Route::currentRouteName()) ?>'"></text-content>
        </div>
        <categorie-posts :page="'<?= str_replace('solucoes-', '', Route::currentRouteName()) ?>'" ></categorie-posts>
    </div>
@endsection