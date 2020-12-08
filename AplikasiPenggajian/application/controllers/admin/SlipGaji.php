<?php

class SlipGaji extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('hak_akses') != 1) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Halaman hanya dapat diakses admin!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Welcome');
        }
    }

    public function index()
    {
        $data['title'] = "Slip Gaji Pegawai";

        $data['pegawai'] = $this->penggajianModel->get_data('data_pegawai')->result();

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/dataSlipGaji', $data);
        $this->load->view('templates_admin/footer');
    }

    public function printSlipGaji()
    {
        $data['title'] = "Cetak Slip Gaji";
        $nama = $this->input->post('nama_pegawai');

        if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];

            $bulantahun = $bulan . $tahun;
        } else {
            $bulan = date('m');
            $tahun = date('Y');
            $bulantahun = $bulan . $tahun;
        }

        $data['slip_gaji'] = $this->db->query("SELECT data_pegawai.nik, data_pegawai.nama_pegawai, data_jabatan.nama_jabatan, data_jabatan.gaji_pokok, data_jabatan.tj_transport, data_jabatan.uang_makan, data_kehadiran.alpha
        FROM data_pegawai
        INNER JOIN data_kehadiran ON data_pegawai.nik = data_kehadiran.nik
        INNER JOIN data_jabatan ON data_pegawai.jabatan = data_jabatan.nama_jabatan
        WHERE data_kehadiran.bulan = '$bulantahun' AND data_kehadiran.nama_pegawai = '$nama'")->result();

        $data['potongan'] = $this->penggajianModel->get_data('potongan_gaji')->result();

        $this->load->view('templates_admin/header', $data);
        $this->load->view('admin/printSlipGaji', $data);
    }
}
