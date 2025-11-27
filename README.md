<h1>Penjaminan Mutu Sistem Informasi_SI_A_Kelompok 2</h1>

<h2>Judul Project: Pemesanan Online Melalui QR Cafe</h2>

<ol>
  <li>Project Manager = Lila Vimala_F52123001</li>
  <li>Database Administrator = Nur Khalizah_F52123020</li>
  <li>UI/UX = Cahya Nabila Mannassai_F52123003</li>
  <li>Fullstack Developer = Syahril Ramadhan_F52123021</li>
  <li>Quality Assurance = Desak Damayanti_F52123004</li>
</ol>

<h2>📅 Timeline Pengerjaan Project</h2>
<p>
  <a href="https://www.notion.so/37940922260b4c669efa3fd249a7fd6d?v=1b74a24e2abf49958b72a877fde69bc7&source=copy_link" target="_blank" rel="noopener noreferrer">Link Timeline</a>
</p>

<h2>📃 Deskripsi Singkat terkait Sistem Informasi Pemesanan Online Melalui Barcode</h2>
<p>
  Aplikasi yang akan dikembangkan merupakan sistem informasi berbasis web dengan nama <strong>Cyber Cafe</strong>, yang memungkinkan pelanggan memesan makanan dan minuman secara online melalui pemindaian barcode. Setelah memindai barcode di meja, pelanggan akan diarahkan ke halaman web tempat mereka bisa melihat menu, memilih pesanan, menambah ke keranjang, melakukan checkout, dan membayar secara tunai atau digital.
</p>
<p>
  Sistem ini juga menyediakan nota pembelian otomatis, serta fitur tambahan seperti informasi event kelas dan mentor yang diadakan oleh kafe. Di sisi lain, sistem admin memiliki panel khusus untuk mengelola menu, transaksi, laporan penjualan, dan event kelas. Aplikasi ini dibangun menggunakan framework <strong>Laravel</strong>, dengan database <strong>MySQL</strong>, dan antarmuka yang dibuat menggunakan <strong>Tailwind CSS</strong> dan <strong>Alpine.js</strong> agar tampilan responsif dan mudah digunakan baik di laptop maupun smartphone. Tujuan utamanya adalah meningkatkan efisiensi layanan kafe, mengurangi antrean, serta memberikan pengalaman pemesanan yang cepat, praktis, dan modern bagi pelanggan.
</p>

<h2>🖥 Cara Menjalankan Proyek (How to Run)</h2>
<p>Berikut adalah panduan langkah demi langkah untuk menginstal dan menjalankan proyek <strong>Cyber Cafe</strong> ini di lingkungan pengembangan lokal Anda.</p>

<hr />

<h3>1️⃣ Prasyarat</h3>
<p>Pastikan komputer Anda telah terinstal perangkat lunak berikut:</p>
<ul>
  <li><b>XAMPP</b> atau sejenisnya (sebagai server Apache dan database MySQL/MariaDB)</li>
  <li>
      <b>Composer</b> (untuk manajemen dependensi PHP) – 
      Jika belum memiliki Composer, unduh di sini:<br>
      <a href="https://getcomposer.org/download/" target="_blank">Download Composer</a>
  </li>
  <li><b>Git</b> (untuk meng-kloning repository)</li>
</ul>

<h3>2️⃣ Instalasi Proyek</h3>

<h4>a. Nyalakan XAMPP</h4>
<p>Buka <strong>XAMPP Control Panel</strong> dan nyalakan modul <strong>Apache</strong> dan <strong>MySQL</strong>.</p>

<h4>b. Kloning Repository</h4>
<p>Buka terminal (Git Bash, CMD, atau PowerShell), masuk ke folder <code>htdocs</code> XAMPP Anda, dan jalankan perintah berikut:</p>
<pre><code>cd C:\xampp\htdocs
git clone https://github.com/livlinee/Penjaminan-Mutu-Sistem-Informasi_-SI_A_Kelompok-2.git Cyber_Cafe_new
cd Cyber_Cafe_new</code></pre>

<h4>c. Instal Dependensi</h4>

<h5>🔧 Sebelum menjalankan <code>composer install</code>, lakukan langkah berikut:</h5>
<p><b>1. Aktifkan ekstensi GD dan ZIP di php.ini</b></p>
<ol>
  <li>Buka folder:
    <pre><code>C:\xampp\php</code></pre>
  </li>
  <li>Buka file:
    <pre><code>php.ini</code></pre>
  </li>
  <li>Tekan <b>CTRL + F</b>, cari:
    <ul>
      <li><code>extension=gd</code></li>
      <li><code>extension=zip</code></li>
    </ul>
  </li>
  <li>Pastikan baris berikut sudah diaktifkan (tanpa tanda “;” di depan):
    <pre><code>extension=gd
extension=zip</code></pre>
  </li>
  <li>Simpan file lalu restart XAMPP → Apache.</li>
</ol>

<p>Setelah itu, jalankan:</p>
<pre><code>composer install</code></pre>

<p>Jika Composer atau PHP tidak terdeteksi di Git Bash, lanjutkan langkah C.1 dan C.2 di bawah:</p>

<h5>C.1 — Menambahkan Composer dan php ke Git Bash (Jika “composer: command not found”, “php: command not found”)</h5>
<ol>
  <li>Buka Git Bash</li>
  <li>Ketik:
    <pre><code>nano ~/.bashrc</code></pre>
  </li>
  <li>Tambahkan baris berikut di paling bawah:
    <pre><code>export PATH="/c/ProgramData/ComposerSetup/bin:$PATH"
export PATH="/c/xampp/php:$PATH"</code></pre>
  </li>
  <li>Simpan:
    <ul>
      <li>CTRL + O → Enter</li>
      <li>CTRL + X</li>
    </ul>
  </li>
  <li>Reload:
    <pre><code>source ~/.bashrc</code></pre>
  </li>
  <li>Cek:
    <pre><code>composer -V
php -v</code></pre>
  </li>
  <li>Update dan Install Laravel:
    <pre><code>composer update
composer install</code></pre>
  </li>
</ol>

<h5>C.2 — Jika PHP Anda masih 8.0 kebawah (WAJIB Upgrade ke 8.1+)</h5>
<p>Laravel 10 membutuhkan PHP minimal 8.1.</p>
<p>Solusi:</p>
<ul>
  <li>✔ Opsi paling mudah: Install XAMPP 8.2</li>
  <li>atau</li>
  <li>✔ Install PHP 8.2 manual ke folder <code>C:\php8</code>, lalu tambahkan ke <code>.bashrc</code>:
    <pre><code>export PATH="/c/php8:$PATH"</code></pre>
  </li>
</ul>

<h4>d. Siapkan File .env</h4>
<p>Salin file <code>.env.example</code> menjadi <code>.env</code> baru, lalu buat kunci aplikasi:</p>
<pre><code>php artisan key:generate</code></pre>

<h4>e. Buat Database Kosong</h4>
<p>Buka browser dan pergi ke: <a href="http://localhost/phpmyadmin" target="_blank" rel="noopener noreferrer">http://localhost/phpmyadmin</a></p>
<p>Buat database baru dengan nama persis: <code>cyber_cafe</code></p>

<h4>f. Konfigurasi .env</h4>
<p>Buka file <code>.env</code> yang baru Anda buat dan pastikan pengaturan database Anda sudah benar.</p>
<pre><code>DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=cyber_cafe
DB_USERNAME=root
DB_PASSWORD=</code></pre>

<p>Email:</p>
<pre><code>MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=465
MAIL_USERNAME="email-anda@gmail.com"
MAIL_PASSWORD="password-app-16-digit-dari-google"
MAIL_ENCRYPTION=ssl
MAIL_FROM_ADDRESS="email-anda@gmail.com"
MAIL_FROM_NAME="${APP_NAME}"</code></pre>

<h4>g. Import Database (Langkah Kunci)</h4>
<ol>
  <li>Pilih database <code>cyber_cafe</code> di phpMyAdmin.</li>
  <li>Klik tab “Import”.</li>
  <li>Pilih file <code>cyber_cafe.sql</code>.</li>
  <li>Klik “Go”.</li>
</ol>

<h4>h. Jalankan Server</h4>
<pre><code>php artisan serve</code></pre>

<h3>3️⃣ Mengakses Aplikasi</h3>
<ul>
  <li>Frontend: <a href="http://localhost:8000" target="_blank">http://localhost:8000</a></li>
  <li>Admin: <a href="http://localhost:8000/admin/login" target="_blank">http://localhost:8000/admin/login</a></li>
</ul>

<pre><code>Username: tes
Password: test
</code></pre>

<h2>🎨 RANCANGAN UI/UX DI FIGMA</h2>
<p style="text-align:center;">
  <img height="400" src="https://github.com/user-attachments/assets/16863889-ebc7-4dbb-ac02-4378dd891439" />
  <img height="400" src="https://github.com/user-attachments/assets/0224d6dc-c69a-473a-8191-314e92b25b9c" />
  <img height="400" src="https://github.com/user-attachments/assets/4a2c7f98-f969-4002-a2c0-179be0caed58" />
  <img height="400" src="https://github.com/user-attachments/assets/48136acd-70fb-4aa2-8668-fc16247d5b64" />
  <img height="400" src="https://github.com/user-attachments/assets/2d1dccad-35b4-44a5-a4bb-39800891ed67" />
  <img height="400" src="https://github.com/user-attachments/assets/29b25359-3481-4a23-a096-c5dffd824126" />
  <img height="400" src="https://github.com/user-attachments/assets/7e6043ef-682d-416a-a8c5-a163a7a7b046" />
  <img height="400" src="https://github.com/user-attachments/assets/3723cbfb-c5ea-478f-b5b9-77e03be629ec" />
  <img height="400" src="https://github.com/user-attachments/assets/e8584391-61e9-46f8-8db2-8a43e897efb3" />
  <img height="400" src="https://github.com/user-attachments/assets/131dcfed-3c5f-4427-adae-968cd0746b68" />
</p>

<h2>📱 Barcode Aplikasi Pemesanan Cyber Cafe</h2>
<p>Scan barcode berikut untuk mengakses halaman pemesanan Cyber Cafe:</p>

<p align="center">
  <img src="https://github.com/user-attachments/assets/382841f7-b4c3-4401-a9ea-5ce67ffa37ce" height="300">
</p>
