<p align="center">
  <h1 align="center">HEALTHNAV</h1>
  <p align="center">Sistem Informasi Medical Tourism dan MCU Registration</p>
  <p align="center">Built with Laravel 10</p>
</p>

## 📋 Deskripsi
**HealthNav** adalah sistem informasi berbasis web untuk Medical Tourism yang memudahkan pengguna untuk melakukan registrasi Medical Check-Up (MCU) di berbagai rumah sakit. Sistem ini dilengkapi dengan fitur manajemen registrasi, pembayaran online, dan dashboard admin untuk pengelolaan.

## ✨ Fitur Utama

### Untuk Pengguna
- 🏠 Landing page dengan informasi Medical Tourism
- 📦 3 Paket MCU (Basic, Standard, Premium)
- 🏥 Pilihan rumah sakit lengkap
- 📝 Registrasi MCU online
- 💰 Pembayaran dan konfirmasi
- 📊 Dashboard pengguna dengan history
- 👤 Manajemen profil
- 🤖 Chatbot virtual assistant
- 📄 Download bukti pembayaran PDF

### Untuk Admin
- 📊 Dashboard dengan statistik
- 📋 Manajemen registrasi MCU
- 🏥 CRUD rumah sakit
- 👥 Manajemen pengguna
- ✅ Approve pembayaran
- 📈 Laporan dan grafik

## 🛠️ Teknologi

- **Backend**: PHP 8.1+, Laravel 10
- **Frontend**: HTML5, CSS3, JavaScript, Bootstrap 5
- **Database**: MySQL
- **PDF Generator**: DomPDF
- **Authentication**: Laravel Sanctum
- **Server**: Apache (XAMPP)

## 📦 Instalasi

```bash
# Clone repository
git clone [repository-url]
cd HealthNav

# Install dependencies
composer install
npm install

# Setup environment
cp .env.example .env
php artisan key:generate

# Setup database
# Edit .env file dan konfigurasi database
php artisan migrate
php artisan db:seed

# Link storage
php artisan storage:link

# Build assets
npm run dev

# Run server
php artisan serve
```

Akses aplikasi di: `http://localhost:8000`

## 🔑 Default Login

**Admin**:
- Email: admin@healthnav.com
- Password: admin123

## 📖 Dokumentasi

Lihat file **DOKUMENTASI_HEALTHNAV.md** untuk dokumentasi lengkap:
- Implementasi perangkat lunak
- Screenshot interface dan mockup
- Panduan penggunaan lengkap
- Troubleshooting

## 📱 Screenshot

![Dashboard](https://github.com/GHAZI-ALANZI/hospital-laravel/assets/105205339/b73c3fc6-35d2-491e-a172-c91be7e95d35)

![Hospitals](https://github.com/GHAZI-ALANZI/hospital-laravel/assets/105205339/afefcf93-94d6-4c7c-9f29-0efa3ca46085)

## 📝 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## 👥 Developer

HealthNav Development Team

---

<p align="center">Made with ❤️ using Laravel</p>


colour Pallet

:root {
  --green: #9CAF88;
  --gold: #E3C16F;
  --brown: #6B4B33;
  --terracotta: #A1653B;
  --cream: #F8F3E9;
}
