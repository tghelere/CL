@component('mail::layout')

    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            {{ $content['title'] }}
        @endcomponent
    @endslot
    
    {{-- Body --}}

![{{ config('app.name') }}](http://35.198.6.139/img/logocolor.png "{{ config('app.name') }}")

## {{ $content['title'] }} através do site.
---
 | 
--- | ---
**Nome:** | *{{ $content['name'] }}*  
**E-mail:** | *{{ $content['email'] }}*  
**Telefone:** | *{{ $content['phone'] }}*  
**Cidade / Estado:** | *{{ $content['city'] }} - {{ $content['state'] }}*  
**Interesse:** | *{{ $content['interest'] }}*  
**Breve descrição:** | *{{ $content['description'] }}*  
**Currículo:** | *[Currículo Link]({{ $content['curriculum'] }})*  


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