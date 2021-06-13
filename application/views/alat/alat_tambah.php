<!-- Karena sudah ada template header footer, langsung copas kontennya -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Data Alat</h1>
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

                    <form action="<?php echo site_url('C_alat/prosestambah') ?>" method="POST" enctype="multipart/form-data">
                        <div class="card card-body">    

                            <?php echo $this->session->flashdata('pesan') ?>

                            <h4>Form Tambah Data Alat</h4>
                             

                            <div class="form-group">

                                <label>Nama Alat</label>
                                <input type="text" class="form-control" name="nama_alat" required="">
                                <small>Masukkan Nama alat</small>
                            </div>

                            <div class="form-group">

                                <label>qty</label>
                                <input type="text" class="form-control" name="qty" required="">
                                <small>Masukkan jumlah Alat</small>
                            </div>


                            <div class="form-group">

                                <label>foto</label>
                                <input type="file" class="form-control" name="foto" required="">
                                <small>Masukkan foto</small>
                            </div>

                            
                            <div class="form-group">

                                <label>Kode Alat</label>
                                <input type="text" class="form-control" name="kode_alat" required="">
                                <small>Masukkan kode alat</small>
                            </div>




                            <div class="form-group">

                                <button type="submit" class="btn btn-primary">Simpan Jenis Data Barang</button>

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