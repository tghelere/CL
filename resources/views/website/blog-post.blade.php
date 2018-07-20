@extends('layouts.website')

@section('content')
<div class="container-fluid">
    <banner class="banner_default" :page="'{{ Route::currentRouteName() }}'"></banner>
</div>
<div class="container">
    <div class="bradcrump">
        <p class="text-uppercase">home / blog / {{$data['title']}}</p>            
    </div>
    <div class="content">
        <h3>{{$data['h1']}}</h3>
        <blog-post :slug="'{{$data['slug']}}'" ></blog-post>

        <div class="row bottom-post">
            <div class="col-md-7">
                <a class="return btn btn-primary" href="{{ route('blog') }}" title="Voltar ao blog">Voltar ao blog</a>
            </div>
            <div class="col-md-5">
                <form-newsletter :page="'blog-post'"></form-newsletter>
            </div>
        </div>

    </div>
</div>
@endsection