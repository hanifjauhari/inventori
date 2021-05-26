<?php 

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class M_penjadwalan extends CI_Model {
    
        
        function prosesTambah( $id_pegawai ) {

            $data = array();
            $hari = array('Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu');

            $getDataJadwal = $this->db->get('jadwal', ['id_pegawai' => $id_pegawai]);

            for ( $i = 0; $i < 7; $i++ ) {

                $masuk  = $this->input->post('masuk')[$i];
                $pulang = $this->input->post('pulang')[$i];



                array_push( $data, array(

                    'id_pegawai'    => $id_pegawai,
                    'id_customer'   => "",
                    'hari'          => $hari[ $i ],
                    'waktu'         => $masuk.'-'.$pulang,
                    'tipe'      => $this->input->post('tipe-'. $i)
                ) );
            }


            if ( $getDataJadwal->num_rows() > 0 ) {

                $this->db->where('id_pegawai', $id_pegawai)->delete('jadwal');
            }

            // insert 
            $this->db->insert_batch('jadwal', $data);   
            
            redirect('C_datapegawai');
        }
    
    }
    
    /* End of file M_penjadwalan.php */
    