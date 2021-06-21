<!-- Karena sudah ada template header footer, langsung copas kontennya -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>STOCKOPNAME</h1>
                    <p></p>

                    <a href="<?php echo site_url('C_stockopname/tambah_bagian1') ?>" class="btn btn-primary">Tambah StokOpname</a>
                    <a href="<?php //echo site_url('C_stockopname/tambah_bagian1') ?>" class="btn btn-danger">Cetak PDF</a>
                    

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row  justify-content-center">
                <div class="col-md-10">
                    <!-- Default box -->

                    <?php echo $this->session->flashdata('pesan') ?>


                    <div class="card">

                        <div class="card-body">

                            <table id="active-datatable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>tanggal</th>
                                        <th>jenis_opname</th>
                                        <th>penanggung_jawab</th>
                                        <th>opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($stockopname->result_array() as $kolom) : ?>
                                        <tr>
                                            <td width="20%"><?php echo date('d F Y H.i A', strtotime($kolom['tanggal'])) ?></td>
                                            <td><?php echo $kolom['tipe_opname'] ?></td>
                                            <td><?php echo $kolom['username'] ?></td>
                                            <td width="30%">
                                                <a class="btn btn-default btn-xs" href="<?php echo site_url('C_stockopname/detail/' . $kolom['id_opname']) ?>">
                                                    <i class="fas fa-info-circle"></i> Detail Pelaporan
                                                </a>
                                                <a class="btn btn-default btn-xs" href="<?php echo site_url('C_stockopname/prosesdelete/' . $kolom['id_opname']) ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ? ')">
                                                    <i class="fas fa-eraser"></i> Hapus Stockopname
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