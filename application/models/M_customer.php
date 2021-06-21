<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_customer extends CI_Model
{

    function __construct()
    {

        parent::__construct();
    }


    // fungsi tampil kategori barang
    function getCustomer()
    {

        $id_profile = $this->session->userdata('sess_id_profile');
        $query = "SELECT * FROM customer WHERE id_profile = '$id_profile'";
        $hasil = $this->db->query($query);

        return $hasil;
    }


    // fungsi tampil kategori barang berdasarkan id_kategori
    function getCustomerById_customer($id_customer)
    {



        $query = "SELECT * FROM `customer` WHERE id_customer = '$id_customer'";
        $hasil = $this->db->query($query);

        return $hasil;
    }






    // fungsi proses tambah 
    function insertCustomer()
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

            redirect('C_customer/tambah');
        } else {

            // apabila upload berhasil atau sesuai dengan ketentuan
            $foto = $this->upload->data('file_name');
        }
        // sebut kolom dan nilai
        $nilaiTabelCustomer = array(
            'nama_customer' => $this->input->post('nama_customer'),
            'alamat' => $this->input->post('alamat'),
            'telp' => $this->input->post('telp'),
            'gender' => $this->input->post('gender'),
            'email' => $this->input->post('email'),
            'foto' => $foto,
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'tempat_lahir' => $this->input->post('tempat_lahir')
        );

        // query insert
        $this->db->insert('customer', $nilaiTabelCustomer);


        // pesan 
        $htmlPesan = '<div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <p style="margin: 0px"><i class="icon fas fa-check"></i> Pemberitahuan !</p>
                                <small>Data telah disimpan.</small>
                            </div>';
        $this->session->set_flashdata('pesan', $htmlPesan);

        // kembali ke halaman utama
        redirect('C_customer/index');
    }





    // fungsi proses hapus
    function deleteCustomer($id_customer)
    {


        // Menghapus kategori barang yang memiliki id = variabel x
        // $this->db->where(    bagian A , bagian B    );

        /**
         * 
         *  @param bagianA = merupakan nama kolom yang ada di tabel. ex id_kategori, nama, status
         *  @param bagianB = merupakan nilai dari kolomnya. ex. 1, 2, 3, 4
         */

        // eksekusi query 

        $this->db->where('id_customer', $id_customer);
        $this->db->delete('customer');


        // pesan 
        $htmlPesan = '<div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <p style="margin: 0px"><i class="icon fas fa-check"></i> Pemberitahuan !</p>
                                <small>Data berhasil dihapus pada ' . date('d F Y H.i A') . '.</small>
                            </div>';
        $this->session->set_flashdata('pesan', $htmlPesan);


        // kembali 
        redirect('C_customer/index');
    }



    function updateCustomer($id_customer)
    {
        $dataCustomer = $this->db->get_where('customer', ['id_customer' => $id_customer])->row_array();

        // 1
        $foto = "";

        // 2
        $config['upload_path']          = './assets/dist/img/customer/'; //3
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

                redirect('C_customer/edit/' . $id_customer);
            } else {

                // apabila upload berhasil atau sesuai dengan ketentuan
                $foto = $this->upload->data('file_name');
            }
        } else {

            $foto = $dataCustomer['foto'];
        }


        // ---------------------------------------------


        $nilaiTabelCustomer = array(
            'nama_customer' => $this->input->post('nama_customer'),
            'alamat' => $this->input->post('alamat'),
            'telp' => $this->input->post('telp'),
            'gender' => $this->input->post('gender'),
            'email' => $this->input->post('email'),
            'foto' => $foto,
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'tempat_lahir' => $this->input->post('tempat_lahir')

        );


        // query update
        $this->db->where('id_customer', $id_customer);
        $this->db->update('customer', $nilaiTabelCustomer);


        // pesan 
        $htmlPesan = '<div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <p style="margin: 0px"><i class="icon fas fa-check"></i> Pemberitahuan !</p>
                            <small>Data berhasil diperbarui pada ' . date('d F Y H.i A') . '.</small>
                        </div>';
        $this->session->set_flashdata('pesan', $htmlPesan);


        // kembali 
        redirect('C_customer/index');
    }
}
    
    /* End of file M_kategoribarang.php */
