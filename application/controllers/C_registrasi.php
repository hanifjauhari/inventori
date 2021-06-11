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

class C_registrasi extends CI_Controller
{

    // constructor
    function __construct()
    {

        parent::__construct();

        // load model 
        $this->load->model('M_registrasi');
    }


    public function index()
    {
        $data = array('title' => 'Halaman Utama');
        // @TODO 1 : Halaman Login
        $this->load->view('dashboarduser/headerdashboarduser', $data);
        $this->load->view('login/registrasi',$data);
    }
    function prosestambah()
    {
        $this->M_registrasi->prosesRegistrasi();
    }
}
    
    /* End of file Login.php */
