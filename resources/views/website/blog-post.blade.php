@extends('layouts.website')

@section('content')
<div class="container-fluid">
    <banner :page="'{{ Route::currentRouteName() }}'" ></banner>
</div>
<div class="container corpo mt-orange">
    <div class="bradcrump">
        <p class="text-uppercase">home / blog / {{$data['title']}}</p>            
    </div>
    <div class="content">
        <blog-post :slug="'{{$data['slug']}}'" ></blog-post>
    </div>
</div>
@endsection