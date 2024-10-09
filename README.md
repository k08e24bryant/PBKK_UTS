# Aplikasi Calendar dengan CRUD Events dan FullCalendar.js

**Link Video Presentasi:**
wait

**Anggota Kelompok:**
- 5025221054 Chalvin Reza Farrel
- 5025221257 Syarif Sanad

## Deskripsi Proyek
Proyek ini adalah sebuah aplikasi kalender sederhana yang memungkinkan pengguna untuk menambahkan, mengedit, dan menghapus **event** dalam sebuah kalender. Aplikasi ini menggunakan **FullCalendar.js** untuk menampilkan kalender interaktif serta menambahkan fitur pemilih warna untuk setiap event.

Fitur utama dalam proyek ini mencakup:
- CRUD sederhana untuk **events** yang diimplementasikan dengan **Eloquent ORM**.
- Relasi antara tabel **calendar** dan **events** menggunakan relasi **one-to-many**.
- Event yang dapat diberi warna dan dikelola menggunakan **AJAX** serta **FullCalendar.js**.



## Teknologi yang Digunakan
- **Laravel 11**: Framework utama untuk backend, yang digunakan untuk mengelola routing, database, dan business logic.
- **Eloquent ORM**: Digunakan untuk mengelola operasi database dengan model relasi antara **calendar** dan **events**.
- **FullCalendar.js**: Library JavaScript yang digunakan untuk menampilkan kalender dan mengelola event di frontend.
- **AJAX**: Digunakan untuk melakukan operasi CRUD secara asynchronous tanpa perlu me-refresh halaman.
- **SQLite**: Basis data yang digunakan dalam pengembangan lokal.

## Fitur Utama
1. **CRUD Events:**
   - Pengguna dapat menambahkan, mengedit, dan menghapus event di kalender.
   - Event dapat diberi nama, waktu mulai, waktu selesai, dan warna.
   
2. **Relasi Tabel:**
   - Tabel **calendars** dan **events** memiliki relasi **one-to-many**.
   - Setiap event terhubung dengan sebuah kalender, dan kalender bisa memiliki banyak event.

3. **Pemilih Warna Event:**
   - Setiap event yang ditambahkan dapat diberi warna menggunakan **color picker** yang tersedia ketika menambahkan event.

4. **Kalender Interaktif:**
   - Menggunakan **FullCalendar.js**, pengguna dapat melihat event pada tampilan bulanan dan berinteraksi dengan event yang ada.

## Struktur Database
Aplikasi ini menggunakan dua tabel utama:
1. **calendars**: Menyimpan data tentang kalender.
2. **events**: Menyimpan data tentang event yang terkait dengan kalender. Setiap event memiliki atribut seperti:
   - `name`: Nama event.
   - `start_time`: Waktu mulai event.
   - `end_time`: Waktu selesai event.
   - `color`: Warna event yang dipilih oleh pengguna.
   - `calendar_id`: Relasi dengan tabel **calendars**.






