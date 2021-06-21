<!-- Karena sudah ada template header footer, langsung copas kontennya -->

<?php

$kolom = $data_barang->row_array();
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sunting Kategori</h1>
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

                    <form action="<?php echo site_url('C_databarang/prosesupdate/' . $kolom['id_barang']) ?>" method="POST" enctype="multipart/form-data">
                        <div class="card card-body">

                            <h4>Form Sunting Data Barang</h4>


                            <div class="form-group">

                                <label>Nama Barang</label>
                                <input type="text" class="form-control" name="nama_barang" required="" value="<?php echo $kolom['nama_barang'] ?>">
                                <small>Masukkan nama barang</small>
                            </div>

                            <div class="form-group">

                                <label>harga</label>
                                <input type="text" class="form-control" name="harga" required="" value="<?php echo $kolom['harga'] ?>">
                                <small>Masukkan harga barang</small>
                            </div>

                            <div class="form-group">

                                <label>qty</label>
                                <input type="text" class="form-control" name="qty" required="" value="<?php echo $kolom['qty'] ?>">
                                <small>Masukkan qty barang</small>
                            </div>



                            <div class="form-group">
                                <label>Status</label>
                                <!-- radio -->
                                <div class="form-group">
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="customRadio1" name="status_barang" value="disimpan" <?php if ($kolom['status_barang'] == "disimpan") echo "checked"; ?>>
                                        <label for="customRadio1" class="custom-control-label">Disimpan</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="customRadio2" name="status_barang" value="dijual" <?php if ($kolom['status_barang'] == "dijual") echo "checked" ?>>
                                        <label for="customRadio2" class="custom-control-label">dijual</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">

                                <label>deskripsi</label>
                                <input type="text" class="form-control" name="deskripsi" required="" value="<?php echo $kolom['deskripsi'] ?>">
                                <small>Masukkan deskripsi barang</small>
                            </div>

                            <div class="form-group">

                                <label>foto</label>
                                <input type="file" class="form-control" name="foto">
                                <small>Masukkan foto barang | Foto sebelumnya : <?php echo $kolom['foto'] ?></small>
                            </div>

                            <div class="form-group">

                                <label>kode barang</label>
                                <input type="text" class="form-control" name="kode_barang" required="" value="<?php echo $kolom['kode_barang'] ?>">
                                <small>Masukkan kode barang</small>
                            </div>



                            <div class="form-group">

                                <button type="submit" class="btn btn-primary">Simpan Jenis Barang</button>

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