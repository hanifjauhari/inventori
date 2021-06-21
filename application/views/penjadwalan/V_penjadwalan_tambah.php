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
                    <p></p>

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
                                
                                <a href="<?php echo base_url('C_penjadwalan') ?>" class="btn btn-sm btn-outline-secondary">Kembali</a>
                                <small>Klik untuk membatalkan pengisian</small>

                                <hr>
                            </div>
                        </div>


                        <!-- Table -->
                        <div class="row">
                            <div class="col-md-12">


                                <form action="<?php echo base_url('C_penjadwalan/prosestambahpenjadwalan') ?>" method="POST">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Kode Jadwal</label>
                                                <input type="text" name="kode_jadwal" class="form-control" required="" />
                                                <small>Masukkan kode jadwal</small>
                                            </div>    
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Tanggal Penjadwalan</label>
                                                <input type="date" name="tanggal" class="form-control" required="" />
                                                <small>Masukkan tanggal penjadwalan</small>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- Pemilihan petugas  -->

                                    <hr>
                                    <h5>Pemilihan Pegawai</h5>
                                    <small>Silahkan pilih pegawai untuk sesi penjadwalan ini</small>
                                    <hr>

                                    <div class="row">
                                        <div class="col-md-12">
                                        
                                            <div class="form-group">
                                                <select name="pegawai[]" class="duallistbox" multiple="multiple" required="">
                                                    
                                                    <?php foreach ( $pegawai->result_array() AS $row ) : ?>
                                                    <option value="<?php echo $row['id_profile'] ?>"><?php echo $row['nama_pegawai'] ?></option>
                                                    <?php endforeach ?>
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
    $('.duallistbox').bootstrapDualListbox()

</script>