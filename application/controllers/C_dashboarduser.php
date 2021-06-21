<?php


defined('BASEPATH') or exit('No direct script access allowed');

class C_dashboarduser extends CI_Controller
{

    function __construct()
    {

        parent::__construct();
        if (empty($this->session->userdata('sess_id_profile'))) {


            $this->session->set_flashdata('pesan', "harap login terlebih dahulu");
            // arahkan 
           
        }

        // cek session

    }


    public function index()
    {

        // <<<<<<< Updated upstream
        $data = array(
            'title' => 'Halaman Utama',
        );
        $this->load->view('dashboarduser/V_dashboarduser2', $data);

        // $data = array(
        //     'title' => 'Halaman Utama',
        //     'data_barang'  => $this->M_databarang->getDataBarang()
       
    }
}
    
    /* End of file C_dashboard.php */
