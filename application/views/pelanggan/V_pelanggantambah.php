<!-- Karena sudah ada template header footer, langsung copas kontennya -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Data Pelanggan</h1>
                    <p></p>

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

                    <form action="<?php echo site_url('C_pelanggan/prosestambah') ?>" method="POST" enctype="multipart/form-data">
                        <div class="card card-body">

                            <?php echo $this->session->flashdata('pesan') ?>

                            <h4>Form Tambah Data Pelanggan</h4>


                            <div class="form-group">
                                <label>Nama Pelanggan</label>
                                <input type="text" class="form-control" name="nama_pelanggan" required="">
                                <small>Masukkan Nama Pelanggan</small>
                            </div>


                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" required="">
                                <small>Masukkan Email</small>
                            </div>


                            <div class="form-group">
                                <label>NPWP</label>
                                <input type="text" class="form-control" name="npwp" required="">
                                <small>Masukkan NPWP</small>
                            </div>


                            <div class="form-group">
                                <label>Telpon</label>
                                <input type="text" class="form-control" name="telpon" required="">
                                <small>Masukkan Telpon</small>
                            </div>


                            <div class="form-group">
                                <label>Nama Situs Web</label>
                                <input type="text" class="form-control" name="situs_web" required="">
                                <small>Masukkan Situs Web</small>
                            </div>

                            <div class="form-group">
                                <label>Nama Perusahaan</label>
                                <input type="text" class="form-control" name="nama_perusahaan" required="">
                                <small>Masukkan Nama Perusahaan</small>
                            </div>


                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" class="form-control" name="alamat" required="">
                                <small>Masukkan Alamat</small>
                            </div>


                            <div class="form-group">
                                <label>foto</label>
                                <input type="file" class="form-control" name="foto" required="">
                                <small>Masukkan foto</small>
                            </div>


                            <div class="form-group">
                                <label>Status</label>
                                <!-- radio -->
                                <div class="form-group">
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="customRadio1" name="status" value="aktif" checked>
                                        <label for="customRadio1" class="custom-control-label">Aktif</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="customRadio2" name="status" value="nonaktif">
                                        <label for="customRadio2" class="custom-control-label">Nonaktif</label>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">

                                <button type="submit" class="btn btn-primary">Simpan Data Pelanggan</button>

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