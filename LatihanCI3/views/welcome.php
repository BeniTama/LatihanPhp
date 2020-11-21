<!-- View, bertugas menampilkan data yang sudah diproses 
View juga bertugas untuk menampilkan layout/template 

Apabila hendak menampilkan data berupa variabel, bisa ditambahkan tag
php terlebih dahulu.
-->

<h1>Selamat Datang <?= $nama; ?></h1> <br>
Golongan Darah Anda <?= $goldarah; ?> <br>
Anda tinggal di <?= $alamat; ?>

<!-- Pada url, segmen pertama nama class/controller, kedua method,
    ketiga dst parameter.
    Contoh untuk memanggil url method diatas adalah:
    localhost/myapp3/index.php/blog/index/Andi/AB/Jakarta
-->