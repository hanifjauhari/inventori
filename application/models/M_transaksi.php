<?php



defined('BASEPATH') or exit('No direct script access allowed');

class M_transaksi extends CI_Model
{


    // get distributor
    function getDistributor()
    {

        return $this->db->get('distributor');
    }




    // get data pembelian 
    function model_getdatapembelian()
    {

        $sql = "SELECT 
            
                    (pembelian_detail.permintaan * barang.harga) AS TOTAL,
                    profile.*, distributor.*, pembelian_info.*, pembelian_detail.*, barang.* FROM pembelian_info 
                    JOIN profile ON profile.id_profile = pembelian_info.id_profile
                    JOIN distributor ON distributor.id_distributor = pembelian_info.id_distributor
                    JOIN pembelian_detail ON pembelian_detail.id_pembelian = pembelian_info.id_pembelian
                    JOIN barang ON barang.id_barang = pembelian_detail.id_barang
                    
                    GROUP BY pembelian_info.id_pembelian
                    ";

        return $this->db->query($sql);
    }



    // get data penjualan 
    function model_getdatapenjualan()
    {

        $sql = "SELECT 
            
                    (penjualan_detail.permintaan * barang.harga) AS TOTAL,
                    profile.*, distributor.*, penjualan_info.*, penjualan_detail.*, barang.* FROM penjualan_info 
                    JOIN profile ON profile.id_profile = penjualan_info.id_profile
                    JOIN distributor ON distributor.id_distributor = penjualan_info.id_distributor
                    JOIN penjualan_detail ON penjualan_detail.id_penjualan = penjualan_info.id_penjualan
                    JOIN barang ON barang.id_barang = penjualan_detail.id_barang
                    
                    GROUP BY penjualan_info.id_penjualan
                    ";

        return $this->db->query($sql);
    }


    function model_getdatapembelianByID($id_pembelian)
    {

        $sql = "SELECT 
            
                    (pembelian_detail.permintaan * barang.harga) AS TOTAL,
                    profile.*, distributor.*, pembelian_info.*, pembelian_detail.*, barang.* FROM pembelian_info 
                    JOIN profile ON profile.id_profile = pembelian_info.id_profile
                    JOIN distributor ON distributor.id_distributor = pembelian_info.id_distributor
                    JOIN pembelian_detail ON pembelian_detail.id_pembelian = pembelian_info.id_pembelian
                    JOIN barang ON barang.id_barang = pembelian_detail.id_barang
                    
                    WHERE pembelian_info.id_pembelian = '$id_pembelian'
                    GROUP BY pembelian_info.id_pembelian";

        return $this->db->query($sql);
    }


    function model_getdatapenjualanByID($id_penjualan)
    {

        $sql = "SELECT 
            
                    (penjualan_detail.permintaan * barang.harga) AS TOTAL,
                    profile.*, distributor.*, penjualan_info.*, penjualan_detail.*, barang.* FROM penjualan_info 
                    JOIN profile ON profile.id_profile = penjualan_info.id_profile
                    JOIN distributor ON distributor.id_distributor = penjualan_info.id_distributor
                    JOIN penjualan_detail ON penjualan_detail.id_penjualan = penjualan_info.id_penjualan
                    JOIN barang ON barang.id_barang = penjualan_detail.id_barang
                    
                    WHERE penjualan_info.id_penjualan = '$id_penjualan'
                    GROUP BY penjualan_info.id_penjualan";

        return $this->db->query($sql);
    }


    function getPembelianById($id_pembelian)
    {

        $query = "SELECT pembelian_detail.*, barang.* FROM pembelian_detail
                      JOIN barang ON barang.id_barang = pembelian_detail.id_barang 
                      
                      WHERE pembelian_detail.id_pembelian = '$id_pembelian'";

        $hasil = $this->db->query($query);
        return $hasil;
    }


    function getPenjualanById($id_penjualan)
    {

        $query = "SELECT penjualan_detail.*, barang.* FROM penjualan_detail
                      JOIN barang ON barang.id_barang = penjualan_detail.id_barang 
                      
                      WHERE penjualan_detail.id_penjualan = '$id_penjualan'";

        $hasil = $this->db->query($query);
        return $hasil;
    }



    function model_prosestambahpembelian()
    {

        $data = array(

            'id_profile'    => $this->session->userdata('sess_id_profile'),
            'id_distributor' => $this->input->post('distributor'),
            'kode_tagihan'  => $this->input->post('kode'),
            'catatan'       => $this->input->post('catatan'),
            'tanggal'       => $this->input->post('tanggal'),
        );

        $this->db->insert('pembelian_info', $data);
        $id_terakhir = $this->db->insert_id();


        $barang = array();
        $id_barang = $this->input->post('id_barang');
        $qty    = $this->input->post('qty');

        for ($i = 0; $i < count($id_barang); $i++) {

            array_push($barang, array(

                'id_pembelian'  => $id_terakhir,
                'id_barang'     => $id_barang[$i],
                'permintaan'    => $qty[$i]
            ));





            $where = ['id_barang' => $id_barang[$i]];
            $dataBarang = $this->db->get_where('barang', $where)->row_array();

            $jumlahStokGudang = $dataBarang['qty'];
            $jumlahStokPermintaan = $qty[$i];

            $totalStok = $jumlahStokGudang + $jumlahStokPermintaan;

            // update stok barang
            $this->db->where($where)->update('barang', ['qty' => $totalStok]);
        }

        $this->db->insert_batch('pembelian_detail', $barang);

        // flashdata
        $html = '<div class="alert alert-success">
                Pemberitahuan 
                <small>Menambah laporan pembelian berhasil ditambahkan pada ' . date('d F Y H.i A') . '</small>
            </div>';

        $this->session->set_flashdata('pesan', $html);
        redirect('transaksi/pembelian_info');
    }



    function model_prosestambahpenjualan()
    {

        $data = array(

            'id_profile'    => $this->session->userdata('sess_id_profile'),
            'id_distributor' => $this->input->post('distributor'),
            'kode_tagihan'  => $this->input->post('kode'),
            'catatan'       => $this->input->post('catatan'),
            'tanggal'       => $this->input->post('tanggal'),
        );

        $this->db->insert('penjualan_info', $data);
        $id_terakhir = $this->db->insert_id();


        $barang = array();
        $id_barang = $this->input->post('id_barang');
        $qty    = $this->input->post('qty');

        for ($i = 0; $i < count($id_barang); $i++) {

            array_push($barang, array(

                'id_penjualan'  => $id_terakhir,
                'id_barang'     => $id_barang[$i],
                'permintaan'    => $qty[$i]
            ));





            $where = ['id_barang' => $id_barang[$i]];
            $dataBarang = $this->db->get_where('barang', $where)->row_array();

            $jumlahStokGudang = $dataBarang['qty'];
            $jumlahStokPermintaan = $qty[$i];

            $totalStok = $jumlahStokGudang + $jumlahStokPermintaan;

            // update stok barang
            $this->db->where($where)->update('barang', ['qty' => $totalStok]);
        }

        $this->db->insert_batch('penjualan_detail', $barang);

        // flashdata
        $html = '<div class="alert alert-success">
                Pemberitahuan 
                <small>Menambah laporan penjualan berhasil ditambahkan pada ' . date('d F Y H.i A') . '</small>
            </div>';

        $this->session->set_flashdata('pesan', $html);
        redirect('transaksi/penjualan_info');
    }




    function model_proseshapuspembelian($id_pembelian)
    {

        // kondisi
        $where = "WHERE id_pembelian='$id_pembelian'";

        // query opname
        $query_opname = "SELECT * FROM pembelian_info " . $where;

        // penggabungan antara detail dengan barang 
        $query_opname_detail = "SELECT pembelian_detail.*, barang.* FROM pembelian_detail 
                JOIN barang ON barang.id_barang = pembelian_detail.id_barang " . $where;

        // eksekusi query data 
        $getDataOpname = $this->db->query($query_opname)->row_array();
        $getDataOpname_detail = $this->db->query($query_opname_detail);


        // mengembalikan stok yang telah dikurangi
        if ($getDataOpname_detail->num_rows() > 0) {

            foreach ($getDataOpname_detail->result_array() as $kolom) {


                $stok_barang_terkini = $kolom['qty'];
                $stok_jumlah_opname  = $kolom['permintaan'];

                $pembaruan_stok = $stok_barang_terkini - $stok_jumlah_opname;


                // update
                $dataPemulihanBarang = array(

                    'qty'   => $pembaruan_stok
                );

                $this->db->where('id_barang', $kolom['id_barang']);
                $this->db->update('barang', $dataPemulihanBarang);
            }
        }


        // eksekusi delete :: child (opname_detail);
        $this->db->where('id_pembelian', $id_pembelian)->delete('pembelian_detail');

        // eksekusi delete :: parent (opname);
        $this->db->where('id_pembelian', $id_pembelian)->delete('pembelian_info');

        // redirect
        redirect('Transaksi/pembelian_info');
    }


    function model_proseshapuspenjualan($id_penjualan)
    {

        // kondisi
        $where = "WHERE id_penjualan='$id_penjualan'";

        // query opname
        $query_opname = "SELECT * FROM penjualan_info " . $where;

        // penggabungan antara detail dengan barang 
        $query_opname_detail = "SELECT penjualan_detail.*, barang.* FROM penjualan_detail 
                JOIN barang ON barang.id_barang = penjualan_detail.id_barang " . $where;

        // eksekusi query data 
        $getDataOpname = $this->db->query($query_opname)->row_array();
        $getDataOpname_detail = $this->db->query($query_opname_detail);


        // mengembalikan stok yang telah dikurangi
        if ($getDataOpname_detail->num_rows() > 0) {

            foreach ($getDataOpname_detail->result_array() as $kolom) {


                $stok_barang_terkini = $kolom['qty'];
                $stok_jumlah_opname  = $kolom['permintaan'];

                $pembaruan_stok = $stok_barang_terkini - $stok_jumlah_opname;


                // update
                $dataPemulihanBarang = array(

                    'qty'   => $pembaruan_stok
                );

                $this->db->where('id_barang', $kolom['id_barang']);
                $this->db->update('barang', $dataPemulihanBarang);
            }
        }


        // eksekusi delete :: child (opname_detail);
        $this->db->where('id_penjualan', $id_penjualan)->delete('penjualan_detail');

        // eksekusi delete :: parent (opname);
        $this->db->where('id_penjualan', $id_penjualan)->delete('penjualan_info');

        // redirect
        redirect('Transaksi/penjualan_info');
    }
}
    
    /* End of file M_transaksi.php */
