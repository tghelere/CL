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
<!-- <link rel="shortcut icon" href="favicon.ico"> -->
<!-- <link rel="apple-touch-icon" href="apple-touch-icon.png"> -->