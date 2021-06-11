<?php


defined('BASEPATH') or exit('No direct script access allowed');

class C_katalogtelpon extends CI_Controller
{

    function __construct()
    {

        parent::__construct();
        if (empty($this->session->userdata('sess_id_profile'))) {


            $this->session->set_flashdata('pesan', "harap login terlebih dahulu");
            // arahkan 
            redirect('login/index');
        }
        $this->load->model('M_databarang');

        // cek session

    }


    public function index()
    {

        $data = array(
            'title' => 'Halaman Utama',
            'data_barang'  => $this->M_databarang->getDataBarang()
        );
        $this->load->view('viewloginuser/headeruser', $data);
        $this->load->view('viewloginuser/V_katalogtelpon', $data);
        $this->load->view('viewloginuser/footeruser', $data);
    }
}
    
    /* End of file C_dashboard.php */
