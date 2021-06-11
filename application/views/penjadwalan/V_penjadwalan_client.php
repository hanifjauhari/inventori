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

                            <div class="col-md-6">
                                <b><small>Kode Jadwal</small></b>
                                <h2><?php 

                                    if ( $jadwal['info']['kode_jadwal'] ) { 
                                        echo $jadwal['info']['kode_jadwal']; 
                                    } else { 
                                        echo '-'; 
                                        } ?>
                                </h2>
                            </div>
                            <div class="col-md-6">
                                <b><small>Tanggal Penjadwalan</small></b>
                                <h2><?php echo date('l, d F Y', strtotime($jadwal['info']['tanggal_pembuatan'])) ?></h2>
                            </div>

                        </div>


                        <!-- Table -->
                        <div class="row">
                            <div class="col-md-12">
                            
                            <a href="<?php echo base_url('c_penjadwalan/client_tambah/'. $jadwal['info']['id_penjadwalaninfo']) ?>" class="btn btn-sm btn-success">Petakan Client / Customer</a>
                            <a href="<?php echo base_url('c_penjadwalan') ?>" class="btn btn-sm btn-outline-secondary"><i class="fas fa-arrow-left"></i> Kembali </a>
                            <hr>
                            <table id="active-datatable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Customer</th>
                                        <th>Permasalahan</th>
                                        <th>Kondisi</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    
                                    $nomor = 1;
                                    foreach ( $tugas->result_array() as $rowTugas ) : ?>
                                        
                                        <tr>
                                            <td><?php echo $nomor ?></td>
                                            <td><?php echo $rowTugas['nama'] ?></td>
                                            <td><?php echo $rowTugas['permasalahan'] ?></td>
                                            <td><?php echo $rowTugas['status'] ?></td>
                                            <td>
                                            
                                                <a href="" class="btn btn-xs btn-warning"><i class="fas fa-edit"></i>Sunting</a>
                                                <a href="" class="btn btn-xs btn-outline-danger"><i class="fas fa-trash"></i>Hapus</a>
                                            </td>
                                        </tr>

                                    <?php 
                                    $nomor++;
                                    endforeach; ?>
                                </tbody>

                            </table>
                            </div>
                        </div>
                        

                    </div>
                </div>


                <div class="col-md-4">
                                    
                    <div class="card card-body">

                        <h5>Pegawai</h5>
                        <small>Informasi Pegawai dan keterangan lainnya</small>
                        
                        <table class="table table-hover" style="font-size: 12px">
                            <thead>
                                <th>No</th>
                                <th>Nama Pegawai</th>
                                <th>Jumlah Penugasan Client</th>
                            </thead>
                            <tbody>
                                
                                <?php 
                                
                                $nomor = 1;
                                foreach ( $jadwal['pegawai'] AS $pegawai ) : ?>
                                <tr>
                                    <td><?php echo $nomor ?></td>
                                    <td><?php echo $pegawai['nama_pegawai'] ?></td>
                                    <td></td>
                                </tr>
                                <?php 

                                $nomor++;
                                endforeach; ?>
                            </tbody>
                        </table>
                    </div>               
                
                </div>
            
            </div>
		</div>
    </section>

</div>
