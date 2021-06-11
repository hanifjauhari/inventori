<?php


defined('BASEPATH') or exit('No direct script access allowed');

class C_penjadwalan extends CI_Controller
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
        $this->load->model('M_penjadwalan');
    }

     function index()
    {
        $data = array(
            'title'   => 'Halaman Stock Opname',

            'pegawai' => $this->M_datapegawai->getDataPegawai()
        );
        // Template Header
        $this->load->view('template/header', $data);
        // Load halaman utama
        $this->load->view('penjadwalan/V_penjadwalan');
        // Template Footer
        $this->load->view('template/footer');
    }



    // proses tambah
    function prosestambah( $id_pegawai ) {

        $this->M_penjadwalan->prosesTambah($id_pegawai);
    }
}
    
    /* End of file C_penjadwalan.php */
