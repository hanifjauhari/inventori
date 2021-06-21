<!-- Karena sudah ada template header footer, langsung copas kontennya -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Pelaporan Customer</h1>
                    <p></p>

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid" style="margin:center;">
            <div class="row">
                <div class="col">
                    <!-- Default box -->

                    <?php echo $this->session->flashdata('pesan') ?>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Table data pelaporan</h3>

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
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Pelaporan</th>
                                        <th>Keterangan</th>
                                        <th>tanggal</th>
                                        <th>status</th>
                                        <th>opsi</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($pelaporan->result_array() as $kolom) :   ?>
                                        <tr>
                                            <th><?php echo $kolom['pelaporan'] ?></th>
                                            <td><?php echo $kolom['keterangan'] ?></td>
                                            <td><?php echo $kolom['tanggal'] ?></td>
                                            <!-- <td><img src="<?php echo base_url('assets/dist/img/fotoperbaikan/' . $kolom['foto']) ?>" alt="" width="30" hight="30"></img></td> -->
                                            <td><?php echo $kolom['status'] ?></td>

                                            <th>

                                                <a class="btn btn-warning btn-sm" href="<?php echo site_url('C_pelaporan/edit/' . $kolom['id_pelaporan']) ?>">edit
                                            </th>

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