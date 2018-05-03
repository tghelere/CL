<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="csrf-token" content="{{ csrf_token() }}">

<meta name="description" content="{{$data['description'] or 'nothing'}}">
<meta name="keywords" content="{{$data['keywords']  or 'nothing'}}" />

<title>{{$data['title']  or 'nothing'}}</title>
<meta name="robots" content="all" />
<meta name="author" content="Thyago Ghelere">

<link href="{{ mix('css/style.css') }}" rel="stylesheet">
{{--  <!-- <link href="{{ mix('css/'.$data['page'].'.css') }}" rel="stylesheet"> --> --}}


<link rel="apple-touch-icon" sizes="180x180" href="/favicons/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicons/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicons/favicon-16x16.png">
<link rel="mask-icon" href="/favicons/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#2b5797">
<meta name="theme-color" content="#ffffff">
<link rel="manifest" href="/favicons/site.webmanifest">
<!-- <link rel="manifest" href="/manifest.json"> -->