# Laravel Web Installer | A Web Installer [Package](https://packagist.org/packages/aryokesuma/laravel-installer)
[![Total Downloads](http://poser.pugx.org/aryokesuma/laravel-installer/downloads)](https://packagist.org/packages/aryokesuma/laravel-installer) 
[![Latest Stable Version](http://poser.pugx.org/aryokesuma/laravel-installer/v)](https://packagist.org/packages/aryokesuma/laravel-installer) 
[![License](http://poser.pugx.org/aryokesuma/laravel-installer/license)](https://packagist.org/packages/aryokesuma/laravel-installer) 

- [Tentang](#tentang)
- [Kebutuhan Sistem](#kebutuhan-sistem)
- [Instalasi](#instalasi)
- [Route](#route)
- [Cara Penggunaan](#cara-penggunaan)
- [Foto Tampilan](#foto-tampilan)

## Tentang

Ingin klien Anda bisa menginstal proyek Laravel semudah menginstal WordPress atau CMS lainnya?  
Paket Laravel ini memungkinkan pengguna yang tidak terbiasa dengan Composer, SSH, dan sejenisnya untuk menginstal aplikasi Anda hanya dengan mengikuti panduan instalasi berbasis web.

Fitur-fitur yang tersedia saat ini:

- Mengecek kebutuhan server secara otomatis.
- Mengecek izin folder yang diperlukan.
- Mengatur informasi database dengan mudah.
	- Editor teks untuk file .env
	- Wizard form untuk mengisi .env
- Menjalankan migrasi database.
- Menambahkan data awal (seeding) ke tabel.

## Kebutuhan Sistem

* [Laravel 9, 10, 11, 12](https://laravel.com/docs/installation)

## Instalasi

1. Dari folder utama proyek kamu, buka terminal lalu jalankan perintah berikut:

```bash
    composer require aryokesuma/laravel-installer
```

2. Daftarkan package-nya

* Untuk Laravel versi 9 ke atas
Kamu harus mendaftarkan package ini secara manual di file `config/app.php` pada bagian `providers`, seperti ini:

```php
'providers' => [
	AryoKesuma\LaravelInstaller\Providers\LaravelInstallerServiceProvider::class,
];
```

* Untuk Laravel versi 11 ke atas
Kamu harus mendaftarkan package ini secara manual di file `bootstrap/providers.php`, seperti ini:

```php
'providers' => [
	AryoKesuma\LaravelInstaller\Providers\LaravelInstallerServiceProvider::class,
];
```

3. Jalankan perintah berikut untuk mempublikasikan file-file yang diperlukan:

```bash
	php artisan vendor:publish --provider="AryoKesuma\LaravelInstaller\Providers\LaravelInstallerServiceProvider"
```
atau

```bash
    php artisan vendor:publish --tag=laravelinstaller
```

## Route

* `/install`
* `/update`

## Cara Penggunaan

* **Catatan Route Install**
	* Untuk menginstal aplikasi, buka route `/install` lalu ikuti petunjuk yang ada.
	* Setelah instalasi selesai, akan dibuat file kosong bernama `installed` di direktori `/storage`. Jika file ini ada, maka akses ke `/install` akan diarahkan ke halaman 404.

* **Catatan Route Update**
	* Untuk memperbarui aplikasi, buka route `/update` lalu ikuti petunjuk yang ada.
	* Route `/update` akan menghitung jumlah file migrasi di folder `/database/migrations` dan membandingkannya dengan jumlah di tabel migrations. Jika jumlah file lebih banyak, halaman update akan muncul. Jika tidak, akan diarahkan ke halaman 404.

* File dan folder tambahan yang dipublikasikan ke proyek Anda:

|File|Keterangan|
|:------------|:------------|
|`config/installer.php`|Di sini Anda bisa mengatur kebutuhan sistem dan izin folder yang diperlukan agar aplikasi berjalan. Secara default, sudah diisi kebutuhan dasar aplikasi Laravel.|
|`public/installer/assets`|Folder ini berisi folder css dan di dalamnya ada file `main.css` yang mengatur tampilan installer. Anda bisa mengubah atau menambahkan gaya sesuai keinginan.|
|`resources/views/vendor/installer`|Folder ini berisi kode HTML untuk installer. Semuanya bisa Anda ubah sesuai kebutuhan.|
|`lang/en/installer_messages.php`<br>`lang/id/installer_messages.php`|File ini berisi semua pesan/teks installer (tersedia dalam bahasa Indonesia dan Inggris). Jika ingin menggunakan bahasa lain, salin file ini ke folder bahasa yang diinginkan lalu ubah isinya.|
|`lang/en/validation.php`<br>`lang/id/validation.php`|File validasi bahasa Inggris, biasanya sudah ada di Laravel, namun jika ingin menyesuaikan pesan validasi installer, Anda bisa mengedit atau menambah di sini.|

## Foto Tampilan

Dapat di lihat di [sini](https://github.com/Aryo07/screenshots-laravel-installer) kenapa digunakan repository lain, karena di dalam repository ini saya khususkan untuk package-nya saja.
