<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_pelaporanclient extends CI_Controller
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
        $this->load->model('M_pelaporanclient');
    }

    public function index()
    {

        $data = array(
            'title' => 'Halaman Data Pelaporan Client',

            'pelaporanclient'  => $this->M_pelaporanclient->getDataPelaporanclient()
        );
        // Template Header
        $this->load->view('template_user/headeruser', $data);
        // Load halaman utama
        $this->load->view('pelaporan_client/V_pelaporanclient');
        // Template Footer
        $this->load->view('template_user/footeruser');
    }


    // fungsi baru untuk tambah 
    public function tambah()
    {

        $data = array(
            'title' => 'Halaman Data Pelaporan Client'
        );
        // Template Header
        $this->load->view('template_user/headeruser', $data);
        // Load halaman utama
        $this->load->view('pelaporan_client/V_pelaporanclienttambah');
        // Template Footer
        $this->load->view('template_user/footeruser');
    }

    // fungsi untuk menampilkan edit 
    function edit($id_pelaporan)
    {

        $data = array(

            'title' => 'Halaman Data Kategori Barang',

            // variable data kategori
            'pelaporanclient'  => $this->M_pelaporanclient->getDataPelaporanById_pelaporan($id_pelaporan)
        );
        // Template Header
        $this->load->view('template_user/headeruser', $data);
        // Load halaman utama
        $this->load->view('pelaporan_client/V_pelaporanclientedit');
        // Template Footer
        $this->load->view('template_user/footeruser');
    }





    // fungsi untuk proses tambah
    function prosestambah()
    {

        $this->M_pelaporanclient->insertPelaporan();
    }


    // fungsi untuk proses hapus
    function prosesdelete($id_pelaporan)
    {

        $this->M_pelaporanclient->deletePelaporan($id_pelaporan);
    }


    // fungsi proses update
    function prosesupdate($id_pelaporan)
    {

        $this->M_pelaporanclient->updatePelaporan($id_pelaporan);
    }
}
