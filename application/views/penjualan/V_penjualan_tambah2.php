<!-- Karena sudah ada template header footer, langsung copas kontennya -->

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

                <div class="col-md-8 offset-3">

                    <form action="<?php echo site_url('Transaksi/prosessimpanpenjualan') ?>" method="POST">


                        <input type="hidden" name="tanggal" value="<?php echo $this->input->get('tanggal') ?>">
                        <input type="hidden" name="kode" value="<?php echo $this->input->get('kode') ?>">
                        <input type="hidden" name="distributor" value="<?php echo $this->input->get('distributor') ?>">
                        <input type="hidden" name="catatan" value="<?php echo $this->input->get('catatan') ?>">


                        <div class="card card-body">

                            <h4>Form Tambah Penjualan</h4>


                            <table class="table table-stripe table-hover" border="0">
                            
                                <tbody>
                                    <?php foreach ( $barang->result_array() AS $kolom ) : ?>
                                    <tr>
                                    
                                        <td width="5%">1</td>
                                        <td width="50%">
                                            <small>Informasi barang</small>
                                            <h6><?php echo $kolom['kode_barang'].' - '. $kolom['nama_barang'] ?></h6>
                                        </td>
                                        <td width="20%">Stok Awal <br> <h6> <?php echo $kolom['qty'] ?> Item</h6></td>
                                        <td>
                                            <input type="hidden" name="id_barang[]" value="<?php echo $kolom['id_barang'] ?>" />
                                            <input type="number" name="qty[]" class="form-control" placeholder="jml" required="" style="margin-top: 10px"/>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            


                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Tambahkan dan Simpan</button>

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