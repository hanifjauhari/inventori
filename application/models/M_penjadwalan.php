<?php 

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class M_penjadwalan extends CI_Model {
        



        


        // data customer
        function model_getdatacustomer() {

            return $this->db->get('customer');
        }


        // model data
        function model_getdatapenjadwalan( $kondisi = null ) {

            $data = array();

            if ( $kondisi ) {
                $query = $this->db->get_where('penjadwalan_info', $kondisi);
            } else {
                $query = $this->db->get('penjadwalan_info');
            }
            
            
            if ( $query->num_rows() > 0 ) {

                foreach ( $query->result_array() AS $info ) {

                    $wherePegawai = ['id_penjadwalaninfo' => $info['id_penjadwalaninfo']];

                    $this->db->select('penjadwalan_pegawai.*, pegawai.*')->from('penjadwalan_pegawai');
                    $this->db->join('pegawai', 'pegawai.id_profile = penjadwalan_pegawai.id_profile');

                    $this->db->where($wherePegawai);
                    $ambilDataPegawai = $this->db->get();

                    $dataPegawai = array();
                    if ( $ambilDataPegawai->num_rows() > 0 ) {

                        foreach ( $ambilDataPegawai->result_array() AS $pegawai ) {

                            array_push( $dataPegawai, $pegawai );
                        }
                    }



                    // status proyek 
                    // . . . 


                    array_push( $data, array(

                        'info'      => $info,
                        'pegawai'   => $dataPegawai
                    ) );
                }
            }

            return $data;
        }

        
        function model_insertdatapenjadwalan() {

            $data_penjadwalaninfo = array(

                'kode_jadwal'           => $this->input->post('kode_jadwal'), 
                'tanggal_pembuatan'     => $this->input->post('tanggal'),   
            );


            $this->db->insert('penjadwalan_info', $data_penjadwalaninfo);
            $last_id = $this->db->insert_id();


            // informasi data penjadwalan pegawai
            $data_penjadwalanpegawai = array();
            $id_profile = $this->input->post('pegawai');

            foreach ( $id_profile AS $profile ) {

                array_push( $data_penjadwalanpegawai, array(

                    'id_penjadwalaninfo'    => $last_id,
                    'id_profile'    => $profile
                ) );    
            }


            // insert batch
            $this->db->insert_batch( 'penjadwalan_pegawai', $data_penjadwalanpegawai );

            // redirect 
            $html = '<div class="alert alert-success">Pemberitahuan <br> Tambah penjadwalan berhasil</div>';
            $this->session->set_flashdata('msg', $html);

            redirect('C_penjadwalan');

        }




        function model_getdatapenjadwalanclient( $where = null ) {

            $this->db->select('customer.*, penjadwalan_infoclient.*')->from('penjadwalan_infoclient');
            $this->db->join('customer', 'customer.id_customer = penjadwalan_infoclient.id_customer');
            $this->db->where( $where );

            return $this->db->get();
        }

        function model_prosestambahpenjadwalanclient( $id_penjadwalaninfo ) {

            // info client
            $data = array(

                'id_penjadwalaninfo'    => $id_penjadwalaninfo,
                'id_customer'           => $this->input->post('client'),
                'permasalahan'  =>  $this->input->post('permasalahan'),
                'alat'          =>  $this->input->post('alat'),
                'keterangan_tambahan'   => $this->input->post('keterangan_tambah'),
                'status'                => "proses"
            );

            $this->db->insert('penjadwalan_infoclient', $data);
            redirect( 'C_penjadwalan/client/'. $id_penjadwalaninfo );
        }
    
    }
    
    /* End of file M_penjadwalan.php */
    