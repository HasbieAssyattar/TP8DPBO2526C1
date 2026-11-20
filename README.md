# TP8 DPBO - Implementasi Arsitektur Model-View-Controller (MVC)

## Janji
Saya <strong>Muhamad Hasbie Assyattar</strong> dengan <strong>NIM 2508288</strong> mengerjakan Tugas Praktikum 8 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

## Desain Program & Arsitektur MVC
Aplikasi ini dibangun menggunakan arsitektur **Model-View-Controller (MVC)** murni berbasis PHP Native dan Bootstrap 5 dengan konsep *Separation of Concerns*:

### 1. Model (`models/`)
* **`DB.php`**: Class dasar pengelola koneksi MySQLi (`open()`, `execute()`, `getResult()`, `close()`).
* **`Faculty.php`**: Mewarisi `DB`, menangani operasi CRUD pada tabel `faculties`.
* **`Lecturer.php`**: Mewarisi `DB`, menangani operasi CRUD pada tabel `lecturers` dengan query `JOIN faculties` untuk relasi fakultas.
* **`Matkul.php`**: Mewarisi `DB`, menangani operasi CRUD pada tabel `matkul` dengan query `JOIN lecturers` untuk relasi dosen pengampu.

### 2. View & Template (`views/` & `templates/`)
* **`Template.php`**: Template engine sederhana untuk membaca berkas HTML murni dan melakukan penggantian token/placeholder (`replace()`).
* **`FacultyView.php` & `faculty.html`**: Menampilkan antarmuka manajemen fakultas (form input dan tabel data).
* **`LecturerView.php` & `lecturer.html`**: Menampilkan antarmuka manajemen dosen dilengkapi dropdown pilihan fakultas.
* **`MatkulView.php` & `matkul.html`**: Menampilkan antarmuka manajemen mata kuliah dilengkapi dropdown pilihan dosen pengampu.

### 3. Controller (`controllers/`)
* **`FacultyController.php`**: Menjembatani request fakultas ke model `Faculty` dan view `FacultyView`.
* **`LecturerController.php`**: Mengorkestrasi interaksi data dosen dan data referensi fakultas ke view.
* **`MatkulController.php`**: Mengorkestrasi interaksi data mata kuliah dan data referensi dosen pengampu ke view.

### 4. Router / Entry Points
* **`index.php`**: Gerbang utama yang mengarahkan navigasi ke `lecturers.php`.
* **`lecturers.php`**, **`faculties.php`**, **`matkul.php`**: Menerima request HTTP (POST tambah/edit, GET edit/hapus) dan mendelegasikannya ke masing-masing Controller.

---

## Relasi Basis Data (ERD)
Sistem akademik ini memiliki relasi bertingkat satu-ke-banyak (*one-to-many*):
1. Satu **Fakultas** menaungi banyak **Dosen** (`faculties.id` $\rightarrow$ `lecturers.faculty_id`).
2. Satu **Dosen** dapat mengampu banyak **Mata Kuliah** (`lecturers.id` $\rightarrow$ `matkul.lecturer_id`).

---

## Struktur Direktori Repository
```text
TP8/
├── db_tp8.sql
├── README.md
├── Dokumentasi/
└── Project/
    ├── config.php
    ├── index.php
    ├── lecturers.php
    ├── faculties.php
    ├── matkul.php
    ├── bootstrap.min.css
    ├── bootstrap.bundle.min.js
    ├── controllers/
    │   ├── FacultyController.php
    │   ├── LecturerController.php
    │   └── MatkulController.php
    ├── models/
    │   ├── DB.php
    │   ├── Faculty.php
    │   ├── Lecturer.php
    │   └── Matkul.php
    ├── templates/
    │   ├── faculty.html
    │   ├── lecturer.html
    │   └── matkul.html
    └── views/
        ├── FacultyView.php
        ├── LecturerView.php
        ├── MatkulView.php
        └── Template.php
```

---

## Dokumentasi Demo
*(Tempatkan screenshot atau rekaman layar demo fitur CRUD di folder `Dokumentasi/`)*
