<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_datapegawai extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if (empty($this->session->userdata('sess_id_profile'))) {


            $this->session->set_flashdata('pesan', "harap login terlebih dahulu");
            // arahkan 
            redirect('login/index');
        }

        $this->load->model('M_datapegawai');
    }

    public function index()
    {
        $data = array(
            'title' => 'Halaman Data pegawai',
            'data_pegawai'  => $this->M_datapegawai->getDataPegawai()
        );
        // Template Header
        $this->load->view('template/header', $data);
        // Load halaman utama
        $this->load->view('pegawai/datapegawai');
        // Template Footer
        $this->load->view('template/footer');
    }

    public function tambah()
    {

        $data = array(
            'title' => 'Halaman Data pegawai'
        );

        $this->load->view('template/header', $data);
        $this->load->view('pegawai/datapegawai_tambah');
        $this->load->view('template/footer');
    }
    function prosestambah()
    {
        $this->M_datapegawai->insertDataPegawai();
    }
    //fungsi proses hapus
    function prosesdelete($id_pegawai)
    {
        $this->M_datapegawai->deleteDataPegawai($id_pegawai);
    }

    //fungsi menampilkan edit
    function edit($id_pegawai)
    {
        $data = array(
            'tittle' => 'halaman data pegawai',
            //variabel data kategori
            'data_pegawai' =>  $this->M_datapegawai->getDataPegawaiById_kategori($id_pegawai)
        );
        $this->load->view('template/header', $data);
        $this->load->view('pegawai/datapegawai_edit');
        $this->load->view('template/footer');
    }

    //fungsi proses edit selesai
    function prosesupdate($id_pegawai)
    {
        $this->M_datapegawai->updateDataPegawai($id_pegawai);
    }
}
/* End of file Controllername.php */