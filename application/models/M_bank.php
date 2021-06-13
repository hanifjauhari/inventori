<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_bank extends CI_Model
{

    function __construct()
    {

        parent::__construct();
    }


    // fungsi tampil kategori barang
    function getDataBank()
    {

        $query = "SELECT * FROM bank";
        $hasil = $this->db->query($query);

        return $hasil;
    }


    // fungsi tampil kategori barang berdasarkan id_kategori
    function getDataBankById_bank($id_bank)
    {



        $query = "SELECT * FROM `bank` WHERE id_bank = '$id_bank'";
        $hasil = $this->db->query($query);

        return $hasil;
    }






    // fungsi proses tambah 
    function insertBank()
    {

        // sebut kolom dan nilai
        $nilaiTabelBank = array(

            'nama_bank'  => $this->input->post('nama_bank'),
            'cabang_bank'  => $this->input->post('cabang_bank'),
            'atas_nama'  => $this->input->post('atas_nama'),
            'status_bank'  => $this->input->post('status_bank')
        );

        // query insert
        $this->db->insert('bank', $nilaiTabelBank);


        // pesan 
        $htmlPesan = '<div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <p style="margin: 0px"><i class="icon fas fa-check"></i> Pemberitahuan !</p>
                                <small>Data telah disimpan.</small>
                            </div>';
        $this->session->set_flashdata('pesan', $htmlPesan);

        // kembali ke halaman utama
        redirect('C_bank/index');
    }





    // fungsi proses hapus
    function deleteBank($id_bank)
    {


        // Menghapus kategori barang yang memiliki id = variabel x
        // $this->db->where(    bagian A , bagian B    );

        /**
         * 
         *  @param bagianA = merupakan nama kolom yang ada di tabel. ex id_kategori, nama, status
         *  @param bagianB = merupakan nilai dari kolomnya. ex. 1, 2, 3, 4
         */

        // eksekusi query 

        $this->db->where('id_bank', $id_bank);
        $this->db->delete('bank');


        // pesan 
        $htmlPesan = '<div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <p style="margin: 0px"><i class="icon fas fa-check"></i> Pemberitahuan !</p>
                                <small>Data berhasil dihapus pada ' . date('d F Y H.i A') . '.</small>
                            </div>';
        $this->session->set_flashdata('pesan', $htmlPesan);


        // kembali 
        redirect('C_bank/index');
    }



    function updateBank($id_bank)
    {

        $nilaiTabelBank = array(

            'nama_bank'  => $this->input->post('nama_bank'),
            'cabang_bank'  => $this->input->post('cabang_bank'),
            'atas_nama'  => $this->input->post('atas_nama'),
            'status_bank'  => $this->input->post('status_bank')
        );


        // query update
        $this->db->where('id_bank', $id_bank);
        $this->db->update('bank', $nilaiTabelBank);


        // pesan 
        $htmlPesan = '<div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <p style="margin: 0px"><i class="icon fas fa-check"></i> Pemberitahuan !</p>
                            <small>Data berhasil diperbarui pada ' . date('d F Y H.i A') . '.</small>
                        </div>';
        $this->session->set_flashdata('pesan', $htmlPesan);


        // kembali 
        redirect('C_bank/index');
    }
}
    
    /* End of file M_kategoribarang.php */
