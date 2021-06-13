<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_alat extends CI_Model
{

    function __construct()
    {

        parent::__construct();
    }

    function getDataAlat() {

        $query = "SELECT * FROM alat";
        $hasil = $this->db->query( $query );

        return $hasil;
    }


    // fungsi tampil kategori barang berdasarkan id_kategori
    function getDataAlatById_alat( $id_alat ) {



        $query = "SELECT * FROM `alat` WHERE id_alat = '$id_alat'";
        $hasil = $this->db->query( $query );

        return $hasil;
        
        
    }



    // tampilkan data barang secara spesifik
    function getDataAlatSpesifik( $id_alat ) {

        // SELECT * FROM barang WHERE id_barang IN('id A', 'id B')

        $this->db->where_in( 'id_alat', $id_alat );
        $hasil = $this->db->get('alat');

        return $hasil;
    }


    // fungsi proses tambah 
    function insertDataAlat()
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

            redirect('C_alat/tambah');
        } else {

            // apabila upload berhasil atau sesuai dengan ketentuan
            $foto = $this->upload->data('file_name');
        }


        // - - - - - - - - - - - - - - - - - - - - - - - - - - - -

        // sebut kolom dan nilai
        $nilaiTabelDataAlat = array(

            'id_alat'          => $this->input->post('id_alat'),
            'nama_alat'          => $this->input->post('nama_alat'),
            'qty'                  => $this->input->post('qty'),
            'foto'                 => $foto,
            'kode_alat'          => $this->input->post('kode_alat')
        );

        // query insert
        $this->db->insert('alat', $nilaiTabelDataAlat);


        // pesan 
        $htmlPesan = '<div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <p style="margin: 0px"><i class="icon fas fa-check"></i> Pemberitahuan !</p>
                                <small>Data telah disimpan.</small>
                            </div>';
        $this->session->set_flashdata('pesan', $htmlPesan);






        // kembali ke halaman utama
        redirect('C_alat/index');
    }
    function deleteDataAlat( $id_alat ) {


        // Menghapus kategori barang yang memiliki id = variabel x
        // $this->db->where(    bagian A , bagian B    );
        
        /**
         * 
         *  @param bagianA = merupakan nama kolom yang ada di tabel. ex id_kategori, nama, status
         *  @param bagianB = merupakan nilai dari kolomnya. ex. 1, 2, 3, 4
         */

        // eksekusi query 
        
        $this->db->where('id_alat', $id_alat);
        $this->db->delete('alat');


        // pesan 
        $htmlPesan = '<div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <p style="margin: 0px"><i class="icon fas fa-check"></i> Pemberitahuan !</p>
                            <small>Data berhasil dihapus pada '.date('d F Y H.i A').'.</small>
                        </div>';
        $this->session->set_flashdata('pesan', $htmlPesan);


        // kembali 
        redirect('C_alat/index');
    }
    


    function updateDataAlat( $id_alat ) {

        // get data barang
        $dataAlat = $this->db->get_where('alat', ['id_alat' => $id_alat])->row_array();

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
    
                redirect('C_alat/edit/'. $id_alat);
            } else {
    
                // apabila upload berhasil atau sesuai dengan ketentuan
                $foto = $this->upload->data('file_name');
            }
        } else {

            $foto = $dataAlat['foto'];
        }
        

        // ---------------------------------------------

        $nilaiTabelAlat = array(

            'nama_alat'          => $this->input->post('nama_alat'),
            'qty'                  => $this->input->post('qty'),
            'foto'                 => $foto,
            'kode_alat'          => $this->input->post('kode_alat')
        );


        // query update
        $this->db->where('id_alat', $id_alat);
        $this->db->update('alat', $nilaiTabelAlat);


         // pesan 
        $htmlPesan = '<div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <p style="margin: 0px"><i class="icon fas fa-check"></i> Pemberitahuan !</p>
                            <small>Data berhasil diperbarui pada '.date('d F Y H.i A').'.</small>
                        </div>';
        $this->session->set_flashdata('pesan', $htmlPesan);


        // kembali 
        redirect('C_alat/index');

    }
}
    
    /* End of file M_kategoribarang.php */
