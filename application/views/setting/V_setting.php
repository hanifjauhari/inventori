<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ganti Password</h1>
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

                    <?php echo $this->session->flashdata('msg') ?>

                    <form action="<?php echo base_url('controlerloginuser/C_setting/prosesubahpassword') ?>" method="POST" enctype="multipart/form-data">
                        <div class="card card-body">

                            <h4>Form Akun Pengguna</h4>

                            <div class="form-group">

                                <label>Kata Sandi Lama</label>
                                <input type="password" class="form-control" name="old_password" placeholder="masukkan kata sandi lama" required="">
                            </div>

                            <div class="form-group">

                                <label>Kata Sandi Baru</label>
                                <input type="password" class="form-control" name="new_password" placeholder="masukkan kata sandi baru" required="">
                            </div>


                            <div class="form-group">

                                <button type="submit" class="btn btn-sm btn-primary">Simpan Perubahan</button>
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