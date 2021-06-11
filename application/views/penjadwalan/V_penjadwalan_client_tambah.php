<!-- Select2 -->
<link rel="stylesheet" href="<?php echo base_url('assets/') ?>plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="<?php echo base_url('assets/') ?>plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

<!-- Select2 -->
<script src="<?php echo base_url('assets/') ?>plugins/select2/js/select2.full.min.js"></script>


<!-- Bootstrap4 Duallistbox -->
<link rel="stylesheet" href="<?php echo base_url('assets/') ?>plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">

<!-- Bootstrap4 Duallistbox -->
<script src="<?php echo base_url('assets/') ?>plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>


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

                <div class="col-md-7">
                
                    <div class="card card-body">


                        <!-- Keterangan tombol -->
                        <div class="row">

                            <div class="col-md-12">
                                
                                <a href="" class="btn btn-sm btn-outline-secondary">Kembali</a>
                                <small>Klik untuk membatalkan pengisian</small>

                                <hr>
                            </div>
                        </div>


                        <!-- Table -->
                        <div class="row">
                            <div class="col-md-12">


                                <form action="<?php echo base_url('C_penjadwalan/prosesclienttambah/'. $id_penjadwalaninfo) ?>" method="POST">

                                    <div class="row">
                                    
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Permasalahan</label>
                                                <textarea name="permasalahan" class="form-control" placeholder="Permasalahan . . ." id=""></textarea>
                                                <small>Masukkan masalah yang telah dihadapi client untuk disampaikan ke pegawai</small>
                                            </div>    
                                        </div>
                                    
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Alat</label>
                                                <input type="text" name="alat" class="form-control" required="" />
                                                <small>Masukkan alat / kebutuhan</small>
                                            </div>    
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Keterangan Tambahan</label>
                                                <input type="text" name="keterangan_tambah" class="form-control" placeholder="Membeli ekstensi lain atau bahan . . ." />
                                                <small>Masukkan keterangan tambahan</small>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- Pemilihan petugas  -->

                                    <hr>
                                    <h5>Pemilihan Client</h5>
                                    <small>Silahkan pilih client untuk sesi penjadwalan ini</small>
                                    <hr>

                                    <div class="row">
                                        <div class="col-md-12">
                                        
                                            <div class="form-group">
                                            <select name="client" class="form-control select2bs4" style="width: 100%;">
                                                <?php foreach ( $customer->result_array() AS $row ) : ?>
                                                <option value="<?php echo $row['id_customer'] ?>"><?php echo $row['nama'].' | '. $row['email'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            </div>
                                        </div>
                                    </div>



                                    <!-- submit -->
                                    <div class="row">
                                        <div class="form-group">
                                            <button type="reset" class="btn btn-secondary">Reset</button>
                                            <button type="submit" class="btn btn-primary">Tambahkan dan Simpan</button>
                                        </div>
                                    </div>
                                    

                                </form>
                            </div>
                        </div>
                        

                    </div>
                </div>
            
            </div>
		</div>
    </section>

</div>



<script>


    //Bootstrap Duallistbox
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

</script>