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

                <div class="col-md-8">

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
                                                <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated" role="progressbar"
                                                    aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%; color: #f5f5f5 !important">
                                                    60%
                                                </div>
                                            </div>
                                            <small>Progress Pengerjaan</small>
                                        </td>
                                        <td>
                                            <a href="" class="btn btn-xs btn-warning"><i class="fas fa-edit"></i>Sunting</a>
                                            <a href="" class="btn btn-xs btn-outline-danger"><i class="fas fa-trash"></i>Hapus</a>
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
