<!-- Karena sudah ada template header footer, langsung copas kontennya -->


<?php
$kolom = $pelaporan->row_array();
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah data pelaporan</h1>
                    <p>Deskripsi menu . . . .</p>

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

                <div class="col-md-6 offset-3">

                    <form action="<?php echo site_url('C_pelaporan/prosesupdate/' . $kolom['id_pelaporan']) ?>" method="POST">
                        <div class="card card-body">

                            <h4>Form Edit Data Pelaporan</h4>


                            <div class="form-group">
                                <label>Keterangan</label>
                                <input type="text" class="form-control" name="keterangan" required="" value="<?php echo $kolom['keterangan'] ?>">
                                <small>Masukkan Keterangan</small>
                            </div>

                            <div class="form-group">
                                <label>tanggal</label>
                                <input type="text" class="form-control" name="tanggal" required="" value="<?php echo $kolom['tanggal'] ?>">
                                <small>Masukkan tanggal</small>
                            </div>

                            <div class="form-group">
                                <label>foto</label>
                                <input type="file" class="form-control" name="foto" required="" value="<?php echo $kolom['foto'] ?>">
                                <small>Masukkan foto</small>
                            </div>


                            <div class="form-group">

                                <label>status</label>
                                <!-- radio -->
                                <div class="form-group">
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="customRadio1" name="status" value="pengajuan" <?php if ($kolom['status'] == "pengajuan") echo "checked"; ?>>
                                        <label for="customRadio1" class="custom-control-label">Pengajuan</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="customRadio2" name="status" value="proses" <?php if ($kolom['status'] == "proses") echo "checked"; ?>>
                                        <label for="customRadio2" class="custom-control-label">Proses</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="customRadio2" name="status" value="selesai" <?php if ($kolom['status'] == "selesai") echo "checked"; ?>>
                                        <label for="customRadio2" class="custom-control-label">Selesai</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="customRadio2" name="status" value="tolak" <?php if ($kolom['status'] == "tolak") echo "checked"; ?>>
                                        <label for="customRadio2" class="custom-control-label">Tolak</label>
                                    </div>
                                </div>
                            </div>


                            



                        <div class="form-group">

                            <button type="submit" class="btn btn-primary">Simpan data Pelaporan</button>

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