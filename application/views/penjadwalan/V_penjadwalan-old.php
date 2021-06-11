<!-- Karena sudah ada template header footer, langsung copas kontennya -->


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

      <div class="row">
      <?php foreach ($pegawai->result_array() as $pegawai) : ?>

        <div class="col-md-12">
          <div class="card card-body">
            <h2 style="margin: 0px"><?php echo $pegawai['nama_pegawai'] ?></h2>
            <p><i class="fas fa-user"></i> Nama Pegawai</p>
            <hr>
            <br>
            <h4>"<?php echo $pegawai['alamat'] ?>"</h4>
            <p><i class="fas fa-map-marker-alt"></i> Alamat Pegawai</p>

          </div>
        </div>
      </div>
      <?php endforeach; ?>

      <form action="<?php echo base_url('C_penjadwalan/prosestambah/'. $pegawai['id_pegawai']) ?>" method="POST">
      <?php 
      
      $hari = array('Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu');
      
      for( $i = 0; $i < 7; $i++ ) { ?>
      <div class="card card-body">
        <div class="row">
          <div class="col-md-4">
            <div class="card card-body" style="border: black;">
              <center>
                <label style="margin:0px">Hari</label>
                <h3 style="margin:0px"><?php echo $hari[ $i ] ?></h3>

              </center>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card card-body" style="border: black;">
              <div class="row">
                <div class="col-md-12">
                  <label>Tipe Jadwal</label>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" id="masuk-<?php echo $i ?>" name="tipe-<?php echo $i ?>" value="masuk" required="">
                    <label for="masuk-<?php echo $i ?>" class="custom-control-label">Masuk</label>

                  </div>
                </div>
                <div class="col-md-4">

                  <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" id="libur-<?php echo $i ?>" name="tipe-<?php echo $i ?>" value="libur" required="">
                    <label for="libur-<?php echo $i ?>" class="custom-control-label">Libur</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card card-body" style="border: black;">

              <div class="row">
                <div class="col-md-4">
                  <input type="time" name="masuk[]" id="appt" name="appt">
                  Jam Masuk
                </div>
                <div class="col-md-4">
                  <input type="time" name="pulang[]" id="appt" name="appt">
                  Jam Keluar
                </div>
              </div>

            </div>
          </div>

          

        </div>
      </div>
      <?php } ?>


      <div class="card card-body text-right">
      
        <div class="">
          <a href="<?php echo base_url('C_datapegawai') ?>" class="btn btn-secondary">Kembali</a>
          <button type="submit" class="btn btn-primary">Simpan data pegawai</button>
        </div>
      
      </div>
      </form>
    
    
    
    </div>
</div>
<!-- /.content -->
<!-- /.content-wrapper -->