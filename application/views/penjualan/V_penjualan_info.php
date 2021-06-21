<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Informasi Penjualan</h1>
                    <p>Hello world !</p>

                    <a href="<?php echo site_url('Transaksi/penjualan_info_tambah') ?>" class="btn btn-primary">Tambah Penjualan Baru</a>
                    <!-- <a href="<?php //echo site_url('C_stockopname/tambah_bagian1') ?>" class="btn btn-danger">Cetak PDF</a> -->

				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Dashboard v1</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<!-- Small boxes (Stat box) -->

            <div class="row  justify-content-center">
                <div class="col-md-10">
                    <!-- Default box -->

                    <?php echo $this->session->flashdata('pesan') ?>


                    <div class="card">

                        <div class="card-body">

                            <table id="active-datatable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Nama Distributor</th>
                                        <th>Pembuat Laporan</th>
                                        <th>Total Tagihan</th>
                                        <th>opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ( $penjualan->result_array() AS $row ) { ?>

                                        <tr>

                                            <td><?php echo date('d F Y', strtotime( $row['tanggal'] )) ?></td>
                                            <td><?php echo $row['nama_distributor'] ?></td>
                                            <td><?php echo $row['username'] ?></td>
                                            <td><?php echo number_format( $row['TOTAL'] ) ?></td>
                                            <td>

                                                <a href="<?php echo base_url('transaksi/detail/'. $row['id_penjualan']) ?>" class="btn btn-xs btn-outline-primary"><i class=""></i>Detail Tagihan</a>
                                                <a href="<?php echo base_url('transaksi/penjualan_hapus/'. $row['id_penjualan']) ?>" class="btn btn-xs btn-outline-secondary" onclick="return confirm('Apakah anda yakin ingin menghapus laporan ini ?')"><i class="fas fa-trash"></i> Hapus Laporan</a>
                                            </td>
                                        
                                        </tr>

                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

			</div>
		</div>
	</section>

</div>
