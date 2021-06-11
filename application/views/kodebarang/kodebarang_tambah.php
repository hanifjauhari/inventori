<!-- Karena sudah ada template header footer, langsung copas kontennya -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah kode barang</h1>
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

                    <form action="<?php echo site_url('C_kodebarang/prosestambah') ?>" method="POST">


                        <?php

                            $prefix = "";
                            $nilai  = "";
                            $digit  = "";


                            // cek apakah kode barang ada ? 
                            if ( $kode_barang->num_rows() > 0 ) {

                                $kolom = $kode_barang->row_array();
                                
                                
                                // isi nilai
                                $prefix = $kolom['prefix'];
                                $nilai  = $kolom['nilai'];
                                $digit  = $kolom['digit'];
                            }
                            


                        ?>

                        <div class="card card-body">

                            <h4>Form Tambah kode barang</h4>


                            <div class="form-group">
                                <label> prefix</label>
                                <input type="text" class="form-control" name="prefix" value="<?php echo $prefix ?>" required="">
                                <small> prefix </small>
                            </div>

                            <div class="form-group">
                                <label>nilai </label>
                                <input type="text" class="form-control" name="nilai" value="<?php echo $nilai ?>" required="">
                                <small>nilai</small>
                            </div>

                            <div class="form-group">
                                <label>digit</label>
                                <input type="text" class="form-control" name="digit" value="<?php echo $digit ?>" required="">
                                <small>digit</small>
                            </div>


                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Simpan kode barang</button>

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