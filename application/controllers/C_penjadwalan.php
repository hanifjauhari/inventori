<?php 

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class C_penjadwalan extends CI_Controller {
        
        function __construct(){
            
            parent::__construct();

            $this->load->model('M_datapegawai');
            $this->load->model('M_penjadwalan');
        }

        public function index(){
            
            $data = array(
                'title' => 'Halaman Penjadwalan',

                'penjadwalan'   => $this->M_penjadwalan->model_getdatapenjadwalan()
            
            );

            // Template Header
            $this->load->view('template/header', $data);
            // Load halaman utama
            $this->load->view('penjadwalan/V_penjadwalan');
            // Template Footer
            $this->load->view('template/footer');
        }



        // tambah penjadwalan
        function tambah_jadwal() {

            $data = array(
                'title' => 'Halaman Penjadwalan Tambah',
                
                'pegawai'   => $this->M_datapegawai->getDataPegawai()
            );

            // Template Header
            $this->load->view('template/header', $data);
            // Load halaman utama
            $this->load->view('penjadwalan/V_penjadwalan_tambah');
            // Template Footer
            $this->load->view('template/footer');
        }




        // proses tambah penjadwalan 
        function prosestambahpenjadwalan() {

            $this->M_penjadwalan->model_insertdatapenjadwalan();
        }
    










        // tampilan penjadwalan client
        function client( $id_penjadwalaninfo ) {

            $where = array('id_penjadwalaninfo' => $id_penjadwalaninfo);

            $data = array(
                'title' => 'Halaman Penjadwalan Info',
                'jadwal'   => $this->M_penjadwalan->model_getdatapenjadwalan( $where )[0],

                'tugas' => $this->M_penjadwalan->model_getdatapenjadwalanclient( $where )
            );

            // Template Header
            $this->load->view('template/header', $data);
            // Load halaman utama
            $this->load->view('penjadwalan/V_penjadwalan_client');
            // Template Footer
            $this->load->view('template/footer');
        }




        // tampilan penjadwalan client tambah
        function client_tambah( $id_penjadwalaninfo ) {

            $where = array('id_penjadwalaninfo' => $id_penjadwalaninfo);

            $data = array(
                'title' => 'Halaman Penjadwalan Info',
                'customer'   => $this->M_penjadwalan->model_getdatacustomer(),
                'id_penjadwalaninfo'    => $id_penjadwalaninfo
            );

            // Template Header
            $this->load->view('template/header', $data);
            // Load halaman utama
            $this->load->view('penjadwalan/V_penjadwalan_client_tambah');
            // Template Footer
            $this->load->view('template/footer');
        }



        function prosesclienttambah( $id_penjadwalaninfo ) {

            $this->M_penjadwalan->model_prosestambahpenjadwalanclient( $id_penjadwalaninfo );
        }
    }
    
    /* End of file C_penjadwalan.php */
    