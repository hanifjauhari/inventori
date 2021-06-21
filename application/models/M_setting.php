<?php 

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class M_setting extends CI_Model {
        


        function getDataPegawaiByIdLogin() {

            $sess_id_profile = $this->session->userdata('sess_id_profile');

            $where = ['id_profile' => $sess_id_profile];
            $query = $this->db->get_where( 'pegawai', $where );


            return $query;
        }


        function getDataProfile() {

            $sess_id_profile = $this->session->userdata('sess_id_profile');
            
            $where = ['id_profile' => $sess_id_profile];
            $query = $this->db->get_where( 'profile', $where );


            return $query;
        }



        // update
        function model_prosesupdateakun( $data ) {

            $sess_id_profile = $this->session->userdata('sess_id_profile');
            $this->db->where('id_profile', $sess_id_profile)->update( 'profile', $data );
        }
    
    }
    
    /* End of file M_setting.php */
    