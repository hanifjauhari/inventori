<?php


defined('BASEPATH') or exit('No direct script access allowed');

class C_detaildashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_databarang');
        // cek session
    }

    public function index()
    {
        $data = array(
            'title' => 'Halaman Utama'
        );

        // Template Header
        $this->load->view('dashboarduser/headerdashboarduser', $data);
        // // Load halaman utama
        // $this->load->view('barang/kategoribarang');
        // // Template Footer
        $this->load->view('dashboarduser/detaildashboard');
        $this->load->view('dashboarduser/footerdashboarduser');
    }

    public function detail($id_barang)
    {
        $data = array(
            'title' => 'Halaman Utama',
            'data_barang'  => $this->M_databarang->getDataBarangById_Barang($id_barang)
        );

        // Template Header
        $this->load->view('dashboarduser/headerdashboarduser', $data);
        // // Load halaman utama
        // $this->load->view('barang/kategoribarang');
        // // Template Footer
        $this->load->view('dashboarduser/detaildashboard', $data);
        $this->load->view('dashboarduser/footerdashboarduser');
    }
}
    
    /* End of file C_dashboard.php */
