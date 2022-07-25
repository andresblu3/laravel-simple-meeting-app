<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Sobre la aplicacion

Simple aplicacion de Reuniones de Trabajo usando Laravel.

Instalacion:
    
    ```bash
    git clone https://github.com/andresblu3/laravel-simple-meeting-app
    cd laravel-simple-meeting-app
    ```

Instala las dependencias:
    
    ```bash
    composer install
    ```

Configurar el archivo .env o usa el .env.example
    
Configura la base de datos

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=Laravel
DB_USERNAME=root
DB_PASSWORD=

Agrega "SCOUT_DRIVER=database" al final de .env y ejecuta el comando:
        
        ```bash
        php artisan key:generate
        ```


Ejecuta el comando "php artisan migrate"
        
        ```bash
        php artisan migrate
        php artisan migrate:refresh --seed
        ```

Ejecuta el comando para instalar las dependencias node:
        
        ```bash
        npm install && npm run dev
        ```

Ejecuta el comando para iniciar el servidor artisan:
        
        ```bash
        php artisan serve
        ```





    
