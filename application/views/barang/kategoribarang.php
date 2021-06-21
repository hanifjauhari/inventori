<!-- Karena sudah ada template header footer, langsung copas kontennya -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>KATEGORI BARANG</h1>
                    <p></p>

                    <a href="<?php echo site_url('C_kategoribarang/tambah') ?>" class="btn btn-primary">Tambah Kategori</a>

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
                            <h3 class="card-title">Table Kategori Barang</h3>

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
                                        <th>Jenis Barang</th>
                                        <th>Status</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($kategori_barang->result_array() as $kolom) : ?>
                                        <tr>
                                            <td><?php echo $kolom['jenis_barang'] ?></td>
                                            <td width="15%"><?php echo $kolom['status'] ?></td>
                                            <td width="30%">
                                                <a class="btn btn-danger btn-xs" href="<?php echo site_url('C_kategoribarang/prosesdelete/' . $kolom['id_kategori']) ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ? ')">

                                                    Hapus Kategori
                                                </a>

                                                <a class="btn btn-warning btn-xs" href="<?php echo site_url('C_kategoribarang/edit/' . $kolom['id_kategori']) ?>">

                                                    Sunting
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