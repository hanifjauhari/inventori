<!-- Karena sudah ada template header footer, langsung copas kontennya -->

<?php

$kolom = $bank->row_array();
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Alamat</h1>
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

                    <form action="<?php echo site_url('C_bank/prosesupdate/' . $kolom['id_bank']) ?>" method="POST">
                        <div class="card card-body">

                            <h4>Form Edit Alamat</h4>

                            <div class="form-group">
                                <h5>Nama Bank</h5>
                                <select class="form-control" name="nama_bank" required="" value="<?php echo $kolom['nama_bank'] ?>>
                                    <option value="">==Other Banks==</option>
                                    <option value=" BCA">BCA</option>
                                    <option value="BNI">BNI</option>
                                    <option value="MANDIRI">MANDIRI</option>
                                    <option value="BRI">BRI</option>
                                    <option value="CIMB NIAGA">CIMB NIAGA</option>
                                </select>
                                <small>Masukkan Nama Bank </small>
                            </div>

                            <div class="form-group">
                                <h5>Cabang Bank</h5>
                                <input type="text" class="form-control" name="cabang_bank" required="" value="<?php echo $kolom['cabang_bank'] ?>">
                                <small>Masukkan Cabang Bank</small>
                            </div>

                            <div class="form-group">
                                <h5>Atas Nama</h5>
                                <input type="text" class="form-control" name="atas_nama" required="" value="<?php echo $kolom['atas_nama'] ?>">
                                <small>Masukkan nama </small>
                            </div>

                            <div class="form-group">

                                <label>Status</label>
                                <!-- radio -->
                                <div class="form-group">
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="customRadio1" name="status" value="aktif" <?php if ($kolom['status_bank'] == "aktif") echo "checked"; ?>>

                                        <label for="customRadio1" class="custom-control-label">Aktif</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="customRadio2" name="status" value="nonaktif" <?php if ($kolom['status_bank'] == "nonaktif") echo "checked" ?>>
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