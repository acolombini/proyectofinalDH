<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>@yield('title', '4 Osos Store') - 4 Osos Store</title>
<!-- Icono de la pestaña del sitio -->
<link rel="icon" href="/images/logo.png">
<!-- Fuentes -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito|Odibee+Sans|Raleway&display=swap" rel="stylesheet">
<!-- Css -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@yield('css')
