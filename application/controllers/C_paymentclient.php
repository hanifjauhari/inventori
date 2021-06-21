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
        $this->load->view('template_user/headeruser', $data);

        $this->load->view('payment_client/V_paymentclient');

        $this->load->view('template_user/footeruser');
    }
}
    
    /* End of file C_dashboard.php */
