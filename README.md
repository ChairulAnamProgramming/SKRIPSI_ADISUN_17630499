<p align="center"><img src="public/img/kantor.jpeg" width="400"></p>


## About Application

Sistem absensi berbasis web untuk kantor kejaksaan hulu sungai selatan

- Data Master.
    - Tani.
- Kelompok Tani.
- Lumbung.
    - Lumbung.
    - Pengelola Lumbung.
- Cadangan Pangan.
- Stok Pangan.
- Item Pangan.


## Cara Install

install terlebih dahulu composer <a href="https://getcomposer.org/">di sini</a>, dan juga install git <a href="https://git-scm.com/download/win">di sini</a>.
setelah itu pergi kefoleder tempat anda ingin menyimpan folder aplikasi,biasanya di htdocs. Terus klikkanan cari <b>git bash</b> dan ikuti petunjuk di bawah secara bertahap.

- ketikkan : git clone https://github.com/ChairulAnamProgramming/SKRIPSI_ADISUN_17630499.git
- setelah git clone selesai, ketikkan <b>cd SKRIPSI_ADISUN_17630499</b>  di git bash atau terminal
- ketikkan : cp .env.example .env
- ketikkan : composer install (tunggu sampai selesai)
- ketikkan : php artisan key:generate
- sesuaikan DB_DATABASE di file .env dengan database yang telah anda buat di phpmyadmin 
- ketikkan : php artisan migrate

# Catatan
jika ingin update aplikasi, ketikkan <b>git pull</b> , setalah itu biasanya github meminta username & password anda.
