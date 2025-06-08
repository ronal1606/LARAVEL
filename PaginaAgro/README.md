# PaginaAgro Project

## Descripción
Este proyecto es una aplicación web desarrollada en Laravel que permite a los usuarios registrarse, iniciar sesión y verificar su identidad a través de un código de verificación enviado por correo electrónico.

## Estructura de Archivos
El proyecto contiene los siguientes archivos y directorios importantes:

- `resources/views/livewire/auth/login.blade.php`: Este archivo contiene el formulario de inicio de sesión. Incluye campos para el correo electrónico y la contraseña, así como una opción para recordar la sesión y un enlace para registrarse.

- `resources/views/livewire/auth/verify-code.blade.php`: Este archivo contiene el formulario para ingresar un código de verificación. Este formulario es similar al de inicio de sesión y permite a los usuarios verificar su identidad después de iniciar sesión.

- `routes/web.php`: Este archivo define las rutas de la aplicación. Se debe agregar una ruta para manejar la verificación del código después de que el usuario inicie sesión.

- `composer.json`: Este archivo contiene las dependencias del proyecto y la configuración de Composer.

## Configuración de Correo
Para implementar la funcionalidad de envío de correos, asegúrate de configurar correctamente el servicio de correo en el archivo `.env` de tu proyecto Laravel. Aquí hay un ejemplo de configuración:

```
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=noreply@example.com
MAIL_FROM_NAME="${APP_NAME}"
```

## Instalación
1. Clona el repositorio en tu máquina local.
2. Ejecuta `composer install` para instalar las dependencias.
3. Configura tu archivo `.env` con las credenciales de tu base de datos y servicio de correo.
4. Ejecuta las migraciones con `php artisan migrate`.
5. Inicia el servidor de desarrollo con `php artisan serve`.

## Uso
- Accede a la aplicación a través de `http://localhost:8000`.
- Regístrate para crear una nueva cuenta.
- Inicia sesión y verifica tu identidad utilizando el código enviado a tu correo electrónico.

## Contribuciones
Las contribuciones son bienvenidas. Si deseas contribuir, por favor abre un issue o envía un pull request.