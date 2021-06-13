<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_alat extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        // cek session
        if (empty($this->session->userdata('sess_id_profile'))) {


            $this->session->set_flashdata('pesan', "harap login terlebih dahulu");
            // arahkan 
            redirect('login/index');
        }

        $this->load->model('M_alat');
    }

    public function index()
    {
        $data = array(
            'title' => 'Halaman Data Alat',
            'data_alat'  => $this->M_alat->getDataAlat()
        );
        // Template Header
        $this->load->view('template/header', $data);
        // Load halaman utama
        $this->load->view('alat/alat');
        // Template Footer
        $this->load->view('template/footer');
    }

    public function tambah()
    {

        $data = array(
            'title' => 'Halaman Data Alat',

        );

        $this->load->view('template/header', $data);
        $this->load->view('alat/alat_tambah');
        $this->load->view('template/footer');
    }

    function edit($id_alat)
    {

        $data = array(

            'title' => 'Halaman Data Alat',

            // variable data kategori
            'data_alat'  => $this->M_alat->getDataAlatById_alat($id_alat)
        );

        $this->load->view('template/header', $data);
        $this->load->view('alat/alat_edit');
        $this->load->view('template/footer');
    }
    function prosestambah()
    {

        $this->M_alat->insertDataAlat();
    }


    function prosesdelete($id_alat)
    {

        $this->M_alat->deleteDataAlat($id_alat);
    }


    // fungsi proses update
    function prosesupdate($id_alat)
    {

        $this->M_alat->updateDataAlat($id_alat);
    }
}

/* End of file Controllername.php */
