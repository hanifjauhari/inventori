<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_bank extends CI_Controller
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
        $this->load->model('M_bank');
    }

    public function index()
    {

        $data = array(
            'title' => 'Halaman Data Kategori Barang',

            'bank'  => $this->M_bank->getDataBank()
        );
        // Template Header
        $this->load->view('template/header', $data);
        // Load halaman utama
        $this->load->view('bank/V_bank');
        // Template Footer
        $this->load->view('template/footer');
    }


    // fungsi baru untuk tambah 
    public function tambah()
    {

        $data = array(
            'title' => 'Halaman Data Bank'
        );

        $this->load->view('template/header', $data);
        $this->load->view('bank/V_banktambah');
        $this->load->view('template/footer');
    }

    // fungsi untuk menampilkan edit 
    function edit($id_bank)
    {

        $data = array(

            'title' => 'Halaman Data Kategori Barang',

            // variable data kategori
            'bank'  => $this->M_bank->getDataBankById_bank($id_bank)
        );

        $this->load->view('template/header', $data);
        $this->load->view('bank/V_bankedit');
        $this->load->view('template/footer');
    }





    // fungsi untuk proses tambah
    function prosestambah()
    {

        $this->M_bank->insertBank();
    }


    // fungsi untuk proses hapus
    function prosesdelete($id_bank)
    {

        $this->M_bank->deleteBank($id_bank);
    }


    // fungsi proses update
    function prosesupdate($id_bank)
    {

        $this->M_bank->updateBank($id_bank);
    }
}
