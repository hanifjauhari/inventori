<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_contactus extends CI_Model
{

    function __construct()
    {

        parent::__construct();
    }




    // fungsi proses tambah 
    function insertContactus()
    {

        // sebut kolom dan nilai
        $nilaiTabelContactus = array(

            'nama'          => $this->input->post('nama'),
            'alamat'           => $this->input->post('alamat'),
            'pesan'           => $this->input->post('pesan')
        );

        // query insert
        $this->db->insert('contactus', $nilaiTabelContactus);


        // pesan 
        $htmlPesan = '<div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <p style="margin: 0px"><i class="icon fas fa-check"></i> Pemberitahuan !</p>
                                <small>Data telah disimpan.</small>
                            </div>';
        $this->session->set_flashdata('pesan', $htmlPesan);

        // kembali ke halaman utama
        redirect('C_contactus/index');
    }
}
    
    /* End of file M_kategoribarang.php */
