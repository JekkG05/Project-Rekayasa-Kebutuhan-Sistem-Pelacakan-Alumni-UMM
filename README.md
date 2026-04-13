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

## Account
    ahmadzaky05@webmail.umm.ac.id
    12345678

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
```
## Screenshot Sistem

## Login
<img width="1902" height="909" alt="563025817-519c14d0-e7fc-4dd4-9fd6-fc48c6d6fc5b" src="https://github.com/user-attachments/assets/cb6ab515-d3c6-4436-aa95-3181f05df33a" />

## Dashboard
<img width="1881" height="904" alt="563026131-f74fa1a1-8fc3-47f1-8713-aa9b68cb4e68" src="https://github.com/user-attachments/assets/ad5c7858-c47e-40d9-88b2-04a5c0f0bafd" />

## Data Alumni
<img width="1904" height="903" alt="563026297-cd57ee40-ff10-455c-8b7f-56041378a072" src="https://github.com/user-attachments/assets/d63fa712-57ad-47e2-809d-ec9cf96fe497" />

## Hasil Pelacakan
<img width="1896" height="902" alt="563026481-5d28e06d-c086-44d5-b1fe-b5621f43e47e" src="https://github.com/user-attachments/assets/7894d79e-48f2-4b13-b0b0-29ffe0d4568a" />

## Link Repository
https://github.com/JekkG05/Project-Rekayasa-Kebutuhan-Sistem-Pelacakan-Alumni-UMM

## Pengujian Sistem
| No | Fitur                  | Langkah Pengujian                    | Hasil    |
| -- | ---------------------- | ------------------------------------ | -------- |
| 1  | Login Admin            | Login menggunakan email dan password | Berhasil |
| 2  | Tambah Alumni          | Menambahkan data alumni baru         | Berhasil |
| 3  | Edit Alumni            | Mengubah data alumni                 | Berhasil |
| 4  | Hapus Alumni           | Menghapus data alumni                | Berhasil |
| 5  | Tambah Hasil Pelacakan | Menambahkan data tracking            | Berhasil |
| 6  | Verifikasi Manual      | Mengubah status verifikasi           | Berhasil |
| 7  | Lihat Laporan          | Menampilkan laporan data alumni      | Berhasil |


