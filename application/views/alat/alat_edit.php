<!-- Karena sudah ada template header footer, langsung copas kontennya -->

<?php

$kolom = $data_alat->row_array();
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sunting Data Alat</h1>
                    <p></p>

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-md-6 offset-3">

                    <form action="<?php echo site_url('C_alat/prosesupdate/' . $kolom['id_alat']) ?>" method="POST" enctype="multipart/form-data">
                        <div class="card card-body">

                            <h4>Form Sunting Data Alat</h4>


                            <div class="form-group">

                                <label>Nama Alat</label>
                                <input type="text" class="form-control" name="nama_alat" required="" value="<?php echo $kolom['nama_alat'] ?>">
                                <small>Masukkan nama alat</small>
                            </div>


                            <div class="form-group">

                                <label>qty</label>
                                <input type="text" class="form-control" name="qty" required="" value="<?php echo $kolom['qty'] ?>">
                                <small>Masukkan qty alat</small>
                            </div>

                                                       
                            <div class="form-group">

                                <label>foto</label>
                                <input type="file" class="form-control" name="foto">
                                <small>Masukkan foto barang | Foto sebelumnya : <?php echo $kolom['foto'] ?></small>
                            </div>

                            <div class="form-group">

                                <label>kode barang</label>
                                <input type="text" class="form-control" name="kode_alat" required="" value="<?php echo $kolom['kode_alat'] ?>">
                                <small>Masukkan kode barang</small>
                            </div>



                            <div class="form-group">

                                <button type="submit" class="btn btn-primary">Simpan Alat</button>

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