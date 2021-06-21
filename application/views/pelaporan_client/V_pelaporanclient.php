<!-- Karena sudah ada template header footer, langsung copas kontennya -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Data Pelaporan</h1>
                    <p></p>
                    <a href="<?php echo site_url('C_pelaporanclient/tambah') ?>" class="btn btn-primary">Tambah Pelaporan</a>
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
                            <h3 class="card-title">Table Pelaporan</h3>

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
                                        <th>Pelaporan</th>
                                        <th>Keterangan</th>
                                        <th>Tanggal</>
                                        <th>Foto</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($pelaporanclient->result_array() as $kolom) : ?>
                                        <tr>
                                            <td width="15%"><?php echo $kolom['pelaporan'] ?></td>
                                            <td width="15%"><?php echo $kolom['keterangan'] ?></td>
                                            <td width="15%"><?php echo $kolom['tanggal'] ?></td>
                                            <td><img src="<?php echo base_url('assets/dist/img/fotoperbaikan/' . $kolom['foto']) ?>" alt="" width="30" hight="30"></img></td>

                                            <td width="10%"><?php echo $kolom['status'] ?></td>
                                            <td width="10%">
                                                <a class="btn btn-danger btn-xs" href="<?php echo site_url('C_pelaporanclient/prosesdelete/' . $kolom['id_pelaporan']) ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ? ')">
                                                    Hapus
                                                </a>
                                                <a class="btn btn-warning btn-xs" href="<?php echo site_url('C_pelaporanclient/edit/' . $kolom['id_pelaporan']) ?>">
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