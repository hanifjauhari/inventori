<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_penjadwalanclient extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        // if (empty($this->session->userdata('sess_id_profile'))) {


        //     $this->session->set_flashdata('pesan', "harap login terlebih dahulu");
        //     // arahkan 
        //     redirect('login/index');
        // }


        // load model
        $this->load->model('M_penjadwalan');
    }

    public function index()
    {

        $data = array(
            'title' => 'Halaman Data Pelaporan Client',

            'pelaporanclient'  => $this->M_penjadwalan->getJadwalBerdasarkanId()
        );
        // Template Header
        $this->load->view('viewloginuser/headeruser', $data);
        // Load halaman utama
        $this->load->view('penjadwalan_client/V_penjadwalanclient');
        // Template Footer
        $this->load->view('viewloginuser/footeruser');
    }


    // // fungsi baru untuk tambah 
    // public function tambah()
    // {

    //     $data = array(
    //         'title' => 'Halaman Data Pelaporan Client'
    //     );
    //     // Template Header
    //     $this->load->view('viewloginuser/headeruser', $data);
    //     // Load halaman utama
    //     $this->load->view('pelaporan_client/V_pelaporanclienttambah');
    //     // Template Footer
    //     $this->load->view('viewloginuser/footeruser');
    // }

    // // fungsi untuk menampilkan edit 
    // function edit($id_pelaporan)
    // {

    //     $data = array(

    //         'title' => 'Halaman Data Kategori Barang',

    //         // variable data kategori
    //         'pelaporanclient'  => $this->M_penjadwalan->getDataPelaporanById_pelaporan($id_pelaporan)
    //     );
    //     // Template Header
    //     $this->load->view('viewloginuser/headeruser', $data);
    //     // Load halaman utama
    //     $this->load->view('pelaporan_client/V_pelaporanclientedit');
    //     // Template Footer
    //     $this->load->view('viewloginuser/footeruser');
    // }





    // // fungsi untuk proses tambah
    // function prosestambah()
    // {

    //     $this->M_penjadwalan->insertPelaporan();
    // }


    // // fungsi untuk proses hapus
    // function prosesdelete($id_pelaporan)
    // {

    //     $this->M_penjadwalan->deletePelaporan($id_pelaporan);
    // }


    // // fungsi proses update
    // function prosesupdate($id_pelaporan)
    // {

    //     $this->M_penjadwalan->updatePelaporan($id_pelaporan);
    // }
}
