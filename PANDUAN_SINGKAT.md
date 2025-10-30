# 📖 PANDUAN SINGKAT HEALTHNAV

## 🚀 Quick Start

### Installasi Cepat
```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan storage:link
npm run dev
php artisan serve
```

## 🔑 Login Default

| Role | Email | Password |
|------|-------|----------|
| Admin | admin@healthnav.com | admin123 |

## 📍 URL Penting

| Halaman | URL |
|---------|-----|
| Landing Page | `http://localhost:8000` |
| User Login | `http://localhost:8000/user/login` |
| Admin Login | `http://localhost:8000/admin/login` |
| User Register | `http://localhost:8000/user/register` |

## 🎯 Alur Penggunaan

### Untuk User Baru
1. Register → Daftar akun baru
2. Login → Masuk ke sistem
3. Dashboard → Lihat dashboard user
4. MCU Registration → Daftar MCU baru
5. Pilih Hospital → Pilih rumah sakit
6. Isi Form → Isi data registrasi
7. Confirm → Konfirmasi registrasi
8. Payment → Lakukan pembayaran
9. History → Lihat riwayat

### Untuk Admin
1. Login Admin → Masuk sebagai admin
2. Dashboard → Lihat statistik
3. Registrations → Kelola registrasi MCU
4. Hospitals → Kelola rumah sakit
5. Users → Kelola pengguna

## 🏥 Paket MCU

| Paket | Harga | Deskripsi |
|-------|-------|-----------|
| Basic | Rp 500.000 | General check-up, basic blood test |
| Standard | Rp 1.000.000 | Basic + EKG, cholesterol panel |
| Premium | Rp 2.500.000 | Standard + MRI/CT, specialist consultation |

## 📋 Status Registrasi

| Status | Deskripsi |
|--------|-----------|
| Pending | Menunggu konfirmasi admin |
| Confirmed | Sudah dikonfirmasi admin |
| Completed | MCU sudah selesai dilakukan |
| Cancelled | Registrasi dibatalkan |

## 🛠️ Troubleshooting Cepat

### Database Error
```bash
php artisan migrate:fresh --seed
```

### Cache Problem
```bash
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```

### 500 Error
```bash
php artisan key:generate
chmod -R 775 storage bootstrap/cache
```

### Asset Tidak Muncul
```bash
npm run dev
# atau
npm run build
```

## 📞 Support

- Dokumentasi Lengkap: `DOKUMENTASI_HEALTHNAV.md`
- GitHub Issues: [repository-url]/issues

## 🔄 Command Artisan Berguna

```bash
# Clear cache
php artisan cache:clear

# Migrate
php artisan migrate
php artisan migrate:fresh --seed

# Make file
php artisan make:controller NamaController
php artisan make:model NamaModel

# Serve
php artisan serve

# List routes
php artisan route:list
```

## 📁 Struktur Penting

```
app/
├── Http/Controllers/    # Controller aplikasi
├── Models/              # Model database
└── Middleware/          # Middleware

resources/
└── views/               # View/template

routes/
└── web.php             # Routes aplikasi

database/
├── migrations/          # Database migrations
└── seeders/            # Database seeders
```

---

💡 **Tip**: Baca `DOKUMENTASI_HEALTHNAV.md` untuk informasi lengkap!

