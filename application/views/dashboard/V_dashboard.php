 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
            <p></p>
          </div><!-- /.col -->
          <!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $jumlah['barang'] ?></h3>

                <p style="margin: 0px">Data Barang</p> <small>Informasi keseluruhan data barang yang ada diperusahaan beserta detail stok yang dikelola di stokopname</small>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $jumlah['pegawai'] ?></h3>

                <p style="margin: 0px">Data Customer</p><small>Informasi data client yang berasal dari pendaftaran customer atau client dan telah kerekap ke dalam sistem</small>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?php echo base_url('C_client') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $jumlah['customer'] ?></h3>

                <p style="margin: 0px">Data Pegawai</p>
                <small>Karyawan yang bekerja diperusahaan yang telah didaftarkan oleh superadmin, dan menerima informasi penjadwalan di setiap harinya</small>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $jumlah['pelaporan'] ?></h3>

                <p style="margin: 0px">Pelaporan</p>
                <small>Rekapan laporan dari client tentang kerusakan barang atau mengalami troubleshoot dan telah terekap untuk di tinjau lebih lanjut oleh perusahaan</small>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          
          <div class="col-md-12">

            <div class="card card-body">

            <table id="active-datatable" class="table table-bordered table-striped" width="100%" style="font-size: 14px">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Kode_Jadwal</th>
                                        <th colspan="2" style="width: 35%">Status pengerjaan</th>
                                        <th>Selesai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    
                                 
                                    
                                    
                                    if ( $penjadwalan->num_rows() > 0 ) {  
                                    foreach ( $penjadwalan->result_array() AS $row ) : ?>
                                    <tr>

                                        <td>
                                            <?php echo date('d F Y', strtotime( $row['tanggal_pembuatan'] )). ' | kode : '.$row['kode_jadwal'] ?> <br>
                                            "<small><?php echo $row['permasalahan'] ?></small>"
                                        </td>
                                        <td>
                                            <?php echo $row['alamat'] ?> <br> 
                                            <small>Customer : <label style="font-weight: bold"><?php echo $row['nama'] ?></label></small>
                                        </td>
                                        <td>
                                            <?php
                                            
                                                $label = "";
                                                $terselesaikan = "-";
                                                $tgl_diselesaikan = "";

                                                $btnVerify = "";
                                                if ( $row['status'] == "proses" ) {

                                                    $label = "warning";
                                                    $btnVerify = '<a href="javascript:void(0)" data-toggle="modal" data-target="#verify-'.$row['id_penjadwalan_infoclient'].'" class="btn btn-primary btn-xs btn-block">Selesaikan Tugas</a>';

                                                } else {

                                                    $label = "success";
                                                    $terselesaikan = $row['username'];
                                                    $tgl_diselesaikan = '<small style="font-weight: bold"> | '.date('l d F Y H.i A', strtotime( $row['diperbarui_pada'] )).'</small>';

                                                    $btnVerify = '<a class="btn btn-outline-primary btn-xs disabled btn-block">Sudah Selesai</a>';
                                                }
                                            ?>
                                            <small>Status Terkini : </small> <br>
                                            <label for="" class="badge badge-<?php echo $label ?>"><?php echo ucfirst( $row['status'] ) ?></label>
                                            <?php echo $tgl_diselesaikan ?>

                                        </td>
                                        <td>
                                            <small>Diselesaikan Oleh : </small><br>
                                            <label style="font-weight: bold"><?php echo ucfirst($terselesaikan) ?></label>
                                        </td>
                                        <td>
                                            <small>Pengerjaan</small><br>
                                            <?php echo $btnVerify; ?>







                                            <div class="modal fade" id="verify-<?php echo $row['id_penjadwalan_infoclient'] ?>">
                                                <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <h2>Informasi Penjadwalan</h2>

                                                        <p style="margin: 0px">Kode Jadwal : <label for=""><?php echo $row['kode_jadwal'] ?></label></p>
                                                        <p style="margin: 0px">Customer : <label for=""><?php echo $row['nama'] ?></label></p>
                                                        <p>Permasalahan <br> <small>"<?php echo $row['permasalahan'] ?>"</small></p>
                                                        
                                                        <hr>
                                                        <small>Apakah anda yakin ingin mem-verifikasi penjadwalan ini dengan status selesai.</small>
                                                        

                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                                    <a href="<?php echo base_url('C_tugaspegawai/verifikasiTugas/'. $row['id_penjadwalan_infoclient']) ?>" class="btn btn-primary">Konfirmasi Selesai</a>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>


                                        </td>
                                    </tr>
                                    <?php endforeach; }  ?>
                                </tbody>
                            </table>
          
          </div>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
