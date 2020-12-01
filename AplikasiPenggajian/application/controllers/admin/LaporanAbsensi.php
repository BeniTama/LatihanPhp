<?php

class LaporanAbsensi extends CI_Controller
{
    public function index()
    {
        $data['title'] = "Laporan Absensi";

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/laporanAbsensi', $data);
        $this->load->view('templates_admin/footer');
    }

    public function printLaporanAbsensi()
    {
        $data['title'] = "Cetak Laporan Absensi";

        if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];

            $bulantahun = $bulan . $tahun;
        } else {
            $bulan = date('m');
            $tahun = date('Y');
            $bulantahun = $bulan . $tahun;
        }

        $data['lap_kehadiran'] = $this->db->query("SELECT * FROM data_kehadiran
        WHERE bulan='$bulantahun'
        ORDER BY nama_pegawai ASC;")->result();

        $this->load->view('templates_admin/header', $data);
        $this->load->view('admin/printLaporanAbsensi', $data);
    }
}