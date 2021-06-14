<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_pelanggan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        // // cek session
        // if ( empty( $this->session->userdata('sess_id_profile') ) ){


        //     $this->session->set_flashdata('pesan', "harap login terlebih dahulu");
        //     // arahkan 
        //     redirect('login/index');
        // }

        $this->load->model('M_pelanggan');
    }

    public function index()
    {
        $data = array(
            'title' => 'Halaman Data Pelanggan',
            'pelanggan'  => $this->M_pelanggan->getPelanggan()
        );
        // Template Header
        $this->load->view('template/header', $data);
        // Load halaman utama
        $this->load->view('pelanggan/V_pelanggan');
        // Template Footer
        $this->load->view('template/footer');
    }


    public function tambah()
    {

        $data = array(
            'title' => 'Halaman Data Pelanggan',

            'pelanggan'  => $this->M_pelanggan->getPelanggan()
        );
        // Template Header
        $this->load->view('template/header', $data);
        // Load halaman utama
        $this->load->view('pelanggan/V_pelanggantambah');
        // Template Footer
        $this->load->view('template/footer');
    }


    function edit( $id_pelanggan ) {

        $data = array(

            'title' => 'Halaman Data Pelanggan',

            // variable data kategori
            'pelanggan'  => $this->M_pelanggan->getPelangganById_Pelanggan( $id_pelanggan )
        );

        // Template Header
        $this->load->view('template/header', $data);
        // Load halaman utama
        $this->load->view('pelanggan/V_pelangganedit');
        // Template Footer
        $this->load->view('template/footer');
    }


    function prosestambah()
    {

        $this->M_pelanggan->insertPelanggan();
    }


    function prosesdelete( $id_pelanggan ) {

        $this->M_pelanggan->deletePelanggan( $id_pelanggan );
    }


    // fungsi proses update
    function prosesupdate( $id_pelanggan ) {

        $this->M_pelanggan->updatePelanggan( $id_pelanggan );
    }
}

/* End of file Controllername.php */
