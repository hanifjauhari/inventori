<?php 

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Transaksi extends CI_Controller {
        

        function __construct(){

            parent::__construct();

            // load model
            $this->load->model('M_databarang');
            $this->load->model('M_transaksi');
        }

        function pembelian_info() {

            $data = array(
                'title' => 'Transaksi Pembelian',
                'pembelian' => $this->M_transaksi->model_getdatapembelian()
            );

            // Template Header
            $this->load->view('template/header', $data);
            // Load halaman utama
            $this->load->view('transaksi/V_pembelian_info');
            // Template Footer
            $this->load->view('template/footer');
        }


        //penjualan
        function penjualan_info() {

            $data = array(
                'title' => 'Transaksi Penjualan',
                'penjualan' => $this->M_transaksi->model_getdatapenjualan()
            );

            // Template Header
            $this->load->view('template/header', $data);
            // Load halaman utama
            $this->load->view('transaksi/V_penjualan_info');
            // Template Footer
            $this->load->view('template/footer');
        }




        // pembelian info tambah
        function pembelian_info_tambah() {


            $data = array(
                'title' => 'Transaksi Tambah Pembelian',
                'barang' => $this->M_databarang->getDataBarang(),
                'transaksi' => $this->M_transaksi->getDistributor()
            );

            // Template Header
            $this->load->view('template/header', $data);
            // Load halaman utama
            $this->load->view('transaksi/V_pembelian_tambah');
            // Template Footer
            $this->load->view('template/footer');
        }


        // penjualan info tambah
        function penjualan_info_tambah() {


            $data = array(
                'title' => 'Transaksi Tambah penjualan',
                'barang' => $this->M_databarang->getDataBarang(),
                'transaksi' => $this->M_transaksi->getDistributor()
            );

            // Template Header
            $this->load->view('template/header', $data);
            // Load halaman utama
            $this->load->view('transaksi/V_penjualan_tambah');
            // Template Footer
            $this->load->view('template/footer');
        }



    function pembelian_info_tambah2()
    {

        $id_barang = $this->input->get('barang');

        $data = array(
            'title' => 'Transaksi Tambah Pembelian',
            'barang' => $this->M_databarang->getDataBarangSpesifik($id_barang)
        );

        $this->load->view('template/header', $data);
        $this->load->view('transaksi/V_pembelian_tambah2');
        $this->load->view('template/footer');
    }


    function penjualan_info_tambah2()
    {

        $id_barang = $this->input->get('barang');

        $data = array(
            'title' => 'Transaksi Tambah penjualan',
            'barang' => $this->M_databarang->getDataBarangSpesifik($id_barang)
        );

        $this->load->view('template/header', $data);
        $this->load->view('transaksi/V_penjualan_tambah2');
        $this->load->view('template/footer');
    }




    // simpan pembelian
    function prosessimpanpembelian() {

        $this->M_transaksi->model_prosestambahpembelian();
    }



    // pembelian hapus
    function pembelian_hapus( $id_pembelian ) {

        $this->M_transaksi->model_proseshapuspembelian( $id_pembelian );
    }



    function detail( $id_pembelian ) {


        $data = array(

            'title' => 'Halaman Detail Tagihan ',

            // variable data kategori
            'pembelian'  => $this->M_transaksi->model_getdatapembelianByID($id_pembelian)->row_array(),
            'detail'  => $this->M_transaksi->getPembelianById($id_pembelian)->result_array(),
            'id_pembelian'=> $id_pembelian
        );

        // print_r($data['stockopname']->result_array());
        $this->load->view('template/header', $data);
        $this->load->view('transaksi/V_pembelian_detail');
        $this->load->view('template/footer');
    }


    // simpan penjualan
    function prosessimpanpenjualan() {

        $this->M_transaksi->model_prosestambahpenjualan();
    }



    // penjualan hapus
    function penjualan_hapus( $id_penjualan ) {

        $this->M_transaksi->model_proseshapuspenjualan( $id_penjualan );
    }



    function detailpenjualan( $id_penjualan ) {


        $data = array(

            'title' => 'Halaman Detail Tagihan ',

            // variable data kategori
            'penjualan'  => $this->M_transaksi->model_getdatapenjualanByID($id_penjualan)->row_array(),
            'detail'  => $this->M_transaksi->getPenjualanById($id_penjualan)->result_array(),
            'id_penjualan'=> $id_penjualan
        );

        // print_r($data['stockopname']->result_array());
        $this->load->view('template/header', $data);
        $this->load->view('transaksi/V_penjualan_detail');
        $this->load->view('template/footer');
    }
    
}
    
/* End of file Transaksi.php */
    