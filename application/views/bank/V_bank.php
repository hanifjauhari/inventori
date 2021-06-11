<!-- Karena sudah ada template header footer, langsung copas kontennya -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Data Bank</h1>
                    <a href="<?php echo site_url('C_bank/tambah') ?>" class="btn btn-primary">Tambah Data Bank</a>

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
                <div class="col">
                    <!-- Default box -->

                    <?php echo $this->session->flashdata('pesan') ?>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Table Bank</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="active-datatable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>nama Bank</th>
                                        <th>Cabang Bank</th>
                                        <th>Atas nama</th>
                                        <th>Status Bank</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($bank->result_array() as $kolom) : ?>
                                        <tr>
                                            <td width="15%"><?php echo $kolom['nama_bank'] ?></td>
                                            <td width="15%"><?php echo $kolom['cabang_bank'] ?></td>
                                            <td width="15%"><?php echo $kolom['atas_nama'] ?></td>
                                            <td width="10%"><?php echo $kolom['status_bank'] ?></td>
                                            <td width="10%">
                                                <a class="btn btn-danger btn-xs" href="<?php echo site_url('C_bank/prosesdelete/' . $kolom['id_bank']) ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ? ')">
                                                    Hapus
                                                </a>
                                                <a class="btn btn-warning btn-xs" href="<?php echo site_url('C_bank/edit/' . $kolom['id_bank']) ?>">
                                                    Edit
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->