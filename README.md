# Aplikasi Blog (Backend API)

Aplikasi ini adalah backend API untuk sistem blog, di mana frontend dan backend dipisahkan. Backend API ini dibangun dengan menggunakan **Laravel** dan menyediakan berbagai endpoint untuk manajemen pengguna, blog, kategori, dan komentar.

## Fitur

- **Autentikasi Pengguna**:
  - Registrasi dan login pengguna.
  - Pembaruan informasi pengguna.
  - Logout pengguna.

- **Manajemen Blog**:
  - CRUD untuk blog (create, read, update, delete).
  - Menampilkan semua blog dan detail blog berdasarkan ID.

- **Manajemen Kategori**:
  - Menampilkan daftar kategori yang ada.

- **Komentar**:
  - Menambahkan komentar untuk blog.

## Teknologi yang Digunakan

- **Laravel**: Framework PHP untuk pengembangan aplikasi web.
- **Sanctum**: Untuk autentikasi menggunakan token API.
- **MySQL**: Basis data yang digunakan untuk menyimpan informasi pengguna, blog, kategori, dan komentar.

## Endpoint API

### Autentikasi

- **POST** `/login`: Melakukan login pengguna.
- **POST** `/register`: Melakukan registrasi pengguna.
- **PUT** `/user`: Memperbarui data pengguna yang sedang login.
- **POST** `/logout`: Melakukan logout pengguna yang sedang login.

### Pengguna

- **GET** `/users`: Mengambil daftar pengguna (hanya untuk admin).
- **GET** `/users/{id}`: Mengambil detail pengguna berdasarkan ID (untuk admin dan pengguna itu sendiri).
- **GET** `/current-user`: Mengambil data pengguna yang sedang login.

### Blog

- **GET** `/blogs`: Mengambil semua blog.
- **POST** `/blogs`: Menambahkan blog baru.
- **GET** `/blogs/{id}`: Mengambil detail blog berdasarkan ID.
- **PUT** `/blogs/{id}`: Memperbarui blog berdasarkan ID.
- **DELETE** `/blogs/{id}`: Menghapus blog berdasarkan ID.

### Kategori

- **GET** `/categories`: Mengambil semua kategori.

### Komentar

- **POST** `/comments`: Menambahkan komentar untuk blog.

## Instalasi

1. **Clone repositori**:
```
git clone <URL_REPOSITORI>`
cd <folder_project>
```
3. **Install dependensi**
```
composer install
```
5. Konfigurasi .env
```
cp .env.example .env
```
7. Generate kunci aplikasi:
```
php artisan key:generate
```
9. Jalankan server
```
php artisan serve
```
