<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_customer extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        // // cek session
        // if ( empty( $this->session->userdata('sess_id_profile') ) ){


        //     $this->session->set_flashdata('pesan', "harap login terlebih dahulu");
        //     // arahkan 
        //     redirect('login/index');
        // }

        $this->load->model('M_customer');
    }

    public function index()
    {
        $data = array(
            'title' => 'Halaman Data customer',
            'customer'  => $this->M_customer->getCustomer()
        );
        // Template Header
        $this->load->view('template_user/headeruser', $data);
        // Load halaman utama
        $this->load->view('customer/V_customer');
        // Template Footer
        $this->load->view('template_user/footeruser');
    }


    public function tambah()
    {

        $data = array(
            'title' => 'Halaman Data customer',

            'customer'  => $this->M_customer->getCustomer()
        );
        // Template Header
        $this->load->view('template_user/headeruser', $data);
        // Load halaman utama
        $this->load->view('customer/V_customertambah');
        // Template Footer
        $this->load->view('template_user/footeruser');
    }


    function edit($id_customer)
    {

        $data = array(

            'title' => 'Halaman Data customer',

            // variable data kategori
            'customer'  => $this->M_customer->getCustomerById_Customer($id_customer)
        );

        // Template Header
        $this->load->view('template_user/headeruser', $data);
        // Load halaman utama
        $this->load->view('customer/V_customeredit');
        // Template Footer
        $this->load->view('template_user/footeruser');
    }


    function prosestambah()
    {

        $this->M_customer->insertCustomer();
    }


    function prosesdelete($id_customer)
    {

        $this->M_customer->deleteCustomer($id_customer);
    }


    // fungsi proses update
    function prosesupdate($id_customer)
    {

        $this->M_customer->updateCustomer($id_customer);
    }
}

/* End of file Controllername.php */
