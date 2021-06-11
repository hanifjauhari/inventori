<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_pelaporan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if (empty($this->session->userdata('sess_id_profile'))) {


            $this->session->set_flashdata('pesan', "harap login terlebih dahulu");
            // arahkan 
            redirect('login/index');
        }

        $this->load->model('M_pelaporan');
    }

    public function index()
    {
        $data = array(
            'title' => 'Halaman Pelaporan Customer',
            'pelaporan' => $this->M_pelaporan->getPelaporan()
        );
        // Template Header
        $this->load->view('template/header', $data);
        // Load halaman utama
        $this->load->view('pelaporan/pelaporan');
        // Template Footer
        $this->load->view('template/footer');
    }



    function edit($id_pelaporan)
    {

        $data = array(

            'title' => 'Halaman Data Kode Barang',

            // variable data kategori
            'pelaporan'  => $this->M_pelaporan->getPelaporanById_pelaporan($id_pelaporan)
        );

        $this->load->view('template/header', $data);
        $this->load->view('pelaporan/pelaporan_edit');
        $this->load->view('template/footer');
    }


    function prosesdelete($id_pelaporan)
    {

        $this->M_pelaporan->deletePelaporan($id_pelaporan);
    }


    // fungsi proses update
    function prosesupdate($id_pelaporan)
    {

        $this->M_pelaporan->updatePelaporan($id_pelaporan);
    }
}

/* End of file Controllername.php */
