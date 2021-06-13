<?php 

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class M_alamat extends CI_Model {
    
        function __construct() {

            parent::__construct();
        }


        // fungsi tampil kategori barang
        function getDataAlamat() {

            $query = "SELECT * FROM alamat";
            $hasil = $this->db->query( $query );

            return $hasil;
        }


        // fungsi tampil kategori barang berdasarkan id_kategori
        function getDataAlamatById_alamat( $id_alamat ) {



            $query = "SELECT * FROM `alamat` WHERE id_alamat = '$id_alamat'";
            $hasil = $this->db->query( $query );

            return $hasil;
            
            
        }
        





        // fungsi proses tambah 
        function insertAlamat() {

            // sebut kolom dan nilai
            $nilaiTabelAlamat = array(

                'lokasi'  => $this->input->post('lokasi'),
                'status'  => $this->input->post('status')
            );

            // query insert
            $this->db->insert('alamat', $nilaiTabelAlamat);


            // pesan 
            $htmlPesan = '<div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <p style="margin: 0px"><i class="icon fas fa-check"></i> Pemberitahuan !</p>
                                <small>Data telah disimpan.</small>
                            </div>';
            $this->session->set_flashdata('pesan', $htmlPesan);

            // kembali ke halaman utama
            redirect('C_alamat/index');
        }





        // fungsi proses hapus
        function deleteAlamat( $id_alamat ) {


            // Menghapus kategori barang yang memiliki id = variabel x
            // $this->db->where(    bagian A , bagian B    );
            
            /**
             * 
             *  @param bagianA = merupakan nama kolom yang ada di tabel. ex id_kategori, nama, status
             *  @param bagianB = merupakan nilai dari kolomnya. ex. 1, 2, 3, 4
             */

            // eksekusi query 
            
            $this->db->where('id_alamat', $id_alamat);
            $this->db->delete('alamat');


            // pesan 
            $htmlPesan = '<div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <p style="margin: 0px"><i class="icon fas fa-check"></i> Pemberitahuan !</p>
                                <small>Data berhasil dihapus pada '.date('d F Y H.i A').'.</small>
                            </div>';
            $this->session->set_flashdata('pesan', $htmlPesan);


            // kembali 
            redirect('C_alamat/index');
        }
        


        function updateAlamat( $id_alamat ) {

            $nilaiTabelAlamat = array(

                'lokasi'  => $this->input->post('lokasi'),
                'status'        => $this->input->post('status')
            );


            // query update
            $this->db->where('id_alamat', $id_alamat);
            $this->db->update('alamat', $nilaiTabelAlamat);


             // pesan 
            $htmlPesan = '<div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <p style="margin: 0px"><i class="icon fas fa-check"></i> Pemberitahuan !</p>
                                <small>Data berhasil diperbarui pada '.date('d F Y H.i A').'.</small>
                            </div>';
            $this->session->set_flashdata('pesan', $htmlPesan);


            // kembali 
            redirect('C_alamat/index');

        }
    
    }
    
    /* End of file M_kategoribarang.php */
    