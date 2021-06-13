<!-- Karena sudah ada template header footer, langsung copas kontennya -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Data Bank</h1>

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

                    <form action="<?php echo site_url('C_bank/prosestambah') ?>" method="POST">
                        <div class="card card-body">

                            <h4>Form Tambah Data Bank</h4>

                            <div class="section_room_pay">
                                <h5>Nama Bank</h5>
                                <select class="form-control">
                                    <option value="">==Other Banks==</option>
                                    <option value="ALB-NA">BCA</option>
                                    <option value="ADB-NA">BNI</option>
                                    <option value="BBK-NA">MANDIRI</option>
                                    <option value="BBC-NA">BRI</option>
                                    <option value="BBR-NA">CIMB NIAGA</option>
                                </select>
                            </div>

                            <div class="form-group">

                                <label>Cabang Bank</label>
                                <input type="text" class="form-control" name="cabang_bank" required="">
                                <small>Masukkan Cabang Bank</small>
                            </div>

                            <div class="form-group">

                                <label>Atas Nama</label>
                                <input type="text" class="form-control" name="atas_nama" required="">
                                <small>Masukkan Nama </small>
                            </div>


                            <div class="form-group">

                                <label>Status</label>
                                <!-- radio -->
                                <div class="form-group">
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="customRadio1" name="status_bank" value="aktif" checked>
                                        <label for="customRadio1" class="custom-control-label">Aktif</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="customRadio2" name="status_bank" value="nonaktif">
                                        <label for="customRadio2" class="custom-control-label">Nonaktif</label>
                                    </div>
                                </div>
                            </div>



                            <div class="form-group">

                                <button type="submit" class="btn btn-primary">Simpan Alamat</button>

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