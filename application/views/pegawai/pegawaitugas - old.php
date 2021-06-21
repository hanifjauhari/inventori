
<!-- Karena sudah ada template header footer, langsung copas kontennya -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tugas Pegawai</h1>
                    <p></p>


                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col">
                    <!-- Default box -->

                    <?php echo $this->session->flashdata('pesan') ?>

                        <div class="card-body">
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
                                    <?php foreach ( $penjadwalan->result_array() AS $row ) : ?>
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
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->