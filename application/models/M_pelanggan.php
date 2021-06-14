<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_pelanggan extends CI_Model
{

    function __construct()
    {

        parent::__construct();
    }


    // fungsi tampil kategori barang
    function getPelanggan()
    {

        $query = "SELECT * FROM pelanggan";
        $hasil = $this->db->query($query);

        return $hasil;
    }


    // fungsi tampil kategori barang berdasarkan id_kategori
    function getPelangganById_pelanggan($id_pelanggan)
    {



        $query = "SELECT * FROM `pelanggan` WHERE id_pelanggan = '$id_pelanggan'";
        $hasil = $this->db->query($query);

        return $hasil;
    }






    // fungsi proses tambah 
    function insertPelanggan()
    {
        // 1
        $foto = "";

        // 2
        $config['upload_path']          = './assets/dist/img/pelanggan/'; //3
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = 3000; // 3 mb


        // 4
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto')) {
            // upload error 

            $javascript = '<script>alert("' . $this->upload->display_errors() . '")</script>';
            $this->session->set_flashdata('pesan', $javascript);

            redirect('C_pelanggan/tambah');
        } else {

            // apabila upload berhasil atau sesuai dengan ketentuan
            $foto = $this->upload->data('file_name');
        }

        // sebut kolom dan nilai
        $nilaiTabelPelanggan = array(

            'nama_pelanggan'  => $this->input->post('nama_pelanggan'),
            'email'  => $this->input->post('email'),
            'npwp'  => $this->input->post('npwp'),
            'telpon'  => $this->input->post('telpon'),
            'situs_web'  => $this->input->post('situs_web'),
            'nama_perusahaan'  => $this->input->post('nama_perusahaan'),
            'alamat'  => $this->input->post('alamat'),
            'foto'  => $foto,
            'status'  => $this->input->post('status')
        );

        // query insert
        $this->db->insert('pelanggan', $nilaiTabelPelanggan);


        // pesan 
        $htmlPesan = '<div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <p style="margin: 0px"><i class="icon fas fa-check"></i> Pemberitahuan !</p>
                                <small>Data telah disimpan.</small>
                            </div>';
        $this->session->set_flashdata('pesan', $htmlPesan);

        // kembali ke halaman utama
        redirect('C_pelanggan/index');
    }





    // fungsi proses hapus
    function deletePelanggan($id_pelanggan)
    {


        // Menghapus kategori barang yang memiliki id = variabel x
        // $this->db->where(    bagian A , bagian B    );

        /**
         * 
         *  @param bagianA = merupakan nama kolom yang ada di tabel. ex id_kategori, nama, status
         *  @param bagianB = merupakan nilai dari kolomnya. ex. 1, 2, 3, 4
         */

        // eksekusi query 

        $this->db->where('id_pelanggan', $id_pelanggan);
        $this->db->delete('pelanggan');


        // pesan 
        $htmlPesan = '<div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <p style="margin: 0px"><i class="icon fas fa-check"></i> Pemberitahuan !</p>
                                <small>Data berhasil dihapus pada ' . date('d F Y H.i A') . '.</small>
                            </div>';
        $this->session->set_flashdata('pesan', $htmlPesan);


        // kembali 
        redirect('C_pelanggan/index');
    }



    function updatePelanggan($id_pelanggan)
    {
        $dataPelanggan = $this->db->get_where('pelanggan', ['id_pelanggan' => $id_pelanggan])->row_array();

        // 1
        $foto = "";

        // 2
        $config['upload_path']          = './assets/dist/img/barang/'; //3
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = 3000; // 3 mb


        // 4
        $this->load->library('upload', $config);

        // apakah user melakukan upload foto baru ? 
        if ($_FILES['foto']['name']) {

            // cek ekstensi, ukuran, lokasi path
            if (!$this->upload->do_upload('foto')) {
                // upload error 

                $javascript = '<script>alert("' . $this->upload->display_errors() . '")</script>';
                $this->session->set_flashdata('pesan', $javascript);

                redirect('C_pelanggan/edit/' . $id_pelanggan);
            } else {

                // apabila upload berhasil atau sesuai dengan ketentuan
                $foto = $this->upload->data('file_name');
            }
        } else {

            $foto = $dataPelanggan['foto'];
        }


        // ---------------------------------------------


        $nilaiTabelPelanggan = array(
            'nama_pelanggan'  => $this->input->post('nama_pelanggan'),
            'email'  => $this->input->post('email'),
            'npwp'  => $this->input->post('npwp'),
            'telpon'  => $this->input->post('telpon'),
            'situs_web'  => $this->input->post('situs_web'),
            'nama_perusahaan'  => $this->input->post('nama_perusahaan'),
            'alamat'  => $this->input->post('alamat'),
            'foto'  => $foto,
            'status'  => $this->input->post('status')
        );


        // query update
        $this->db->where('id_pelanggan', $id_pelanggan);
        $this->db->update('pelanggan', $nilaiTabelPelanggan);


        // pesan 
        $htmlPesan = '<div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <p style="margin: 0px"><i class="icon fas fa-check"></i> Pemberitahuan !</p>
                            <small>Data berhasil diperbarui pada ' . date('d F Y H.i A') . '.</small>
                        </div>';
        $this->session->set_flashdata('pesan', $htmlPesan);


        // kembali 
        redirect('C_pelanggan/index');
    }
}
    
    /* End of file M_kategoribarang.php */
