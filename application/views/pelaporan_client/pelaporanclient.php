<!-- Karena sudah ada template header footer, langsung copas kontennya -->

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

                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="card card-body">

                            <h4>Form Pelaporan Client</h4>

                            <div class="form-group">

                                <label>Keterangan</label>
                                <input type="text" class="form-control" name="nama_barang" required="">
                            </div>

                            <div class="form-group">
                                <label> tanggal</label>
                                <input type="date" class="form-control" name="tanggal" required="">
                                <small> tanggal </small>
                            </div>


                            <div class="form-group">
                                <label>foto</label>
                                <input type="file" class="form-control" name="foto" required="">
                                <small>Masukkan foto</small>
                            </div>


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