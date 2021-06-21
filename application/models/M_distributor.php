<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_distributor extends CI_Model
{

    function __construct()
    {

        parent::__construct();
    }


    // fungsi tampil kategori barang
    function getDataDistributor()
    {

        $query = "SELECT * FROM distributor";
        $hasil = $this->db->query($query);

        return $hasil;
    }


    // fungsi tampil kategori barang berdasarkan id_kategori
    function getDataDistributorById_distributor($id_distributor)
    {



        $query = "SELECT * FROM `distributor` WHERE id_distributor = '$id_distributor'";
        $hasil = $this->db->query($query);

        return $hasil;
    }






    // fungsi proses tambah 
    function insertDistributor()
    {

        // sebut kolom dan nilai
        $nilaiTabelDistributor = array(

            'nama_distributor'  => $this->input->post('nama_distributor'),
            'email'  => $this->input->post('email'),
            'telpon'  => $this->input->post('telpon')
            
        );

        // query insert
        $this->db->insert('distributor', $nilaiTabelDistributor);


        // pesan 
        $htmlPesan = '<div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <p style="margin: 0px"><i class="icon fas fa-check"></i> Pemberitahuan !</p>
                                <small>Data telah disimpan.</small>
                            </div>';
        $this->session->set_flashdata('pesan', $htmlPesan);

        // kembali ke halaman utama
        redirect('C_distributor/index');
    }





    // fungsi proses hapus
    function deleteDistributor($id_distributor)
    {


        // Menghapus kategori barang yang memiliki id = variabel x
        // $this->db->where(    bagian A , bagian B    );

        /**
         * 
         *  @param bagianA = merupakan nama kolom yang ada di tabel. ex id_kategori, nama, status
         *  @param bagianB = merupakan nilai dari kolomnya. ex. 1, 2, 3, 4
         */

        // eksekusi query 

        $this->db->where('id_distributor', $id_distributor);
        $this->db->delete('distributor');


        // pesan 
        $htmlPesan = '<div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <p style="margin: 0px"><i class="icon fas fa-check"></i> Pemberitahuan !</p>
                                <small>Data berhasil dihapus pada ' . date('d F Y H.i A') . '.</small>
                            </div>';
        $this->session->set_flashdata('pesan', $htmlPesan);


        // kembali 
        redirect('C_distributor/index');
    }



    function updateDistributor($id_distributor)
    {

        $nilaiTabelDistributor = array(

            'nama_distributor'  => $this->input->post('nama_distributor'),
            'email'  => $this->input->post('email'),
            'telpon'  => $this->input->post('telpon')
            
        );


        // query update
        $this->db->where('id_distributor', $id_distributor);
        $this->db->update('distributor', $nilaiTabelDistributor);


        // pesan 
        $htmlPesan = '<div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <p style="margin: 0px"><i class="icon fas fa-check"></i> Pemberitahuan !</p>
                            <small>Data berhasil diperbarui pada ' . date('d F Y H.i A') . '.</small>
                        </div>';
        $this->session->set_flashdata('pesan', $htmlPesan);


        // kembali 
        redirect('C_distributor/index');
    }
}
    
    /* End of file M_kategoribarang.php */
