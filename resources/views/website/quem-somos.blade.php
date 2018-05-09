@extends('layouts.website')

@section('content')

    <div class="container-fluid">
        <banner :page="'quem-somos'" ></banner>        
    </div>
    <div class="container corpo">
        <div class="bradcrump">
            <p class="text-uppercase">home / quem somos</p>    
        
        </div>
        <div class="content">
            <h1 class="text-center" >Conheça a Centrallimp</h1>
            <text-content class="text-center" :page="'quem-somos'"></text-content>
        </div>
        <div class="treepoints">
            <ul class="row list-unstyled">
                <li class="col-md-4 missao">
                    <h4 class="text-uppercase text-center">Missão</h4>
                    <p class="text-center">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laborum officiis nisi sapiente aperiam placeat perspiciatis quo ex beatae odit porro. Molestiae consectetur laudantium cupiditate laborum iusto, magnam voluptate natus eius.</p>
                </li>
                <li class="col-md-4 visao">
                    <h4 class="text-uppercase text-center">Visão</h4>
                    <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati quaerat consectetur minima facilis possimus accusantium dignissimos, alias aliquid ex, voluptatem suscipit. Reprehenderit non nemo ut dolores quaerat, est perspiciatis numquam.</p>
                </li>
                <li class="col-md-4 valores">
                    <h4 class="text-uppercase text-center">Valores</h4>
                    <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet accusamus voluptatum corporis debitis at. Sequi inventore ullam dolor, aperiam earum perspiciatis soluta dolore, maiores placeat sunt quas vel recusandae doloribus.</p>
                </li>
            </ul>
        </div>
    </div>
@endsection