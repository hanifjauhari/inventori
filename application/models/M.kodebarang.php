<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_kodebarang extends CI_Model
{

    function __construct()
    {

        parent::__construct();
    }




    // fungsi proses tambah 
    function insertKodebarang()
    {

        // sebut kolom dan nilai
        $nilaiTabelKodeBarang = array(

            'prefix'          => $this->input->post('prefix'),
            'nilai'                => $this->input->post('nilai'),
            'digit'                  => $this->input->post('digit')
        );

        // query insert
        $this->db->insert('pengaturan_kodebarang', $nilaiTabelKodeBarang);


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
}
    
    /* End of file M_kategoribarang.php */
