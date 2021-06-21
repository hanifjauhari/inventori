<?php 

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class M_dashboard extends CI_Model {
    
        
        function getJumlah() {

            $dataBarang = $this->db->get('barang');
            $dataCustomer = $this->db->get('customer');
            $dataPegawai  = $this->db->get('pegawai');
            $dataPelaporan = $this->db->get('pelaporan');


            return array(

                'barang'    => $dataBarang->num_rows(),
                'customer'  => $dataCustomer->num_rows(),
                'pegawai'   => $dataPegawai->num_rows(),
                'pelaporan' => $dataPelaporan->num_rows(),
            );
        }
    }
    
    /* End of file M_dashboard.php */
        