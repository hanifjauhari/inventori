<!-- Karena sudah ada template header footer, langsung copas kontennya -->
<!-- Bootstrap4 Duallistbox -->
<link rel="stylesheet" href="<?php echo base_url() ?>/assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css" />

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

                            <h4>Form Tambah Faktur</h4>


                            <div class="form-group">

                                <label>Nama Penjual</label>
                                <input type="text" class="form-control" name="nama_distributor" required="">
                                <small>Masukkan Nama Distributor</small>
                            </div>

                            <div class="form-group">

                                <label>Tanggal</label>
                                <input type="date" class="form-control" name="tanggal" required="">
                                <small>Masukkan Tanggal Faktur</small>
                            </div>


                            <div class="form-group">

                                <label>Nomor Faktur</label>
                                <input type="text" class="form-control" name="nomor_faktur" required="">
                                <small>Masukkan Nomor Faktur</small>
                            </div>

                            <div class="form-group">
                                <label for="">Barang</label>
                                <select name="barang[]" class="duallistbox" multiple="multiple">
                                    <option value="8">CCTV-cvcfw103 CCTV Camera Panasonic K?EF134L01E</option>
                                    <option value="11">CCTV-cvcfw101l cctv-camera-panasonic-cvcfw103l</option>
                                    <option value="14">prefix007 cctv jos 1</option>
                                </select>
                            </div>

                            <div class="form-group">

                                <label>Jumlah</label>
                                <input type="text" class="form-control" name="jumlah" required="">
                                <small>Jumlah</small>
                            </div>

                            <div class="form-group">

                                <label>Harga</label>
                                <input type="text" class="form-control" name="harga" required="">
                                <small>Harga</small>
                            </div>

                            <div class="form-group">

                                <label>Catatan</label>
                                <input type="text" class="form-control" name="catatan" required="">
                                <small>Catatan</small>
                            </div>

                            <div class="form-group">

                                <label>foto</label>
                                <input type="file" class="form-control" name="foto" required="">
                                <small>Masukkan foto</small>
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

<script src="<?php echo base_url() ?>/assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<script>
    $(function() {


        //Bootstrap Duallistbox
        $('.duallistbox').bootstrapDualListbox()
    });
</script>