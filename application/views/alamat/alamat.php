<!-- Karena sudah ada template header footer, langsung copas kontennya -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>ALAMAT</h1>
                    <p>Deskripsi menu . . . .</p>

                    <a href="<?php echo site_url('C_alamat/tambah') ?>" class="btn btn-primary">Tambah Alamat</a>

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

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Table Alamat</h3>

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
                                        <th>Lokasi</th>
                                        <th>Status</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($alamat->result_array() as $kolom) : ?>
                                        <tr>
                                            <td><?php echo $kolom['lokasi'] ?></td>
                                            <td width="15%"><?php echo $kolom['status'] ?></td>
                                            <td width="30%">
                                                <a class="btn btn-danger btn-xs" href="<?php echo site_url('C_alamat/prosesdelete/' . $kolom['id_alamat']) ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ? ')">

                                                    Hapus
                                                </a>

                                                <a class="btn btn-warning btn-xs" href="<?php echo site_url('C_alamat/edit/' . $kolom['id_alamat']) ?>">

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