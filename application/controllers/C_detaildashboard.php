<?php


defined('BASEPATH') or exit('No direct script access allowed');

class C_detaildashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
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
}
    
    /* End of file C_dashboard.php */
