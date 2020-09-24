<div class="row">
     <div class="col-xs-12">
            <a style='color:#000' href='index.php?view=input_jadwal'>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-blue"><i class="fa fa-envelope"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Input Jadwal</span>
                  <span class="info-box-number"><?php echo $input_jadwal[total]; ?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            </a>

            <a style='color:#000' href='index.php?view=outbox'>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-envelope-o"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Lihat Jadwal</span>
                  <span class="info-box-number"><?php echo $lihat_jadwal[total]; ?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            </a>

            <a style='color:#000' href='index.php?view=sentitems'>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-orange"><i class="fa fa-send"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Input Note</span>
                  <span class="info-box-number"><?php echo $input_note[total]; ?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            </a>

            <a style='color:#000' href='index.php?view=admin'>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-users"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Lihat Note</span>
                  <span class="info-box-number"><?php echo $lihat_note[total]; ?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            </a>
      </div>
</div>
 <div class="col-xs-12">  
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Pengaduan Masuk</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                   <th style='width:30px'>No</th>
                        <th>Nama </th>
                        <th>Alamat </th>
                        <th>Jenis </th>
                        <th>Deskripsi </th>
                        <th>tangal pengaduan </th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $tampil = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from pengaduan inner join pelanggan on pengaduan.id_pelanggan = pelanggan.id_pelanggan where status_pengaduan='diproses' || status_pengaduan='terjadwal' ||status_pengaduan='disurvei'");
                    $no = 1;
                    while($r=mysqli_fetch_array($tampil)){
                    echo "<tr><td>$no</td>
                              <td>$r[nama]</td>
                              <td>$r[alamat]</td>
                              <td>$r[jenis]</td>
                              <td>$r[deskripsi]</td>
                              <td>$r[tgl_pengaduan] </td>
                             ";
                              $no++;
                             
                      }
                  
                  ?>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <!-- /.box-footer -->
          </div>

            </div>

 </div>
    
