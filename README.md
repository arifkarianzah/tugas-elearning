# Gaskill - E-Learning Platform

**Gaskill** adalah sebuah platform e-learning modern yang dirancang untuk membantu para talenta digital mempelajari keterampilan baru dan mempersiapkan karier masa depan mereka. Proyek ini merupakan portofolio dari **Arifka Rianzah**.

![Screenshot Placeholder](public/assets/photo/hero_webdev.png)
*(Ganti gambar di atas dengan screenshot halaman landing page yang sebenarnya)*

## 🚀 Fitur Unggulan
- **Desain Modern & Profesional:** Antarmuka pengguna (UI) menggunakan *Dark Theme* dengan sentuhan gaya neon elegan (menggunakan Tailwind CSS).
- **Responsive Layout:** Tampilan optimal di berbagai perangkat, dari mobile hingga desktop.
- **Katalog Kursus:** Menampilkan kursus populer dan kategori pilihan.
- **Testimonial:** Cerita sukses dan ulasan dari para alumni.
- **FAQ:** Pertanyaan yang sering diajukan terkait platform dan kursus.

## 🛠 Teknologi yang Digunakan
- **[Laravel](https://laravel.com/):** Framework PHP handal untuk sisi backend.
- **[Tailwind CSS](https://tailwindcss.com/):** Framework CSS *utility-first* untuk proses styling yang cepat dan fleksibel.
- **[Vite](https://vitejs.dev/):** *Build tool* generasi baru untuk aset frontend yang super cepat.

## 💻 Instalasi Lokal

Ikuti langkah-langkah di bawah ini untuk menjalankan proyek ini di mesin lokal (komputer) Anda:

1. **Clone repository ini:**
   ```bash
   git clone https://github.com/arifkarianzah/tugas-elearning.git
   cd tugas-elearning
   ```

2. **Install dependensi PHP (Composer):**
   ```bash
   composer install
   ```

3. **Install dependensi Node (NPM):**
   ```bash
   npm install
   ```

4. **Konfigurasi Environment:**
   Salin file `.env.example` menjadi `.env`:
   ```bash
   cp .env.example .env
   ```
   Atur koneksi database Anda di dalam file `.env`.

5. **Generate App Key:**
   ```bash
   php artisan key:generate
   ```

6. **Migrasi Database (Opsional jika ada database):**
   ```bash
   php artisan migrate --seed
   ```

7. **Jalankan Server Development:**
   Buka dua tab terminal dan jalankan perintah ini secara terpisah:
   
   Terminal 1 (Backend Laravel):
   ```bash
   php artisan serve
   ```
   
   Terminal 2 (Frontend Vite):
   ```bash
   npm run dev
   ```

8. **Akses Aplikasi:**
   Buka browser Anda dan kunjungi `http://localhost:8000`.

## 👨‍💻 Dikembangkan Oleh
- **Arifka Rianzah**
- Mahasiswa Sistem Informasi
- Fullstack Web Development (Laravel & Tailwind CSS)
