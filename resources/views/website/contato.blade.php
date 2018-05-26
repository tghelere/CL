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
            <h1 class="text-center text-uppercase" >{{$data['h1']}}</h1>
            <text-content class="text-center" :page="'{{ Route::currentRouteName() }}'"></text-content>
            <div class="row">
                <div class="col-md-6 mt-50 info">
                    <h4>Sede</h4>
                    <h5>{{ config('app.name') }} Londrina</h5>
                    <p>Rua Augusto Severo, 203, Aeroporto</p>
                    <p>Cep: 86039-650 - Londrina - PR </p>
                    <p><a title="Fone: {{ config('app.phone_f') }}" href="tel:{{ config('app.phone') }}">{{ config('app.phone_f') }}</a> / <a title="Whatsapp: {{ config('app.celphone_f') }}" target="_blank" href="https://api.whatsapp.com/send?phone={{ config('app.celphone') }}">{{ config('app.celphone_f') }}</a></p>
                    <p><a title="Email: {{ config('app.contact_mail') }}" href="mailto:{{ config('app.contact_mail') }}">{{ config('app.contact_mail') }}</a></p>
                    <div class="map-responsive">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1831.856842400167!2d-51.1440723!3d-23.3261448!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94eb4373cec23045%3A0x1fddb7c12bf6fc63!2sCentrallimp+Limpeza+e+Conserva%C3%A7%C3%A3o!5e0!3m2!1spt-PT!2sbr!4v1526261519710" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-md-6">
                    <form-contact></form-contact>
                </div>
            </div>
        </div>
    </div>
@endsection