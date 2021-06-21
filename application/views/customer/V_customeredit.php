<!-- Karena sudah ada template header footer, langsung copas kontennya -->

<?php

$kolom = $customer->row_array();
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sunting customer</h1>
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

                    <form action="<?php echo site_url('C_customer/prosesupdate/' . $kolom['id_customer']) ?>" method="POST" enctype="multipart/form-data">
                        <div class="card card-body">

                            <h4>Form Sunting Data customer</h4>


                            <div class="form-group">
                                <label>Nama customer</label>
                                <input type="text" class="form-control" name="namar" required="" value="<?php echo $kolom['nama'] ?>">
                                <small>Masukkan Nama customer</small>
                            </div>


                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" class="form-control" name="alamat" required="" value="<?php echo $kolom['alamat'] ?>">
                                <small>Masukkan Alamat</small>
                            </div>


                            <div class="form-group">
                                <label>Telpon</label>
                                <input type="text" class="form-control" name="telp" required="" value="<?php echo $kolom['telp'] ?>">
                                <small>Masukkan Telpon</small>
                            </div>



                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <!-- radio -->
                                <div class="form-group">
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="customRadio1" name="gender" value="L" <?php if ($kolom['gender'] == "L") echo "checked"; ?>>
                                        <label for="customRadio1" class="custom-control-label">Laki-Laki</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="customRadio2" name="gender" value="P" <?php if ($kolom['gender'] == "P") echo "checked" ?>>
                                        <label for="customRadio2" class="custom-control-label">Perempuan</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" required="" value="<?php echo $kolom['alamat'] ?>">
                                <small>Masukkan Alamat</small>
                            </div>

                            <div class="form-group">

                                <label>foto</label>
                                <input type="file" class="form-control" name="foto">
                                <small>Masukkan foto barang | Foto sebelumnya : <?php echo $kolom['foto'] ?></small>
                            </div>

                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input type="text" class="form-control" name="alamat" required="" value="<?php echo $kolom['tanggal_lahir'] ?>">
                                <small>Masukkan Tanggal Lahir</small>
                            </div>

                            <div class="form-group">
                                <label>Tempat Lahir</label>
                                <input type="text" class="form-control" name="tempat_lahir" required="" value="<?php echo $kolom['tempat_lahir'] ?>">
                                <small>Masukkan Tempat Lahir</small>
                            </div>




                            <div class="form-group">

                                <button type="submit" class="btn btn-primary">Simpan customer</button>

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