<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_kategoribarang extends CI_Controller
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
        $this->load->model('M_kategoribarang');
    }

    public function index()
    {

        $data = array(
            'title' => 'Halaman Data Kategori Barang',

            'kategori_barang'  => $this->M_kategoribarang->getDataKategori()
        );
        // Template Header
        $this->load->view('template/header', $data);
        // Load halaman utama
        $this->load->view('barang/kategoribarang');
        // Template Footer
        $this->load->view('template/footer');
    }


    // fungsi baru untuk tambah 
    public function tambah()
    {

        $data = array(
            'title' => 'Halaman Data Kategori Barang'
        );

        $this->load->view('template/header', $data);
        $this->load->view('barang/kategoribarang_tambah');
        $this->load->view('template/footer');
    }

    // fungsi untuk menampilkan edit 
    function edit($id_kategori)
    {

        $data = array(

            'title' => 'Halaman Data Kategori Barang',

            // variable data kategori
            'kategori_barang'  => $this->M_kategoribarang->getDataKategoriById_kategori($id_kategori)
        );

        $this->load->view('template/header', $data);
        $this->load->view('barang/kategoribarang_edit');
        $this->load->view('template/footer');
    }





    // fungsi untuk proses tambah
    function prosestambah()
    {

        $this->M_kategoribarang->insertKategoriBarang();
    }


    // fungsi untuk proses hapus
    function prosesdelete($id_kategori)
    {

        $this->M_kategoribarang->deleteKategoriBarang($id_kategori);
    }


    // fungsi proses update
    function prosesupdate($id_kategori)
    {

        $this->M_kategoribarang->updateKategoriBarang($id_kategori);
    }
}

/*C_kategoribarang.php */
