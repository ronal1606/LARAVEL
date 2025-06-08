<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">





<head>
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <meta charset="UTF-8">
    <title>EL DIAMANTE - Agrotienda</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">


</head>

<body>
    <div class="container">
        <img src="/images/logo.png" alt="Logo Diamante" class="logo">
        <h1>Bienvenido a <span style="color:#38b2ac">EL DIAMANTE</span></h1>
        <p>Tu tienda agropecuaria de confianza.</p>
        <br>
        <p>somos la tienda nuemero 1 en todo colombia</p>
        <br>
        <a href="{{ route('login') }}" class="btn">Iniciar Sesión</a>
        <a href="{{ route('register') }}" class="btn" style="margin-left: 10px;">Registrarse</a>
    </div>
</body>

@if (Route::has('login'))
    <div class="h-14.5 hidden lg:block"></div>
@endif
</body>

</html>