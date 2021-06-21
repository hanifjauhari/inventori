<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_registrasi   extends CI_Model
{

    function __construct()
    {

        parent::__construct();
    }

    function index()
    {
        $query = "SELECT * FROM profile";
        $hasil = $this->db->query($query);
        return $hasil;
    }




    // fungsi proses tambah 
    function prosesRegistrasi()
    {




        // sebut kolom dan nilai
        $nilaiTabelRegistrasi = array(

            'username'          => $this->input->post('username'),
            'password'          => $this->input->post('password'),
            'level'     => "client"

        );

        // query insert
        $this->db->insert('profile', $nilaiTabelRegistrasi);
        $id_profile_terakhir = $this->db->insert_id();


        $nilaiTabelCustomer = array(

            'id_profile' => $id_profile_terakhir,
            'nama'      => $this->input->post('full_name'),
            'alamat'    => $this->input->post('alamat'),
            'telp'      => $this->input->post('telp'),
            'email'     => $this->input->post('email'),
        );

        $this->db->insert('customer', $nilaiTabelCustomer);


        // pesan 
        $htmlPesan = '<div class="alert alert-success alert-dismissible">
        
                                <p style="margin: 0px"><i class="icon fas fa-check"></i> Pemberitahuan !</p>
                                <small>Terima kasih telah melakukan registrasi.</small>
                            </div>';
        $this->session->set_flashdata('pesan', $htmlPesan);

        // kembali ke halaman utama
        redirect('C_dashboarduser');
    }
}
