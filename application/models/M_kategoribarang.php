<?php 

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class M_kategoribarang extends CI_Model {
    
        function __construct() {

            parent::__construct();
        }


        // fungsi tampil kategori barang
        function getDataKategori() {

            $query = "SELECT * FROM kategori";
            $hasil = $this->db->query( $query );

            return $hasil;
        }


        // fungsi tampil kategori barang berdasarkan id_kategori
        function getDataKategoriById_kategori( $id_kategori ) {



            $query = "SELECT * FROM `kategori` WHERE id_kategori = '$id_kategori'";
            $hasil = $this->db->query( $query );

            return $hasil;
            
            
        }
        





        // fungsi proses tambah 
        function insertKategoriBarang() {

            // sebut kolom dan nilai
            $nilaiTabelKategori = array(

                'jenis_barang'  => $this->input->post('jenis_barang'),
                'status'        => $this->input->post('status')
            );

            // query insert
            $this->db->insert('kategori', $nilaiTabelKategori);


            // pesan 
            $htmlPesan = '<div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <p style="margin: 0px"><i class="icon fas fa-check"></i> Pemberitahuan !</p>
                                <small>Data telah disimpan.</small>
                            </div>';
            $this->session->set_flashdata('pesan', $htmlPesan);

            // kembali ke halaman utama
            redirect('C_kategoribarang/index');
        }





        // fungsi proses hapus
        function deleteKategoriBarang( $id_kategori ) {


            // Menghapus kategori barang yang memiliki id = variabel x
            // $this->db->where(    bagian A , bagian B    );
            
            /**
             * 
             *  @param bagianA = merupakan nama kolom yang ada di tabel. ex id_kategori, nama, status
             *  @param bagianB = merupakan nilai dari kolomnya. ex. 1, 2, 3, 4
             */

            // eksekusi query 
            
            $this->db->where('id_kategori', $id_kategori);
            $this->db->delete('kategori');


            // pesan 
            $htmlPesan = '<div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <p style="margin: 0px"><i class="icon fas fa-check"></i> Pemberitahuan !</p>
                                <small>Data berhasil dihapus pada '.date('d F Y H.i A').'.</small>
                            </div>';
            $this->session->set_flashdata('pesan', $htmlPesan);


            // kembali 
            redirect('C_kategoribarang/index');
        }
        


        function updateKategoriBarang( $id_kategori ) {

            $nilaiTabelKategori = array(

                'jenis_barang'  => $this->input->post('jenis_barang'),
                'status'        => $this->input->post('status')
            );


            // query update
            $this->db->where('id_kategori', $id_kategori);
            $this->db->update('kategori', $nilaiTabelKategori);


             // pesan 
            $htmlPesan = '<div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <p style="margin: 0px"><i class="icon fas fa-check"></i> Pemberitahuan !</p>
                                <small>Data berhasil diperbarui pada '.date('d F Y H.i A').'.</small>
                            </div>';
            $this->session->set_flashdata('pesan', $htmlPesan);


            // kembali 
            redirect('C_kategoribarang/index');

        }
    
    }
    
    /* End of file M_kategoribarang.php */
    