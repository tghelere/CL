@extends('layouts.website')

@section('content')
<div class="container-fluid">
    <banner class="banner_default" :page="'{{ Route::currentRouteName() }}'"></banner>       
</div>
<div class="container corpo mt-orange">
    <div class="bradcrump">
        <p class="text-uppercase">home / {{$data['title']}}</p>            
    </div>
    <div class="content">
        <h1 class="text-center text-uppercase" >{{$data['h1']}}</h1>
        <text-content class="text-center" :page="'{{ Route::currentRouteName() }}'"></text-content>
    </div>

    <blog-all-posts></blog-all-posts>

</div>
@endsection