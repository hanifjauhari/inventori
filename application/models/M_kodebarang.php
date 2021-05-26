<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_kodebarang extends CI_Model
{

    function __construct()
    {

        parent::__construct();
    }

    //FUungsi tampil kodebarang
    function getKodeBarang()
    {
        $query = "SELECT * FROM pengaturan_kodebarang";
        $hasil = $this->db->query($query);
        return $hasil;
    }

    function getKodeBarangById_kodebarang( $id_kode ) {



        $query = "SELECT * FROM `pengaturan_kodebarang` WHERE id_kode = '$id_kode'";
        $hasil = $this->db->query( $query );

        return $hasil;
        
        
    }





    // fungsi proses tambah 
    function insertKodeBarang()
    {

        $cekKodeBarang = $this->db->get('pengaturan_kodebarang');


        // sebut kolom dan nilai
        $nilaiTabelKodeBarang = array(

            'prefix'  => $this->input->post('prefix'),
            'nilai'   => $this->input->post('nilai'),
            'digit'   => $this->input->post('digit')
        );

        // cek apakah kode barang sudah dikonfigurasi
        if ( $cekKodeBarang->num_rows() == 1 ){

            $kolom = $cekKodeBarang->row_array();

            // ubah
            $this->db->where('id_kode', $kolom['id_kode'])->update('pengaturan_kodebarang', $nilaiTabelKodeBarang);
        } else {


            // kode barang belum dikonfigurasi
            $this->db->insert('pengaturan_kodebarang', $nilaiTabelKodeBarang);
        }

        


        // pesan 
        $htmlPesan = '<div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <p style="margin: 0px"><i class="icon fas fa-check"></i> Pemberitahuan !</p>
                                <small>Data telah disimpan.</small>
                            </div>';
        $this->session->set_flashdata('pesan', $htmlPesan);

        // kembali ke halaman utama
        redirect('C_kodebarang/index');
    }

    function deleteKodeBarang( $id_kode ) {


        // Menghapus kategori barang yang memiliki id = variabel x
        // $this->db->where(    bagian A , bagian B    );
        
        /**
         * 
         *  @param bagianA = merupakan nama kolom yang ada di tabel. ex id_kategori, nama, status
         *  @param bagianB = merupakan nilai dari kolomnya. ex. 1, 2, 3, 4
         */

        // eksekusi query 
        
        $this->db->where('id_kode', $id_kode);
        $this->db->delete('pengaturan_kodebarang');


        // pesan 
        $htmlPesan = '<div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <p style="margin: 0px"><i class="icon fas fa-check"></i> Pemberitahuan !</p>
                            <small>Data berhasil dihapus pada '.date('d F Y H.i A').'.</small>
                        </div>';
        $this->session->set_flashdata('pesan', $htmlPesan);


        // kembali 
        redirect('C_kodebarang/index');
    }

    function updateKategoriBarang( $id_kode ) {

        $nilaiTabelKodeBarang = array(

            'prefix'       => $this->input->post('prefix'),
            'nilai'        => $this->input->post('nilai'),
            'digit'        => $this->input->post('digit')
        );


        // query update
        $this->db->where('id_kode', $id_kode);
        $this->db->update('pengaturan_kodebarang', $nilaiTabelKodeBarang);


         // pesan 
        $htmlPesan = '<div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <p style="margin: 0px"><i class="icon fas fa-check"></i> Pemberitahuan !</p>
                            <small>Data berhasil diperbarui pada '.date('d F Y H.i A').'.</small>
                        </div>';
        $this->session->set_flashdata('pesan', $htmlPesan);


        // kembali 
        redirect('C_kodebarang/index');

    }
}
    
    /* End of file M_kategoribarang.php */
