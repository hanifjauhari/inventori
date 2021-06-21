<!-- Karena sudah ada template header footer, langsung copas kontennya -->


<!-- Bootstrap4 Duallistbox -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css" />

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Rekapan Penjualan</h1>
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

                    <form action="<?php echo site_url('Transaksi/penjualan_info_tambah2') ?>" method="GET">

                        <div class="card card-body">
                            
                            <small>Penanggung Jawab</small>
                            <h4><?php echo ucfirst($this->session->userdata('sess_username')) ?></h4>

                            <hr>

                            <div class="row">
                            
                                <div class="col-md-12">
                                
                                    <div class="form-group">
                                        <label>Kode Tagihan</label>
                                        <input type="text" class="form-control" name="kode" required="">
                                        <small> kode tagihan</small>
                                    </div>
                                
                                </div>
                            
                            </div>
                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label>Tanggal</label>
                                        <input type="date" class="form-control" name="tanggal" required="">
                                        <small> tanggal </small>
                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label>Distributor</label>
                                        <select name="distributor" id="" class="form-control">
                                            <option value="">-- Plih --</option>


                                            <?php foreach ( $transaksi->result_array() AS $row ) { ?>

                                            <option value="<?php echo $row['id_distributor'] ?>"><?php echo $row['nama_distributor'] ?></option>

                                            <?php } ?>
                                        </select>
                                        <small>Pilih penjual atau distributor | <a href="">Tambah Baru</a></small>
                                    </div>        
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Catatan</label>
                                        <textarea name="catatan" class="form-control" placeholder="Masukkan catatan . . ."></textarea>
                                        <small>Masukkan catatan apabila dibutuhkan</small>
                                    </div>        
                                </div>
                            </div>
                            

                            <div class="form-group">
                                <label for="">Barang</label>
                                <select  name="barang[]" class="duallistbox" multiple="multiple">
                                    <?php foreach ( $barang->result_array() AS $kolom ) : ?>
                                    <option value="<?php echo $kolom['id_barang'] ?>"><?php echo $kolom['kode_barang'].' '.$kolom['nama_barang'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>


                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Tambah Informasi Detail</button>

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


<!-- Bootstrap4 Duallistbox -->
<script src="<?php echo base_url() ?>assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<script>


    $(function() {


        //Bootstrap Duallistbox
        $('.duallistbox').bootstrapDualListbox()
    });

</script>