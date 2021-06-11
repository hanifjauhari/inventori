<!-- Karena sudah ada template header footer, langsung copas kontennya -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Stock Opname</h1>
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

                    <form action="<?php echo site_url('C_stockopname/prosestambah') ?>" method="POST">

                        <div class="card card-body">

                            <h4>Form Tambah Stock Opname</h4>


                            <div class="form-group">
                                <label> tanggal</label>
                                <input type="text" class="form-control" name="tanggal" required="">
                                <small> tanggal </small>
                            </div>

                            <div class="form-group">
                                <label>jenis_opname </label>
                                <input type="text" class="form-control" name="jenis_opname" required="">
                                <small>jenis_opname</small>
                            </div>

                            <div class="form-group">
                                <label>penanggung_jawab</label>
                                <input type="text" class="form-control" name="penanggung_jawab" required="">
                                <small>penanggung_jawab</small>
                            </div>


                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Simpan stockopname</button>

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