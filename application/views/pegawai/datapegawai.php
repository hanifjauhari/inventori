<!-- Karena sudah ada template header footer, langsung copas kontennya -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data pegawai</h1>
                    <p>data dari pegawai CV Dwi Tunggal Abadi</p>
                    <p></p>

                    <a href="<?php echo site_url('C_datapegawai/tambah') ?>" class="btn btn-primary">Tambah data pegawai</a>

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col">
                    <!-- Default box -->

                    <?php echo $this->session->flashdata('pesan') ?>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Table data pegawai</h3>

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
                                        <th>nama pegawai</th>
                                        <th>gender</th>
                                        <th>telp</th>
                                        <th>email</th>
                                        <th>status</th>
                                        <th>foto</th>
                                        <th>opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data_pegawai->result_array() as $kolom) :   ?>
                                        <tr>
                                            <td width="5%"><?php echo $kolom['nama_pegawai']   ?></td>
                                            <td width="2%"><?php echo $kolom['gender'] ?></td>
                                            <td width="2%"><?php echo $kolom['telp'] ?></td>
                                            <td width="2%"><?php echo $kolom['email'] ?></td>
                                            <td><?php echo $kolom['status'] ?></td>
                                            <td width="5%">

                                                <?php

                                                $namaFoto = $kolom['foto'];
                                                $alamatFoto = base_url('assets/dist/img/pegawai/' . $namaFoto);
                                                ?>

                                                <img src="<?php echo $alamatFoto ?>" alt="<?php echo $namaFoto ?>" style="width: 100px">

                                            </td>
                                            <td>
                                                <a href="<?php echo base_url('C_penjadwalan/index/' . $kolom['id_pegawai']) ?>" class="btn btn-default btn-sm">Atur Jadwal</a>
                                                <a class="btn btn-danger btn-sm" href="<?php echo site_url('C_datapegawai/prosesdelete/' . $kolom['id_pegawai']) ?>" onclick="return confirm('apakah anda ingin menghapus data ini?')">hapus</a>
                                                <a class="btn btn-warning btn-sm" href="<?php echo site_url('C_datapegawai/edit/' . $kolom['id_pegawai']) ?>">edit
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