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
            redirect('C_registrasi/index');
        }
        $this->load->model('M_databarang');

        // cek session

    }


    public function index()
    {

        // <<<<<<< Updated upstream
        $data = array(
            'title' => 'Halaman Utama',
            'data_barang'  => $this->M_databarang->getDataBarang()
        );
        $this->load->view('dashboarduser/headerdashboarduser', $data);
        $this->load->view('dashboarduser/V_dashboarduser1', $data);
        $this->load->view('dashboarduser/footerdashboarduser', $data);
        // =======
        // $data = array(
        //     'title' => 'Halaman Utama',
        //     'data_barang'  => $this->M_databarang->getDataBarang()
       
    }
}
    
    /* End of file C_dashboard.php */
