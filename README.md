# Sistem Pelacakan Alumni UMM

Sistem Pelacakan Alumni adalah aplikasi web yang digunakan untuk membantu pihak Universitas Muhammadiyah Malang dalam memantau keberadaan alumni berdasarkan data yang ditemukan dari berbagai sumber publik.

## Fitur Sistem

- Login Admin
- Dashboard Statistik Alumni
- Kelola Data Alumni
- Hasil Pelacakan Alumni
- Verifikasi Manual
- Laporan Data Alumni

## Teknologi yang Digunakan

- Laravel
- MySQL
- Bootstrap
- JavaScript

## Cara Menjalankan Project

1. Clone repository
2. Install dependency
3. Copy file env
4. Generate key
5. Jalankan migration
6. Jalankan server

Contoh perintah:

```bash
git clone https://github.com/JekkG05/Project-Rekayasa-Kebutuhan-Sistem-Pelacakan-Alumni-UMM.git
cd Project-Rekayasa-Kebutuhan-Sistem-Pelacakan-Alumni-UMM
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
npm run dev
