# Penjaminan Mutu Sistem Informasi_SI_A_Kelompok 2
Judul Project: Pemesanan Online Melalui QR Cafe 
1. Project Manager = Lila Vimala_F52123001
2. Database Administrator = Nur Khalizah_F52123020
3. UI/UX = Cahya Nabila Mannassai_F52123003
4. Fullstack Developer = Syahril Ramadhan_F52123021
5. Quality Assurance = Desak Damayanti_F52123004

<h2> 📅 Timeline Pengerjaan Project</h2>

[Link Timeline](https://www.notion.so/37940922260b4c669efa3fd249a7fd6d?v=1b74a24e2abf49958b72a877fde69bc7&source=copy_link)

<h2> 📃 Deskripsi Singkat terkait Sistem Informasi Pemesanan Online Melalui Barcode</h2>
<p>Aplikasi yang akan dikembangkan merupakan sistem informasi berbasis web dengan nama Cyber Cafe, yang memungkinkan pelanggan memesan makanan dan minuman secara online melalui pemindaian barcode. Setelah memindai barcode di meja, pelanggan akan diarahkan ke halaman web tempat mereka bisa melihat menu, memilih pesanan, menambah ke keranjang, melakukan checkout, dan membayar secara tunai atau digital. <br> <br> Sistem ini juga menyediakan nota pembelian otomatis, serta fitur tambahan seperti informasi event kelas dan mentor yang diadakan oleh kafe. Di sisi lain, system admin memiliki panel khusus untuk mengelola menu, transaksi, laporan penjualan, dan event kelas. Aplikasi ini dibangun menggunakan framework Laravel, dengan database MySQL, dan antarmuka yang dibuat menggunakan Tailwind CSS dan Alpine.js agar tampilan responsif dan mudah digunakan baik di laptop maupun smartphone. Tujuan utamanya adalah meningkatkan efisiensi layanan kafe, mengurangi antrean, serta memberikan pengalaman pemesanan yang cepat, praktis, dan modern bagi pelanggan.</p> 

## 🖥️ Cara Menjalankan Proyek (How to Run)

Berikut adalah panduan langkah demi langkah untuk menginstal dan menjalankan proyek **Cyber Cafe** ini di lingkungan pengembangan lokal Anda.

---

### 1️⃣ Prasyarat

Pastikan komputer Anda telah terinstal perangkat lunak berikut:

- **XAMPP** atau sejenisnya (sebagai server Apache dan database MySQL/MariaDB)
- **Composer** (untuk manajemen dependensi PHP)
- **Git** (untuk meng-kloning repository)

---

### 2️⃣ Instalasi Proyek

#### a. Nyalakan XAMPP
Buka **XAMPP Control Panel** dan nyalakan modul **Apache** dan **MySQL**.

#### b. Kloning Repository
Buka terminal (**Git Bash**, **CMD**, atau **PowerShell**), masuk ke folder `htdocs` XAMPP Anda, dan jalankan perintah berikut:

```bash
cd C:\xampp\htdocs
git clone https://github.com/livlinee/Penjaminan-Mutu-Sistem-Informasi_-SI_A_Kelompok-2.git Cyber_Cafe_new
cd Cyber_Cafe_new
```
c. Instal Dependensi

Instal semua package PHP (seperti Laravel, Laravel Excel) menggunakan Composer:
```
composer install
```
d. Siapkan File .env

Salin file .env.example menjadi .env baru, lalu buat kunci aplikasi:
```
copy .env.example .env
php artisan key:generate
```
e. Buat Database Kosong

Buka browser dan pergi ke: http://localhost/phpmyadmin

Buat database baru dengan nama persis: cyber_cafe

f. Konfigurasi .env

Buka file .env yang baru Anda buat dan pastikan pengaturan database Anda sudah benar.
(Pengaturan default XAMPP biasanya sudah sesuai.)

Database:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=cyber_cafe
DB_USERNAME=root
DB_PASSWORD=
```

Email: (Wajib diisi agar fitur struk via email berfungsi)
```
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=465
MAIL_USERNAME="email-anda@gmail.com"
MAIL_PASSWORD="password-app-16-digit-dari-google"
MAIL_ENCRYPTION=ssl
MAIL_FROM_ADDRESS="email-anda@gmail.com"
MAIL_FROM_NAME="${APP_NAME}"
```
g. Import Database (Langkah Kunci)

Karena repository sudah menyertakan file .sql, Anda tidak perlu menjalankan migrasi.

Cukup lakukan langkah berikut:

1. Di phpMyAdmin, klik database cyber_cafe yang baru Anda buat.

2. Klik tab “Import” di bagian atas.

3. Klik “Choose File” dan pilih file cyber_cafe.sql dari folder proyek Anda.

4. Scroll ke bawah dan klik “Go” atau “Import”.

💡 Proses ini akan membuat semua tabel (admin, menu, transaksi, dll.) serta menambahkan data default (termasuk akun admin tes).

h. Jalankan Server

Terakhir, jalankan server pengembangan Laravel:
```
php artisan serve
```
3️⃣ Mengakses Aplikasi

Setelah server berjalan, Anda dapat mengakses aplikasi di:

🧾 Halaman Pelanggan (Frontend): http://localhost:8000

🔐 Halaman Login Admin (Backend): http://localhost:8000/admin/login

Kredensial Login Admin:
```
Username: tes
Password: test
```
<h2> 🎨 RANCANGAN UI/UX DI FIGMA</h2>
<p align="center">
    <img height="400" alt="1" src="https://github.com/user-attachments/assets/16863889-ebc7-4dbb-ac02-4378dd891439" />
    <img height="400" alt="2" src="https://github.com/user-attachments/assets/0224d6dc-c69a-473a-8191-314e92b25b9c" />
    <img height="400" alt="3" src="https://github.com/user-attachments/assets/4a2c7f98-f969-4002-a2c0-179be0caed58" />
    <img height="400" alt="4" src="https://github.com/user-attachments/assets/48136acd-70fb-4aa2-8668-fc16247d5b64" />
    <img height="400" alt="5" src="https://github.com/user-attachments/assets/2d1dccad-35b4-44a5-a4bb-39800891ed67" />
    <img height="400" alt="6" src="https://github.com/user-attachments/assets/29b25359-3481-4a23-a096-c5dffd824126" />
    <img height="400" alt="7" src="https://github.com/user-attachments/assets/7e6043ef-682d-416a-a8c5-a163a7a7b046" />
    <img height="400" alt="8" src="https://github.com/user-attachments/assets/3723cbfb-c5ea-478f-b5b9-77e03be629ec" />
    <img height="400" alt="9" src="https://github.com/user-attachments/assets/e8584391-61e9-46f8-8db2-8a43e897efb3" />
    <img height="400" alt="10" src="https://github.com/user-attachments/assets/131dcfed-3c5f-4427-adae-968cd0746b68" />
</p>
