<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>
# Pendaftaran Santri

Aplikasi web untuk mengelola proses pendaftaran santri baru secara online.

Project ini dibuat menggunakan Laravel 11, Laravel Breeze, Blade, Tailwind CSS, Alpine.js, dan Vite.

## Fitur Utama

* Landing page informasi pesantren
* Autentikasi user
* Role user:

  * Admin
  * Staff
  * Wali Santri
* Pendaftaran santri oleh wali
* Riwayat pendaftaran wali santri
* Manajemen data pendaftaran oleh admin/staff
* Update status pendaftaran
* Manajemen informasi/blog pesantren
* Komentar pada informasi untuk user yang sudah login

## Teknologi yang Digunakan

* PHP 8.2+
* Laravel 11
* Laravel Breeze
* Blade Template
* Tailwind CSS
* Alpine.js
* Vite
* SQLite / MySQL
* Composer
* Node.js & NPM

## Persyaratan Awal

Pastikan sudah menginstall:

* PHP versi 8.2 atau lebih baru
* Composer
* Node.js
* NPM
* Git
* SQLite atau MySQL

Cek versi:

```bash
php -v
composer -V
node -v
npm -v
git --version
```

## Cara Install Project

Clone repository:

```bash
git clone https://github.com/allifiz/pendaftaran-santri.git
cd pendaftaran-santri
```

Install dependency Laravel:

```bash
composer install
```

Install dependency frontend:

```bash
npm install
```

Copy file environment:

```bash
cp .env.example .env
```

Generate application key:

```bash
php artisan key:generate
```

## Konfigurasi Database

Secara default, project ini bisa menggunakan SQLite.

Buat file database SQLite:

```bash
touch database/database.sqlite
```

Lalu pastikan konfigurasi `.env` seperti ini:

```env
DB_CONNECTION=sqlite
```

Jalankan migration:

```bash
php artisan migrate
```

Jika ingin menggunakan MySQL, ubah konfigurasi `.env` menjadi seperti ini:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=pendaftaran_santri
DB_USERNAME=root
DB_PASSWORD=
```

Lalu buat database terlebih dahulu:

```sql
CREATE DATABASE pendaftaran_santri;
```

Kemudian jalankan migration:

```bash
php artisan migrate
```

## Storage Link

Jalankan command berikut agar file upload di storage bisa diakses dari folder public:

```bash
php artisan storage:link
```

## Menjalankan Project

Jalankan server Laravel:

```bash
php artisan serve
```

Jalankan Vite untuk asset frontend:

```bash
npm run dev
```

Buka aplikasi di browser:

```txt
http://127.0.0.1:8000
```

## Menjalankan Semua Sekaligus

Project ini sudah memiliki script `dev` dari Composer untuk menjalankan beberapa proses sekaligus:

```bash
composer run dev
```

Script ini akan menjalankan:

* Laravel server
* Queue listener
* Laravel Pail/log viewer
* Vite dev server

## Build Asset untuk Production

Untuk membuat asset production:

```bash
npm run build
```

## Testing

Jalankan testing Laravel:

```bash
php artisan test
```

Atau:

```bash
vendor/bin/phpunit
```

## Struktur Folder Penting

```txt
app/
├── Http/
│   ├── Controllers/
│   └── Middleware/
├── Models/

database/
├── migrations/
├── seeders/
└── database.sqlite

resources/
├── views/
├── css/
└── js/

routes/
├── web.php
└── auth.php

public/
storage/
```

## Role Aplikasi

### Admin / Staff

Admin dan staff dapat mengelola:

* Data informasi pesantren
* Data pendaftaran santri
* Status pendaftaran santri

### Wali Santri

Wali santri dapat:

* Melakukan pendaftaran santri
* Melihat riwayat pendaftaran
* Melihat detail status pendaftaran

## Akun Login

Jika project menggunakan seeder, jalankan:

```bash
php artisan db:seed
```

Jika belum ada seeder akun default, buat akun melalui halaman register terlebih dahulu, lalu sesuaikan role user langsung dari database.

## Command yang Sering Dipakai

Clear cache:

```bash
php artisan optimize:clear
```

Refresh database dari awal:

```bash
php artisan migrate:fresh
```

Refresh database dan jalankan seeder:

```bash
php artisan migrate:fresh --seed
```

Jalankan queue:

```bash
php artisan queue:listen
```

Lihat route yang tersedia:

```bash
php artisan route:list
```

## Troubleshooting

### Halaman tidak berubah setelah edit CSS/JS

Jalankan ulang Vite:

```bash
npm run dev
```

### Error `APP_KEY` kosong

Jalankan:

```bash
php artisan key:generate
```

### Error database tidak ditemukan

Jika menggunakan SQLite, pastikan file ini sudah ada:

```txt
database/database.sqlite
```

Jika belum ada, buat dengan:

```bash
touch database/database.sqlite
php artisan migrate
```

### Error file upload tidak muncul

Jalankan:

```bash
php artisan storage:link
```

### Error permission di Linux/Ubuntu

Jalankan:

```bash
chmod -R 775 storage bootstrap/cache
```

Jika masih error:

```bash
sudo chown -R $USER:www-data storage bootstrap/cache
```

## Catatan Pengembangan

Project ini masih bisa dikembangkan lagi, seperti:

* Dashboard statistik pendaftaran
* Export data pendaftaran ke PDF/Excel
* Upload dokumen persyaratan santri
* Notifikasi email/WhatsApp
* Verifikasi pembayaran
* Filter data berdasarkan status pendaftaran
* Halaman profil pesantren yang lebih lengkap

## Lisensi

Project ini menggunakan lisensi MIT.

## Author

Dibuat oleh [allifiz](https://github.com/allifiz).
