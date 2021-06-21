<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Stock Opname</h1>
                    <p></p>

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row justify-content-center">
            
                <div class="col-md-10">

                    <div class="card card-body">

                    <div class="row">
            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
              
              <div class="row">
                <div class="col-md-12">

                  <h4>Informasi Detail Barang</h4>
                  <table class="table">
                    <tr>
                      <th>No</th>
                      <th>Kode Barang</th>
                      <th>Nama Barang</th>
                      <th>Permintaan</th>
                    </tr>
                      <?php
                      
                        $no = 1; 
                        $total = 0;
                        foreach ( $detail AS $row ) { ?>

                        <tr>
                          <td><?php echo $no ?></td>
                          <td><?php echo $row['kode_barang'] ?></td>
                          <td><?php echo $row['nama_barang'] ?></td>
                          <td><?php echo $row['stok'] ?></td>
                        </tr>

                      <?php 
                      
                      
                        $no++;

                        $total = $total + $row['stok'];
                        } ?>
                        
                        <tr>

                          <td colspan="3" align="right">Total Permintaan : </td>
                          <td><?php echo $total ?> Item</td>
                        </tr>

                      
                    </tr>
                  </table>
                </div>
              </div>
            </div>

            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
              <h3 class="text-primary"><i class="fas fa-paint-brush"></i> Opname <?php echo ucfirst( $stockopname['tipe_opname'] ) ?></h3>
              <p class="text-muted">Berikut adalah stokopname yang dapat dilaporkan seperti detail disamping.</p>
              <br>
              <div class="text-muted">
                <p class="text-sm">Tanggal Pembuatan
                  <b class="d-block"><?php echo date('d F Y', strtotime( $stockopname['created_at'] )) ?></b>
                </p>
                <p class="text-sm">Pembuat Laporan (Penanggung Jawab)
                  <b class="d-block"><?php echo ucfirst( $stockopname['username'] ) ?></b>
                </p>
              </div>


              <a href="<?php echo base_url('C_stockopname') ?>" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i> Kembali</a>
              <a href="<?php echo base_url('C_stockopname/exportPDF/'. $id_opname) ?>" class="btn btn-warning btn-sm">Cetak Laporan Opname</a>

            </div>
          </div>
                    
                    </div>
                
                </div>
            </div>
        </div>
    </section>

</div>