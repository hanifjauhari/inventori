<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_kodebarang extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        if (empty($this->session->userdata('sess_id_profile'))) {


            $this->session->set_flashdata('pesan', "harap login terlebih dahulu");
            // arahkan 
            redirect('login/index');
        }

        $this->load->model('M_kodebarang');
    }

    public function index()
    {
        $data = array(
            'title' => 'Halaman Kode Barang',
            'kode_barang' => $this->M_kodebarang->getKodeBarang()
        );
        // Template Header
        $this->load->view('template/header', $data);
        // Load halaman utama
        $this->load->view('kodebarang/kode_barang');
        // Template Footer
        $this->load->view('template/footer');
    }

    public function tambah()
    {

        $data = array(
            'title' => 'Halaman Kode Barang',
            'kode_barang' => $this->M_kodebarang->getKodeBarang()
        );

        $this->load->view('template/header', $data);
        $this->load->view('kodebarang/kodebarang_tambah');
        $this->load->view('template/footer');
    }

    function edit($id_kode)
    {

        $data = array(

            'title' => 'Halaman Data Kode Barang',

            // variable data kategori
            'kode_barang'  => $this->M_kodebarang->getKodeBarangById_kodebarang($id_kode)
        );

        $this->load->view('template/header', $data);
        $this->load->view('kodebarang/kodebarang_edit');
        $this->load->view('template/footer');
    }


    function prosestambah()
    {
        $this->M_kodebarang->insertKodebarang();
    }

    function prosesdelete($id_kode)
    {

        $this->M_kodebarang->deleteKodeBarang($id_kode);
    }


    // fungsi proses update
    function prosesupdate($id_kode)
    {

        $this->M_kodebarang->updateKodeBarang($id_kode);
    }
}

/* End of file Controllername.php */
