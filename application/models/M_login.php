<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_login extends CI_Model
{


    function pencocokanDataLogin($username, $password)
    {
        // opsi 1
        // $sql = "SELECT * FROM `profile` WHERE username = '$username'";
        // $ambilDataProfile = $this->db->query( $sql );

        // @TODO 6 : Pencocokan akun

        // @TODO 6.1 : Pengecekan apakah username terdaftar
        $where = ['username' => $username];
        $ambilDataProfile = $this->db->get_where('profile', $where);


        // cek dari todo 6.1
        if ($ambilDataProfile->num_rows() == 1) {

            $kolom = $ambilDataProfile->row_array();

            // @TODO 6.2 : pencocokan password
            if ($password == $kolom['password']) {

                // pembuatan session

                $this->session->set_userdata('sess_id_profile', $kolom['id_profile']);
                $this->session->set_userdata('sess_username', $kolom['username']);
                $this->session->set_userdata('sess_level', $kolom['level']);

                // end pembuatan session
                if ($kolom['level'] == "superadmin") {

                    redirect('C_dashboard/index');
                } else if ($kolom['level'] == "admin") {

                    redirect('C_datapegawai');
                } else if ($kolom['level'] == "client") {

                    redirect('C_dashboarduser');
                }

                // password == 123 | password salah
                // 123 == 123 | password sama login berhasil

                // echo "Login berhasil, username dan password anda benar";



            } else {


                // @TODO 8 : step 8 dengan output (password salah)

                $this->session->set_flashdata('pesan', "Password yang anda masukkan salah");
                redirect('login/index');
            }
        } else {


            // @TODO 8 : Username tidak cocok maka selesai
            $this->session->set_flashdata('pesan', "Akun tidak terdaftar");
            redirect('login/index');

            // echo "Akun tidak terdaftar / username tidak ditemukan";
        }
    }
}
    
    /* End of file M_login.php */
