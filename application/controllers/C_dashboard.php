<?php 

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class C_dashboard extends CI_Controller {
        
        function __construct() {

            parent::__construct();

            // cek session
            if ( empty( $this->session->userdata('sess_id_profile') ) ){


                $this->session->set_flashdata('pesan', "harap login terlebih dahulu");
                // arahkan 
                redirect('login/index');
            }


            $this->load->model('M_dashboard');
            $this->load->model('M_penjadwalan');
        }


        public function index(){
            
            $data = array(

                'title' => 'Halaman Utama',
                'jumlah'=> $this->M_dashboard->getJumlah(),

                // 'penjadwalan'   => $this->M_penjadwalan->model_getdatapenjadwalan()
                'penjadwalan'   => $this->M_penjadwalan->getAllJadwal()
            );

            $this->load->view('template/header');
            $this->load->view('dashboard/V_dashboard', $data);
            $this->load->view('template/footer');
        }
    
    }
    
    /* End of file C_dashboard.php */
    