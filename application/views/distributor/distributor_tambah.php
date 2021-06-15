<!-- Karena sudah ada template header footer, langsung copas kontennya -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Data Distributor</h1>

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

                    <form action="<?php echo site_url('C_distributor/prosestambah') ?>" method="POST">
                        <div class="card card-body">

                            <h4>Form Tambah Data Distributor</h4>

                            <div class="form-group">

                                <label>Nama Distributor</label>
                                <input type="text" class="form-control" name="nama_distributor" required="">
                                <small>Masukkan Nama Distributor</small>
                            </div>

                            <div class="form-group">

                                <label>Email</label>
                                <input type="text" class="form-control" name="email" required="">
                                <small>Masukkan Email</small>
                            </div>

                            <div class="form-group">

                                <label>Telpon</label>
                                <input type="text" class="form-control" name="telpon" required="">
                                <small>Masukkan Nomer Telpon</small>
                            </div>




                            <div class="form-group">

                                <button type="submit" class="btn btn-primary">Simpan Distributor</button>

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