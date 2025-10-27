## Project: **Cepuin**
### Sistem Pengaduan Siswa Berbasis Laravel 12

**Framework:** Laravel 12 + Laravel Breeze
**Database:** SQLite
**Font:** Poppins
**Color Palette:**

* **Primary:** `#f2f2f2`
* **Secondary:** `#800101`

---

## 1. 🎯 **Tujuan Proyek**

Cepuin adalah sistem pengaduan siswa digital yang membantu siswa melaporkan kejadian secara aman kepada konselor (BK).
Proyek ini dirancang agar mudah digunakan, ringan, dan mudah dikembangkan oleh tim SMK.

---

## 2. 👥 **Role dan Akses**

| Role                      | Deskripsi                          | Fitur Utama                                             |
| ------------------------- | ---------------------------------- | ------------------------------------------------------- |
| **Student (Siswa)**       | Dapat membuat dan memantau laporan | Membuat laporan baru, melihat status laporan            |
| **Admin / Konselor (BK)** | Petugas yang menangani laporan     | Melihat semua laporan, mengubah status, memberi catatan |

---

## 3. 🧩 **Fitur Utama**

### 3.1. Landing Page

* Tampilkan **form laporan langsung di halaman utama**.
* Jika pengguna belum login, diarahkan ke halaman login Breeze.
* Tombol **“Masuk sebagai Admin”** di pojok bawah.

**Isi Form:**

* Nama siswa yang dilaporkan
* Kelas
* Waktu kejadian
* Kronologi
* Upload bukti foto
* Tombol **Kirim Laporan**

---

### 3.2. Autentikasi

Menggunakan Laravel Breeze:

* **Siswa:** mendaftar sendiri.
* **Admin:** ditambahkan manual melalui seeder.
* Validasi form login/register wajib dilakukan di sisi server.

---

### 3.3. Dashboard Siswa

* Menampilkan daftar laporan siswa (card view).
* Setiap laporan menampilkan:

  * Nama siswa yang dilaporkan
  * Status laporan (Dilaporkan, Direview, Diproses, Selesai)
  * Tanggal laporan
  * Tombol “Lihat Detail”
* Tombol **“+ Buat Laporan Baru”**.

---

### 3.4. Dashboard Admin/Konselor

* Sidebar navigasi:

  * 📄 Semua Laporan
  * 👥 Data Siswa
  * ⚙️ Pengaturan
* Tabel laporan menampilkan:

  * Nama pelapor
  * Nama yang dilaporkan
  * Status laporan
  * Waktu kejadian
  * Tombol aksi (Review, Update Status, Delete)
* Admin dapat memberi **catatan konselor** dan mengubah status laporan.

---

### 3.5. Notifikasi & Status

* Status laporan:

  * 🟥 Dilaporkan
  * 🟨 Direview
  * 🟦 Diproses
  * 🟩 Selesai
* Siswa hanya bisa mengedit laporan selama status masih **Dilaporkan**.

---

## 4. 📊 **Struktur Database (SQLite)**

### Tabel `users`

| Field      | Type                    | Keterangan           |
| ---------- | ----------------------- | -------------------- |
| id         | integer                 | Primary key          |
| name       | string                  | Nama pengguna        |
| email      | string                  | Email unik           |
| password   | string                  | Password terenkripsi |
| role       | enum(`student`,`admin`) | Jenis pengguna       |
| created_at | timestamp               | Otomatis             |
| updated_at | timestamp               | Otomatis             |

### Tabel `reports`

| Field          | Type                                               | Keterangan                  |
| -------------- | -------------------------------------------------- | --------------------------- |
| id             | integer                                            | Primary key                 |
| reporter_id    | foreignId(`users`)                                 | Relasi pelapor              |
| reported_name  | string                                             | Nama siswa yang dilaporkan  |
| reported_class | string                                             | Kelas siswa yang dilaporkan |
| incident_time  | datetime                                           | Waktu kejadian              |
| description    | text                                               | Kronologi                   |
| photo_path     | string                                             | Path foto                   |
| status         | enum(`dilaporkan`,`direview`,`diproses`,`selesai`) | Status laporan              |
| counselor_note | text                                               | Catatan konselor            |
| created_at     | timestamp                                          | Otomatis                    |
| updated_at     | timestamp                                          | Otomatis                    |

---

## 5. 🎨 **Desain UI**

### Warna

* Background utama: `#f2f2f2`
* Tombol utama & header: `#800101`
* Font: **Poppins**

### Komponen UI

| Elemen       | Desain                                          |
| ------------ | ----------------------------------------------- |
| Navbar       | Merah rose dengan teks putih                    |
| Button       | Rounded, shadow lembut, hover warna lebih gelap |
| Card laporan | Putih dengan border halus                       |
| Status badge | Warna berbeda sesuai tahap laporan              |

---

## 6. ⚙️ **Teknologi**

* Laravel 12 (Backend)
* Laravel Breeze (Auth)
* Tailwind CSS (Frontend)
* SQLite (Database)
* Storage Laravel untuk upload foto

---

## 7. 🔒 **Keamanan**

* Semua rute laporan menggunakan middleware `auth`.
* File foto disimpan di `storage/app/public/reports`.
* Validasi input wajib (server & client).
* Proteksi CSRF aktif.

---

## 8. 👨‍💻 **Pembagian Tugas Developer (5 Orang)**


| Developer                                         | Fokus Utama                                     | Detail Tugas Mandiri                                                                                                                                                                                                                                                                                                                        |
| ------------------------------------------------- | ----------------------------------------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| **Keyza – Autentikasi & Role System**             | Login, Register, dan Redirect                   | - Setup Laravel Breeze (register, login, logout).<br>- Tambahkan kolom `role` di tabel `users` (`student`, `admin`).<br>- Buat middleware `CheckRole` untuk redirect otomatis setelah login.<br>- Buat halaman login dan register dengan desain sederhana pakai Tailwind.<br>- Pastikan redirect siswa ke `/student` dan admin ke `/admin`. |
| **Faisal – Landing Page & Form Laporan (Public)**  | Halaman depan yang bisa simpan laporan langsung | - Buat route `/` dan view `landing.blade.php`.<br>- Tambahkan form laporan: nama siswa yang dilaporkan, kelas, waktu, kronologi, upload bukti foto.<br>- Simpan laporan ke tabel `reports` via `ReportController@store`.<br>- Jika belum login, arahkan ke login (pakai `@guest` directive).<br>- Desain form sendiri, warna sesuai PRD.    |
| **Rais – Dashboard Siswa (Student)**             | Halaman laporan siswa                           | - Buat route `/student` dan controller `StudentController`.<br>- Tampilkan semua laporan milik user yang login (pakai `auth()->id()`).<br>- Tambahkan status badge (`Dilaporkan`, `Direview`, `Diproses`, `Selesai`).<br>- Bisa klik “Detail” untuk lihat isi laporan + foto bukti.<br>- Bonus: tombol “Buat Laporan Baru” (opsional).      |
| **Shabira – Dashboard Admin (Konselor/BK)**         | Halaman manajemen laporan                       | - Buat route `/admin` dan controller `AdminController`.<br>- Tampilkan semua laporan dari tabel `reports` dalam bentuk tabel.<br>- Tambahkan dropdown ubah status laporan + tombol “Simpan”.<br>- Tambahkan kolom “Catatan Konselor”.<br>- Desain dashboard admin dengan sidebar dan warna merah `#800101`.                                 |
| **Yunita – Profil & Pengaturan Akun (Semua User)** | Halaman profil user                             | - Buat route `/profile` dan controller `ProfileController`.<br>- Tampilkan data nama, email, dan role user login.<br>- Bisa ubah nama, password, dan foto profil (upload sederhana).<br>- Styling tetap dengan Poppins dan warna PRD.<br>- Tambahkan tombol logout di navbar.                                                               |

---

## 📁 Contoh Struktur Folder Akhir (Gabungan)

```
resources/
 └── views/
      ├── landing.blade.php         (Dev 2)
      ├── auth/                     (Dev 1)
      │    ├── login.blade.php
      │    └── register.blade.php
      ├── student/
      │    └── dashboard.blade.php  (Dev 3)
      ├── admin/
      │    └── dashboard.blade.php  (Dev 4)
      └── profile.blade.php         (Dev 5)
```

