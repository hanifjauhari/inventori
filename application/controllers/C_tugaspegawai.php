<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_tugaspegawai extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        if (empty($this->session->userdata('sess_id_profile'))) {


            $this->session->set_flashdata('pesan', "harap login terlebih dahulu");
            // arahkan 
            redirect('login/index');
        }


        // load model
        $this->load->model('M_penjadwalan');
    }

    public function index()
    {

        $data = array(
            'title' => 'Halaman Data Distributor Barang',

            'penjadwalan'   => $this->M_penjadwalan->getJadwalBerdasarkanId()
        );
        // Template Header
        $this->load->view('template/header', $data);
        // Load halaman utama
        $this->load->view('pegawai/pegawaitugas');
        // Template Footer
        $this->load->view('template/footer');

        // print_r( $data['penjadwalan']->result_array() );
    }




    function verifikasiTugas($id_penjadwalan_infoclient)
    {

        $this->M_penjadwalan->verifikasiTugas($id_penjadwalan_infoclient);
    }





    // export pdf
    function exportjadwalPDF()
    {


        $penjadwalan = $this->M_penjadwalan->getJadwalBerdasarkanId();
        $filter = $this->input->get('status');

        $dataBaru = array();
        if ($penjadwalan->num_rows() > 0) {

            foreach ($penjadwalan->result_array() as $row) {


                if ($filter == $row['status']) {

                    array_push($dataBaru, $row);
                } else if ($filter == "all" || empty($filter)) { // tidak melakukan filter

                    array_push($dataBaru, $row);
                }
            }
        }


        $sub_header = "";
        $specific = false;



        // header attribute
        $name_file = 'JADWAL TUGAS' . rand(1, 999999) . '-' . date('Y-m-d');
        $pdf = $this->header_attr($name_file);

        // add a page
        $pdf->AddPage('L', 'A4');


        // Sub header
        // $pdf->Ln(5, false);
        $html = '<table border="0">
            <tr>
            <br><br>
                <td align="center"><h2>LAPORAN JADWAL PENUGASAN</h2></td>
            
            </tr>
    
        
        </table>';

        $pdf->writeHTML($html, true, false, true, false, '');
        $pdf->Ln(5, false);


        // table body
        $table_body = "";
        $i = 0;
        foreach ($dataBaru as $row) {

            $label = "";
            $terselesaikan = "-";
            $tgl_diselesaikan = "";

            if ($row['status'] == "proses") {

                $label = "warning";
            } else {

                $label = "success";
                $terselesaikan = $row['username'];
                $tgl_diselesaikan = '<small style="font-weight: bold"> | ' . date('l d F Y H.i A', strtotime($row['diperbarui_pada'])) . '</small>';
            }


            $table_body .= '<tr>
                <td>' . date('d F Y', strtotime($row['tanggal_pembuatan'])) . ' | kode : ' . $row['kode_jadwal'] . '<br>"<small>' . $row['permasalahan'] . '</small>"</td>
                <td>
                    ' . $row['alamat'] . '<br> <small>Customer : <label style="font-weight: bold">' . $row['nama'] . '</label></small>
                </td>
                <td>
                    <small>Diselesaikan Oleh : </small><br>
                    <label style="font-weight: bold">' . ucfirst($terselesaikan) . '</label>
                </td>
                <td>
                    <small>Status Terkini : </small> <br>
                    <label for="" >' . ucfirst($row['status']) . '</label>
                    ' . $tgl_diselesaikan . '
                </td>
            </tr>';

            $i++;
        }



        // header table
        $table = '
            <table border="1" width="100%" cellpadding="6">
                <tr>
                    <th width="20%" align="center"><b>Tanggal</b></th>
                    <th width="50%" align="center"><b>Info Pelanggan</b></th>
                    <th width="30%" colspan="2" align="center"><b>Status Pengerjaan</b></th>
            
                </tr>
                ' . $table_body . '
            </table>';

        $pdf->writeHTML($table, true, false, true, false, '');



        $pdf->Ln(10, false);

        // output
        $pdf->Output($name_file . '.pdf', 'I');
    }




    // header attr
    function header_attr($title)
    {

        // create new PDF document
        $pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Dwi Nur Cahyo');
        $pdf->SetTitle($title);
        // $pdf->SetSubject('TCPDF Tutorial');
        // $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

        // set default header data
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' 006', PDF_HEADER_STRING);

        // set header and footer fonts
        $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

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
        if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
            require_once(dirname(__FILE__) . '/lang/eng.php');
            $pdf->setLanguageArray($l);
        }

        // ---------------------------------------------------------

        // set font
        $pdf->SetFont('times', '', 10);

        return $pdf;
    }
}
