<!-- Karena sudah ada template header footer, langsung copas kontennya -->

<?php

    $kolom = $kategori_barang->row_array();
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sunting Kategori</h1>
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

                    <form action="<?php echo site_url('C_kategoribarang/prosesupdate/'. $kolom['id_kategori']) ?>" method="POST">
                    <div class="card card-body">
                    
                        <h4>Form Sunting Kategori</h4>


                        <div class="form-group">
                        
                            <label>Jenis Barang</label>
                            <input type="text" class="form-control" name="jenis_barang" required="" value="<?php echo $kolom['jenis_barang'] ?>">
                            <small>Masukkan jenis barang</small>
                        </div>



                        <div class="form-group">
                        
                            <label>Status</label>
                            <!-- radio -->
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="customRadio1" 
                                            name="status" value="aktif" <?php if( $kolom['status'] == "aktif" ) echo "checked"; ?>>
                                            
                                    <label for="customRadio1" class="custom-control-label">Aktif</label>
                                </div>
                                <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" 
                                        id="customRadio2" name="status" value="nonaktif" <?php if ( $kolom['status'] == "nonaktif" ) echo "checked" ?>>
                                <label for="customRadio2" class="custom-control-label">Nonaktif</label>
                                </div>
                            </div>
                        </div>



                        <div class="form-group">
                            
                            <button type="submit" class="btn btn-primary">Simpan Jenis Barang</button>
                        
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