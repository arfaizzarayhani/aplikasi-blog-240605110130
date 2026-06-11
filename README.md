# Aplikasi Blog CMS

## Informasi Pengembang

- **Nama Lengkap:** Arfa'izza Rayhani Azzahra
- **NIM:** 240605110130

## Deskripsi Aplikasi

Aplikasi Blog CMS adalah sebuah aplikasi web berbasis Laravel yang dirancang untuk mengelola konten blog. Aplikasi ini memungkinkan pengguna untuk membuat, mengedit, menghapus, dan mempublikasikan artikel. Fitur utama aplikasi meliputi:

- **Manajemen Artikel:** Membuat, mengedit, dan menghapus artikel blog
- **Kategori Artikel:** Mengorganisir artikel berdasarkan kategori
- **Manajemen Penulis:** Mengelola informasi penulis artikel
- **Autentikasi Pengguna:** Sistem login untuk mengamankan akses admin
- **Dashboard Admin:** Interface untuk mengelola konten dan pengguna

## Teknologi yang Digunakan

- **Backend:** Laravel 11
- **Frontend:** Blade Template, Tailwind CSS
- **Database:** MySQL
- **Package Manager:** Composer (PHP), NPM (JavaScript)

## Cara Instalasi

1. Clone repository ini
   ```bash
   git clone https://github.com/username/aplikasi-blog-240605110130.git
   ```

2. Install dependencies
   ```bash
   composer install
   npm install
   ```

3. Setup environment
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. Configure database di file `.env`

5. Jalankan migrations
   ```bash
   php artisan migrate
   ```

6. Jalankan application
   ```bash
   php artisan serve
   npm run dev
   ```

## Struktur Project

```
app/              - Kode aplikasi utama
config/           - Berkas konfigurasi
database/         - Migrations dan seeders
resources/        - Views dan assets
routes/           - Definisi routes
public/           - Berkas publik (uploads, etc)
storage/          - File storage dan logs
tests/            - Test files
```

## Catatan Penting

- File `.env` tidak dimasukkan ke repository karena berisi informasi sensitif (kredensial database)
- Pastikan membuat file `.env` sesuai dengan `.env.example` sebelum menjalankan aplikasi

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
