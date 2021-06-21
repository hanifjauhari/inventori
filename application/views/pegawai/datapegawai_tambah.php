<!-- Karena sudah ada template header footer, langsung copas kontennya -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah data pegawai</h1>
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

                    <form action="<?php echo site_url('C_datapegawai/prosestambah') ?>" method="POST" enctype="multipart/form-data">
                        <div class="card card-body">

                            <?php echo $this->session->flashdata('pesan') ?>

                            <h4>Form Tambah data pegawai</h4>


                            <div class="form-group">
                                <label>Nama Pegawai</label>
                                <input type="text" class="form-control" name="nama_pegawai" required="">
                                <small>Masukkan nama pegawai</small>
                            </div>


                            <div class="form-group">

                                <label>Jenis Kelamin</label>
                                <!-- radio -->
                                <div class="form-group">
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="customRadio1" name="gender" value="L" checked>
                                        <label for="customRadio1" class="custom-control-label">Laki Laki</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="customRadio2" name="gender" value="P">
                                        <label for="customRadio2" class="custom-control-label">Perempuan</label>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label>Nomor Telpon</label>
                                <input type="text" class="form-control" name="telp" required="">
                                <small>Masukkan nomor telpon</small>
                            </div>


                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" required="">
                            </div>


                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" class="form-control" name="alamat" required="">
                            </div>

                            <label>Status</label>
                            <!-- radio -->
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="customRadio3" name="status" value="aktif" checked>
                                    <label for="customRadio3" class="custom-control-label">aktif</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="customRadio4" name="status" value="nonaktif">
                                    <label for="customRadio4" class="custom-control-label">non aktif</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>foto</label>
                                <input type="file" class="form-control" name="foto" required="">
                                <small>Masukkan foto</small>
                            </div>
                        
                            <h4>Informasi Akun</h4>

                            <div class="form-group">
                                <label for="">Username</label>
                                <input type="text" name="username" class="form-control" required="" />
                                <small>Berisi username pegawai</small>
                            </div>


                            <div class="form-group">
                                <label for="">Kata sandi</label>
                                <input type="text" name="kata_sandi" class="form-control" required="" />
                                <small>Berisi kata sandi pegawai</small>
                            </div>



                            <div class="form-group">

                                <button type="submit" class="btn btn-primary">Simpan data pegawai</button>

                            </div>

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