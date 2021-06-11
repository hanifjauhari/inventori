<?php


defined('BASEPATH') or exit('No direct script access allowed');

class C_contactus extends CI_Controller
{

    // constructor
    function __construct()
    {

        parent::__construct();

        $this->load->model('M_contactus');
    }

    


    public function index()
    {
        $data = array('title' => 'Halaman Utama');

        $this->load->view('dashboarduser/headerdashboarduser', $data);
        $this->load->view('halamanutama/contactus');
        $this->load->view('dashboarduser/footerdashboarduser', $data);
    }

    


}
    
    /* End of file Login.php */
