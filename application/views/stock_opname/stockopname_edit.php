<!-- Karena sudah ada template header footer, langsung copas kontennya -->

<?php $kolom = $id_opname->row_array(); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sunting Pengaturan Stock Opname</h1>
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

                    <form action="<?php echo site_url('C_stockopname/prosesupdate/' . $kolom['id_kode']) ?>" method="POST">
                        <div class="card card-body">

                            <h4>Form Sunting Kategori</h4>


                            <div class="form-group">

                                <label>tangal</label>
                                <input type="text" class="form-control" name="tanggal" required="" value="<?php echo $kolom[''] ?>">
                                <small>Masukkan tanggal</small>
                            </div>

                            <div class="form-group">

                                <label>jenis_opname</label>
                                <input type="text" class="form-control" name="jenis_opname" required="" value="<?php echo $kolom['jenis_opname'] ?>">
                                <small>Masukkan jenis_opname</small>
                            </div>

                            <div class="form-group">

                                <label>penanggung_jawab</label>
                                <input type="text" class="form-control" name="jenis_opname" required="" value="<?php echo $kolom['jenis_opname'] ?>">
                                <small>Masukkan jenis opname</small>
                            </div>


                            <div class="form-group">

                                <button type="submit" class="btn btn-primary">Simpan Stockopname</button>

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