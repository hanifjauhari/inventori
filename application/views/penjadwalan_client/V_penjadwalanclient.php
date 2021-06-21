<!-- Karena sudah ada template header footer, langsung copas kontennya -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <!-- <div class="col-sm-6"> -->
                <!-- <h1>Tambah Data Pelaporan Client</h1> -->
                <!-- <a href="<?php echo site_url('C_penjadwalanclient') ?>" class="btn btn-primary">Tambah Data Pelaporan</a> -->
                <!-- </div> -->
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
                            <h3 class="card-title">Table Penjadwalan</h3>

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
                                        <th>Tanggal</th>
                                        <th>Permasalahan</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->