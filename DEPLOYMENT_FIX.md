# 🔧 DEPLOYMENT FIX - Database Connection Error

## ❌ Error yang Terjadi
```
Access denied for user 'heal_admin'@'localhost' (using password: YES)
```

## 🔍 Penyebab Masalah
1. **Database user tidak memiliki akses yang benar**
2. **Password database salah**
3. **Database host tidak sesuai**
4. **Remote access belum diaktifkan**

## ✅ Solusi

### 1. Perbaiki Konfigurasi .env

Berdasarkan informasi hosting panel Anda, update file `.env` dengan konfigurasi yang benar:

```env
APP_NAME=HealthNav
APP_ENV=production
APP_KEY=base64:7/UmwtgXmDqUPAaKAO1M+ESV7g+4Yu0fd0pUFD5X7gU=
APP_DEBUG=false
APP_URL=https://healthnav.yhotech.my.id

# Database Configuration
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=heal_bismillah
DB_USERNAME=heal_admin
DB_PASSWORD=tioanakbaik

# Mail Configuration
MAIL_MAILER=smtp
MAIL_HOST=yhotech.my.id
MAIL_PORT=465
MAIL_USERNAME=yhotech@yhotech.my.id
MAIL_PASSWORD=tiohaekal123
MAIL_ENCRYPTION=ssl
MAIL_FROM_ADDRESS="noreply@healthnav.yhotech.my.id"
MAIL_FROM_NAME="${APP_NAME}"
```

**Penting**: Pastikan password database benar-benar sesuai dengan yang di panel hosting.

### 2. Update di Hosting Panel

#### Step 1: Cek Database User
1. Login ke panel hosting
2. Buka cPanel atau panel database management
3. Cari "Database Users" atau "MySQL Users"
4. Pastikan user `heal_admin` sudah terdaftar
5. Klik "Change" untuk cek/update password

#### Step 2: Berikan Privileges
1. Di panel database, cari "Privileges" atau "Grant User"
2. Pastikan user `heal_admin` memiliki privilege untuk database `heal_bismillah`
3. Pastikan user punya akses SELECT, INSERT, UPDATE, DELETE, CREATE, DROP

#### Step 3: Remote Access (jika perlu)
1. Di halaman "Database Accounts"
2. Klik "Manage" pada kolom "Remote Access"
3. Jika memungkinkan, tambahkan host `%` atau IP server
4. Atau biarkan kosong untuk akses local-only

### 3. Reset Database User (Jika Perlu)

Jika masih error, coba buat user database baru:

**Di cPanel atau hosting panel:**
1. Buat user baru dengan nama lain (misal: `heal_user`)
2. Berikan password yang kuat
3. Pastikan user ini memiliki privileges penuh untuk database `heal_bismillah`
4. Update `.env` dengan kredensial baru

### 4. Test Koneksi Database

Setelah update `.env`, test koneksi:

```bash
# SSH ke server
ssh username@healthnav.yhotech.my.id

# Masuk ke direktori project
cd public_html # atau direktori lain sesuai hosting

# Test koneksi dengan artisan
php artisan db:show
```

### 5. Run Migration (Jika Database Kosong)

Setelah koneksi berhasil, jalankan migration:

```bash
php artisan migrate --force
php artisan db:seed --force
```

### 6. Fix Permission

Pastikan folder `storage` dan `bootstrap/cache` memiliki permission yang benar:

```bash
# Set permission
chmod -R 775 storage
chmod -R 775 bootstrap/cache

# Set ownership (sesuaikan user hosting)
chown -R username:username storage bootstrap/cache
```

### 7. Clear Cache

Setelah semua update:

```bash
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

# Atau clear semua sekaligus
php artisan optimize:clear
```

## 🎯 Checklist Deployment

- [ ] `.env` sudah dikonfigurasi dengan benar
- [ ] Database user memiliki password yang benar
- [ ] Database user punya privileges yang cukup
- [ ] Folder `storage` dan `bootstrap/cache` punya permission 775
- [ ] Migration sudah dijalankan
- [ ] Seeders sudah dijalankan (untuk admin default)
- [ ] APP_DEBUG=false di production
- [ ] APP_ENV=production
- [ ] APP_URL sudah benar sesuai domain

## 🔑 Default Admin Login

Setelah seeding berhasil:
- **Email**: admin@healthnav.com
- **Password**: admin123

*(Ganti password ini setelah login pertama!)*

## 📞 Alternatif Jika Masih Error

### Opsi 1: Coba Password Database
1. Login ke cPanel/hosting panel
2. Reset password untuk user `heal_admin`
3. Update di `.env` dengan password baru

### Opsi 2: Buat User Baru
1. Di panel database, buat user baru: `healthnav_user`
2. Berikan password: `HealthNav2024!`
3. Berikan privileges penuh ke database `heal_bismillah`
4. Update `.env`:
```env
DB_USERNAME=healthnav_user
DB_PASSWORD=HealthNav2024!
```

### Opsi 3: Cek Database Host
Kadang hosting menggunakan host khusus:
```env
DB_HOST=localhost
# atau
DB_HOST=localhost:3306
# atau tanyakan ke hosting support
```

## 📝 Note Penting

1. **APP_DEBUG=false** harus di production untuk keamanan
2. **APP_ENV=production** untuk optimize performance
3. Pastikan file `.env` tidak di-commit ke git (sudah ada di `.gitignore`)
4. File `.env` sensitive, jangan share secara publik

## 🚀 Setelah Fix Berhasil

Setelah database error resolved, pastikan:
1. Website bisa dibuka
2. Login admin bisa
3. Login user bisa
4. Upload file gambar berfungsi (cek permission folder `storage/app/public`)
5. Download PDF berfungsi

## ⚠️ Troubleshooting Tambahan

### Error: "Class 'PDO' not found"
```bash
# Install PDO extension
# Via cPanel atau hubungi hosting support
```

### Error: "SQLSTATE[HY000] [2002]"
- Ini masalah koneksi, bukan autentikasi
- Cek DB_HOST benar
- Cek firewall hosting

### Error: "Permission denied" pada storage
```bash
chmod -R 775 storage
chmod -R 775 bootstrap/cache
```

---

**Jika masih error setelah semua langkah di atas, screenshot error message lengkap dan kirim ke support.**


