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
                    <h1>Tambah Stock Opname</h1>
                    <p>Deskripsi menu . . . .</p>

                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('C_dashboard/index') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url('C_stockopname/index') ?>">Halaman Utama Stok Opname</a></li>
                        <li class="breadcrumb-item active">Tambah Laporan Opname</li>
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

                    <form action="<?php echo site_url('C_stockopname/tambah_bagian2') ?>" method="GET">

                        <div class="card card-body">

                            <h4>Form Tambah Stock Opname Bagian 1</h4>


                            <div class="form-group">
                                <label> tanggal</label>
                                <input type="date" class="form-control" name="tanggal" required="">
                                <small> tanggal </small>
                            </div>

                            <div class="form-group">
                                <label>Jenis Opname </label>
                                <!-- radio -->
                                <div class="form-group">
                                    <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="customRadio1" name="jenis_opname" value="masuk" checked>
                                    <label for="customRadio1" class="custom-control-label">Stok Masuk</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="customRadio2" name="jenis_opname" value="keluar">
                                    <label for="customRadio2" class="custom-control-label">Stok Keluar</label>
                                    </div>
                                </div>
                                <small>jenis_opname</small>
                            </div>

                            <div class="form-group">
                                <label>penanggung_jawab</label>
                                <input type="text" class="form-control" name="penanggung_jawab" value="<?php echo $this->session->userdata('sess_username') ?>" readonly>
                                <small>penanggung_jawab</small>
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
                                <button type="submit" class="btn btn-primary">Selanjutnya</button>

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