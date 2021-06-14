<!-- Karena sudah ada template header footer, langsung copas kontennya -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Pelanggan</h1>
                    <a href="<?php echo site_url('C_pelanggan/tambah') ?>" class="btn btn-primary">Tambah Data Pelanggan</a>

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
                            <h3 class="card-title">Table Pelanggan</h3>

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
                                        <th>nama Pelanggan</th>
                                        <th>Email</th>
                                        <th>NPWP</th>
                                        <th>Telpon</th>
                                        <th>Situs Web</th>
                                        <th>Nama Perusahaan</th>
                                        <th>Alamat</th>
                                        <th>Foto</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($pelanggan->result_array() as $kolom) : ?>
                                        <tr>
                                            <td width="10%"><?php echo $kolom['nama_pelanggan'] ?></td>
                                            <td width="10%"><?php echo $kolom['email'] ?></td>
                                            <td width="10%"><?php echo $kolom['npwp'] ?></td>
                                            <td width="10%"><?php echo $kolom['telpon'] ?></td>
                                            <td width="10%"><?php echo $kolom['situs_web'] ?></td>
                                            <td width="10%"><?php echo $kolom['nama_perusahaan'] ?></td>
                                            <td width="10%"><?php echo $kolom['alamat'] ?></td>
                                            <td><img src="<?php echo base_url('assets/dist/img/pelanggan/' . $kolom['foto']) ?>" alt="" width="30" hight="30"></img></td>
                                            <td width="10%"><?php echo $kolom['status'] ?></td>
                                            <td width="10%">
                                                <a class="btn btn-danger btn-xs" href="<?php echo site_url('C_pelanggan/prosesdelete/' . $kolom['id_pelanggan']) ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ? ')">
                                                    Hapus
                                                </a>
                                                <a class="btn btn-warning btn-xs" href="<?php echo site_url('C_pelanggan/edit/' . $kolom['id_pelanggan']) ?>">
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