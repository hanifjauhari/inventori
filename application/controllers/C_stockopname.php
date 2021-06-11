<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_stockopname extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        if (empty($this->session->userdata('sess_id_profile'))) {


            $this->session->set_flashdata('pesan', "harap login terlebih dahulu");
            // arahkan 
            redirect('login/index');
        }

        $this->load->model('M_stockopname');
        $this->load->model('M_databarang');
    }

    public function index()
    {
        $data = array(
            'title' => 'Halaman Stock Opname',
            'stockopname' => $this->M_stockopname->getStockOpname()
        );
        // Template Header
        $this->load->view('template/header', $data);
        // Load halaman utama
        $this->load->view('stock_opname/stockopname');
        // Template Footer
        $this->load->view('template/footer');
    }

    public function tambah_bagian1()
    {

        $data = array(
            'title' => 'Halaman Stock Opname ',
            'barang' => $this->M_databarang->getDataBarang()
        );

        $this->load->view('template/header', $data);
        $this->load->view('stock_opname/stockopname_tambah_bag1');
        $this->load->view('template/footer');
    }

    // 
    function tambah_bagian2()
    {

        $id_barang = $this->input->get('barang');

        $data = array(
            'title' => 'Halaman Stock Opname ',
            'barang' => $this->M_databarang->getDataBarangSpesifik($id_barang)
        );

        $this->load->view('template/header', $data);
        $this->load->view('stock_opname/stockopname_tambah_bag2');
        $this->load->view('template/footer');
    }



    // proses simpan opname
    function prosessimpanopname()
    {

        $this->M_stockopname->insertStockOpname();
    }



    function edit($id_profile)
    {

        $data = array(

            'title' => 'Halaman Data Stock Opname ',

            // variable data kategori
            'stockopname'  => $this->M_stockopname->getStockOpnameById_stockopname($id_profile)
        );

        // print_r($data['stockopname']->result_array());
        $this->load->view('template/header', $data);
        $this->load->view('stock_opname/stockopname_edit');
        $this->load->view('template/footer');
    }


    function prosestambah()
    {
        $this->M_kodebarang->insertKodebarang();
    }

    function prosesdelete($id_kode)
    {

        $this->M_stockopname->deleteStockOpname($id_kode);
    }


    // fungsi proses update
    function prosesupdate($id_kode)
    {

        $this->M_stockopname->updateStockOpname($id_kode);
    }




    function detail( $id_opname ) {

        $data = array(

            'title' => 'Halaman Detail Stock Opname ',

            // variable data kategori
            // 'stockopname'  => $this->M_stockopname->getStockOpnameById_stockopname($id_profile)
        );

        // print_r($data['stockopname']->result_array());
        $this->load->view('template/header', $data);
        $this->load->view('stock_opname/stockopname_detail');
        $this->load->view('template/footer');
    }
}

/* End of file Controllername.php */
