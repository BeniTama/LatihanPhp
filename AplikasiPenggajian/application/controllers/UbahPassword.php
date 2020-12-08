<?php

class UbahPassword extends CI_Controller
{
    public function index()
    {
        $data['title'] = "Ubah Password";

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('ubahPassword', $data);
        $this->load->view('templates_admin/footer');
    }

    public function ubahPassword_action()
    {
        $passBaru = $this->input->post('passBaru');
        $ulangPassBaru = $this->input->post('ulangPassBaru');

        $this->form_validation->set_rules('passBaru', 'password baru', 'required|matches[ulangPassBaru]');
        $this->form_validation->set_rules('ulangPassBaru', 'ulangi password', 'required');

        if ($this->form_validation->run() != false) {
            $data = array('password' => md5($passBaru));
            $id = array('id_pegawai' => $this->session->userdata('id_pegawai'));

            $this->penggajianModel->update_data('data_pegawai', $data, $id);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Password berhasil diubah</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            redirect('Welcome');
        } else {
            $data['title'] = "Ubah Password";

            $this->load->view('templates_admin/header', $data);
            $this->load->view('templates_admin/sidebar', $data);
            $this->load->view('ubahPassword', $data);
            $this->load->view('templates_admin/footer');
        }
    }
}
