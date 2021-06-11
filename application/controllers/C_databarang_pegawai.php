<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_databarang_pegawai extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        // cek session
        if ( empty( $this->session->userdata('sess_id_profile') ) ){


            $this->session->set_flashdata('pesan', "harap login terlebih dahulu");
            // arahkan 
            redirect('login/index');
        }

        $this->load->model('M_databarang');
        $this->load->model('M_kategoribarang');
        $this->load->model('M_kodebarang');
    }

    public function index()
    {
        $data = array(
            'title' => 'Halaman Data Barang',
            'data_barang'  => $this->M_databarang->getDataBarang()
        );
        // Template Header
        $this->load->view('template_pegawai/header_pegawai', $data);
        // Load halaman utama
        $this->load->view('barang/databarang');
        // Template Footer
        $this->load->view('template_pegawai/footer_pegawai');
    }

    public function tambah()
    {

        $data = array(
            'title' => 'Halaman Data Barang',

            'kategori'  => $this->M_kategoribarang->getDataKategori(),
            'kode_barang' => $this->M_kodebarang->getKodeBarang()
        );

        $this->load->view('template_pegawai/header_pegawai', $data);
        $this->load->view('barang/databarang_tambah');
        $this->load->view('template_pegawai/footer_pegawai');
    }

    function edit( $id_barang ) {

        $data = array(

            'title' => 'Halaman Data Kategori Barang',

            // variable data kategori
            'data_barang'  => $this->M_databarang->getDataBarangById_Barang( $id_barang )
        );

        $this->load->view('template_pegawai/header_pegawai', $data);
        $this->load->view('barang/databarang_edit');
        $this->load->view('template_pegawai/footer_pegawai');
    }
    function prosestambah()
    {

        $this->M_databarang->insertDataBarang();
    }


    function prosesdelete( $id_barang ) {

        $this->M_databarang->deleteDataBarang( $id_barang );
    }


    // fungsi proses update
    function prosesupdate( $id_barang ) {

        $this->M_databarang->updateDataBarang( $id_barang );
    }
}

/* End of file Controllername.php */
