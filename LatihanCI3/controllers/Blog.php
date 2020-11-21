<?php
// Controller, bertugas memproses data
// Controller hanya bertugas sebagai penghubung antara model dengan view
class Blog extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // Memanggil data secara dinamis, dengan menampilkan data dari DB
        // Memanggil dan instansiasi object db yang akan digunakan
        $this->load->database();

        $this->load->helper('url');

        // Memuat model di controller
        $this->load->model('Blog_model');
    }

    // Setiap satu method merepresentasikan satu halaman
    // Pada satu controller, minimal ada satu method dengan nama index
    // sebagai method default. Method ini yang dipanggil tanpa nama
    public function index()
    {
        // Melakukan query untuk mengambil data
        $query = $this->Blog_model->getBlogs();

        // Menyimpan hasil query kedalam array blog
        $data['blogs'] = $query->result_array();

        // Memuat file view di controller
        // Parameter pertama untuk memanggil file view,
        // parameter kedua untuk mengirim data
        $this->load->view('blog', $data);
    }

    public function detail($url)
    {
        // Mempersingkat perintah select
        $query = $this->Blog_model->getSingleBlog($url);

        $data['blog'] = $query->row_array();

        $this->load->view('detail', $data);
    }

    public function welcome($nama, $goldarah, $alamat)
    {
        // Data didefinisikan menjadi satu array bernama $data
        $data['nama'] = $nama;
        $data['goldarah'] = $goldarah;
        $data['alamat'] = $alamat;

        $this->load->view('welcome', $data);
    }

    // Pada url, segmen pertama nama class/controller, kedua method,
    // ketiga dst parameter
    // Contoh untuk memanggil url method diatas adalah:
    // localhost/myapp3/index.php/blog/index/Andi/AB/Jakarta
}
