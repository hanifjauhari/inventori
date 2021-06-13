<!-- Karena sudah ada template header footer, langsung copas kontennya -->
<?php

$kolom = $pelaporanclient->row_array();
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pelaporan Client</h1>
                    <p>Deskripsi menu . . . .</p>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-md-6 offset-3">

                    <form action="<?php echo site_url('C_pelaporanclient/prosesupdate/' . $kolom['id_pelaporan']) ?>" method="POST" enctype="multipart/form-data">
                        <div class="card card-body">

                            <h4>Form Edit Pelaporan Client</h4>

                            <div class="form-group">

                                <label>Keterangan</label>
                                <input type="text" class="form-control" name="keterangan" required="" value="<?php echo $kolom['keterangan'] ?>">
                            </div>

                            <div class="form-group">
                                <label> tanggal</label>
                                <input type="date" class="form-control" name="tanggal" required="" value="<?php echo $kolom['tanggal'] ?>">
                                <small> tanggal </small>
                            </div>

                            <div class="form-group">
                                <label>foto</label>
                                <input type="file" class="form-control" name="foto">
                                <small>Masukkan Foto Permasalahan | Foto sebelumnya : <?php echo $kolom['foto'] ?></small>
                                <input type="hidden" name="foto_sebelumnya" value="<?php echo $kolom['foto'] ?>">
                            </div>

                            <input type="hidden" name="status" value="pengajuan" value="<?php echo $kolom['status'] ?>">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Simpan Pelaporan Client</button>
                            </div>

                        </div>
                    </form>
                </div>


            </div>

        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->