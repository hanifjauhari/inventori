<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_pelaporan extends CI_Model
{

    function __construct()
    {

        parent::__construct();
    }

    //FUungsi tampil kodebarang
    function getPelaporan()
    {
        $query = "SELECT * FROM pelaporan ";
        $hasil = $this->db->query($query);
        return $hasil;
    }

    function getPelaporanById_pelaporan($id_pelaporan)
    {



        $query = "SELECT * FROM `pelaporan` WHERE id_pelaporan = '$id_pelaporan'";
        $hasil = $this->db->query($query);

        return $hasil;
    }





    // fungsi proses tambah 

    function deletePelaporan($id_pelaporan)
    {


        // Menghapus kategori barang yang memiliki id = variabel x
        // $this->db->where(    bagian A , bagian B    );

        /**
         * 
         *  @param bagianA = merupakan nama kolom yang ada di tabel. ex id_kategori, nama, status
         *  @param bagianB = merupakan nilai dari kolomnya. ex. 1, 2, 3, 4
         */

        // eksekusi query 

        $this->db->where('id_pelaporan', $id_pelaporan);
        $this->db->delete('pelaporan');


        // pesan 
        $htmlPesan = '<div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <p style="margin: 0px"><i class="icon fas fa-check"></i> Pemberitahuan !</p>
                            <small>Data berhasil dihapus pada ' . date('d F Y H.i A') . '.</small>
                        </div>';
        $this->session->set_flashdata('pesan', $htmlPesan);


        // kembali 
        redirect('C_pelaporan/index');
    }

    function updatePelaporan($id_pelaporan)
    {



        $nilaiTabelPelaporan = array(

            'pelaporan'  => $this->input->post('pelaporan'),
            'keterangan' => $this->input->post('keterangan'),
            'tanggal'  => $this->input->post('tanggal'),
            'status'  => $this->input->post('status')
        );


        // query updateketerangan
        $this->db->where('id_pelaporan', $id_pelaporan);
        $this->db->update('pelaporan', $nilaiTabelPelaporan);


        // pesan 
        $htmlPesan = '<div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <p style="margin: 0px"><i class="icon fas fa-check"></i> Pemberitahuan !</p>
                            <small>Data berhasil diperbarui pada ' . date('d F Y H.i A') . '.</small>
                        </div>';
        $this->session->set_flashdata('pesan', $htmlPesan);


        // kembali 
        redirect('C_pelaporan/index');
    }
}
    
    /* End of file M_kategoribarang.php */
