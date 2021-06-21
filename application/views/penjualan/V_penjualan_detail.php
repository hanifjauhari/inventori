<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Detail Tagihan</h1>
          <p></p>

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
                        <th>Sub-Total</th>
                      </tr>
                      <?php

                      $no = 1;
                      $tagihan = 0;
                      $total = 0;
                      foreach ($detail as $row) { ?>

                        <tr>
                          <td><?php echo $no ?></td>
                          <td><?php echo $row['kode_barang'] ?></td>
                          <td><?php echo $row['nama_barang'] ?></td>
                          <td><?php echo $row['permintaan'] ?></td>
                          <td><?php echo number_format($row['harga']) ?></td>
                        </tr>

                      <?php


                        $no++;
                        $total = $total + $row['permintaan'];
                        $tagihan = $tagihan + ($row['harga'] * $row['permintaan']);
                      } ?>

                      <tr>

                        <td colspan="3" align="right">Total Permintaan : </td>
                        <td><?php echo $total ?> Item</td>
                        <td><?php echo number_format($tagihan) ?></td>
                      </tr>


                      </tr>
                    </table>

                    <p>Informasi Keseluruhan</p>
                    <small>Tagihan Keseluruhan</small>
                    <h2>Rp. <?php echo number_format($tagihan) ?></h2>
                  </div>
                </div>
              </div>

              <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                <h3 class="text-primary"><i class="fas fa-paint-brush"></i> Laporan Tagihan</h3>
                <p class="text-muted">Informasi laporan detail tagihan <br>CV.Dwi Tunggal Abadi</p>
                <br>
                <div class="text-muted">
                  <p class="text-sm">Tanggal Pembuatan
                    <b class="d-block"><?php echo date('d F Y', strtotime($penjualan['created_at'])) ?></b>
                  </p>
                  <p class="text-sm">Distributor / Penjual
                    <b class="d-block"><?php echo $penjualan['nama_distributor'] ?></b>
                  </p>
                  <p class="text-sm">Pembuat Laporan (Penanggung Jawab)
                    <b class="d-block"><?php echo ucfirst($penjualan['username']) ?></b>
                  </p>
                </div>


                <a href="<?php echo base_url('transaksi/penjualan_info') ?>" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i> Kembali</a>
                <a href="<?php echo base_url('Transaksi/exportPDF/' . $penjualan) ?>" class="btn btn-warning btn-sm">Cetak Laporan Opname</a>

              </div>
            </div>

          </div>

        </div>
      </div>
    </div>
  </section>

</div>