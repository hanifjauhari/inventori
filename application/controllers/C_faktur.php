<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_faktur extends CI_Controller
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
        // $this->load->model('M_faktur');
    }

    public function index()
    {

        $data = array(
            'title' => 'Halaman Data Kategori Barang',

            // 'faktur'  => $this->M_faktur->getDataFaktur()
        );
        // Template Header
        $this->load->view('template/header', $data);
        // Load halaman utama
        $this->load->view('faktur/faktur');
        // Template Footer
        $this->load->view('template/footer');
    }


    // fungsi baru untuk tambah 
    public function tambah()
    {

        $data = array(
            'title' => 'Halaman Data Faktur'
        );

        $this->load->view('template/header', $data);
        $this->load->view('faktur/faktur_tambah');
        $this->load->view('template/footer');
    }

    // fungsi untuk menampilkan edit 
    function edit($id_faktur)
    {

        $data = array(

            'title' => 'Halaman Data Faktur',

            // variable data kategori
            // 'alamat'  => $this->M_alamat->getDataFakturById_faktur($id_faktur)
        );

        $this->load->view('template/header', $data);
        $this->load->view('faktur/faktur_edit');
        $this->load->view('template/footer');
    }





    // fungsi untuk proses tambah
    function prosestambah()
    {

        $this->M_faktur->insertFaktur();
    }


    // fungsi untuk proses hapus
    function prosesdelete($id_faktur)
    {

        $this->M_faktur->deleteFaktur($id_faktur);
    }


    // fungsi proses update
    function prosesupdate($id_faktur)
    {

        $this->M_faktur->updateFaktur($id_faktur);
    }
}

/*C_kategoribarang.php */
