<?php


defined('BASEPATH') or exit('No direct script access allowed');

class C_checkoutclient extends CI_Controller
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
        
        $this->load->view('checkout_client/V_checkoutclient');
        // Template Footer
        $this->load->view('dashboarduser/footerdashboarduser');
    }
}
    
    /* End of file C_dashboard.php */
