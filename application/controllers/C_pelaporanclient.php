<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_pelaporanclient extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        // cek session
        if (empty($this->session->userdata('sess_id_profile'))) {


            $this->session->set_flashdata('pesan', "harap login terlebih dahulu");
            // arahkan 
            redirect('login/index');
        }

        // $this->load->model('M_pelaporanclient');
        // $this->load->model('M_pelaporanclient');
        // $this->load->model('M_pelaporancliet');
    }

    public function index()
    {
        $data = array(
            'title' => 'Halaman Data Barang',
            // 'data_barang'  => $this->M_pelaporancliet->getDataBarang()
        );
        // Template Header
        $this->load->view('dashboarduser/headerdashboarduser', $data);
        // Load halaman utama
        $this->load->view('pelaporan_client/pelaporanclient');
        // Template Footer
        $this->load->view('dashboarduser/footerdashboarduser');
    }
}

/* End of file Controllername.php */
