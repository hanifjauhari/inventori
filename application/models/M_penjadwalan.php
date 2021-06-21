<?php 

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class M_penjadwalan extends CI_Model {
        


        // -------------------------------------------------------
        
        
            // pegawai
            function getJadwalBerdasarkanId() {

                $id_profile = $this->session->userdata('sess_id_profile');
                
                $this->db->select('penjadwalan_infoclient.*, penjadwalan_detailclient.*, customer.*, penjadwalan_info.*, profile.*')->from('penjadwalan_detailclient');
                
                $this->db->join('penjadwalan_infoclient', 'penjadwalan_infoclient.id_penjadwalan_infoclient = penjadwalan_detailclient.id_penjadwalan_infoclient', 'LEFT');
                $this->db->join('customer', 'customer.id_customer = penjadwalan_infoclient.id_customer');
                $this->db->join('penjadwalan_info', 'penjadwalan_info.id_penjadwalaninfo = penjadwalan_infoclient.id_penjadwalaninfo');
                $this->db->join('profile', 'profile.id_profile = penjadwalan_detailclient.id_profile', 'LEFT');


                $this->db->where('penjadwalan_detailclient.id_profile', $id_profile);

                $getJadwalBerdasarkanPegawai = $this->db->get();
                return $getJadwalBerdasarkanPegawai;
            }


            function getAllJadwal() {
                
                $this->db->select('penjadwalan_infoclient.*, penjadwalan_detailclient.*, customer.*, penjadwalan_info.*, profile.*')->from('penjadwalan_detailclient');
                
                $this->db->join('penjadwalan_infoclient', 'penjadwalan_infoclient.id_penjadwalan_infoclient = penjadwalan_detailclient.id_penjadwalan_infoclient', 'LEFT');
                $this->db->join('customer', 'customer.id_customer = penjadwalan_infoclient.id_customer');
                $this->db->join('penjadwalan_info', 'penjadwalan_info.id_penjadwalaninfo = penjadwalan_infoclient.id_penjadwalaninfo');
                $this->db->join('profile', 'profile.id_profile = penjadwalan_detailclient.id_profile', 'LEFT');


                $getJadwalBerdasarkanPegawai = $this->db->get();
                return $getJadwalBerdasarkanPegawai;
            }



            // verifikasi tugas
            function verifikasiTugas( $id_penjadwalan_infoclient ) {
                $id_profile = $this->session->userdata('sess_id_profile');
                $data = array(

                    'status'            => "selesai",
                    'diperbarui_pada'   => date('Y-m-d H:i:s'),
                    'id_profile'        => $id_profile,
                );
                $this->db->where('id_penjadwalan_infoclient', $id_penjadwalan_infoclient)->update('penjadwalan_infoclient', $data);


                // pengembalian alat

                        $this->db->select('penjadwalan_detailclient_alat.*, alat.qty as stok')->from('penjadwalan_detailclient_alat');
                        $this->db->join('alat', 'alat.id_alat = penjadwalan_detailclient_alat.id_alat');

                        $this->db->where( ['id_penjadwalan_infoclient' => $id_penjadwalan_infoclient] );
                        $getDataClient_alat = $this->db->get();
                        if ( $getDataClient_alat->num_rows() > 0 ) {
                            
                            foreach ( $getDataClient_alat->result_array() AS $kolom ) {

                                $stok_client = $kolom['qty'];
                                $stok_awal   = $kolom['stok'];

                                // memulihkan stok yang telah berkurang
                                $pemulihan = $stok_awal + $stok_client;

                                // update
                                $this->db->where('id_alat', $kolom['id_alat'])->update('alat', ['qty' => $pemulihan]);
                                $this->db->where('id_penjadwalan_detailclient_alat', $kolom['id_penjadwalan_detailclient_alat'])->delete('penjadwalan_detailclient_alat');
                            }
                        }


                    // --------------------------------------------
                
                redirect('C_tugaspegawai');
            }
        
        
        
        // -------------------------------------------------------




















        
        // data client detail alat
        function model_getdatadetailclient_alat( $id_penjadwalan_infoclient ) {

            return $this->db->get_where('penjadwalan_detailclient_alat', ['id_penjadwalan_infoclient' => $id_penjadwalan_infoclient]);
        }




        function model_getdatapenjadwalan_detailclient( $id_penjadwalan_infoclient ) {

            return $this->db->get_where('penjadwalan_detailclient', ['id_penjadwalan_infoclient' => $id_penjadwalan_infoclient]);
        }




        // data customer
        function model_getdatacustomer() {

            return $this->db->get('customer');
        }



        // data pegawai yang sudah terjadwal
        function model_getdatapegawai( $id_penjadwalaninfo ) {

            $sql = "SELECT 

                    COUNT(penjadwalan_detailclient.id_profile) AS pemetaan, penjadwalan_pegawai.id_profile, pegawai.* 
                    
                    FROM penjadwalan_pegawai
                    LEFT JOIN penjadwalan_detailclient ON penjadwalan_detailclient.id_profile = penjadwalan_pegawai.id_profile
                    JOIN pegawai ON pegawai.id_profile = penjadwalan_pegawai.id_profile
                    

                    WHERE penjadwalan_pegawai.id_penjadwalaninfo = '$id_penjadwalaninfo'
                    GROUP BY penjadwalan_pegawai.id_profile";

            return $this->db->query( $sql );
        }



        function model_getdataperalatan() {

            return $this->db->get('alat');
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
                    $id_penjadwalaninfo = $info['id_penjadwalaninfo'];

                    $getDataPenjadwalanInfoClient = $this->db->get_where('penjadwalan_infoclient', ['id_penjadwalaninfo' => $id_penjadwalaninfo]);
                    
                    $totalTugas = $getDataPenjadwalanInfoClient->num_rows();
                    $totalSelesai = 0;
                    $persentase = 0;

                    if ( $getDataPenjadwalanInfoClient->num_rows() > 0 ) {

                        foreach ( $getDataPenjadwalanInfoClient->result_array() AS $rowPIC ) {

                            // total selesai
                            if ( $rowPIC['status'] == "selesai" ) $totalSelesai++;
                        }
                    }



                    // persentase 
                    if ( ($totalTugas > 0) && ($totalSelesai > 0) ) {

                        $persentase = $totalSelesai / $totalTugas * 100;                        
                    }   


                    array_push( $data, array(

                        'info'      => $info,
                        'pegawai'   => $dataPegawai,
                        'persentase'=> $persentase
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



        // delete
        function model_batalkandatapenjadwalan( $id_penjadwalaninfo ) {

            // hapus childnya terlebih dahulu
            $getDataPenjadwalanInfoClient = $this->db->get_where('penjadwalan_infoclient', ['id_penjadwalaninfo'    => $id_penjadwalaninfo]);
            foreach ( $getDataPenjadwalanInfoClient->result_array() AS $row ) {

                // delete data by id_penjadwalan_infoclient
                $where = ['id_penjadwalan_infoclient' => $row['id_penjadwalan_infoclient']];
                
                $this->db->where( $where )->delete('penjadwalan_detailclient');

                // recovery data alat
                // --------------------------------------------


                        // recovery 


                        $id_penjadwalan_infoclient = $row['id_penjadwalan_infoclient'];
                        $this->db->select('penjadwalan_detailclient_alat.*, alat.qty as stok')->from('penjadwalan_detailclient_alat');
                        $this->db->join('alat', 'alat.id_alat = penjadwalan_detailclient_alat.id_alat');

                        $this->db->where( ['id_penjadwalan_infoclient' => $id_penjadwalan_infoclient] );
                        $getDataClient_alat = $this->db->get();
                        if ( $getDataClient_alat->num_rows() > 0 ) {
                            
                            foreach ( $getDataClient_alat->result_array() AS $kolom ) {

                                $stok_client = $kolom['qty'];
                                $stok_awal   = $kolom['stok'];

                                // memulihkan stok yang telah berkurang
                                $pemulihan = $stok_awal + $stok_client;

                                // update
                                $this->db->where('id_alat', $kolom['id_alat'])->update('alat', ['qty' => $pemulihan]);
                            }
                        }


                    // --------------------------------------------

                $this->db->where( $where )->delete('penjadwalan_detailclient_alat');
                $this->db->where( $where )->delete('penjadwalan_infoclient');
            }

            // hapus pegawai
            $this->db->where('id_penjadwalaninfo', $id_penjadwalaninfo)->delete('penjadwalan_pegawai');
            $this->db->where('id_penjadwalaninfo', $id_penjadwalaninfo)->delete('penjadwalan_info');


            // redirect
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
                'keterangan_tambahan'   => $this->input->post('keterangan_tambah'),
                'status'                => "proses"
            );

            $this->db->insert('penjadwalan_infoclient', $data);
            $last_id = $this->db->insert_id();

            // data detail client untuk kepegawaian
            
            $pegawai = $this->input->post('pegawai');
            $dataPegawai = array();

            foreach ( $pegawai AS $id ) {

                array_push( $dataPegawai, array(

                    'id_penjadwalan_infoclient' => $last_id,
                    'id_profile'                => $id
                ) );
            }

            $this->db->insert_batch('penjadwalan_detailclient', $dataPegawai);



            // penambahan alat yang dibawa 
            $dataAlat = array();
            $alat = $this->input->post('alat');

            if ( count( $alat ) > 0 ) {

                foreach ( $alat AS $alt ) {

                    array_push( $dataAlat, array(
    
                        'id_alat'   => $alt,
                        'qty'       => 1,
                        'id_penjadwalan_infoclient' => $last_id
                    ) );
    
    
    
                    // ambil data alat berdasarkan id
                    $whereIdAlat = ['id_alat' => $alt];
                    $getDataAlat = $this->db->get_where('alat', $whereIdAlat)->row_array();
                    
                    $stok_lama = $getDataAlat['qty'];
                    $stok_digunakan = 1;
    
                    $stok_update = $stok_lama - $stok_digunakan;
    
                    $this->db->where( $whereIdAlat )->update('alat', ['qty' => $stok_update]);
    
                }
                $this->db->insert_batch('penjadwalan_detailclient_alat', $dataAlat);
            }
            redirect( 'C_penjadwalan/client/'. $id_penjadwalaninfo );
        }


        // hapus
        function model_prosesclienthapus( $id_penjadwalaninfo, $id_penjadwalan_infoclient ){

            // hapus data detailclient (informasi penugasan pegawai)
            $where = array(

                'id_penjadwalan_infoclient' => $id_penjadwalan_infoclient,
            );

            $this->db->where($where)->delete('penjadwalan_detailclient');

            // hapus data detailclient alat 
            $this->db->select('penjadwalan_detailclient_alat.*, alat.qty as stok')->from('penjadwalan_detailclient_alat');
            $this->db->join('alat', 'alat.id_alat = penjadwalan_detailclient_alat.id_alat');

            $this->db->where( $where );
            $getDataClient_alat = $this->db->get();
            if ( $getDataClient_alat->num_rows() > 0 ) {
                
                foreach ( $getDataClient_alat->result_array() AS $kolom ) {

                    $stok_client = $kolom['qty'];
                    $stok_awal   = $kolom['stok'];

                    // memulihkan stok yang telah berkurang
                    $pemulihan = $stok_awal + $stok_client;

                    // update
                    $this->db->where('id_alat', $kolom['id_alat'])->update('alat', ['qty' => $pemulihan]);
                }
            }


            // hapus child :: alat
            $this->db->where( $where )->delete('penjadwalan_detailclient_alat');


            // hapus parent :: penjadwalan info 
            $this->db->where( $where )->delete('penjadwalan_infoclient');



            // redirect
            redirect('c_penjadwalan/client/'. $id_penjadwalaninfo);
        }


        // ubah 
        function model_prosesclientubah( $id_penjadwalaninfo, $id_penjadwalan_infoclient ) {

            
            // info client
            $data = array(

                'id_customer'           => $this->input->post('client'),
                'permasalahan'  =>  $this->input->post('permasalahan'),
                'keterangan_tambahan'   => $this->input->post('keterangan_tambah'),
            );

            $this->db->where('id_penjadwalan_infoclient', $id_penjadwalan_infoclient);
            $this->db->update('penjadwalan_infoclient', $data);

            // data detail client untuk kepegawaian
            
            $pegawai = $this->input->post('pegawai');
            $dataPegawai = array();

            foreach ( $pegawai AS $id ) {

                array_push( $dataPegawai, array(

                    'id_penjadwalan_infoclient' => $id_penjadwalan_infoclient,
                    'id_profile'                => $id
                ) );
            }

            // hapus info jadwalan pegawai lama berdasarkan client yg sudah dipilih
            $this->db->where('id_penjadwalan_infoclient', $id_penjadwalan_infoclient)->delete('penjadwalan_detailclient');

            // masukkan data yg baru
            $this->db->insert_batch('penjadwalan_detailclient', $dataPegawai);



            // penambahan alat yang dibawa 
            $dataAlat = array();
            $alat = $this->input->post('alat');

            

            if ( count( $alat ) > 0 ) {

                foreach ( $alat AS $alt ) {

                    array_push( $dataAlat, array(
    
                        'id_alat'   => $alt,
                        'qty'       => 1,
                        'id_penjadwalan_infoclient' => $id_penjadwalan_infoclient
                    ) );
    
                        


                    // --------------------------------------------


                        // recovery 



                        $this->db->select('penjadwalan_detailclient_alat.*, alat.qty as stok')->from('penjadwalan_detailclient_alat');
                        $this->db->join('alat', 'alat.id_alat = penjadwalan_detailclient_alat.id_alat');

                        $this->db->where( ['id_penjadwalan_infoclient' => $id_penjadwalan_infoclient] );
                        $getDataClient_alat = $this->db->get();
                        if ( $getDataClient_alat->num_rows() > 0 ) {
                            
                            foreach ( $getDataClient_alat->result_array() AS $kolom ) {

                                $stok_client = $kolom['qty'];
                                $stok_awal   = $kolom['stok'];

                                // memulihkan stok yang telah berkurang
                                $pemulihan = $stok_awal + $stok_client;

                                // update
                                $this->db->where('id_alat', $kolom['id_alat'])->update('alat', ['qty' => $pemulihan]);
                                $this->db->where('id_penjadwalan_detailclient_alat', $kolom['id_penjadwalan_detailclient_alat'])->delete('penjadwalan_detailclient_alat');
                            }
                        }


                    // --------------------------------------------










    
                    // ambil data alat berdasarkan id
                    $whereIdAlat = ['id_alat' => $alt];
                    $getDataAlat = $this->db->get_where('alat', $whereIdAlat)->row_array();
                    
                    // pengurangan
                    $stok_lama = $getDataAlat['qty'];
                    $stok_digunakan = 1;
    
                    $stok_update = $stok_lama - $stok_digunakan;
    
                    $this->db->where( $whereIdAlat )->update('alat', ['qty' => $stok_update]);
    
                }
                $this->db->insert_batch('penjadwalan_detailclient_alat', $dataAlat);
            }
            redirect( 'C_penjadwalan/client/'. $id_penjadwalaninfo );
        }



    
    }
    
    /* End of file M_penjadwalan.php */
    