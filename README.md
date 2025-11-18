# Aplikasi CRUD Mahasiswa - Laravel 12

Aplikasi web untuk mengelola data mahasiswa dengan fitur CRUD (Create, Read, Update, Delete) yang dibangun menggunakan **Laravel 12** dengan desain UI modern dan minimalis.

## 📋 Daftar Isi

- [Fitur Aplikasi](#fitur-aplikasi)
- [Teknologi yang Digunakan](#teknologi-yang-digunakan)
- [Struktur Database](#struktur-database)
- [Instalasi](#instalasi)
- [Cara Menggunakan](#cara-menggunakan)
- [Dokumentasi Fitur](#dokumentasi-fitur)
- [Screenshot Hasil Pengujian](#screenshot-hasil-pengujian)
- [Author](#author)

## ✨ Fitur Aplikasi

### 1. **CRUD Mahasiswa**
   - ✅ **Create** - Tambah data mahasiswa baru
   - ✅ **Read** - Lihat daftar dan detail mahasiswa
   - ✅ **Update** - Edit data mahasiswa yang sudah ada
   - ✅ **Delete** - Hapus data mahasiswa

### 2. **Dua Mode Tampilan**
   - 📇 **Card View** - Tampilan grid dengan kartu (Daftar Mahasiswa)
   - 📊 **Table View** - Tampilan tabel untuk laporan (Laporan Mahasiswa)

### 3. **Fitur Pencarian & Filter**
   - 🔍 **Real-Time Search** - Pencarian langsung saat mengetik (tanpa perlu submit)
   - 🎯 **Multi-Field Search** - Mencari berdasarkan Nama, NIM, atau Program Studi
   - 👥 **Filter Jenis Kelamin** - Filter otomatis berdasarkan gender
   - 📊 **Result Counter** - Menampilkan jumlah data yang ditemukan

### 4. **Validasi Data**
   - NIM harus unik (tidak boleh duplikat)
   - Semua field wajib diisi
   - Validasi format tanggal
   - Validasi jenis kelamin (Laki-laki/Perempuan)

### 5. **UI/UX Modern**
   - 🎨 Design minimalis dan profesional
   - 📱 Responsive design (desktop, tablet, mobile)
   - ⚡ Smooth transitions dan interactive elements
   - 🌈 Modern color palette dengan CSS variables
   - 🖨️ Print-friendly untuk laporan

## 🛠 Teknologi yang Digunakan

| Teknologi | Versi | Fungsi |
|-----------|-------|--------|
| Laravel | 12.x | Backend Framework |
| PHP | 8.2+ | Server-side Language |
| MySQL/SQLite | Latest | Database |
| Bootstrap | 5.3.0 | CSS Framework |
| Bootstrap Icons | 1.11.0 | Icon Library |
| Blade | Latest | Template Engine |
| JavaScript | ES6+ | Client-side Interactivity |

## 📊 Struktur Database

### Tabel: `mahasiswas`

```sql
CREATE TABLE mahasiswas (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    nim VARCHAR(20) UNIQUE NOT NULL,
    nama VARCHAR(100) NOT NULL,
    alamat TEXT NOT NULL,
    tanggal_lahir DATE NOT NULL,
    jenis_kel ENUM('Laki-laki', 'Perempuan') NOT NULL,
    prodi VARCHAR(100) NOT NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
)
```

### Deskripsi Field:

| Field | Tipe | Deskripsi |
|-------|------|-----------|
| `id` | BIGINT UNSIGNED | Primary Key (Auto Increment) |
| `nim` | VARCHAR(20) | Nomor Induk Mahasiswa (Unique) |
| `nama` | VARCHAR(100) | Nama lengkap mahasiswa |
| `alamat` | TEXT | Alamat tempat tinggal |
| `tanggal_lahir` | DATE | Tanggal lahir |
| `jenis_kel` | ENUM | Jenis Kelamin (L/P) |
| `prodi` | VARCHAR(100) | Program Studi |
| `created_at` | TIMESTAMP | Waktu pembuatan data |
| `updated_at` | TIMESTAMP | Waktu update data |

## 📦 Instalasi

### Prerequisites
- PHP 8.2 atau lebih tinggi
- Composer
- MySQL atau SQLite
- Node.js (opsional, untuk asset compilation)

### Langkah-Langkah Instalasi

1. **Clone Repository**
   ```bash
   cd /Applications/XAMPP/xamppfiles/htdocs/UTS-ProyekWeb
   ```

2. **Install Dependencies**
   ```bash
   cd mahasiswa-app
   composer install
   ```

3. **Setup Environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Konfigurasi Database**
   Edit file `.env`:
   ```env
   DB_CONNECTION=sqlite
   # Atau jika menggunakan MySQL:
   # DB_CONNECTION=mysql
   # DB_HOST=127.0.0.1
   # DB_PORT=3306
   # DB_DATABASE=mahasiswa_db
   # DB_USERNAME=root
   # DB_PASSWORD=
   ```

5. **Migrate Database**
   ```bash
   php artisan migrate
   ```

6. **Seed Data (Opsional)**
   ```bash
   php artisan migrate:fresh --seed
   ```

7. **Jalankan Application**
   ```bash
   php artisan serve
   ```

   Akses aplikasi di: `http://127.0.0.1:8000`

## 📖 Cara Menggunakan

### Menu Utama

Aplikasi memiliki navigasi utama dengan menu:
- **Daftar Mahasiswa** - Tampilan grid dengan fitur search & filter
- **Laporan Mahasiswa** - Tampilan tabel dengan opsi cetak
- **Tambah Mahasiswa** - Form untuk menambah data baru

### Fitur Pencarian

1. **Pencarian Real-Time**
   - Ketik di kolom search untuk mencari nama, NIM, atau prodi
   - Hasil akan berubah secara otomatis saat mengetik
   - Tidak perlu menekan tombol search

2. **Filter Jenis Kelamin**
   - Pilih "Semua Jenis" untuk menampilkan semua data
   - Pilih "Laki-laki" atau "Perempuan" untuk filter spesifik
   - Kombinasikan dengan search untuk hasil yang lebih presisi

3. **Reset Filter**
   - Klik tombol reset (icon panah) untuk menghapus semua filter
   - Semua data akan ditampilkan kembali

### Operasi CRUD

#### CREATE (Tambah Data)
1. Klik tombol "Tambah Mahasiswa Baru"
2. Isi semua field form:
   - NIM (harus unik)
   - Nama
   - Alamat
   - Tanggal Lahir
   - Jenis Kelamin
   - Program Studi
3. Klik "Simpan" untuk menambah data

#### READ (Lihat Data)
- **Card View**: Lihat semua data dalam format kartu grid
- **Table View**: Lihat semua data dalam format tabel
- Klik "Lihat" untuk melihat detail lengkap mahasiswa

#### UPDATE (Edit Data)
1. Klik tombol "Edit" pada data yang ingin diubah
2. Ubah field yang diperlukan
3. Klik "Simpan" untuk menyimpan perubahan

#### DELETE (Hapus Data)
1. Klik tombol "Hapus" pada data yang ingin dihapus
2. Konfirmasi penghapusan
3. Data akan dihapus dari database

### Mode Cetak
- Klik tombol "Cetak" pada halaman Laporan Mahasiswa
- Laporan akan diformat untuk dicetak
- Gunakan Print dialog untuk mencetak atau simpan sebagai PDF

## 🎯 Dokumentasi Fitur

### 1. Halaman Daftar Mahasiswa (Card View)

Menampilkan semua data mahasiswa dalam format kartu grid dengan fitur:
- Search real-time
- Filter jenis kelamin
- Tombol aksi (Lihat, Edit, Hapus)
- Responsive design (3 kolom desktop, 2 tablet, 1 mobile)

### 2. Halaman Laporan Mahasiswa (Table View)

Menampilkan semua data mahasiswa dalam format tabel profesional dengan fitur:
- Search real-time
- Filter jenis kelamin
- Tombol cetak laporan
- Responsive table
- Print-friendly styling

### 3. Halaman Tambah Mahasiswa

Form untuk menambah data mahasiswa baru dengan:
- Validasi input real-time
- Required field indicators
- Error message display
- Cancel button untuk kembali

### 4. Halaman Edit Mahasiswa

Form untuk mengubah data mahasiswa yang sudah ada dengan:
- Pre-filled data
- Validasi input
- Error message display
- Unique NIM validation (kecuali NIM saat ini)

### 5. Halaman Detail Mahasiswa

Menampilkan detail lengkap satu mahasiswa dengan:
- Semua informasi data
- Tombol kembali
- Tombol edit
- Tombol delete

## 📸 Screenshot Hasil Pengujian

### 1. Halaman Daftar Mahasiswa (Card View)
![Daftar Mahasiswa - Card View](./assets/Screenshot%202025-11-18%20at%2021.29.53.png)

Menampilkan grid kartu dengan fitur search dan filter untuk mencari dan menyaring data mahasiswa.

### 2. Halaman Laporan Mahasiswa (Table View)
![Laporan Mahasiswa - Table View](./assets/Screenshot%202025-11-18%20at%2021.30.00.png)

Menampilkan tabel profesional untuk laporan data mahasiswa dengan opsi cetak.

### 3. Pencarian Real-Time di Card View
![Search Card View](./assets/Screenshot%202025-11-18%20at%2021.30.10.png)

Demonstrasi fitur search real-time yang menampilkan hasil instan saat pengguna mengetik.

### 4. Filter Gender di Table View
![Filter Table View](./assets/Screenshot%202025-11-18%20at%2021.30.21.png)

Demonstrasi fitur filter gender yang menampilkan hanya data sesuai filter terpilih.

### 5. Halaman Tambah Mahasiswa Baru
![Tambah Mahasiswa](./assets/Screenshot%202025-11-18%20at%2021.30.29.png)

Form input untuk menambahkan data mahasiswa baru dengan validasi lengkap.

### 6. Halaman Edit Mahasiswa
![Edit Mahasiswa](./assets/Screenshot%202025-11-18%20at%2021.30.37.png)

Form edit dengan data pre-filled untuk mengubah informasi mahasiswa yang sudah ada.

### 7. Halaman Detail Mahasiswa
![Detail Mahasiswa](./assets/Screenshot%202025-11-18%20at%2021.30.51.png)

Menampilkan detail lengkap informasi mahasiswa dengan tombol aksi (Edit/Delete).

## 🎨 Desain & Styling

### Palet Warna

| Nama | Hex | Fungsi |
|------|-----|--------|
| Primary | #0f172a | Teks, borders utama |
| Accent | #6366f1 | CTA buttons, highlights |
| Success | #10b981 | Success messages |
| Danger | #ef4444 | Delete buttons, warnings |
| Warning | #f59e0b | Edit buttons |
| Info | #06b6d4 | Info elements |
| Background | #f1f5f9 | Page background |


## 📁 Struktur File Project

```
mahasiswa-app/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       └── MahasiswaController.php    # Controller CRUD
│   └── Models/
│       └── Mahasiswa.php                  # Eloquent Model
├── database/
│   ├── migrations/
│   │   └── create_mahasiswas_table.php    # Migration
│   └── seeders/
│       └── MahasiswaSeeder.php            # Data seeder
├── resources/
│   ├── views/
│   │   ├── app.blade.php                  # Layout utama
│   │   └── mahasiswa/
│   │       ├── index-card.blade.php       # Card view
│   │       ├── index-table.blade.php      # Table view
│   │       ├── create.blade.php           # Form tambah
│   │       ├── edit.blade.php             # Form edit
│   │       └── show.blade.php             # Detail view
│   └── css/
│       └── app.css
├── routes/
│   └── web.php                            # Route definitions
├── .env.example                           # Environment template
├── composer.json                          # PHP dependencies
└── artisan                                # Laravel CLI
```

## 🐛 Troubleshooting

### Database Connection Error
```bash
# Re-generate key
php artisan key:generate

# Reset migrations
php artisan migrate:fresh --seed
```

### Assets Not Loading
```bash
# Clear caches
php artisan cache:clear
php artisan view:clear
php artisan config:clear
```

### Port 8000 Already in Use
```bash
# Run on different port
php artisan serve --port=8001
```

## 📝 Catatan Pengembangan

- Data default tersimpan dalam `MahasiswaSeeder.php`
- Search/Filter berjalan di client-side untuk performa optimal
- Validasi data dilakukan di backend untuk keamanan
- Support untuk SQLite dan MySQL

## 👨‍💻 Author

**Nama**: Lana Techn  
**Repository**: [Proyek-Web-UTS](https://github.com/lana-techn/Proyek-Web-UTS)  
**Tanggal**: November 18, 2025

## 📄 Lisensi

Project ini bersifat akademik untuk keperluan UTS (Ujian Tengah Semester).

---

**Terakhir diupdate**: November 18, 2025
