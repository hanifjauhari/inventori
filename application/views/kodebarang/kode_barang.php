<!-- Karena sudah ada template header footer, langsung copas kontennya -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>KODE BARANG</h1>
                    <p>Deskripsi menu . . . .</p>

                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Layout</a></li>
                        <li class="breadcrumb-item active">Fixed Navbar Layout</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <!-- Default box -->

                    <?php echo $this->session->flashdata('pesan') ?>


                    <?php

                    $prefix = "";
                    $nilai  = "";
                    $digit  = "";
                    $output_kode = "-";


                    // cek apakah kode barang ada ? 
                    if ($kode_barang->num_rows() > 0) {

                        $kolom = $kode_barang->row_array();


                        // isi nilai
                        $prefix = $kolom['prefix'];
                        $nilai  = $kolom['nilai'];
                        $digit  = $kolom['digit'];

                        $output_kode = $prefix . '' . sprintf("%0" . $digit . 's', $nilai);
                    }



                    ?>

                    <div class="card">

                        <div class="card-body">
                            <table id="active-datatable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>prefix</th>
                                        <th>nilai</th>
                                        <th>digit</th>
                                        <th>opsi</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($kode_barang->result_array() as $kolom) : ?>
                                        <tr>
                                            <td width="10%"><?php echo $kolom['prefix'] ?></td>
                                            <td><?php echo $kolom['nilai'] ?></td>
                                            <td><?php echo $kolom['digit'] ?></td>
                                            <td width="30%">
                                                <a class="btn btn-danger btn-xs" href="<?php echo site_url('C_kodebarang/prosesdelete/' . $kolom['id_kode']) ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ? ')">

                                                    Hapus Kode Barang
                                                </a>

                                                <a class="btn btn-warning btn-xs" href="<?php echo site_url('C_kodebarang/edit/' . $kolom['id_kode']) ?>">

                                                    Sunting
                                                </a>
                                            </td>



                                        </tr>
                                    <?php endforeach;   ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->