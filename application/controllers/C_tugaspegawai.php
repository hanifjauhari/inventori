<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_tugaspegawai extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        if (empty($this->session->userdata('sess_id_profile'))) {


            $this->session->set_flashdata('pesan', "harap login terlebih dahulu");
            // arahkan 
            redirect('login/index');
        }


        // load model
        $this->load->model('M_penjadwalan');
    }

    public function index()
    {

        $data = array(
            'title' => 'Halaman Data Distributor Barang',

            'penjadwalan'   => $this->M_penjadwalan->getJadwalBerdasarkanId()
        );
        // Template Header
        $this->load->view('template/header', $data);
        // Load halaman utama
        $this->load->view('pegawai/pegawaitugas');
        // Template Footer
        $this->load->view('template/footer');
    }




    function verifikasiTugas( $id_penjadwalan_infoclient ) {

        $this->M_penjadwalan->verifikasiTugas( $id_penjadwalan_infoclient );
    }
}