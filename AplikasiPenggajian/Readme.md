Berikut adalah proyek latihan menggunakan CodeIgniter 3. Ini adalah aplikasi penggajian. Didalam aplikasi ini terdapat beberapa fungsi, diantaranya CRUD data pegawai dan gaji.
Aplikasi ini menggunakan template SB Admin. Untuk lebih detailnya akan dijelaskan dibawah ini.

## Overview
Aplikasi ini memiliki banyak fitur, diantaranya halaman login yang berbeda antara user dan admin, CRUD data pegawai dan jabatan yang tersedia di perusahaan, data absensi pegawai, potongan gaji, dan data gaji yang diterima per bulannya. Kemudian, aplikasi ini juga dapat mencetak slip gaji seorang karyawan pada suatu bulan.

## Dashboard
Homepage/Dashboard memiliki satu fitur, yaitu menampilkan banyaknya data yang sudah dimiliki oleh database. Terdapat beberapa card, yang diantaranya menampilkan:
* Data Pegawai (Banyaknya pegawai yang terdaftar dalam DB)
* Data Admin (Banyaknya admin yang terdaftar dalam DB)
* Data Jabatan (Banyaknya jenis jabatan yang terdaftar dalam DB)
* Data Kehadiran (Banyaknya entri kehadiran karyawan dalam suatu bulan dalam DB)

## Master Data
### Data Pegawai
Dalam data pegawai, pengguna, dalam aplikasi ini hanya admin yang dapat mengakses, dapat melihat semua data pengguna yang terdaftar dalam Database. Didalam data pegawai terdapat:
* NIK
* Nama Karyawan
* Jenis Kelamin
* Jabatan
* Tanggal Masuk
* Status
* Foto Diri

Untuk Jabatan, ia tersambung dengan kolom Nama Jabatan pada tabel jabatan. Untuk status, itu untuk menjelaskan apakah karyawan itu karyawan tetap atau tidak.
Disini admin juga dapat menambahkan data pegawai baru. Admin juga dapat mengedit dan/atau menghapus data yang sudah ada didalam tabel pegawai.

### Data Jabatan
Dalam halaman Data Jabatan, admin dapat melihat data jabatan yang ada. Dalam setiap jenis jabatan, terdapat gaji pokok yang berbeda-beda, dan juga tunjangan transportasi dan biaya makan yang berbeda-beda pula. Didalam tabel data jabatan terdapat:
* Nama Jabatan
* Gaji Pokok
* Tunjangan Transport
* Uang Makan
* Total Gaji

Dihalaman ini admin juga dapat menambah data baru, juga mengupdate atau menghapus data yang sudah ada didalam DB.

## Transaksi
### Data Absensi
Didalam halaman ini ditampilkan data absensi yang dimiliki setiap karyawan pada satu bulan dan tahun. Tampilan awal dari halaman ini adalah filter data pegawai dibagian atas, dimana terdapat pilihan untuk memilih bulan dan tahun yang tersedia. Kemudian di sebelah kanan ada tombol untuk menampilkan data dan menambah entry data kehadiran baru. Untuk pilihan tahun, hanya disediakan pilihan untuk menampilkan tahun ini, dan 5 tahun kedepan. Untuk versi selanjutnya, mungkin akan diperbaiki agar tahun yang ditampilkan bukan ke 5 tahun kedepan, melainkan 5 tahun kebelakang.

Jika filter diisi, akan dikeluarkan data dalam DB yang cocok dengan pilihan filter datanya. Apabila berdasarkan pilihan filter tidak ditemukan data yang sesuai dalam DB, akan ditampilkan tabel kosong dengan peringatan "Data masih kosong, silakan input data kehadiran di bulan dan tahun yang ingin dipilih!". Jika ditemukan data yang sesuai, data akan dikeluarkan seperti biasa. Masing masing data juga dapat diedit dan dihapus. Data yang ditampilkan dalam tabel antara lain:
* NIK
* Nama Pegawai
* Jenis Kelamin 
* Jabatan
* Hadir
* Sakit
* Alpha
(Kemudian untuk kedepannya akan ditambahkan kolom ijin/lainnya).

### Potongan Gaji
### Data Gaji
