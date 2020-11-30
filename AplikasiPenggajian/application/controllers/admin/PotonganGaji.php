<?php

class PotonganGaji extends CI_Controller
{
    public function index()
    {
        $data['title'] = "Setting Potongan Gaji";
        $data['pot_gaji'] = $this->penggajianModel->get_data('potongan_gaji')->result();

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/potonganGaji', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambahData()
    {
        $data['title'] = "Tambah Potongan Gaji";

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/tambahPotonganGaji', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambahData_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambahData();
        } else {
            $potongan = $this->input->post('potongan');
            $jml_potongan = $this->input->post('jml_potongan');

            $data = array(
                'potongan' => $potongan,
                'jml_potongan' => $jml_potongan,
            );

            $this->penggajianModel->insert_data($data, 'potongan_gaji');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Data berhasil ditambahkan</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/PotonganGaji');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('potongan', 'potongan', 'required');
        $this->form_validation->set_rules('jml_potongan', 'jml_potongan', 'required');
    }

    public function updateData($id)
    {
        $where = array('id' => $id);
        $data['pot_gaji'] = $this->db->query("SELECT * FROM potongan_gaji WHERE id = $id")->result();
        $data['title'] = "Update Potongan Gaji";

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/updatePotonganGaji', $data);
        $this->load->view('templates_admin/footer');
    }

    public function updateData_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $id = $this->input->post('id');
            $this->updateData($id);
        } else {
            $id = $this->input->post('id');
            $potongan = $this->input->post('potongan');
            $jml_potongan = $this->input->post('jml_potongan');

            $data = array(
                'potongan' => $potongan,
                'jml_potongan' => $jml_potongan,
            );

            $where = array(
                'id' => $id
            );

            $this->penggajianModel->update_data('potongan_gaji', $data, $where);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Data berhasil diupdate</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/PotonganGaji');
        }
    }

    public function deleteData($id)
    {
        $where = array('id' => $id);
        $this->penggajianModel->delete_data($where, 'potongan_gaji');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Data berhasil dihapus!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/PotonganGaji');
    }
}
