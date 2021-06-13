<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_pelaporanclient extends CI_Model
{

    function __construct()
    {

        parent::__construct();
    }


    // fungsi tampil kategori barang
    function getDataPelaporanclient()
    {

        $query = "SELECT * FROM pelaporan";
        $hasil = $this->db->query($query);

        return $hasil;
    }


    // fungsi tampil kategori barang berdasarkan id_kategori
    function getDataPelaporanById_pelaporan($id_pelaporan)
    {



        $query = "SELECT * FROM `pelaporan` WHERE id_pelaporan = '$id_pelaporan'";
        $hasil = $this->db->query($query);

        return $hasil;
    }






    // fungsi proses tambah 
    function insertPelaporan()
    {

        // 1
        $foto = "";

        // 2
        $config['upload_path']          = './assets/dist/img/fotoperbaikan/'; //3
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = 3000; // 3 mb


        // 4
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto')) {
            // upload error 

            // $javascript = '<script>alert("'.$this->upload->display_errors().'")</script>';
            // $this->session->set_flashdata('pesan', $javascript);

            redirect('C_pelaporanclient/tambah');
        } else {

            // apabila upload berhasil atau sesuai dengan ketentuan
            $foto = $this->upload->data('file_name');
        }
        // sebut kolom dan nilai
        $nilaiTabelPelaporan = array(

            'keterangan'  => $this->input->post('keterangan'),
            'tanggal'  => $this->input->post('tanggal'),
            'foto'  => $foto,
            'status'  => $this->input->post('status')

        );

        // query insert
        $this->db->insert('pelaporan', $nilaiTabelPelaporan);


        // pesan 
        $htmlPesan = '<div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <p style="margin: 0px"><i class="icon fas fa-check"></i> Pemberitahuan !</p>
                                <small>Data telah disimpan.</small>
                            </div>';
        $this->session->set_flashdata('pesan', $htmlPesan);

        // kembali ke halaman utama
        redirect('C_pelaporanclient/index');
    }





    // fungsi proses hapus
    function deletePelaporan($id_pelaporan)
    {


        // Menghapus kategori barang yang memiliki id = variabel x
        // $this->db->where(    bagian A , bagian B    );

        /**
         * 
         *  @param bagianA = merupakan nama kolom yang ada di tabel. ex id_kategori, nama, status
         *  @param bagianB = merupakan nilai dari kolomnya. ex. 1, 2, 3, 4
         */

        // eksekusi query 

        $this->db->where('id_pelaporan', $id_pelaporan);
        $this->db->delete('pelaporan');


        // pesan 
        $htmlPesan = '<div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <p style="margin: 0px"><i class="icon fas fa-check"></i> Pemberitahuan !</p>
                                <small>Data berhasil dihapus pada ' . date('d F Y H.i A') . '.</small>
                            </div>';
        $this->session->set_flashdata('pesan', $htmlPesan);


        // kembali 
        redirect('C_pelaporanclient/index');
    }



    function updatePelaporan($id_pelaporan)
    {
        // 1
        $foto = "";

        // 2
        $config['upload_path']          = './assets/dist/img/fotoperbaikan/'; //3
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = 3000; // 3 mb


        // 4
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('foto')) {
            // upload error 

            // $javascript = '<script>alert("'.$this->upload->display_errors().'")</script>';
            // $this->session->set_flashdata('pesan', $javascript);

            // redirect('C_pelaporanclient/tambah');
            $foto = $this->upload->data('file_name');
        }

        if ($foto == NULL) {
            $nilaiTabelPelaporan = array(

                'keterangan'  => $this->input->post('keterangan'),
                'tanggal'  => $this->input->post('tanggal'),
                'foto'  => $this->input->post('foto_sebelumnya'),
                'status'  => $this->input->post('status')
            );
        } else {
            $nilaiTabelPelaporan = array(
                'keterangan'  => $this->input->post('keterangan'),
                'tanggal'  => $this->input->post('tanggal'),
                'foto'  => $foto,
                'status'  => $this->input->post('status')
            );
        }


        // query update
        $this->db->where('id_pelaporan', $id_pelaporan);
        $this->db->update('pelaporan', $nilaiTabelPelaporan);


        // pesan 
        $htmlPesan = '<div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <p style="margin: 0px"><i class="icon fas fa-check"></i> Pemberitahuan !</p>
                            <small>Data berhasil diperbarui pada ' . date('d F Y H.i A') . '.</small>
                        </div>';
        $this->session->set_flashdata('pesan', $htmlPesan);


        // kembali 
        redirect('C_pelaporanclient/index');
    }
}
    
    /* End of file M_kategoribarang.php */
