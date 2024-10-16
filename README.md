

# Aplikasi Calendar Notes dengan CRUD Events, Menggunakan FullCalendar.js dan ckeditor.js

**Link Video Presentasi:**
[Link Presentasi](https://youtu.be/x4PLAThXInQ)

**Link Video Presentasi: FINAL**
[Link Presentasi FINAL](https://youtu.be/sYBV0-zs4zc)

**Anggota Kelompok:**
- 5025221054 Chalvin Reza Farrel
- 5025221257 Syarif Sanad

## Deskripsi Proyek
Proyek ini adalah sebuah aplikasi kalender sederhana yang memungkinkan pengguna untuk menambahkan, mengedit, dan menghapus **event** dalam sebuah kalender. Aplikasi ini menggunakan **FullCalendar.js** untuk menampilkan kalender interaktif serta menambahkan fitur pemilih warna untuk setiap event.

Fitur utama dalam proyek ini mencakup:
- CRUD sederhana untuk **events** yang diimplementasikan dengan **Eloquent ORM**.
- Relasi antara tabel **calendar** dan **events** menggunakan relasi **one-to-many**.
- Event yang dapat diberi warna dan dikelola menggunakan **AJAX** serta **FullCalendar.js**.
- **Fitur Catatan (Notes)** yang memungkinkan pengguna untuk membuat, menyimpan, dan menampilkan catatan yang terkait dengan event.

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

5. **Fitur Catatan (Notes):**
   - Pengguna dapat membuat dan menyimpan catatan yang terhubung dengan event.
   - Catatan dapat diunggah dengan menggunakan **CKEditor 5**, memberikan pengguna pengalaman menulis yang lebih baik dengan format teks yang kaya.
   - Catatan yang telah disimpan dapat dilihat pada halaman utama aplikasi di bagian **My Notes**.
   - Catatan disimpan dalam database dan dapat diambil serta ditampilkan kepada pengguna dengan cara yang mudah diakses.

## Struktur Database
Aplikasi ini menggunakan tiga tabel utama:
1. **calendars**: Menyimpan data tentang kalender.
2. **events**: Menyimpan data tentang event yang terkait dengan kalender. Setiap event memiliki atribut seperti:
   - `name`: Nama event.
   - `start_time`: Waktu mulai event.
   - `end_time`: Waktu selesai event.
   - `color`: Warna event yang dipilih oleh pengguna.
   - `calendar_id`: Relasi dengan tabel **calendars**.
3. **notes**: Menyimpan data tentang catatan. Setiap catatan memiliki atribut seperti:
   - `title`: Judul catatan.
   - `content`: Isi catatan yang dapat berformat teks kaya.
   - `created_at`: Waktu pembuatan catatan.

## Dokumentasi
![image](https://github.com/user-attachments/assets/459e3ae7-79f7-4ce1-a3a0-abab4d5400d7)
![image](https://github.com/user-attachments/assets/e47d61a3-9714-48b7-a194-8fc2e2ef7ee2)
![image](https://github.com/user-attachments/assets/821fb372-8210-4e36-bcc1-c44b2226cd39)
![image](https://github.com/user-attachments/assets/1b7d8da2-f5cb-4c43-9a58-1f69b313372b)










