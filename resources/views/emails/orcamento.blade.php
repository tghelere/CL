@component('mail::layout')

    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            {{ $content['title'] }}
        @endcomponent
    @endslot
    
    {{-- Body --}}

![{{ config('app.name') }}](http://35.198.6.139/img/logocolor.png "{{ config('app.name') }}")<!-- .element width="50%" -->

# {{ $content['title'] }} através do site {{config('app.url')}}
---
 | 
--- | ---
** Segmento de atuação: ** | *{{ $content['segment'] }}*  
**Número de colaboradores:** | *{{ $content['contributors'] }}*  
**Modalidade de serviço:** | *{{ $content['modality'] }}*  
**Nome:** | *{{ $content['name'] }}*  
**E-mail:** | *{{ $content['email'] }}*  
**Telefone:** | *{{ $content['phone'] }}*  
**Cidade / Estado:** | *{{ $content['city'] }} - {{ $content['state'] }}*  


{{-- Subcopy --}}
    @isset($subcopy)
        @slot('subcopy')
            @component('mail::subcopy')
                {{ $subcopy }}
            @endcomponent
        @endslot
    @endisset
{{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            © {{ date('Y') }} {{ config('app.name') }}. Todos os direitos reservados.
        @endcomponent
    @endslot
@endcomponent