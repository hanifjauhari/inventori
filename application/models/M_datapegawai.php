<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_datapegawai extends CI_Model
{

    function __construct()
    {

        parent::__construct();
    }

    //funsi tampil data pegawai
    function getDataPegawai()
    {
        $query = "SELECT * FROM pegawai";
        $hasil = $this->db->query($query);

        return $hasil;
    }
    // fungsi tampil kategori barang berdasarkan id_kategori
    function getDataPegawaiById_kategori($id_pegawai)
    {



        $query = "SELECT * FROM `pegawai` WHERE id_pegawai = '$id_pegawai'";
        $hasil = $this->db->query($query);

        return $hasil;
    }

    //Fungsi data pegawai berdasarkan id_pegawai
    function getDataPegawaiById_pegawai($id_pegawai)
    {
        $query = "SELECT * FROM pegawai WHERE id_pegawai = '$id_pegawai'";
        $hasil = $this->db->query($query);

        return $hasil;
    }




    // fungsi proses tambah 
    function insertDataPegawai()
    {

        //1
        $foto = "";

        //2
        $config['upload_path']          = './assets/dist/img/pegawai/'; //3
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = 3000; // 3 mb4

        // 4
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto')) {
            // upload error 

            $javascript = '<script>alert("' . $this->upload->display_errors() . '")</script>';
            $this->session->set_flashdata('pesan', $javascript);

            redirect('C_datapegawai/tambah');
        } else {

            // apabila upload berhasil atau sesuai dengan ketentuan
            $foto = $this->upload->data('file_name');
        }







        // insert data profile untuk login
        $nilaiTabelAkun = array(

            'username'  => $this->input->post('username'),
            'password'  => $this->input->post('kata_sandi'),
            'level'     => "admin"
        );

        $this->db->insert('profile', $nilaiTabelAkun);
        $id_profile = $this->db->insert_id();




        // sebut kolom dan nilai (insert data pegawai untuk informasi akun)
        $nilaiTabelPegawai = array(

            'id_profile'    => $id_profile,
            'nama_pegawai'  => $this->input->post('nama_pegawai'),
            'gender'        => $this->input->post('gender'),
            'telp'          => $this->input->post('telp'),
            'email'         => $this->input->post('email'),
            'alamat'        => $this->input->post('alamat'),
            'status'        => $this->input->post('status'),
            'foto'          => $foto
        );

        // query insert
        $this->db->insert('pegawai', $nilaiTabelPegawai);


        // pesan 
        $htmlPesan = '<div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <p style="margin: 0px"><i class="icon fas fa-check"></i> Pemberitahuan !</p>
                                <small>Data telah disimpan.</small>
                                </div>';
        $this->session->set_flashdata('pesan', $htmlPesan);

        // kembali ke halaman utama
        redirect('C_datapegawai/index');
    }


    //fungsi proses hapus
    function deleteDataPegawai($id_pegawai)
    {
        //eksekusi query
        $this->db->where('id_pegawai', $id_pegawai);
        $this->db->delete('pegawai');

        // pesan 
        $htmlPesan = '<div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <p style="margin: 0px"><i class="icon fas fa-check"></i> Pemberitahuan !</p>
                        <small>Data Berhasil Dihapus pada' . date('d F Y H. i A') . '.</small>
                        </div>';
        $this->session->set_flashdata('pesan', $htmlPesan);


        //kebali ke menu awal setelah hapus
        redirect('C_datapegawai/index');
    }


    function updateDataPegawai($id_pegawai)
    {

        // get data barang
        $dataPegawai = $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawai])->row_array();
        //1
        $foto = "";

        //2
        $config['upload_path']          = './assets/dist/img/pegawai/'; //3
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = 3000; // 3 mb4

        // 4
        $this->load->library('upload', $config);

        // apakah user melakukan upload foto baru ? 
        if ($_FILES['foto']['name']) {

            // cek ekstensi, ukuran, lokasi path
            if (!$this->upload->do_upload('foto')) {
                // upload error 

                $javascript = '<script>alert("' . $this->upload->display_errors() . '")</script>';
                $this->session->set_flashdata('pesan', $javascript);

                redirect('C_datapegawai/edit/' . $id_pegawai);
            } else {

                // apabila upload berhasil atau sesuai dengan ketentuan
                $foto = $this->upload->data('file_name');
            }
        } else {

            $foto = $dataPegawai['foto'];
        }

//--------------------------------------------------------


        $nilaiTabelPegawai = array(
            'nama_pegawai' => $this->input->post('nama_pegawai'),
            'gender' => $this->input->post('gender'),
            'telp' => $this->input->post('telp'),
            'email' => $this->input->post('email'),
            'alamat' => $this->input->post('alamat'),
            'status' => $this->input->post('status'),
            'foto' => $foto
        );

        //query update
        $this->db->where('id_pegawai', $id_pegawai);
        $this->db->update('pegawai', $nilaiTabelPegawai);

        // pesan 
        $htmlPesan = '<div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <p style="margin: 0px"><i class="icon fas fa-check"></i> Pemberitahuan !</p>
                        <small>Data Berhasil Diperbarui' . date('d F Y H. i A') . '.</small>
                        </div>';
        $this->session->set_flashdata('pesan', $htmlPesan);



        $level = $this->session->userdata('sess_level');
        if ( $level == "superadmin" ) {

            redirect('C_datapegawai/index');
            
        } else {

            redirect('controlerloginuser/C_setting/editakun');
        }

        
    }
}
    
    /* End of file M_kategoribarang.php */
