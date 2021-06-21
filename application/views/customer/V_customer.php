<!-- Karena sudah ada template header footer, langsung copas kontennya -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pengaturan Akun</h1>
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

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Table customer</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="active-datatable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>nama</th>
                                        <th>alamat</th>
                                        <th>telpon</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Email</th>
                                        <th>Foto</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Tempat Lahir</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($customer->result_array() as $kolom) : ?>
                                        <tr>

                                            <td width="10%"><?php echo $kolom['nama'] ?></td>
                                            <td width="10%"><?php echo $kolom['alamat'] ?></td>
                                            <td width="10%"><?php echo $kolom['telp'] ?></td>
                                            <td width="10%"><?php echo $kolom['gender'] ?></td>
                                            <td width="10%"><?php echo $kolom['email'] ?></td>
                                            <td width="10%"><?php
                                                            $namaFoto = $kolom['foto'];
                                                            $alamatFoto = base_url('assets/dist/img/customer/' . $namaFoto); ?>
                                                <img src="<?php echo $alamatFoto ?>" alt="<?php echo $namaFoto ?>" style="width: 100px">
                                            </td>

                                            <td width="10%"><?php echo $kolom['tanggal_lahir'] ?></td>
                                            <td width="10%"><?php echo $kolom['tempat_lahir'] ?></td>
                                            <td width="10%">

                                                <a class="btn btn-warning btn-sm" href="<?php echo site_url('C_customer/edit/' . $kolom['id_customer']) ?>">
                                                    Edit
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->