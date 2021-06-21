<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_distributor extends CI_Controller
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
        $this->load->model('M_distributor');
    }

    public function index()
    {

        $data = array(
            'title' => 'Halaman Data Distributor Barang',

            'distributor'  => $this->M_distributor->getDataDistributor()
        );
        // Template Header
        $this->load->view('template/header', $data);
        // Load halaman utama
        $this->load->view('distributor/distributor');
        // Template Footer
        $this->load->view('template/footer');
    }


    // fungsi baru untuk tambah 
    public function tambah()
    {

        $data = array(
            'title' => 'Halaman Data Distributor'
        );

        $this->load->view('template/header', $data);
        $this->load->view('distributor/distributor_tambah');
        $this->load->view('template/footer');
    }

    // fungsi untuk menampilkan edit 
    function edit($id_distributor)
    {

        $data = array(

            'title' => 'Halaman Data Distributor Barang',

            // variable data kategori
            'distributor'  => $this->M_distributor->getDataDistributorById_Distributor($id_distributor)
        );

        $this->load->view('template/header', $data);
        $this->load->view('distributor/distributor_edit');
        $this->load->view('template/footer');
    }





    // fungsi untuk proses tambah
    function prosestambah()
    {

        $this->M_distributor->insertDistributor();
    }


    // fungsi untuk proses hapus
    function prosesdelete($id_distributor)
    {

        $this->M_distributor->deleteDistributor($id_distributor);
    }


    // fungsi proses update
    function prosesupdate($id_distributor)
    {

        $this->M_distributor->updateDistributor($id_distributor);
    }
}
