@extends('layouts.website')

@section('content')
    <div class="container-fluid">
        <banner :page="'{{ Route::currentRouteName() }}'" :height="400"></banner>        
    </div>
    <div class="container corpo mt-blue">
        <div class="bradcrump">
            <p class="text-uppercase">home / {{$data['title-category']}} / {{$data['title']}}</p>            
        </div>

        <div class="content">
            <h1 class="text-center text-uppercase" >{{$data['title']}}</h1>
            <text-content :page="'{{ Route::currentRouteName() }}'"></text-content>
        </div>
    </div>
@endsection