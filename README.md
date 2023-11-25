# Trap Store

Trap Store es una aplicación web desarrollada en Laravel utilizando Blade y PHP. Utiliza MySQL Workbench como base de datos. Este proyecto es una tienda en línea moderna con un enfoque en la administración de productos, categorías y usuarios.

## Características

- Administración sencilla, amigable y moderna.
- Gestión de productos, categorías y usuarios.
- Interfaz de administración intuitiva.

## Requisitos

Asegúrate de cumplir con los siguientes requisitos para que el proyecto funcione correctamente:

- Composer
- Node.js y NPM
- MySQL
- Laravel Collective/HTML: `composer require laravelcollective/html`
- Spatie/Laravel-Permission: `composer require spatie/laravel-permission`
- Laravel Socialite: `composer require laravel/socialite`
- Intervention Image: `composer require intervention/image`
- Guzzle HTTP: `composer require guzzlehttp/guzzle`
- Stylus: `npm install stylus -g`

## Instalación

1. Clona el repositorio.
2. Ejecuta `composer install` para instalar las dependencias de PHP.
3. Copia el archivo `.env.example` a `.env` y configura tu base de datos.
4. Ejecuta `php artisan key:generate` para generar la clave de la aplicación.
5. Ejecuta `php artisan migrate` para migrar la base de datos.
6. Ejecuta `npm install` para instalar las dependencias de Node.js.
7. Ejecuta `npm run dev` para compilar los assets.

## Acceso
Lanza el servidor y posteriormente:
Ubicate en la direccion de la carpeta `cd public/static/css` y lanza los estilos `stylus admin.styl -c -w`

Puedes acceder a la aplicación en los siguientes enlaces:

- [Login](http://127.0.0.1:8000/login)(Accede como administrador y luego dirigete al url de la administración)->[Administración](http://127.0.0.1:8000/admin)

**Credenciales de Administrador:**
- Correo electrónico: administrador@gmail.com
- Contraseña: administrador123


