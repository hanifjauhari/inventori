<!-- Karena sudah ada template header footer, langsung copas kontennya -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Data Barang</h1>
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

                    <form action="<?php echo site_url('C_databarang/prosestambah') ?>" method="POST" enctype="multipart/form-data">
                        <div class="card card-body">    

                            <?php echo $this->session->flashdata('pesan') ?>

                            <h4>Form Tambah Data Barang</h4>


                            <div class="form-group">
                                <label for="">Kategori</label>
                                <select name="id_kategori" id="" class="form-control" required="">
                                    <?php foreach( $kategori->result_array() AS $kolom ) : ?>
                                    
                                    <option value="<?php echo $kolom['id_kategori'] ?>"><?php echo $kolom['jenis_barang'] ?></option>
                                    
                                    <?php endforeach; ?>
                                </select>
                            </div>
                             

                            <div class="form-group">

                                <label>Nama Barang</label>
                                <input type="text" class="form-control" name="nama_barang" required="">
                                <small>Masukkan Nama Barang</small>
                            </div>

                            <div class="form-group">

                                <label>harga</label>
                                <input type="text" class="form-control" name="harga" required="">
                                <small>Masukkan Harga Barang</small>
                            </div>

                            <div class="form-group">

                                <label>qty</label>
                                <input type="text" class="form-control" name="qty" required="">
                                <small>Masukkan jumlah barang</small>
                            </div>



                            <div class="form-group">

                                <label>Status</label>
                                <!-- radio -->
                                <div class="form-group">
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="customRadio1" name="status_barang" value="dijual" checked>
                                        <label for="customRadio1" class="custom-control-label">Dijual</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="customRadio2" name="status_barang" value="disimpan">
                                        <label for="customRadio2" class="custom-control-label">Disimpan</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">

                                <label>deskripsi</label>
                                <input type="text" class="form-control" name="deskripsi" required="">
                                <small>Masukkan deskripsi barang</small>
                            </div>

                            <div class="form-group">

                                <label>foto</label>
                                <input type="file" class="form-control" name="foto" required="">
                                <small>Masukkan foto</small>
                            </div>

                            <div class="form-group">

                                <?php

                                    $prefix = "";
                                    $nilai  = "";
                                    $digit  = "";
                                    $output_kode = "-";


                                    // cek apakah kode barang ada ? 
                                    if ( $kode_barang->num_rows() > 0 ) {

                                        $kolom = $kode_barang->row_array();
                                        
                                        
                                        // isi nilai
                                        $prefix = $kolom['prefix'];
                                        $nilai  = $kolom['nilai'];
                                        $digit  = $kolom['digit'];

                                        $output_kode = $prefix.''.sprintf("%0". $digit.'s', $nilai);
                                    }
                                    


                                ?>

                                <label>kode_barang</label>
                                <input type="text" class="form-control" name="kode_barang" value="<?php echo $output_kode ?>" required="">
                                <small>Masukkan kode barang</small>
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