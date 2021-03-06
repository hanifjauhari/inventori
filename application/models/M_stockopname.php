<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_stockopname  extends CI_Model
{

    function __construct()
    {

        parent::__construct();
    }


    //FUungsi tampil kodebarang
    function getStockOpname()
    {
        $query = "SELECT opname.*, profile.* FROM opname JOIN profile ON profile.id_profile = opname.id_profile";
        $hasil = $this->db->query($query);
        return $hasil;
    }

    function getStockOpnameById_stockopname($id_profile)
    {



        $query = "SELECT * FROM `opname` WHERE id_profile = '$id_profile'";
        $hasil = $this->db->query($query);

        return $hasil;
    }



    // fungsi proses tambah 
    function insertStockOpname()
    {

        $tipe_opname = $this->input->post('jenis_opname');

        // sebut kolom dan nilai
        $nilaiTabelStockOpname = array(

            'tanggal'       => $this->input->post('tanggal'),
            'tipe_opname'   => $tipe_opname,
            'id_profile'    => $this->session->userdata('sess_id_profile')
        );

        // query insert
        $this->db->insert('opname', $nilaiTabelStockOpname);
        $last_id = $this->db->insert_id();


        // nilai tabel stok opname detail
        $nilaiTabelStockOpnameDetail = array();
        $id_barang  = $this->input->post('id_barang');
        $qty        = $this->input->post('qty');

        for ($i = 0; $i < count($id_barang); $i++) {

            $where = ['id_barang' => $id_barang[$i]];
            $dataBarang = $this->db->get_where('barang', $where)->row_array();

            $jumlahStokGudang = $dataBarang['qty'];
            $jumlahStokPermintaan = $qty[$i];

            $totalStok = 0;
            if ($tipe_opname == "masuk") {

                $totalStok = $jumlahStokGudang + $jumlahStokPermintaan;
            } else {

                $totalStok = $jumlahStokGudang - $jumlahStokPermintaan;
            }

            // update stok barang
            $this->db->where($where)->update('barang', ['qty' => $totalStok]);



            array_push($nilaiTabelStockOpnameDetail, array(

                'id_opname' => $last_id,
                'id_barang' => $id_barang[$i],
                'stok'      => $qty[$i]
            ));
        }

        $this->db->insert_batch('opname_detail', $nilaiTabelStockOpnameDetail);



        // pesan 
        $htmlPesan = '<div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">??</button>
                                <p style="margin: 0px"><i class="icon fas fa-check"></i> Pemberitahuan !</p>
                                <small>Data telah disimpan.</small>
                            </div>';
        $this->session->set_flashdata('pesan', $htmlPesan);

        // kembali ke halaman utama
        redirect('C_stockopname/index');
    }
}
    
    /* End of file M_kategoribarang.php */
