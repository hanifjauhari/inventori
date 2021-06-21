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
                                
                                <a href="<?php echo base_url('c_penjadwalan/client/'. $id_penjadwalaninfo) ?>" class="btn btn-sm btn-outline-secondary">Kembali</a>
                                <small>Klik untuk membatalkan pengisian</small>

                                <hr>
                            </div>
                        </div>


                        <!-- Table -->
                        <div class="row">
                            <div class="col-md-12">


                                <form action="<?php echo base_url('C_penjadwalan/prosesclientupdate/'. $id_penjadwalaninfo.'/'. $infoclient['id_penjadwalan_infoclient']) ?>" method="POST">

                                    <div class="row">
                                    
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Permasalahan</label>
                                                <textarea name="permasalahan" class="form-control" placeholder="Permasalahan . . ." id="" required=""><?php echo $infoclient['permasalahan'] ?></textarea>
                                                <small>Masukkan masalah yang telah dihadapi client untuk disampaikan ke pegawai</small>
                                            </div>    
                                        </div>
                                    
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Alat</label> 
                                                <select name="alat[]" multiple="multiple" class="form-control select2bs4" style="width: 100%;">
                                                    <?php foreach ( $alat->result_array() AS $alt ) :

                                                        $disabled = "";
                                                        $text_alt = $alt['kode_alat'];

                                                        $select = "";
                                                        foreach ( $infoalat->result_array() AS $alt_info ) {

                                                            if ( $alt_info['id_alat'] == $alt['id_alat'] ) {

                                                                $select = 'selected="selected"';
                                                            } else {

                                                                if ( $alt['qty'] == 0 ) {

                                                                    $disabled = "disabled";
                                                                    $text_alt = "Kosong";
                                                                }
                                                            } 
                                                        }
                                                    ?>
                                                    <option value="<?php echo $alt['id_alat'] ?>" <?php echo $select.' '.$disabled ?>><?php echo $text_alt.' | '.$alt['nama_alat'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <small>Masukkan alat / kebutuhan</small>
                                            </div>    
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Keterangan Tambahan</label>
                                                <input type="text" name="keterangan_tambah" class="form-control" placeholder="Membeli ekstensi lain atau bahan . . ." value="<?php echo $infoclient['keterangan_tambahan'] ?>" />
                                                <small>Masukkan keterangan tambahan</small>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- Pemilihan petugas  -->

                                    <hr>
                                    <h5><i class="far fa-user"></i> Pemilihan Client</h5>
                                    <small>Silahkan pilih client untuk sesi penjadwalan ini</small>
                                    <hr>

                                    <div class="row">
                                        <div class="col-md-12">
                                        
                                            <div class="form-group">
                                            <select name="client" class="form-control select2bs4" style="width: 100%;" required="">
                                                <option value="">-- Pilih salah satu --</option>
                                                <?php foreach ( $customer->result_array() AS $row ) : ?>
                                                <option value="<?php echo $row['id_customer'] ?>" <?php if ( $infoclient['id_customer'] == $row['id_customer'] ) { echo 'selected="selected"'; } ?>><?php echo $row['nama'].' | '. $row['email'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            </div>
                                        </div>
                                    </div>


                                    <hr>
                                    <h5><i class="far fa-user"></i> Pemetaan Pegawai</h5>
                                    <small>Silahkan pilih pegawai untuk sesi penjadwalan ini</small>
                                    <hr>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <select class="duallistbox" multiple="multiple" name="pegawai[]" required="">
                                                    <?php foreach ( $pegawai->result_array() as $pegawai ) {
                                                        
                                                        $disabled_pg = "";
                                                        $add_text = "";
                                                        $select = "";

                                                        foreach ( $infopegawai->result_array() AS $info_pegawai ) {

                                                            if ( $info_pegawai['id_profile'] == $pegawai['id_profile'] ) {

                                                                $select = 'selected="selected"';

                                                            } else if ( $pegawai['pemetaan'] >= 3 ) {

                                                                $disabled_pg = "disabled";
                                                                $add_text = "(Penuh)";
                                                            }
                                                        }
                                                    ?>
                                                    <option value="<?php echo $pegawai['id_profile'] ?>" <?php echo $select.' '.$disabled_pg ?>><?php echo $pegawai['nama_pegawai'].' '.$add_text ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>



                                    <!-- submit -->
                                    <div class="row">
                                        <div class="form-group">
                                            <button type="reset" class="btn btn-secondary">Reset</button>
                                            <button type="submit" class="btn btn-warning">Simpan dan Perbarui</button>
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


    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

</script>