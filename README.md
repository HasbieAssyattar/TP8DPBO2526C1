# TP8 DPBO

# Jandji
Saya <strong>Muhamad Hasbie Assyattar</strong> dengan <strong>NIM 2508288</strong> mengerjakan Tugas Praktikum 8 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

## Desain Kelas
1. **DB.php (Project/models/DB.php)**
    - Kelas dasar (*parent class*) pembungkus koneksi MySQLi secara berorientasi objek.
    - Menyediakan method inti manipulasi database: `open()` untuk inisialisasi koneksi, `execute()` untuk menjalankan query SQL, `getResult()` untuk mengambil baris data (fetch array), dan `close()` untuk menutup koneksi.
2. **Faculty.php (Project/models/Faculty.php)**
    - Kelas entitas turunan dari `DB` yang merepresentasikan tabel `faculties`.
    - Menyediakan method CRUD: `getFaculties()` untuk membaca seluruh fakultas, `getFacultyById()` untuk membaca data spesifik berdasarkan ID, `add()` untuk menambah fakultas baru, `update()` untuk memperbarui data, dan `delete()` untuk menghapus fakultas.
3. **Lecturer.php (Project/models/Lecturer.php)**
    - Kelas entitas turunan dari `DB` yang merepresentasikan tabel `lecturers`.
    - Menyediakan method CRUD lengkap dengan query `JOIN` ke tabel `faculties` pada `getLecturers()` agar kode dan nama fakultas dapat langsung ditampilkan di tabel dosen, serta method `getLecturerById()`, `add()`, `update()`, dan `delete()`.
4. **Matkul.php (Project/models/Matkul.php)**
    - Kelas entitas turunan dari `DB` yang merepresentasikan tabel `matkul`.
    - Menyediakan method CRUD lengkap dengan query `JOIN` ke tabel `lecturers` pada `getMatkul()` agar nama dosen pengampu otomatis terhubung, serta method `getMatkulById()`, `add()`, `update()`, dan `delete()`.
5. **Template.php (Project/views/Template.php)**
    - Template engine pengolah tampilan antarmuka berbasis penggantian token (*regex string replacement*).
    - Membaca file template HTML mentah, mengganti token/placeholder data seperti `DATA_TABEL`, `DATA_OPTION`, `DATA_BUTTON`, dan membersihkan token yang tidak terpakai lewat `clear()`.
6. **FacultyView.php, LecturerView.php, MatkulView.php (Project/views/...)**
    - Kelas perender antarmuka (*Presentation Layer*) yang bertugas menyusun baris tabel HTML dan opsi dropdown, lalu menyuntikkannya ke berkas template HTML terkait.
7. **FacultyController.php, LecturerController.php, MatkulController.php (Project/controllers/...)**
    - Kelas pengendali alur aplikasi (*Application Layer*) yang mengorkestrasikan komunikasi antara Model dan View, memproses validasi, serta mengatur aksi tambah, perbarui, dan hapus data.
8. **index.php, lecturers.php, faculties.php, matkul.php (Project/...)**
    - Berfungsi sebagai router / trigger utama penangkap HTTP Request (GET dan POST) dari pengguna untuk diteruskan ke Controller yang bersangkutan.

## Struktur Desain
```
TP8
│   db_tp8.sql
│   README.md
│
├───Dokumentasi
│       .gitkeep
│
└───Project
    │   bootstrap.bundle.min.js
    │   bootstrap.min.css
    │   config.php
    │   faculties.php
    │   index.php
    │   lecturers.php
    │   matkul.php
    │
    ├───controllers
    │       FacultyController.php
    │       LecturerController.php
    │       MatkulController.php
    │
    ├───models
    │       DB.php
    │       Faculty.php
    │       Lecturer.php
    │       Matkul.php
    │
    ├───templates
    │       faculty.html
    │       lecturer.html
    │       matkul.html
    │
    └───views
            FacultyView.php
            LecturerView.php
            MatkulView.php
            Template.php
```

## Anuan Program
Program ini merupakan website sistem informasi akademik (pengelolaan Fakultas, Dosen, dan Mata Kuliah) berbasis PHP Native berorientasi objek (OOP) dengan pola arsitektur Model-View-Controller (MVC):
1. Saat web pertama kali dibuka (`index.php`), pengguna secara otomatis diarahkan ke menu utama data **Dosen** (`lecturers.php`). Terdapat bar navigasi di bagian atas untuk berpindah secara dinamis antara menu **Lecturers**, **Faculties**, dan **Matkul**.
2. Di menu **Faculties**, pengguna dapat mengelola data fakultas yang ada di kampus (kode fakultas dan nama lengkap fakultas). Tersedia fitur tambah, ubah data (edit), dan hapus fakultas.
3. Di menu **Lecturers**, pengguna dapat mengelola profil dosen (nama lengkap beserta gelar, NIDN, nomor telepon, dan tanggal bergabung). Saat menambah atau mengubah dosen, sistem menyediakan dropdown pilihan fakultas yang diambil langsung secara dinamis dari tabel `faculties`.
4. Di menu **Matkul**, pengguna dapat mengelola mata kuliah (kode mata kuliah, nama mata kuliah, bobot SKS, dan semester). Dosen pengampu mata kuliah dapat dipilih secara langsung melalui dropdown dinamis yang terhubung ke data `lecturers`.
5. Arsitektur aplikasi sepenuhnya menerapkan *Separation of Concerns*:
   - Logika query SQL murni terkapsulasi di dalam folder `models/`.
   - File tampilan di folder `templates/` murni berkas HTML tanpa kode PHP di dalamnya, di mana injeksi data dilakukan oleh kelas-kelas di folder `views/` menggunakan template parser `Template.php`.
   - Logika penanganan alur request dikendalikan oleh folder `controllers/`.
6. Seluruh aksi hapus data dilengkapi dengan konfirmasi dialog untuk mencegah penghapusan yang tidak disengaja.

## Dokumentasi
<img width="1908" height="968" alt="Screenshot 2026-11-20 192833" src="https://github.com/user-attachments/assets/9b54e4f0-c3d1-42da-b215-9d26a70c6404" />
<img width="1912" height="975" alt="Screenshot 2026-11-20 192828" src="https://github.com/user-attachments/assets/de682a55-1242-488d-9b71-c0dbcd23f7c9" />
<img width="1906" height="1027" alt="Screenshot 2026-11-20 192821" src="https://github.com/user-attachments/assets/42de61e0-6e6b-409f-8bb2-950a5adcb786" />



