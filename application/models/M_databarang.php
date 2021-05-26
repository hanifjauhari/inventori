<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_databarang extends CI_Model
{

    function __construct()
    {

        parent::__construct();
    }

    function getDataBarang() {

        $query = "SELECT * FROM barang";
        $hasil = $this->db->query( $query );

        return $hasil;
    }


    // fungsi tampil kategori barang berdasarkan id_kategori
    function getDataBarangById_barang( $id_barang ) {



        $query = "SELECT * FROM `barang` WHERE id_barang = '$id_barang'";
        $hasil = $this->db->query( $query );

        return $hasil;
        
        
    }



    // tampilkan data barang secara spesifik
    function getDataBarangSpesifik( $id_barangs ) {

        // SELECT * FROM barang WHERE id_barang IN('id A', 'id B')

        $this->db->where_in( 'id_barang', $id_barangs );
        $hasil = $this->db->get('barang');

        return $hasil;
    }


    // fungsi proses tambah 
    function insertDataBarang()
    {

        // 1
        $foto = "";

        // 2
        $config['upload_path']          = './assets/dist/img/barang/'; //3
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = 3000; // 3 mb


        // 4
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('foto')) {
            // upload error 
            
            $javascript = '<script>alert("'.$this->upload->display_errors().'")</script>';
            $this->session->set_flashdata('pesan', $javascript);

            redirect('C_databarang/tambah');
        } else {

            // apabila upload berhasil atau sesuai dengan ketentuan
            $foto = $this->upload->data('file_name');
        }


        // - - - - - - - - - - - - - - - - - - - - - - - - - - - -

        // sebut kolom dan nilai
        $nilaiTabelDataBarang = array(

            'id_kategori'          => $this->input->post('id_kategori'),
            'nama_barang'          => $this->input->post('nama_barang'),
            'harga'                => $this->input->post('harga'),
            'qty'                  => $this->input->post('qty'),
            'status_barang'        => $this->input->post('status_barang'),
            'deskripsi'            => $this->input->post('deskripsi'),
            'foto'                 => $foto,
            'kode_barang'          => $this->input->post('kode_barang')
        );

        // query insert
        $this->db->insert('barang', $nilaiTabelDataBarang);


        // pesan 
        $htmlPesan = '<div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <p style="margin: 0px"><i class="icon fas fa-check"></i> Pemberitahuan !</p>
                                <small>Data telah disimpan.</small>
                            </div>';
        $this->session->set_flashdata('pesan', $htmlPesan);






        // pembaruan kode barang
        $getKodeBarang = $this->db->get('pengaturan_kodebarang')->row_array();
        $dataKodeBarang = array('nilai' => $getKodeBarang['nilai'] + 1);

        $this->db->where('id_kode', $getKodeBarang['id_kode'])->update('pengaturan_kodebarang', $dataKodeBarang);






        // kembali ke halaman utama
        redirect('C_databarang/index');
    }
    function deleteDataBarang( $id_barang ) {


        // Menghapus kategori barang yang memiliki id = variabel x
        // $this->db->where(    bagian A , bagian B    );
        
        /**
         * 
         *  @param bagianA = merupakan nama kolom yang ada di tabel. ex id_kategori, nama, status
         *  @param bagianB = merupakan nilai dari kolomnya. ex. 1, 2, 3, 4
         */

        // eksekusi query 
        
        $this->db->where('id_barang', $id_barang);
        $this->db->delete('barang');


        // pesan 
        $htmlPesan = '<div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <p style="margin: 0px"><i class="icon fas fa-check"></i> Pemberitahuan !</p>
                            <small>Data berhasil dihapus pada '.date('d F Y H.i A').'.</small>
                        </div>';
        $this->session->set_flashdata('pesan', $htmlPesan);


        // kembali 
        redirect('C_databarang/index');
    }
    


    function updateDataBarang( $id_barang ) {

        // get data barang
        $dataBarang = $this->db->get_where('barang', ['id_barang' => $id_barang])->row_array();

        // 1
        $foto = "";

        // 2
        $config['upload_path']          = './assets/dist/img/barang/'; //3
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = 3000; // 3 mb


        // 4
        $this->load->library('upload', $config);

        // apakah user melakukan upload foto baru ? 
        if ( $_FILES['foto']['name'] ) {

            // cek ekstensi, ukuran, lokasi path
            if ( ! $this->upload->do_upload('foto')) {
                // upload error 
                
                $javascript = '<script>alert("'.$this->upload->display_errors().'")</script>';
                $this->session->set_flashdata('pesan', $javascript);
    
                redirect('C_databarang/edit/'. $id_barang);
            } else {
    
                // apabila upload berhasil atau sesuai dengan ketentuan
                $foto = $this->upload->data('file_name');
            }
        } else {

            $foto = $dataBarang['foto'];
        }
        

        // ---------------------------------------------

        $nilaiTabelBarang = array(

            'nama_barang'          => $this->input->post('nama_barang'),
            'harga'                => $this->input->post('harga'),
            'qty'                  => $this->input->post('qty'),
            'status_barang'        => $this->input->post('status_barang'),
            'deskripsi'            => $this->input->post('deskripsi'),
            'foto'                 => $foto,
            'kode_barang'          => $this->input->post('kode_barang')
        );


        // query update
        $this->db->where('id_barang', $id_barang);
        $this->db->update('barang', $nilaiTabelBarang);


         // pesan 
        $htmlPesan = '<div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <p style="margin: 0px"><i class="icon fas fa-check"></i> Pemberitahuan !</p>
                            <small>Data berhasil diperbarui pada '.date('d F Y H.i A').'.</small>
                        </div>';
        $this->session->set_flashdata('pesan', $htmlPesan);


        // kembali 
        redirect('C_databarang/index');

    }
}
    
    /* End of file M_kategoribarang.php */
