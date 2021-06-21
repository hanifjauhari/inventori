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



    // function edit($id_profile)
    // {

    //     $data = array(

    //         'title' => 'Halaman Data Stock Opname ',

    //         // variable data kategori
    //         'stockopname'  => $this->M_stockopname->getStockOpnameById_stockopname($id_profile)
    //     );

    //     // print_r($data['stockopname']->result_array());
    //     $this->load->view('template/header', $data);
    //     $this->load->view('stock_opname/stockopname_edit');
    //     $this->load->view('template/footer');
    // }


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
            'stockopname'  => $this->M_stockopname->getStockOpnameById_stockopname($id_opname)->row_array(),
            'detail'  => $this->M_stockopname->getStockOpnameDetailBarangBy_id_stockopname($id_opname)->result_array(),
            'id_opname'=> $id_opname
        );

        // print_r($data['stockopname']->result_array());
        $this->load->view('template/header', $data);
        $this->load->view('stock_opname/stockopname_detail');
        $this->load->view('template/footer');
    }







    // export pdf
    function exportPDF( $id_opname ) {
        
        $info_opname   = $this->M_stockopname->getStockOpnameById_stockopname($id_opname)->row_array();
        $detail_opname = $this->M_stockopname->getStockOpnameDetailBarangBy_id_stockopname($id_opname)->result_array();


        // header attribute
        $name_file = 'LAPORAN OPNAME '.rand(1, 999999).'-'.date('Y-m-d');
        $pdf = $this->header_attr( $name_file );

        // add a page
        $pdf->AddPage('P', 'A4');


        // Sub header
        // $pdf->Ln(5, false);
        $html = '<table border="0">
            <tr>
            <br><br>
                <td align="center"><h2>LAPORAN OPNAME '. strtoupper($info_opname['tipe_opname']) .'</h2></td>
            </tr>
            <tr><td align="center">Pelaporan Stok Opname dari Perusahaan CV.DWI TUNGGAL ABADI</td></tr>
    
        
        </table>';

        $pdf->writeHTML($html, true, false, true, false, '');
        $pdf->Ln(5, false);



        $subhtml = '<table border="0" width="100%">
            <tr>
            <br><br>
                <td width="20%">Tanggal Pembuatan</td>
                <td>'.date('l, d F Y H.i A', strtotime($info_opname['tanggal'])).'</td>
            </tr>
            <tr>
                <td width="20%">Penanggung Jawab</td>
                <td>'.ucfirst($info_opname['username']).'</td>
            </tr>
    
        
        </table>';

        $pdf->writeHTML($subhtml, true, false, true, false, '');
        $pdf->Ln(5, false);


        // table body
        $table_body = "";

        $no = 1;
        $total = 0;
        foreach( $detail_opname AS $row ) {

            $table_body .= '
                <tr>
                    <td>'.$no.'</td>
                    <td>'.$row['kode_barang'].'</td>
                    <td>'.$row['nama_barang'].'</td>
                    <td>'.$row['stok'].' item</td>
                </tr>
            ';

            $total = $total + $row['stok'];
            $no++;
        }
        
        

        // header table
        $table = '
            <table border="1" width="100%" cellpadding="6">
                <tr>
                    <th width="5%" align="center"><b>No</b></th>
                    <th width="40%" align="center"><b>Kode Barang</b></th>
                    <th width="40%" align="center"><b>Nama Barang</b></th>
                    <th width="15%" align="center"><b>Jumlah</b></th>
                </tr>
                '.$table_body.'
                <tr>
                    <td colspan="3" align="right">Total Permintaan : </td>
                    <td>'.$total.'</td>
                </tr>
            </table>';

        $pdf->writeHTML($table, true, false, true, false, '');



        $pdf->Ln(10, false);

        // output
        $pdf->Output($name_file.'.pdf', 'I');

    }




    // header attr
    function header_attr( $title ) {

        // create new PDF document
        $pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Dwi Nur Cahyo');
        $pdf->SetTitle($title);
        // $pdf->SetSubject('TCPDF Tutorial');
        // $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

        // set default header data
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 006', PDF_HEADER_STRING);

        // set header and footer fonts
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, 35, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
            require_once(dirname(__FILE__).'/lang/eng.php');
            $pdf->setLanguageArray($l);
        }

        // ---------------------------------------------------------

        // set font
        $pdf->SetFont('times', '', 10);

        return $pdf;
    }
}

/* End of file Controllername.php */
