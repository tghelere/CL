@extends('layouts.website')

@section('content')

    <div class="container-fluid">
        <banner :page="'{{ Route::currentRouteName() }}'" ></banner>        
    </div>
    <div class="container corpo mt-orange">
        <div class="bradcrump">
            <p class="text-uppercase">home / {{$data['title']}}</p>            
        </div>
        <div class="content">
            <h1 class="text-center text-uppercase" >{{$data['h1']}}</h1>
            <text-content :page="'{{ Route::currentRouteName() }}'"></text-content>
        </div>
        <div class="treepoints">
            <ul class="row list-unstyled">
                <li class="col-md-4 missao">
                    <h4 class="text-uppercase text-center">Missão</h4>
                    <p class="text-center">Ampliar e fortalecer a imagem do tomador junto aos seus clientes, proporcionando ambientes limpos e agradáveis, através da excelência na execução dos serviços com desenvolvimento humano e profissional.</p>
                </li>
                <li class="col-md-4 visao">
                    <h4 class="text-uppercase text-center">Visão</h4>
                    <p class="text-center">Ser referência nacional em qualidade no setor de limpeza e conservação até 2020, com crescimento sustentado e com boas práticas comerciais.</p>
                </li>
                <li class="col-md-4 valores">
                    <h4 class="text-uppercase text-center">Valores</h4>
                    <p class="text-center">Amor pelo que faz, ética e transparência, combate contínuo ao desperdício, trabalho em equipe e responsabilidade Social.</p>
                </li>
            </ul>
        </div>
    </div>
@endsection