## PerpusDigi
- PHP 8.2.0
- MySQL

## Step Installasi
- setting extension apache di xampp
- composer install
- setting env
- php artisan key:generate
- php artisan migrate

## Autetinkasi
NOTE: Aplikasi ini tidak menggunakan seeder jadi ketika ingin login sebagai admin atau petugas harus membuat user terlebih dahulu menggunakan fitur registrasi, setelah membuat user baru kita harus mengubah role/posisi usernya di phpMyAdmin ubah menjadi admin atau petugas karena ketika membuat user baru akan otomatis posisi defaultnya sebagai user/konsumen.

- /dashboard
   - hanya bisa diakses ketika login sebagai admin atau petugas

- /home
   - login sebagai user


 ## ERD


