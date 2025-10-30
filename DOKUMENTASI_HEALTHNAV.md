# DOKUMENTASI HEALTHNAV
## Sistem Informasi Medical Tourism dan MCU Registration

---

## DAFTAR ISI

1. [PENDAHULUAN](#1-pendahuluan)
2. [IMPLEMENTASI PERANGKAT LUNAK](#2-implementasi-perangkat-lunak)
3. [SCREENSHOT MOCKUP INTERFACE PERANGKAT LUNAK](#3-screenshot-mockup-interface-perangkat-lunak)
4. [DOKUMENTASI CARA PENGGUNAAN PERANGKAT LUNAK](#4-dokumentasi-cara-penggunaan-perangkat-lunak)

---

## 1. PENDAHULUAN

### 1.1 Gambaran Umum
**HealthNav** adalah sistem informasi berbasis web untuk Medical Tourism yang dirancang dengan framework Laravel 10. Sistem ini memudahkan pengguna untuk melakukan registrasi Medical Check-Up (MCU) di berbagai rumah sakit, meninjau informasi rumah sakit, serta mengelola pendaftaran dan pembayaran secara online.

### 1.2 Tujuan Sistem
- Memudahkan masyarakat untuk mendapatkan informasi tentang layanan kesehatan
- Menyediakan platform online untuk registrasi MCU
- Memberikan layanan Medical Tourism dengan antarmuka yang user-friendly
- Meningkatkan efisiensi pendaftaran dan pengelolaan data kesehatan

### 1.3 Teknologi yang Digunakan
- **Backend**: PHP 8.1+, Laravel 10
- **Frontend**: HTML5, CSS3, JavaScript, Bootstrap 5
- **Database**: MySQL
- **PDF Generator**: DomPDF (barryvdh/laravel-dompdf)
- **API**: Laravel Sanctum
- **Server**: Apache (XAMPP)

---

## 2. IMPLEMENTASI PERANGKAT LUNAK

### 2.1 Arsitektur Sistem

#### 2.1.1 Struktur Folder
```
HealthNav/
├── app/                          # Aplikasi Laravel
│   ├── Http/
│   │   ├── Controllers/         # Controller aplikasi
│   │   │   ├── Admin/           # Controller untuk Admin
│   │   │   ├── Auth/            # Controller Autentikasi
│   │   │   ├── AdminController.php
│   │   │   ├── AuthController.php
│   │   │   ├── HospitalController.php
│   │   │   ├── UserController.php
│   │   │   ├── RegistrationController.php
│   │   │   ├── PaymentController.php
│   │   │   └── ProfileController.php
│   │   └── Middleware/          # Middleware aplikasi
│   ├── Models/                  # Model database
│   │   ├── User.php
│   │   ├── Hospital.php
│   │   ├── McuRegistration.php
│   │   └── Depart.php
│   ├── Mail/                    # Email notifications
│   └── Providers/               # Service Providers
├── database/
│   ├── migrations/              # Database migrations
│   └── seeders/                # Database seeders
├── resources/
│   ├── views/                   # View Blade template
│   │   ├── admin/              # Views Admin
│   │   ├── user/               # Views User
│   │   ├── auth/               # Views Autentikasi
│   │   ├── hospitals/          # Views Hospital
│   │   └── layouts/            # Layout templates
│   ├── css/                     # Custom CSS
│   └── js/                      # Custom JavaScript
├── routes/
│   └── web.php                  # Web routes
├── public/                      # Public assets
└── storage/                     # Storage files
```

#### 2.1.2 Database Schema

**Tabel Users**
- `id` - Primary key
- `name` - Nama pengguna
- `email` - Email (unique)
- `password` - Password (hashed)
- `phone` - Nomor telepon
- `passport` - Nomor passport
- `address` - Alamat
- `role` - Role (admin/user)
- `created_at`, `updated_at` - Timestamps

**Tabel Hospitals**
- `id` - Primary key
- `name` - Nama rumah sakit
- `address` - Alamat
- `location` - Lokasi
- `phone` - Nomor telepon
- `email` - Email
- `description` - Deskripsi
- `image_url` - URL gambar
- `rating` - Rating
- `reviews_count` - Jumlah review
- `specialties` - JSON array spesialisasi
- `is_active` - Status aktif
- `created_at`, `updated_at` - Timestamps

**Tabel Mcu_Registrations**
- `id` - Primary key
- `user_id` - Foreign key ke users
- `hospital_id` - Foreign key ke hospitals
- `registration_number` - Nomor registrasi (unique)
- `mcu_package` - Paket MCU
- `appointment_date` - Tanggal appointment
- `appointment_time` - Waktu appointment
- `medical_notes` - Catatan medis
- `status` - Status (pending/confirmed/completed/cancelled)
- `total_cost` - Total biaya
- `payment_status` - Status pembayaran
- `created_at`, `updated_at`, `deleted_at` - Timestamps

**Tabel Payments**
- `id` - Primary key
- `mcu_registration_id` - Foreign key ke mcu_registrations
- `amount` - Jumlah pembayaran
- `payment_method` - Metode pembayaran
- `status` - Status pembayaran
- `payment_date` - Tanggal pembayaran
- `created_at`, `updated_at` - Timestamps

### 2.2 Fitur Utama

#### 2.2.1 Fitur untuk Pengguna Umum
1. **Landing Page**
   - Informasi tentang Medical Tourism
   - Paket MCU tersedia (Basic, Standard, Premium)
   - Chatbot virtual assistant
   - Navigasi ke halaman login

2. **Autentikasi**
   - Registrasi pengguna baru
   - Login pengguna
   - Lupa password/reset password
   - Logout

3. **Dashboard User**
   - Lihat profil pengguna
   - Edit profil
   - Riwayat registrasi MCU
   - Status pendaftaran

#### 2.2.2 Fitur untuk User (Pengguna yang Login)

1. **Pilih Rumah Sakit**
   - Daftar rumah sakit tersedia
   - Filter berdasarkan lokasi
   - Detail rumah sakit (rating, spesialisasi, fasilitas)
   - Pilih rumah sakit untuk registrasi

2. **Registrasi MCU**
   - Form registrasi MCU
   - Pilih paket (Basic/Standard/Premium)
   - Pilih tanggal dan waktu
   - Input catatan medis
   - Generate nomor registrasi

3. **Konfirmasi Registrasi**
   - Ringkasan pendaftaran
   - Verifikasi data
   - Generate PDF kuitansi

4. **Pembayaran**
   - Informasi pembayaran
   - Konfirmasi pembayaran
   - Download bukti pembayaran PDF

#### 2.2.3 Fitur untuk Admin

1. **Dashboard Admin**
   - Statistik registrasi
   - Grafik pendaftaran
   - Notifikasi update

2. **Manajemen Registrasi MCU**
   - Lihat semua registrasi
   - Filter berdasarkan status
   - Update status registrasi
   - Detail registrasi

3. **Manajemen Rumah Sakit**
   - CRUD rumah sakit
   - Upload gambar
   - Aktif/nonaktif rumah sakit

4. **Manajemen User**
   - List pengguna
   - Edit pengguna
   - Hapus pengguna

### 2.3 Alur Proses Bisnis

```
1. User membuka website HealthNav
   ↓
2. User melihat paket MCU di landing page
   ↓
3. User melakukan login/register
   ↓
4. User memilih rumah sakit
   ↓
5. User mengisi form registrasi MCU
   - Pilih paket MCU
   - Pilih tanggal & waktu
   - Isi catatan medis
   ↓
6. Sistem generate nomor registrasi
   ↓
7. User konfirmasi data registrasi
   ↓
8. Sistem generate PDF kuitansi
   ↓
9. User melakukan pembayaran
   ↓
10. Admin approve pembayaran
   ↓
11. Registrasi status: Confirmed
   ↓
12. User dapat download bukti pembayaran
```

### 2.4 Keamanan Sistem

1. **Password Hashing**: Menggunakan bcrypt untuk keamanan password
2. **CSRF Protection**: Laravel automatic CSRF token
3. **Role-based Access Control**: Middleware untuk membatasi akses
4. **Input Validation**: Validasi semua input user
5. **SQL Injection Prevention**: Menggunakan Eloquent ORM
6. **XSS Protection**: Blade template escaping

### 2.5 Teknologi Tambahan

- **DomPDF**: Untuk generate file PDF
- **Guzzle**: Untuk HTTP requests
- **Faker**: Untuk generate dummy data (development)
- **Sanctum**: Untuk API authentication

---

## 3. SCREENSHOT MOCKUP INTERFACE PERANGKAT LUNAK

### 3.1 Halaman Landing Page
**Deskripsi**: Halaman utama yang menampilkan informasi Medical Tourism dan paket MCU yang tersedia.

**Elemen Utama**:
- Header dengan navigasi
- Banner utama dengan deskripsi HealthNav
- 3 Paket MCU (Basic, Standard, Premium)
- Section pendaftaran MCU
- Chatbot widget
- Footer

**Mockup Elements**:
```
┌─────────────────────────────────────────────────────────┐
│  HEADER                                                  │
│  [Logo] HealthNav  [Home] [About] [Services] [Contact] │
├─────────────────────────────────────────────────────────┤
│  BANNER SECTION                                          │
│  ┌─────────────────────────┐                           │
│  │ Medical Tourism          │                           │
│  │ HealthNav               │                           │
│  │ Deskripsi aplikasi...   │                           │
│  │ [Learn More] [Find Hosp]│                           │
│  └─────────────────────────┘                           │
├─────────────────────────────────────────────────────────┤
│  MCU PACKAGES                                            │
│  ┌───────────┐ ┌───────────┐ ┌───────────┐              │
│  │ Basic MCU │ │ Standard │ │ Premium   │              │
│  │ Rp 500K   │ │ Rp 1M    │ │ Rp 2.5M   │              │
│  │ [Book Now]│ │ [Book Now]│ │ [Book Now]│              │
│  └───────────┘ └───────────┘ └───────────┘              │
├─────────────────────────────────────────────────────────┤
│  REGISTRATION SECTION                                    │
│  ┌─────────────────────────┐                           │
│  │ Form Pendaftaran MCU     │                           │
│  │ [Register Button]        │                           │
│  └─────────────────────────┘                           │
├─────────────────────────────────────────────────────────┤
│  FOOTER                                                  │
│  Copyright © 2024 HealthNav                             │
│  [💬] Chatbot Button                                     │
└─────────────────────────────────────────────────────────┘
```

### 3.2 Halaman Login User
**Deskripsi**: Form autentikasi untuk user login.

**Elemen**:
```
┌─────────────────────────────────┐
│           [Logo]                │
│         HealthNav               │
├─────────────────────────────────┤
│  Email: [_______________]      │
│  Password: [_____________]      │
│  ☐ Remember Me                  │
│  [Forgot Password?]             │
│                                 │
│  [Login]                        │
│                                 │
│  Don't have account?            │
│  [Register here]                │
└─────────────────────────────────┘
```

### 3.3 Halaman Register
**Deskripsi**: Form registrasi pengguna baru.

**Elemen**:
```
┌─────────────────────────────────┐
│           [Logo]                │
│         HealthNav               │
├─────────────────────────────────┤
│  Name: [_______________]        │
│  Email: [_______________]        │
│  Phone: [_______________]        │
│  Password: [____________]       │
│  Confirm: [____________]        │
│  Passport: [___________]        │
│  Address: [___________]         │
│                                 │
│  [Register]                     │
│  Already registered? [Login]   │
└─────────────────────────────────┘
```

### 3.4 Dashboard User
**Deskripsi**: Dashboard utama untuk pengguna yang sudah login.

**Menu Navigasi**:
- Dashboard
- Profile
- MCU Registration
- History
- Logout

**Konten Dashboard**:
```
┌──────────────────────────────────────────────┐
│  DASHBOARD                          [User] ▼  │
├──────────────────────────────────────────────┤
│  ┌────────────────────────────────────┐      │
│  │  WELCOME, [Nama User]              │      │
│  │  Your Medical Check-Up Status      │      │
│  └────────────────────────────────────┘      │
│                                               │
│  ┌──────────────┐ ┌──────────────┐          │
│  │ Total History│ │ Total Hospital│          │
│  │      5       │ │      12      │          │
│  └──────────────┘ └──────────────┘          │
│                                               │
│  Recent Registrations:                        │
│  ┌────────────────────────────────────┐      │
│  │ MCU2024120101 - Pending            │      │
│  │ Hospital: RS JIH                   │      │
│  │ Date: 05-12-2024                  │      │
│  │ [View Details]                     │      │
│  └────────────────────────────────────┘      │
│                                               │
│  [Register New MCU] [View All History]       │
└──────────────────────────────────────────────┘
```

### 3.5 Halaman Pilih Rumah Sakit
**Deskripsi**: Daftar rumah sakit yang tersedia untuk registrasi.

**Elemen**:
```
┌──────────────────────────────────────────────┐
│  SELECT HOSPITAL                    [Search] │
├──────────────────────────────────────────────┤
│  ┌───────────────────────────────────────┐  │
│  │ [Hospital Image]  RS JIH              │  │
│  │ ☆ 4.8 (125 reviews)                   │  │
│  │ 📍 Yogyakarta                         │  │
│  │ Specialties: [Cardio] [General]      │  │
│  │ [Select Hospital]                     │  │
│  └───────────────────────────────────────┘  │
│  ┌───────────────────────────────────────┐  │
│  │ [Hospital Image]  RS Panti Raharja    │  │
│  │ ☆ 4.5 (98 reviews)                    │  │
│  │ 📍 Yogyakarta                         │  │
│  │ Specialties: [Pediatric] [Surgery]   │  │
│  │ [Select Hospital]                     │  │
│  └───────────────────────────────────────┘  │
└──────────────────────────────────────────────┘
```

### 3.6 Form Registrasi MCU
**Deskripsi**: Form untuk mengisi data registrasi MCU.

**Elemen**:
```
┌─────────────────────────────────────────────┐
│  MCU REGISTRATION                            │
├─────────────────────────────────────────────┤
│  Hospital: RS JIH                 [Change]  │
│                                             │
│  Select MCU Package:                        │
│  ○ Basic MCU - Rp 500.000                   │
│  ● Standard MCU - Rp 1.000.000              │
│  ○ Premium MCU - Rp 2.500.000               │
│                                             │
│  Appointment Date: [Date Picker]            │
│  Appointment Time: [Time Selector]         │
│                                             │
│  Medical Notes:                              │
│  [Text Area]                                │
│                                             │
│  Estimated Cost: Rp 1.000.000               │
│                                             │
│  [Cancel] [Submit Registration]             │
└─────────────────────────────────────────────┘
```

### 3.7 Konfirmasi Registrasi
**Deskripsi**: Halaman konfirmasi data registrasi sebelum finalisasi.

**Elemen**:
```
┌─────────────────────────────────────────────┐
│  CONFIRM REGISTRATION                       │
├─────────────────────────────────────────────┤
│  Please verify your information:            │
│                                             │
│  Registration No: MCU2024120101             │
│  Hospital: RS JIH                           │
│  Package: Standard MCU                      │
│  Date: 05 Dec 2024                          │
│  Time: 09:00 AM                             │
│  Notes: Annual health check                 │
│  Total Cost: Rp 1.000.000                   │
│                                             │
│  [Edit] [Confirm] [Cancel]                  │
│                                             │
│  OR                                         │
│                                             │
│  [Download PDF Receipt]                     │
└─────────────────────────────────────────────┘
```

### 3.8 Halaman Pembayaran
**Deskripsi**: Halaman informasi dan konfirmasi pembayaran.

**Elemen**:
```
┌─────────────────────────────────────────────┐
│  PAYMENT INFORMATION                        │
├─────────────────────────────────────────────┤
│  Registration: MCU2024120101                │
│  Amount: Rp 1.000.000                      │
│                                             │
│  Payment Method:                            │
│  ⦿ Bank Transfer                           │
│  ○ Credit Card                              │
│  ○ E-Wallet                                │
│                                             │
│  Transfer to:                               │
│  Bank: BCA                                  │
│  Account: 1234567890                        │
│  Name: HealthNav                            │
│                                             │
│  Upload Proof of Payment:                   │
│  [Choose File] [Upload]                     │
│                                             │
│  [Cancel] [Confirm Payment]                 │
└─────────────────────────────────────────────┘
```

### 3.9 Dashboard Admin
**Deskripsi**: Dashboard untuk admin mengelola sistem.

**Elemen**:
```
┌───────────────────────────────────────────────┐
│  ADMIN DASHBOARD                    [Admin] ▼  │
├───────────────────────────────────────────────┤
│  ┌──────────┐ ┌──────────┐ ┌──────────┐      │
│  │ Total Reg│ │ Pending  │ │ Completed│      │
│  │    150   │ │    25    │ │   120    │      │
│  └──────────┘ └──────────┘ └──────────┘      │
│                                               │
│  Navigation:                                   │
│  - Dashboard                                   │
│  - MCU Registrations                           │
│  - Hospitals                                    │
│  - Users                                        │
│  - Logout                                       │
│                                               │
│  Recent Activity:                              │
│  ┌──────────────────────────────────────┐    │
│  │ New Registration MCU2024120101         │    │
│  │ User: John Doe                        │    │
│  │ Status: Pending                       │    │
│  │ [View] [Approve]                      │    │
│  └──────────────────────────────────────┘    │
│                                               │
│  Statistics Chart: [Line Chart]              │
└───────────────────────────────────────────────┘
```

### 3.10 Halaman Manajemen Registrasi (Admin)
**Deskripsi**: Daftar semua registrasi MCU.

**Elemen**:
```
┌────────────────────────────────────────────────────┐
│  MCU REGISTRATIONS                    [Filter ▼]   │
├────────────────────────────────────────────────────┤
│  Search: [_________] [Filter: All Status ▼]       │
├────────────────────────────────────────────────────┤
│ No │ Reg No      │ User     │ Hospital │ Status   │
├────┼─────────────┼──────────┼──────────┼──────────┤
│ 1  │ MCU20241201 │ John Doe │ RS JIH   │ Pending  │
│ 2  │ MCU20241202 │ Jane Doe │ RS PR    │ Confirmed│
│ 3  │ MCU20241203 │ Bob Smith│ RS JIH   │ Completed│
├────────────────────────────────────────────────────┤
│  Actions: [View] [Edit Status] [Delete]            │
└────────────────────────────────────────────────────┘
```

---

## 4. DOKUMENTASI CARA PENGGUNAAN PERANGKAT LUNAK

### 4.1 Instalasi dan Setup

#### 4.1.1 Requirements
- PHP >= 8.1
- Composer
- MySQL/MariaDB
- Apache Server (XAMPP recommended)
- Git

#### 4.1.2 Langkah Instalasi

**Step 1: Clone Repository**
```bash
git clone [repository-url]
cd HealthNav
```

**Step 2: Install Dependencies**
```bash
composer install
npm install
```

**Step 3: Setup Environment**
```bash
cp .env.example .env
php artisan key:generate
```

**Step 4: Konfigurasi Database**

Edit file `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=healthnav
DB_USERNAME=root
DB_PASSWORD=
```

**Step 5: Jalankan Migrations dan Seeders**
```bash
php artisan migrate
php artisan db:seed
```

**Step 6: Link Storage**
```bash
php artisan storage:link
```

**Step 7: Build Assets**
```bash
npm run dev
```

**Step 8: Jalankan Server**
```bash
php artisan serve
```

Akses aplikasi di: `http://localhost:8000`

#### 4.1.3 Database Seeder

**Admin Default Account**:
- Email: admin@healthnav.com
- Password: admin123

**User Test Account** (jika ada):
- Email: user@test.com
- Password: password

### 4.2 Panduan Penggunaan untuk Pengguna

#### 4.2.1 Mendaftar sebagai Pengguna Baru

1. **Buka Website**
   - Akses `http://localhost:8000`
   - Klik tombol "Learn More" atau "Find Hospital"

2. **Klik Register**
   - Klik link "Register here" di halaman login

3. **Isi Form Registrasi**
   - Name: Masukkan nama lengkap
   - Email: Masukkan email yang valid
   - Phone: Masukkan nomor telepon
   - Password: Buat password (min 8 karakter)
   - Confirm Password: Ketik ulang password
   - Passport: Masukkan nomor passport (opsional)
   - Address: Masukkan alamat lengkap
   - Klik tombol "Register"

4. **Login**
   - Setelah berhasil registrasi, sistem akan redirect ke halaman login
   - Masukkan email dan password
   - Klik "Login"

#### 4.2.2 Melakukan Registrasi MCU

**Step 1: Akses Halaman Registrasi**
- Login ke sistem
- Klik menu "MCU Registration" atau tombol "Register New MCU" di dashboard

**Step 2: Pilih Rumah Sakit**
- Sistem akan menampilkan daftar rumah sakit tersedia
- Klik "Select Hospital" pada rumah sakit yang diinginkan
- Anda dapat melihat detail rumah sakit (rating, spesialisasi, alamat)

**Step 3: Isi Form Registrasi**
- Pilih paket MCU:
  - **Basic**: Rp 500.000 (General check-up)
  - **Standard**: Rp 1.000.000 (Include EKG)
  - **Premium**: Rp 2.500.000 (Include MRI/CT Scan)
- Pilih tanggal appointment (gunakan date picker)
- Pilih waktu appointment (dropdown available times)
- Isi medical notes (opsional, tapi disarankan untuk isi jika ada kondisi khusus)
- Klik "Submit Registration"

**Step 4: Konfirmasi Data**
- Sistem akan menampilkan ringkasan registrasi
- Periksa kembali data yang diisi
- **Nomor registrasi sudah auto-generate** (contoh: MCU2024120101)
- Klik "Confirm" untuk melanjutkan
- Atau klik "Download PDF Receipt" untuk download kuitansi

**Step 5: Pembayaran**
- Setelah konfirmasi, sistem akan redirect ke halaman pembayaran
- Pilih metode pembayaran (Bank Transfer/Credit Card/E-Wallet)
- Upload bukti transfer (jika Bank Transfer)
- Klik "Confirm Payment"
- Status registrasi akan berubah menjadi "Pending" menunggu approval admin

**Step 6: Download Bukti**
- Setelah pembayaran berhasil, Anda dapat download bukti pembayaran PDF
- Klik "Download PDF" untuk mendapatkan bukti pembayaran
- Simpan file PDF untuk referensi

#### 4.2.3 Melihat History Registrasi

1. **Akses History**
   - Login ke sistem
   - Klik menu "History" atau "MCU History"

2. **Lihat Daftar**
   - Sistem akan menampilkan semua riwayat registrasi Anda
   - Anda dapat melihat:
     - Nomor registrasi
     - Nama rumah sakit
     - Tanggal appointment
     - Status (Pending/Confirmed/Completed/Cancelled)
     - Total biaya

3. **Lihat Detail**
   - Klik "View Details" pada registrasi yang diinginkan
   - Sistem akan menampilkan detail lengkap:
     - Informasi registrasi
     - Detail paket MCU
     - Status pembayaran
     - Catatan medis
     - Bukti pembayaran (jika sudah approved)

#### 4.2.4 Mengelola Profil

1. **Akses Profil**
   - Login ke sistem
   - Klik menu "Profile" atau nama pengguna di header

2. **Lihat Profil**
   - Sistem akan menampilkan informasi profil Anda
   - Meliputi: nama, email, nomor telepon, alamat, dll

3. **Edit Profil**
   - Klik tombol "Edit Profile"
   - Ubah data yang ingin diupdate:
     - Nama
     - Email
     - Phone
     - Address
     - Passport (jika ada)
   - **Note**: Password dapat diubah di halaman terpisah
   - Klik "Update Profile"

4. **Ubah Password**
   - Klik "Change Password" di halaman profil
   - Masukkan password lama
   - Masukkan password baru (min 8 karakter)
   - Konfirmasi password baru
   - Klik "Update Password"

#### 4.2.5 Menggunakan Chatbot

1. **Akses Chatbot**
   - Di halaman landing page, klik tombol chat di pojok kanan bawah
   - Modal chatbot akan muncul

2. **Berinteraksi**
   - Ketik pertanyaan di input box
   - Klik tombol kirim atau tekan "Enter"
   - Chatbot akan memberikan respons otomatis

3. **Pertanyaan yang Didukung**
   - Informasi jadwal dokter
   - Cara daftar online
   - Informasi kamar rawat inap
   - Informasi umum rumah sakit
   - Informasi layanan lain

4. **Close Chatbot**
   - Klik tombol "X" untuk menutup modal
   - Atau klik di luar area modal

### 4.3 Panduan Penggunaan untuk Admin

#### 4.3.1 Login sebagai Admin

1. **Akses Admin Portal**
   - Buka `http://localhost:8000/admin/login`

2. **Masukkan Credentials**
   - Email: admin@healthnav.com
   - Password: admin123
   - Klik "Login"

3. **Dashboard Admin**
   - Setelah login, Anda akan masuk ke dashboard admin
   - Dashboard menampilkan:
     - Total registrasi
     - Registrasi pending
     - Registrasi completed
     - Grafik statistik

#### 4.3.2 Mengelola Registrasi MCU

**Lihat Daftar Registrasi**:
1. Klik menu "MCU Registrations" di sidebar
2. Sistem akan menampilkan semua registrasi
3. Gunakan fitur filter untuk melihat berdasarkan status
4. Gunakan search box untuk mencari registrasi spesifik

**Lihat Detail Registrasi**:
1. Klik tombol "View" pada registrasi yang diinginkan
2. Sistem akan menampilkan detail lengkap:
   - Informasi pengguna
   - Informasi rumah sakit
   - Informasi paket MCU
   - Status pembayaran
   - Bukti pembayaran (jika sudah upload)

**Update Status Registrasi**:
1. Klik "Edit" pada registrasi yang diinginkan
2. Pilih status baru:
   - **Pending**: Menunggu konfirmasi
   - **Confirmed**: Sudah dikonfirmasi
   - **Completed**: Sudah selesai
   - **Cancelled**: Dibatalkan
3. Tambahkan catatan (opsional)
4. Klik "Update Status"

**Approve Pembayaran**:
1. Buka detail registrasi dengan status "Pending"
2. Cek bukti pembayaran yang sudah diupload
3. Jika bukti valid, klik "Approve Payment"
4. Status payment akan berubah menjadi "Paid"

#### 4.3.3 Mengelola Rumah Sakit

**Menambah Rumah Sakit Baru**:
1. Klik menu "Hospitals" di sidebar
2. Klik tombol "Add New Hospital"
3. Isi form:
   - Name: Nama rumah sakit
   - Address: Alamat lengkap
   - Location: Kota/Lokasi
   - Phone: Nomor telepon
   - Email: Email kontak
   - Description: Deskripsi rumah sakit
   - Specialties: Pilih spesialisasi (multiple selection)
   - Upload Image: Upload gambar rumah sakit
   - Rating: Input rating awal
   - Set "Active" checkbox
4. Klik "Create Hospital"

**Edit Rumah Sakit**:
1. Klik "Edit" pada rumah sakit yang diinginkan
2. Ubah data yang perlu diupdate
3. Klik "Update Hospital"

**Hapus Rumah Sakit**:
1. Klik "Delete" pada rumah sakit yang diinginkan
2. Konfirmasi penghapusan
3. Rumah sakit akan dihapus dari sistem

**Aktivasi/Nonaktif Rumah Sakit**:
1. Klik "Edit" pada rumah sakit
2. Toggle checkbox "Active"
3. Klik "Update Hospital"
4. Rumah sakit nonaktif tidak akan muncul di daftar user

#### 4.3.4 Mengelola Users

**Lihat Daftar Users**:
1. Klik menu "Users" di sidebar
2. Sistem akan menampilkan semua pengguna terdaftar

**Edit User**:
1. Klik "Edit" pada user yang diinginkan
2. Ubah data yang perlu diupdate
3. **Warning**: Hati-hati saat mengubah role user
4. Klik "Update User"

**Hapus User**:
1. Klik "Delete" pada user yang diinginkan
2. Konfirmasi penghapusan
3. **Warning**: Hapus user akan menghapus semua registrasinya juga

**Filter Users**:
- Gunakan search box untuk mencari user spesifik
- Filter berdasarkan role (Admin/User)

### 4.4 Troubleshooting

#### 4.4.1 Masalah Umum

**Problem: Cannot connect to database**
- **Solution**: Pastikan MySQL service running di XAMPP
- Check konfigurasi database di file `.env`

**Problem: 500 Error**
- **Solution**: 
  - Check file `.env` sudah ada
  - Jalankan `php artisan key:generate`
  - Check permission folder `storage` dan `bootstrap/cache`
  - Jalankan `php artisan config:clear`

**Problem: Asset tidak muncul**
- **Solution**:
  - Jalankan `npm run dev` atau `npm run build`
  - Pastikan folder `public` accessible
  - Check file path di folder `public/assets`

**Problem: Upload file gagal**
- **Solution**:
  - Check permission folder `storage/app/public`
  - Jalankan `php artisan storage:link`
  - Check ukuran file yang diupload (max 2MB default)

**Problem: Login gagal**
- **Solution**:
  - Pastikan email dan password benar
  - Check apakah user sudah terdaftar
  - Run `php artisan db:seed` untuk membuat admin default

**Problem: PDF tidak ter-generate**
- **Solution**:
  - Check apakah package DomPDF sudah terinstall
  - Jalankan `composer require barryvdh/laravel-dompdf`
  - Check permission folder `storage`

#### 4.4.2 Reset Password (Jika Lupa)

**Untuk Admin**:
1. Akses database langsung (phpMyAdmin)
2. Buka tabel `users`
3. Cari user dengan role 'admin'
4. Reset password di database:
```sql
UPDATE users SET password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi' 
WHERE email = 'admin@healthnav.com';
```
*Password di atas adalah hash dari 'password'*

**Untuk User**:
1. User dapat menggunakan fitur "Forgot Password" di halaman login
2. Masukkan email
3. Sistem akan kirim link reset password via email
4. Klik link di email
5. Masukkan password baru

### 4.5 Informasi Teknis

#### 4.5.1 File Konfigurasi Penting

**`.env`**
```env
APP_NAME=HealthNav
APP_ENV=local
APP_KEY=base64:...
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=healthnav
DB_USERNAME=root
DB_PASSWORD=

MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"
```

**Routes** - `routes/web.php`
- Semua route aplikasi ada di file ini
- Admin routes dengan prefix `/admin`
- User routes dengan prefix `/user`
- Public routes tanpa prefix

**Middleware**
- `auth`: Untuk user yang sudah login
- `admin`: Untuk user dengan role admin
- Tersimpan di `app/Http/Middleware/`

#### 4.5.2 Command-Command Penting

```bash
# Clear cache
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Optimize
php artisan optimize

# Migrate
php artisan migrate
php artisan migrate:fresh --seed

# Generate
php artisan make:controller NamaController
php artisan make:model NamaModel
php artisan make:migration create_table_name

# Run server
php artisan serve
```

### 4.6 Kontak Support

Jika mengalami masalah atau membutuhkan bantuan:
- Email: support@healthnav.com
- GitHub Issues: [repository-url]/issues
- Documentation: Lihat file ini dan README.md

---

## AKHIR DOKUMENTASI

**Dokumen ini dibuat untuk mendokumentasikan sistem HealthNav secara lengkap.**

**Versi**: 1.0
**Tanggal**: Desember 2024
**Framework**: Laravel 10
**Developer**: HealthNav Development Team

---

© 2024 HealthNav - All Rights Reserved

