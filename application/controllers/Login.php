<?php

/** 
 *  ToDo List : Login
 *  1. Menampilkan halaman login 
 *  2. Input username dan password (lokasi ada di view)
 *  3. kirim data username dan password (view -> controller) :: prosesLogin
 *  4. Menerima username dan password
 *  5. Mengirim data user dan pass ke model 
 *  6. Mencocokan data apakah terdaftar atau password salah (dengan query)
 *      6.1 cek apakah username terdaftar
 *          - return jika terdaftar maka lanjut ke step 6.2
 *          - return jika tidak terdaftar ke step 8 dengan output (tidak terdaftar)
 * 
 *      6.2 cek apakah password benar ? 
 *          - return jika benar maka ke step 8 dengan output (login berhasil)
 *          - return jika salah maka ke step 8 dengan output (password salah)
 * 
 *  7. Pesan 
 *  8. Selesai
 */

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    // constructor
    function __construct()
    {

        parent::__construct();

        // load model 
        $this->load->model('M_login');
    }


    public function index()
    {

        // @TODO 1 : Halaman Login
        $this->load->view('login/V_login');
    }


    public function index1()
    {
        $this->load->view('login/login1');
    }
    // @TODO 3 : Mengirim data dari view ke controller (username dan password)
    function prosesLogin()
    {

        // @TODO 4 : Menerima username dan password
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        // @TODO 5 : Mengirimkan user dan pass ke model
        $this->M_login->pencocokanDataLogin($username, $password);
    }
    function prosesRegistrasi()
    {

        // @TODO 4 : Menerima username dan password
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        // @TODO 5 : Mengirimkan user dan pass ke model
        $this->M_login->pencocokanDataLogin($username, $password);
    }


    function hapussesi()
    {
        // menghapus semua sesi yang tersimpan
        $this->session->sess_destroy();

        redirect('login/index');
    }

    function testing()
    {

        echo "Oke test";
        print_r($this->session->userdata());
    }
}
    
    /* End of file Login.php */
