<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_datapegawai extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if (empty($this->session->userdata('sess_id_profile'))) {


            $this->session->set_flashdata('pesan', "harap login terlebih dahulu");
            // arahkan 
            redirect('login/index');
        }

        $this->load->model('M_datapegawai');
    }

    public function index()
    {
        $data = array(
            'title' => 'Halaman Data pegawai',
            'data_pegawai'  => $this->M_datapegawai->getDataPegawai()
        );
        // Template Header
        $this->load->view('template/header', $data);
        // Load halaman utama
        $this->load->view('pegawai/datapegawai');
        // Template Footer
        $this->load->view('template/footer');
    }

    
}
/* End of file Controllername.php */