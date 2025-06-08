<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro - EL DIAMANTE</title>
    @vite(['resources/css/app.css', 'resources/js/app.js']) <style>
      body {
        background-image: url('/images/fondo_agro.jpg'); /* Reemplaza con la ruta de tu imagen */
        background-size: cover; /* Para cubrir todo el fondo */
        background-position: center; /* Para centrar la imagen */
        background-repeat: no-repeat; /* Para evitar que la imagen se repita */
        min-height: 100vh; /* Asegura que el body cubra al menos la altura de la ventana */
        display: flex; /* Para centrar el contenido */
        align-items: center; /* Centrado vertical */
        justify-content: center; /* Centrado horizontal */
        margin: 0; /* Elimina el margen predeterminado del body */
      }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center">
    <div class="grid grid-cols-1 md:grid-cols-2 w-full max-w-6xl shadow-lg rounded-xl overflow-hidden">
        <div class="hidden md:block bg-cover bg-center" style="background-image: url('/images/fondo3.jpg')">
            <div class="h-full w-full bg-black/50 flex items-center justify-center p-6">
                <div class="text-center text-white">
                    <img src="/images/logo.png" alt="Logo Diamante" class="mx-auto w-24 mb-4">
                    <h2 class="text-3xl font-bold">Bienvenido a <span class="text-emerald-300">EL DIAMANTE</span></h2>
                    <p class="mt-2">Tu tienda agropecuaria de confianza 🌾</p>
                </div>
            </div>
        </div>

        <div class="bg-white p-8">
            {{ $slot }}
        </div>
    </div>
    <a href="{{ url('/') }}"
            class="absolute top-4 left-6 text-lg font-bold text-green-700 hover:text-green-900">
            EL DIAMANTE
        </a>

</body>
</html>
