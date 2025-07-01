# 📚 Sistema de Gestión de Libros - Laravel + Oracle

Este proyecto es una aplicación web construida en **Laravel** que permite:

- Registro y autenticación de usuarios.
- Gestión de roles: Bibliotecario y Usuario.
- CRUD de libros (crear, listar).
- Procedimientos almacenados en Oracle.

---

🔧 Requisitos

- PHP >= 8.0
- Composer
- Laravel 10+
- Oracle Database (local o remoto)
- Laravel-OCI8 (para conectar con Oracle)
- Servidor web (Apache/Nginx) o Laravel Sail

---
Instalación de dependencias PHP
composer install

Configurar el archivo .env
cp .env.example .env

Editar el archivo .env

DB_CONNECTION=oracle
DB_HOST=localhost
DB_PORT=1521
DB_SERVICE_NAME=xe
DB_USERNAME=biblio_user
DB_PASSWORD=tu_contraseña

Generar clave de la aplicación
php artisan key:generate

Instalar Laravel-OCI8 (conector Oracle):
composer require yajra/laravel-oci8:"^10"


Links de descarga de archivos necesarios:
Oracle Instant: https://www.oracle.com/database/technologies/instant-client/downloads.html
Oci8 para PHP version 8.2 o superios: https://pecl.php.net/package/oci8/3.4.0/windows 
