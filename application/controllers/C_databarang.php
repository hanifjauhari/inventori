<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_databarang extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        // cek session
        if ( empty( $this->session->userdata('sess_id_profile') ) ){


            $this->session->set_flashdata('pesan', "harap login terlebih dahulu");
            // arahkan 
            redirect('login/index');
        }

        $this->load->model('M_databarang');
        $this->load->model('M_kategoribarang');
        $this->load->model('M_kodebarang');
    }

    public function index()
    {
        $data = array(
            'title' => 'Halaman Data Barang',
            'data_barang'  => $this->M_databarang->getDataBarang()
        );
        // Template Header
        $this->load->view('template/header', $data);
        // Load halaman utama
        $this->load->view('barang/databarang');
        // Template Footer
        $this->load->view('template/footer');
    }

    public function tambah()
    {

        $data = array(
            'title' => 'Halaman Data Barang',

            'kategori'  => $this->M_kategoribarang->getDataKategori(),
            'kode_barang' => $this->M_kodebarang->getKodeBarang()
        );

        $this->load->view('template/header', $data);
        $this->load->view('barang/databarang_tambah');
        $this->load->view('template/footer');
    }

    function edit( $id_barang ) {

        $data = array(

            'title' => 'Halaman Data Kategori Barang',

            // variable data kategori
            'data_barang'  => $this->M_databarang->getDataBarangById_Barang( $id_barang )
        );

        $this->load->view('template/header', $data);
        $this->load->view('barang/databarang_edit');
        $this->load->view('template/footer');
    }
    function prosestambah()
    {

        $this->M_databarang->insertDataBarang();
    }


    function prosesdelete( $id_barang ) {

        $this->M_databarang->deleteDataBarang( $id_barang );
    }


    // fungsi proses update
    function prosesupdate( $id_barang ) {

        $this->M_databarang->updateDataBarang( $id_barang );
    }






    // export pdf
    function exportPDF() {
            

        $barang = $this->M_databarang->getDataBarang();
        $filter = $this->input->get('status');
        
        $dataBaru = array();
        if ( $barang->num_rows() > 0 ) {

            foreach ( $barang->result_array() AS $row ) {

                array_push( $dataBaru, $row );
            }
        }
        

        $sub_header = "";
        $specific = false;
    


        // header attribute
        $name_file = 'DATA BARANG'.rand(1, 999999).'-'.date('Y-m-d');
        $pdf = $this->header_attr( $name_file );

        // add a page
        $pdf->AddPage('L', 'A4');


        // Sub header
        // $pdf->Ln(5, false);
        $html = '<table border="0">
            <tr>
            <br><br>
                <td align="center"><h2>LAPORAN DATA BARANG</h2></td>
            
            </tr>
    
        
        </table>';

        $pdf->writeHTML($html, true, false, true, false, '');
        $pdf->Ln(5, false);


        // table body
        $table_body = "";

        $no = 1;
        foreach( $barang->result_array() AS $row ) {

            $table_body .= '
                <tr>
                    <td>'.$no.'</td>
                    <td>'.$row['kode_barang'].'</td>
                    <td>'.$row['nama_barang'].'</td>
                    <td>'.number_format($row['harga']).'</td>
                    <td>'.$row['qty'].' item</td>
                    <td>'.$row['status_barang'].'</td>
                </tr>
            ';

            $no++;
        }
        
        

        // header table
        $table = '
            <table border="1" width="100%" cellpadding="6">
                <tr>
                    <th width="5%" align="center"><b>No</b></th>
                    <th width="20%" align="center"><b>Kode Barang</b></th>
                    <th width="20%" align="center"><b>Nama Barang</b></th>
                    <th width="20%" align="center"><b>Harga</b></th>
                    <th width="15%" align="center"><b>Jumlah</b></th>
                    <th width="20%" align="center"><b>Status</b></th>
                </tr>
                '.$table_body.'
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
