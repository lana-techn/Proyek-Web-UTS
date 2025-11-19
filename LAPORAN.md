# 📋 LAPORAN PROYEK UTS
## Aplikasi CRUD Mahasiswa dengan Laravel 12

**Mata Kuliah**: Pemrograman Web  
**Topik**: CRUD Database dengan Laravel 12  
**Tanggal**: 18-19 November 2025  
**Developer**: Lana Techn  
**Institusi**: UTS (Ujian Tengah Semester)

---

## 📑 Daftar Isi

1. [Ringkasan Proyek](#ringkasan-proyek)
2. [Tujuan Pembuatan](#tujuan-pembuatan)
3. [Deskripsi Aplikasi](#deskripsi-aplikasi)
4. [Fitur Utama](#fitur-utama)
5. [Teknologi Digunakan](#teknologi-digunakan)
6. [Struktur Database](#struktur-database)
7. [Struktur File Aplikasi](#struktur-file-aplikasi)
8. [Penjelasan Code](#penjelasan-code)
9. [Hasil Pengujian (Screenshot)](#hasil-pengujian-screenshot)
10. [Cara Penggunaan](#cara-penggunaan)

---

## 🎯 Ringkasan Proyek

Proyek ini merupakan implementasi CRUD (Create, Read, Update, Delete) untuk mengelola data mahasiswa menggunakan framework Laravel 12. Aplikasi dirancang dengan antarmuka yang modern, responsif, dan user-friendly dengan fitur pencarian real-time serta filter data.

### Kriteria Proyek:
- ✅ Membuat CRUD untuk merekam data mahasiswa
- ✅ Database memiliki 6 field: NIM, NAMA, ALAMAT, TANGGAL_LAHIR, JENIS_KELAMIN, PRODI
- ✅ Minimum 4 data mahasiswa dalam database
- ✅ Menggunakan Laravel 12
- ✅ UI/UX modern dan interaktif
- ✅ Fitur pencarian dan filter dinamis
- ✅ Dokumentasi lengkap

---

## 🎓 Tujuan Pembuatan

1. **Belajar CRUD Operations** - Implementasi Create, Read, Update, Delete dalam praktik nyata
2. **Memahami MVC Pattern** - Menerapkan Model-View-Controller architecture
3. **Database Design** - Merancang dan menggunakan database relasional
4. **Web Development** - Mengembangkan aplikasi web full-stack dengan Laravel
5. **User Interface** - Menciptakan UI yang menarik dan responsif
6. **Data Validation** - Implementasi validasi data di backend dan frontend

---

## 📱 Deskripsi Aplikasi

### Gambaran Umum
Aplikasi Mahasiswa merupakan sistem informasi untuk mengelola data mahasiswa. Aplikasi ini menyediakan dua tampilan berbeda:

1. **Daftar Mahasiswa (Card View)** - Menampilkan data dalam format kartu grid yang elegan
2. **Laporan Mahasiswa (Table View)** - Menampilkan data dalam format tabel untuk keperluan laporan

### Keunggulan Aplikasi
- 🚀 **Real-Time Search** - Pencarian langsung tanpa perlu reload halaman
- 🎨 **Modern UI** - Desain minimalis dengan color palette profesional
- 📱 **Responsive Design** - Dapat diakses di desktop, tablet, dan mobile
- ⚡ **Performance** - Optimasi untuk kecepatan loading dan interaksi
- 🔒 **Data Validation** - Validasi ketat di level backend
- 🖨️ **Print-Friendly** - Laporan dapat dicetak langsung

---

## ✨ Fitur Utama

### 1. Create (Tambah Data)
```
Fitur: Menambah data mahasiswa baru
- Form input dengan validasi lengkap
- Validasi NIM unik (tidak boleh duplikat)
- Semua field wajib diisi
- Success message setelah ditambah
```

### 2. Read (Lihat Data)
```
Fitur: Menampilkan data mahasiswa
- Card View: Grid layout yang elegan
- Table View: Format tabel untuk laporan
- Detail View: Informasi lengkap satu mahasiswa
- Real-time search & filter
```

### 3. Update (Edit Data)
```
Fitur: Mengubah data mahasiswa yang ada
- Form pre-filled dengan data existing
- Validasi NIM unique (kecuali NIM saat ini)
- Konfirmasi perubahan
- Success message setelah diupdate
```

### 4. Delete (Hapus Data)
```
Fitur: Menghapus data mahasiswa
- Konfirmasi sebelum menghapus
- Delete permanent dari database
- Success message setelah dihapus
```

### 5. Search & Filter
```
Fitur: Pencarian dan penyaringan data
- Real-time search (tanpa submit form)
- Multi-field search: Nama, NIM, Prodi
- Filter jenis kelamin
- Result counter
- Reset filter
```

---

## 🛠 Teknologi Digunakan

| Komponen | Teknologi | Versi |
|----------|-----------|-------|
| **Backend** | Laravel | 12.x |
| **Bahasa Server** | PHP | 8.2+ |
| **Database** | SQLite/MySQL | Latest |
| **Frontend** | HTML5 | Latest |
| **CSS Framework** | Bootstrap | 5.3.0 |
| **Icons** | Bootstrap Icons | 1.11.0 |
| **Template Engine** | Blade | Latest |
| **JavaScript** | ES6+ | Latest |
| **ORM** | Eloquent | Built-in |

---

## 💾 Struktur Database

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
);
```

### Penjelasan Field:

| No | Field | Tipe | Constraint | Deskripsi |
|----|-------|------|-----------|-----------|
| 1 | `id` | BIGINT UNSIGNED | PRIMARY KEY, AUTO_INCREMENT | Identitas unik mahasiswa |
| 2 | `nim` | VARCHAR(20) | UNIQUE, NOT NULL | Nomor Induk Mahasiswa |
| 3 | `nama` | VARCHAR(100) | NOT NULL | Nama lengkap mahasiswa |
| 4 | `alamat` | TEXT | NOT NULL | Alamat tempat tinggal |
| 5 | `tanggal_lahir` | DATE | NOT NULL | Tanggal lahir |
| 6 | `jenis_kel` | ENUM | NOT NULL | Laki-laki atau Perempuan |
| 7 | `prodi` | VARCHAR(100) | NOT NULL | Program Studi |
| 8 | `created_at` | TIMESTAMP | NULL | Waktu record dibuat |
| 9 | `updated_at` | TIMESTAMP | NULL | Waktu record diupdate |

### Relationship Diagram:
```
┌─────────────────────────┐
│      MAHASISWAS         │
├─────────────────────────┤
│ id (PK)                 │
│ nim (UNIQUE)            │
│ nama                    │
│ alamat                  │
│ tanggal_lahir           │
│ jenis_kel               │
│ prodi                   │
│ created_at              │
│ updated_at              │
└─────────────────────────┘
```

---

## 📁 Struktur File Aplikasi

```
mahasiswa-app/
│
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       └── MahasiswaController.php     ⭐ Controller utama
│   │
│   └── Models/
│       └── Mahasiswa.php                   ⭐ Model Eloquent
│
├── database/
│   ├── migrations/
│   │   └── 2025_11_18_135146_create_mahasiswas_table.php
│   │
│   └── seeders/
│       ├── DatabaseSeeder.php
│       └── MahasiswaSeeder.php             ⭐ Data seeder
│
├── resources/
│   └── views/
│       ├── app.blade.php                   📄 Layout utama
│       └── mahasiswa/
│           ├── index-card.blade.php        📄 Card view
│           ├── index-table.blade.php       📄 Table view
│           ├── create.blade.php            📄 Form tambah
│           ├── edit.blade.php              📄 Form edit
│           └── show.blade.php              📄 Detail view
│
├── routes/
│   └── web.php                             ⭐ Route definitions
│
├── .env                                     🔐 Environment config
├── composer.json                            📦 Dependencies
└── artisan                                  ⚙️ CLI tool
```

---

## 💻 Penjelasan Code

### 1️⃣ MODEL: `Mahasiswa.php`

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    // Field yang dapat diisi (mass assignment)
    protected $fillable = [
        'nim',
        'nama',
        'alamat',
        'tanggal_lahir',
        'jenis_kel',
        'prodi',
    ];

    // Type casting untuk atribut
    protected $casts = [
        'tanggal_lahir' => 'date',  // Cast ke Carbon date object
    ];
}
```

**Penjelasan:**
- **$fillable**: Menentukan field mana saja yang dapat diisi saat mass assignment
- **$casts**: Mengkonversi tipe data otomatis (tanggal_lahir jadi Carbon object)
- Ini memudahkan manipulasi data di controller dan view

---

### 2️⃣ CONTROLLER: `MahasiswaController.php`

```php
<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * INDEX - Menampilkan daftar mahasiswa (default card view)
     */
    public function index()
    {
        $mahasiswas = Mahasiswa::all();
        return view('mahasiswa.index-card', compact('mahasiswas'));
    }

    /**
     * INDEX CARD - Tampilan card dengan search & filter
     */
    public function indexCard(Request $request)
    {
        $search = $request->get('search');
        $filter = $request->get('filter');
        
        $query = Mahasiswa::query();
        
        // Search filter: cari di nama, nim, atau prodi
        if ($search) {
            $query->where('nama', 'like', "%{$search}%")
                  ->orWhere('nim', 'like', "%{$search}%")
                  ->orWhere('prodi', 'like', "%{$search}%");
        }
        
        // Gender filter
        if ($filter && $filter !== 'all') {
            $query->where('jenis_kel', $filter);
        }
        
        $mahasiswas = $query->get();
        return view('mahasiswa.index-card', compact('mahasiswas', 'search', 'filter'));
    }

    /**
     * INDEX TABLE - Tampilan tabel dengan search & filter
     */
    public function indexTable(Request $request)
    {
        $search = $request->get('search');
        $filter = $request->get('filter');
        
        $query = Mahasiswa::query();
        
        if ($search) {
            $query->where('nama', 'like', "%{$search}%")
                  ->orWhere('nim', 'like', "%{$search}%")
                  ->orWhere('prodi', 'like', "%{$search}%");
        }
        
        if ($filter && $filter !== 'all') {
            $query->where('jenis_kel', $filter);
        }
        
        $mahasiswas = $query->get();
        return view('mahasiswa.index-table', compact('mahasiswas', 'search', 'filter'));
    }

    /**
     * CREATE - Tampilkan form tambah data
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * STORE - Simpan data mahasiswa baru ke database
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nim' => 'required|unique:mahasiswas|string|max:20',
            'nama' => 'required|string|max:100',
            'alamat' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jenis_kel' => 'required|in:Laki-laki,Perempuan',
            'prodi' => 'required|string|max:100',
        ]);

        // Buat record baru
        Mahasiswa::create($validated);

        return redirect()->route('mahasiswa.index')
                       ->with('success', 'Data mahasiswa berhasil ditambahkan!');
    }

    /**
     * SHOW - Tampilkan detail satu mahasiswa
     */
    public function show(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.show', compact('mahasiswa'));
    }

    /**
     * EDIT - Tampilkan form edit mahasiswa
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    /**
     * UPDATE - Simpan perubahan data mahasiswa
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        // Validasi input (NIM unique kecuali NIM saat ini)
        $validated = $request->validate([
            'nim' => 'required|unique:mahasiswas,nim,' . $mahasiswa->id . '|string|max:20',
            'nama' => 'required|string|max:100',
            'alamat' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jenis_kel' => 'required|in:Laki-laki,Perempuan',
            'prodi' => 'required|string|max:100',
        ]);

        // Update record
        $mahasiswa->update($validated);

        return redirect()->route('mahasiswa.index')
                       ->with('success', 'Data mahasiswa berhasil diperbarui!');
    }

    /**
     * DESTROY - Hapus data mahasiswa
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')
                       ->with('success', 'Data mahasiswa berhasil dihapus!');
    }
}
```

**Penjelasan Method:**

| Method | HTTP | Tujuan | View |
|--------|------|--------|------|
| `index()` | GET | Tampilkan daftar | index-card |
| `indexCard()` | GET | Tampilkan card view | index-card |
| `indexTable()` | GET | Tampilkan table view | index-table |
| `create()` | GET | Tampilkan form baru | create |
| `store()` | POST | Simpan data baru | redirect ke index |
| `show()` | GET | Tampilkan detail | show |
| `edit()` | GET | Tampilkan form edit | edit |
| `update()` | PUT/PATCH | Simpan perubahan | redirect ke index |
| `destroy()` | DELETE | Hapus data | redirect ke index |

**Fitur Validasi:**
```php
'nim' => 'required|unique:mahasiswas|string|max:20'
// required: NIM harus diisi
// unique: NIM tidak boleh duplikat
// string: harus text
// max:20: maksimal 20 karakter

'tanggal_lahir' => 'required|date'
// required: tanggal harus diisi
// date: harus format tanggal valid

'jenis_kel' => 'required|in:Laki-laki,Perempuan'
// required: harus diisi
// in: hanya boleh 2 pilihan
```

---

### 3️⃣ SEEDER: `MahasiswaSeeder.php`

```php
<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data 1: Budi Santoso
        Mahasiswa::create([
            'nim' => '2024001001',
            'nama' => 'Budi Santoso',
            'alamat' => 'Jalan Merdeka No. 123, Jakarta Pusat',
            'tanggal_lahir' => '2004-05-15',
            'jenis_kel' => 'Laki-laki',
            'prodi' => 'Teknik Informatika',
        ]);

        // Data 2: Siti Nurhaliza
        Mahasiswa::create([
            'nim' => '2024001002',
            'nama' => 'Siti Nurhaliza',
            'alamat' => 'Jalan Ahmad Yani No. 456, Bandung',
            'tanggal_lahir' => '2003-08-22',
            'jenis_kel' => 'Perempuan',
            'prodi' => 'Sistem Informasi',
        ]);

        // Data 3: Ahmad Rizki
        Mahasiswa::create([
            'nim' => '2024001003',
            'nama' => 'Ahmad Rizki',
            'alamat' => 'Jalan Gatot Subroto No. 789, Surabaya',
            'tanggal_lahir' => '2005-02-10',
            'jenis_kel' => 'Laki-laki',
            'prodi' => 'Rekayasa Perangkat Lunak',
        ]);

        // Data 4: Rifa Asthiya
        Mahasiswa::create([
            'nim' => '2024001004',
            'nama' => 'Rifa Asthiya',
            'alamat' => 'Jalan Sudirman No. 234, Medan',
            'tanggal_lahir' => '2004-11-03',
            'jenis_kel' => 'Perempuan',
            'prodi' => 'Teknik Informatika',
        ]);
    }
}
```

**Penjelasan:**
- Seeder ini membuat 4 data mahasiswa otomatis saat database di-seed
- Dijalankan dengan: `php artisan migrate:fresh --seed`
- Menggunakan Mahasiswa model untuk membuat record
- Data mencakup: NIM, Nama, Alamat, Tanggal Lahir, Jenis Kelamin, Prodi

**Data Mahasiswa:**

| # | NIM | Nama | Alamat | Tanggal Lahir | Jenis Kelamin | Prodi |
|---|-----|------|--------|---------------|---------------|-------|
| 1 | 2024001001 | Budi Santoso | Jln Merdeka No.123, Jakarta | 15-05-2004 | Laki-laki | Teknik Informatika |
| 2 | 2024001002 | Siti Nurhaliza | Jln Ahmad Yani No.456, Bandung | 22-08-2003 | Perempuan | Sistem Informasi |
| 3 | 2024001003 | Ahmad Rizki | Jln Gatot Subroto No.789, Surabaya | 10-02-2005 | Laki-laki | Rekayasa Perangkat Lunak |
| 4 | 2024001004 | Rifa Asthiya | Jln Sudirman No.234, Medan | 03-11-2004 | Perempuan | Teknik Informatika |

---

### 4️⃣ ROUTES: `web.php`

```php
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;

// Home redirect
Route::get('/', function () {
    return redirect()->route('mahasiswa.index');
});

// Resource routes (automatic CRUD routes)
// Ini membuat 7 route otomatis untuk CRUD:
// GET    /mahasiswa              -> index
// GET    /mahasiswa/create       -> create
// POST   /mahasiswa              -> store
// GET    /mahasiswa/{id}         -> show
// GET    /mahasiswa/{id}/edit    -> edit
// PUT    /mahasiswa/{id}         -> update
// DELETE /mahasiswa/{id}         -> destroy
Route::resource('mahasiswa', MahasiswaController::class);

// Additional custom routes untuk view berbeda
Route::get('/mahasiswa-card', [MahasiswaController::class, 'indexCard'])
    ->name('mahasiswa.index.card');

Route::get('/mahasiswa-table', [MahasiswaController::class, 'indexTable'])
    ->name('mahasiswa.index.table');
```

**Penjelasan Routes:**

| Route | HTTP Method | Controller Method | Tujuan |
|-------|-------------|------------------|--------|
| `/` | GET | redirect ke mahasiswa.index | Homepage |
| `/mahasiswa` | GET | `index()` | Lihat daftar |
| `/mahasiswa/create` | GET | `create()` | Tampilkan form tambah |
| `/mahasiswa` | POST | `store()` | Simpan data baru |
| `/mahasiswa/{id}` | GET | `show()` | Lihat detail |
| `/mahasiswa/{id}/edit` | GET | `edit()` | Tampilkan form edit |
| `/mahasiswa/{id}` | PUT/PATCH | `update()` | Simpan update |
| `/mahasiswa/{id}` | DELETE | `destroy()` | Hapus data |
| `/mahasiswa-card` | GET | `indexCard()` | Card view |
| `/mahasiswa-table` | GET | `indexTable()` | Table view |

---

## 📸 Hasil Pengujian (Screenshot)

### Screenshot 1: Halaman Daftar Mahasiswa (Card View)
![Daftar Mahasiswa - Card View](./assets/Screenshot%202025-11-18%20at%2021.29.53.png)

**Penjelasan:**
- Menampilkan semua data mahasiswa dalam format kartu grid
- Setiap kartu menampilkan: Nama, NIM, Program Studi, Jenis Kelamin, Tanggal Lahir, Alamat
- Tombol aksi: Lihat, Edit, Hapus
- Fitur search & filter di atas
- Responsive: 3 kolom di desktop, 2 di tablet, 1 di mobile
- Total menampilkan 4 mahasiswa dari seeder

---

### Screenshot 2: Halaman Laporan Mahasiswa (Table View)
![Laporan Mahasiswa - Table View](./assets/Screenshot%202025-11-18%20at%2021.30.00.png)

**Penjelasan:**
- Menampilkan data mahasiswa dalam format tabel profesional
- Kolom: #, NIM, Nama, Program Studi, Jenis Kelamin, Tanggal Lahir, Aksi
- Tombol cetak untuk export ke PDF/printer
- Tombol kembali untuk ke card view
- Fitur search & filter yang sama seperti card view
- Format table-striped dengan hover effect

---

### Screenshot 3: Pencarian Real-Time di Card View
![Search Card View](./assets/Screenshot%202025-11-18%20at%2021.30.10.png)

**Penjelasan:**
- Demonstrasi fitur pencarian real-time
- User mengetik "informatika" di search box
- Hasil filter menampilkan 2 mahasiswa dengan prodi Teknik Informatika
- Counter menampilkan "Menampilkan 2 dari 4 data"
- Pencarian berjalan instant tanpa perlu submit form
- JavaScript mendeteksi input event dan filter cards secara dinamis

---

### Screenshot 4: Filter Gender di Table View
![Filter Table View](./assets/Screenshot%202025-11-18%20at%2021.30.21.png)

**Penjelasan:**
- Demonstrasi fitur filter berdasarkan jenis kelamin
- User memilih "Laki-laki" di dropdown filter
- Tabel menampilkan hanya data mahasiswa laki-laki
- Baris tabel yang tidak sesuai filter disembunyikan
- Counter menampilkan jumlah data yang sesuai filter
- Dapat dikombinasikan dengan search untuk filter lebih spesifik

---

### Screenshot 5: Form Tambah Mahasiswa Baru
![Tambah Mahasiswa](./assets/Screenshot%202025-11-18%20at%2021.30.29.png)

**Penjelasan:**
- Form untuk menambahkan data mahasiswa baru
- Field yang diisi: NIM, Nama, Alamat, Tanggal Lahir, Jenis Kelamin, Prodi
- Semua field marked dengan "*" (required)
- Validasi dilakukan saat submit:
  - NIM harus unik
  - Semua field harus diisi
  - Format tanggal harus valid
- Tombol "Simpan" untuk submit
- Tombol "Batal" untuk cancel dan kembali
- Success message muncul setelah berhasil ditambah

---

### Screenshot 6: Form Edit Mahasiswa
![Edit Mahasiswa](./assets/Screenshot%202025-11-18%20at%2021.30.37.png)

**Penjelasan:**
- Form untuk mengubah data mahasiswa yang sudah ada
- Semua field sudah di-fill dengan data existing
- User dapat mengubah field apapun (kecuali yang read-only)
- Validasi dilakukan sama seperti form tambah
- NIM validation: unik KECUALI NIM record saat ini
- Tombol "Perbarui" untuk submit changes
- Tombol "Batal" untuk cancel
- Success message muncul setelah berhasil diupdate

---

### Screenshot 7: Halaman Detail Mahasiswa
![Detail Mahasiswa](./assets/Screenshot%202025-11-18%20at%2021.30.51.png)

**Penjelasan:**
- Menampilkan detail lengkap satu mahasiswa
- Menampilkan: NIM, Nama, Alamat, Tanggal Lahir, Jenis Kelamin, Prodi
- Data ditampilkan dalam format readable (bukan form)
- Tombol aksi:
  - "Edit" - Untuk mengubah data
  - "Hapus" - Untuk menghapus (dengan konfirmasi)
  - "Kembali" - Untuk kembali ke daftar
- Jenis kelamin ditampilkan dengan badge dan icon
- Layout responsif dan profesional

---

## 🎯 Cara Penggunaan

### 1. Installation & Setup

```bash
# 1. Navigate ke folder project
cd /Applications/XAMPP/xamppfiles/htdocs/UTS-ProyekWeb/mahasiswa-app

# 2. Install dependencies
composer install

# 3. Generate app key
php artisan key:generate

# 4. Run migrations & seed
php artisan migrate:fresh --seed

# 5. Start server
php artisan serve

# 6. Buka browser
# http://127.0.0.1:8000
```

### 2. Menambah Data Mahasiswa

1. Klik tombol "Tambah Mahasiswa Baru"
2. Isi form dengan data:
   - NIM: Nomor Induk (harus unik)
   - Nama: Nama lengkap
   - Alamat: Alamat tempat tinggal
   - Tanggal Lahir: Pilih dari date picker
   - Jenis Kelamin: Pilih Laki-laki atau Perempuan
   - Prodi: Pilih program studi
3. Klik "Simpan"
4. Success message akan muncul

### 3. Mencari Data

**Metode 1: Search by Name/NIM/Prodi**
1. Ketik di search box
2. Hasil filter secara real-time
3. Kombinasikan dengan dropdown filter

**Metode 2: Filter by Gender**
1. Buka dropdown "Jenis Kelamin"
2. Pilih: Semua, Laki-laki, atau Perempuan
3. Tabel/Card akan ter-filter secara otomatis

**Metode 3: Kombinasi Search + Filter**
1. Ketik di search box
2. Pilih jenis kelamin di dropdown
3. Hasil akan memenuhi kedua kriteria

### 4. Melihat Detail Mahasiswa
1. Klik tombol "Lihat" pada card atau table
2. Halaman detail akan menampilkan semua informasi
3. Klik "Edit" untuk mengubah
4. Klik "Hapus" untuk menghapus
5. Klik "Kembali" untuk kembali ke daftar

### 5. Mengubah Data Mahasiswa
1. Klik tombol "Edit" pada card/table
2. Ubah field yang perlu diubah
3. Klik "Perbarui"
4. Success message akan muncul

### 6. Menghapus Data Mahasiswa
1. Klik tombol "Hapus" pada card/table
2. Konfirmasi penghapusan akan muncul
3. Klik OK untuk confirm
4. Data akan dihapus
5. Success message akan muncul

### 7. Cetak Laporan
1. Buka halaman "Laporan Mahasiswa" (Table View)
2. Klik tombol "Cetak"
3. Dialog print akan muncul
4. Pilih printer atau "Save as PDF"
5. Laporan siap dicetak

---


## 📝 Kesimpulan

Proyek Aplikasi CRUD Mahasiswa ini telah berhasil mengimplementasikan semua persyaratan yang diminta:

✅ Membuat CRUD lengkap untuk data mahasiswa
✅ Database dengan 6 field required
✅ Minimum 4 data mahasiswa
✅ Menggunakan Laravel 12
✅ UI/UX modern dan interaktif
✅ Fitur pencarian dan filter real-time
✅ Dokumentasi lengkap

Aplikasi ini dapat berfungsi sebagai:
- Sistem informasi mahasiswa yang simple
- Learning project untuk CRUD dengan Laravel
- Foundation untuk sistem akademik yang lebih besar

---

## 📚 Referensi

- Laravel 12 Documentation: https://laravel.com/docs/12.x
- Bootstrap 5 Documentation: https://getbootstrap.com/docs/5.3
- PHP Documentation: https://www.php.net/manual/en/
- MySQL Documentation: https://dev.mysql.com/doc/

---


*Document version: 1.0*  
*Last updated: November 19, 2025*
