<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_alamat extends CI_Controller
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
        $this->load->model('M_alamat');
    }

    public function index()
    {

        $data = array(
            'title' => 'Halaman Data Kategori Barang',

            'alamat'  => $this->M_alamat->getDataAlamat()
        );
        // Template Header
        $this->load->view('template/header', $data);
        // Load halaman utama
        $this->load->view('alamat/alamat');
        // Template Footer
        $this->load->view('template/footer');
    }


    // fungsi baru untuk tambah 
    public function tambah()
    {

        $data = array(
            'title' => 'Halaman Data Alamat'
        );

        $this->load->view('template/header', $data);
        $this->load->view('alamat/alamat_tambah');
        $this->load->view('template/footer');
    }

    // fungsi untuk menampilkan edit 
    function edit($id_alamat)
    {

        $data = array(

            'title' => 'Halaman Data Kategori Barang',

            // variable data kategori
            'alamat'  => $this->M_alamat->getDataAlamatById_alamat($id_alamat)
        );

        $this->load->view('template/header', $data);
        $this->load->view('alamat/alamat_edit');
        $this->load->view('template/footer');
    }





    // fungsi untuk proses tambah
    function prosestambah()
    {

        $this->M_alamat->insertAlamat();
    }


    // fungsi untuk proses hapus
    function prosesdelete($id_alamat)
    {

        $this->M_alamat->deleteAlamat($id_alamat);
    }


    // fungsi proses update
    function prosesupdate($id_alamat)
    {

        $this->M_alamat->updateAlamat($id_alamat);
    }
}

/*C_kategoribarang.php */
