# 🎮 SMA GAMELAB - Portal Game Edukasi Interaktif

SMA Gamelab adalah platform portal game edukasi berbasis web yang dirancang untuk siswa SMA. Proyek ini tidak hanya menyediakan permainan yang mengasah otak, tetapi juga dilengkapi dengan Content Management System (CMS) mandiri untuk memudahkan guru atau admin dalam mengelola bank soal secara dinamis.

Dibuat sebagai **Tugas Sistem Multimedia - Kelompok 2 (Universitas Gunadarma)**.

---

## ✨ Fitur Utama

1. **Portal Utama (Frontend)**
   - UI/UX modern bergaya *Dark Mode* layaknya portal game profesional.
   - Sistem pemilihan game menggunakan *Card Interface*.
2. **Game 1: Susun Huruf (Anagram)**
   - Mengasah memori istilah-istilah ilmiah.
   - Algoritma *Auto-Shuffle* menggunakan Fisher-Yates.
   - Sistem *Leveling* dan *Reward* Koin.
3. **Game 2: Trivia Quiz (Pilihan Ganda)**
   - Sistem *Checkpoint* per 3 soal dengan hadiah koin progresif.
   - Fitur *Power-Ups* dinamis (Kesempatan Kedua, 50/50, Instant Win) yang harganya menyesuaikan tingkat kesulitan (Level).
4. **Sistem Save Progress Otomatis**
   - Menyimpan *progress* level, jumlah koin, dan urutan soal secara aman di dalam *Local Storage* browser tanpa membebani database.
5. **Admin CMS Terpadu (Backend)**
   - Proteksi otentikasi login menggunakan *Middleware*.
   - *Dashboard* dengan navigasi *Sidebar* modern.
   - Form pintar (*Smart Form*) yang otomatis beradaptasi:
     - Mode *Susun Huruf*: Generate & acak pilihan huruf secara otomatis.
     - Mode *Trivia Quiz*: Form A, B, C, D dengan seleksi *radio button* untuk jawaban benar.

---

## 🛠️ Teknologi yang Digunakan (Tech Stack)

Proyek ini dikembangkan menggunakan tumpukan teknologi modern:

- **Framework Backend:** [Laravel 11.x](https://laravel.com) (PHP 8.2+)
- **Frontend / Styling:** [Tailwind CSS](https://tailwindcss.com/) (via CDN) & HTML5
- **Interaktivitas Game:** Vanilla JavaScript (ES6+)
- **Database:** MySQL / MariaDB
- **Font:** Plus Jakarta Sans (Google Fonts)
- **Arsitektur:** MVC (Model-View-Controller) dengan Eloquent ORM

---

## 🚀 Panduan Instalasi (Clone & Run)

Ikuti langkah-langkah berikut untuk menjalankan proyek ini di mesin lokal kamu:

### 1. Persyaratan Sistem (Prerequisites)
Pastikan kamu sudah menginstal perangkat lunak berikut:
- PHP >= 8.2
- [Composer](https://getcomposer.org/)
- MySQL / XAMPP / Laragon
- Git

### 2. Langkah-langkah Instalasi

**Clone Repositori:**
```bash
git clone (https://github.com/Cehhhh15/SismulKel2_4IA03.git)
cd nama-repo-kamu
Install Dependensi (Vendor):

Bash
composer install
Konfigurasi Environment:
Duplikat file konfigurasi dan sesuaikan pengaturan database-nya.

Bash
cp .env.example .env
Buka file .env dan pastikan pengaturan database sesuai dengan milikmu:

Cuplikan kode
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sismulkel2_db  # Ubah sesuai nama database yang kamu buat di phpMyAdmin
DB_USERNAME=root
DB_PASSWORD=
Generate Application Key:

Bash
php artisan key:generate
Jalankan Migrasi Database:
Perintah ini akan membuat semua tabel (games, questions, dll) secara otomatis.

Bash
php artisan migrate
Jalankan Server Lokal:

Bash
php artisan serve
Aplikasi sekarang dapat diakses melalui browser di: http://127.0.0.1:8000