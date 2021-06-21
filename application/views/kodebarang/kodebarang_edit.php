<!-- Karena sudah ada template header footer, langsung copas kontennya -->

<?php

    $kolom = $kode_barang->row_array();
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sunting Pengaturan Kode Barang</h1>
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

                    <form action="<?php echo site_url('C_kodebarang/prosesupdate/'. $kolom['id_kode']) ?>" method="POST">
                    <div class="card card-body">
                    
                        <h4>Form Sunting Kategori</h4>


                        <div class="form-group">
                        
                            <label>prefix</label>
                            <input type="text" class="form-control" name="prefix" required="" value="<?php echo $kolom['prefix'] ?>">
                            <small>Masukkan prefix</small>
                        </div>

                        <div class="form-group">
                        
                            <label>nilai</label>
                            <input type="text" class="form-control" name="nilai" required="" value="<?php echo $kolom['nilai'] ?>">
                            <small>Masukkan nilai</small>
                        </div>

                        <div class="form-group">
                        
                            <label>digit</label>
                            <input type="text" class="form-control" name="digit" required="" value="<?php echo $kolom['digit'] ?>">
                            <small>Masukkan digit</small>
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