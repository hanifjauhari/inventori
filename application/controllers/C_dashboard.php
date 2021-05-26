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
        }


        public function index(){
            
            $data = array(

                'title' => 'Halaman Utama'
            );

            // Template Header
            // $this->load->view('template/header', $data);
            // // Load halaman utama
            // $this->load->view('barang/kategoribarang');
            // // Template Footer
            // $this->load->view('template/footer');

            $this->load->view('template/header');
            $this->load->view('dashboard/V_dashboard');
            $this->load->view('template/footer');
        }
    
    }
    
    /* End of file C_dashboard.php */
    