<!-- Karena sudah ada template header footer, langsung copas kontennya -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Barang</h1>
                    <p></p>
                    
                    <a href="<?php echo site_url('C_databarang/tambah') ?>" class="btn btn-primary">Tambah Data Barang</a>
                    <a href="<?php echo base_url('C_databarang/exportPDF') ?>" class="btn btn-outline-danger"><i class="fas fa-file-pdf-o"></i>Cetak PDF</a>
                    

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
                            <h3 class="card-title">

                                Table Data Barang
                            </h3>

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
                                        <th>kode barang</th>
                                        <th>foto</th>
                                        <th>Nama Barang</th>
                                        <th>harga</th>
                                        <th>qty</th>
                                        <th>status</th>
                                        <th>opsi</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data_barang->result_array() as $kolom) : ?>
                                        <tr>
                                            <td><?php echo $kolom['kode_barang'] ?></td>
                                            <td><img src="<?php echo base_url('assets/dist/img/barang/' . $kolom['foto']) ?>" alt="" width="30" hight="30"></img></td>
                                            <td><?php echo $kolom['nama_barang'] ?></td>
                                            <td><?php echo number_format($kolom['harga']) ?></td>
                                            <td><?php echo $kolom['qty'] ?></td>
                                            <td><?php echo $kolom['status_barang'] ?></td>
                                            <td width="30%">

                                                <a class="btn btn-danger btn-xs" href="<?php echo site_url('C_databarang/prosesdelete/' . $kolom['id_barang']) ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ? ')">

                                                    Hapus Barang
                                                </a>

                                                <a class="btn btn-warning btn-xs" href="<?php echo site_url('C_databarang/edit/' . $kolom['id_barang']) ?>">

                                                    Sunting
                                                </a>

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