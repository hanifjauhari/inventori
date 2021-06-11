<?php


defined('BASEPATH') or exit('No direct script access allowed');

class C_paymentclient extends CI_Controller
{
    // function __construct()
    // {
    //     parent::__construct();
    //     // cek session
    // }

    public function index()
    {
        $data = array(
            'title' => 'Halaman Utama'
        );
        // Template Header
        $this->load->view('dashboarduser/headerdashboarduser', $data);

        $this->load->view('payment_client/V_paymentclient');

        $this->load->view('dashboarduser/footerdashboarduser');
    }
}
    
    /* End of file C_dashboard.php */
