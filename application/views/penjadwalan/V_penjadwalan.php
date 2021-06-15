<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Penjadwalan</h1>
					<p>penjadwalan</p>

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

            <div class="row justify-content-center">

                <div class="col-md-10">

                    <?php echo $this->session->flashdata('msg') ?>
                
                    <div class="card card-body">


                        <!-- Keterangan tombol -->
                        <div class="row">

                            <div class="col-md-4">
                                <a href="<?php echo base_url('c_penjadwalan/tambah_jadwal') ?>" class="btn btn-outline-primary">Tambah Info Penjadwalan Baru</a>
                            </div>
                        </div>


                        <!-- Table -->
                        <div class="row">
                            <div class="col-md-12">

                            <hr>
                            <table id="active-datatable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Jadwal ID <br><small>Klik untuk menambahkan client</small></th>
                                        <th>Informasi Pegawai</th>
                                        <th>Status Pengerjaan</th>
                                        <th>Berlaku pada</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php if ( count($penjadwalan) > 0 ) { ?>
                                    
                                    <?php
                                        
                                        $nomor = 1;
                                        foreach ( $penjadwalan AS $row ) : ?>
                                    <tr>
                                    
                                        <td><?php echo $nomor ?></td>
                                        <td>
                                            <a href="<?php echo base_url('C_penjadwalan/client/'. $row['info']['id_penjadwalaninfo']) ?>">
                                                <i class="fas fa-plus"></i> <?php echo $row['info']['kode_jadwal'] ?>
                                            </a>
                                        </td>
                                        <td><?php echo count($row['pegawai']) ?> Pegawai</td>
                                        <td>
                                            
                                            <div class="progress progress-sm">
                                                <?php
                                                
                                                    $colorPro = "";
                                                    if ( $row['persentase'] > 0 && $row['persentase'] <= 40 ) {

                                                        $colorPro = "danger";
                                                    } else if ( $row['persentase'] > 40 && $row['persentase'] <= 99 ) {

                                                        $colorPro = "warning";
                                                    } else {

                                                        $colorPro = "success";
                                                    }
                                                ?>
                                                <div class="progress-bar bg-<?php echo $colorPro ?> progress-bar-striped progress-bar-animated" role="progressbar"
                                                    aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo intval($row['persentase']) ?>%; color: #f5f5f5 !important">
                                                    <?php echo intval($row['persentase']) ?>%
                                                </div>
                                            </div>
                                            <small>Progress Pengerjaan</small>
                                        </td>
                                        <td><?php echo date('l, d M Y', strtotime( $row['info']['tanggal_pembuatan'] )) ?></td>
                                        <td>
                                            <a href="javascript:void(0)" data-toggle="modal" data-target="#modal-batalkan-jadwal-<?php echo $row['info']['id_penjadwalaninfo'] ?>" class="btn btn-xs btn-outline-dark"><i class="fas fa-times"></i> Batalkan Jadwal Ini</a>


                                            <div class="modal fade" id="modal-batalkan-jadwal-<?php echo $row['info']['id_penjadwalaninfo'] ?>">
                                                <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <h2>Informasi Penjadwalan</h2>

                                                        <p style="margin: 0px">Kode Jadwal : <label for=""><?php echo $row['info']['kode_jadwal'] ?></label></p>
                                                        <p>Pemetaan Pegawai : <label for=""><?php echo count($row['pegawai']) ?></label></p>

                                                        <small>Apakah anda yakin ingin membatalkan penjadwalan ini, semua keterangan akan dihapus baik dari penjadwalan client di dalamnya.</small>
                                                        

                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                                    <a href="<?php echo base_url('C_penjadwalan/prosesbatalpenjadwalan/'. $row['info']['id_penjadwalaninfo']) ?>" class="btn btn-primary">Batalkan Penjadwalan</a>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>

                                        </td>
                                    </tr>
                                    <?php 
                                    $nomor++;
                                    endforeach ?>

                                    <?php } ?>
                                </tbody>

                            </table>
                            </div>
                        </div>
                        

                    </div>
                </div>
            
            </div>
		</div>
    </section>

</div>
