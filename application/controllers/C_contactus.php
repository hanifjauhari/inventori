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


        $this->load->view('dashboarduser/V_dashboarduser2',$data);
    }
    function prosestambah()
    {

        $this->M_contactus->insertContactus();
    }
}
    
    /* End of file Login.php */
