<div class="row">
     <div class="col-xs-12">
            <a style='color:#000' href='index.php?view=jadwal'>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-blue"><i class="fa fa-calendar-plus-o"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text"> Jadwal</span>
                  <span class="info-box-number"><?php echo $jadwal[total]; ?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            </a>

            <a style='color:#000' href='index.php?view=hasil'>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-calendar-check-o"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Lihat hasil</span>
                  <span class="info-box-number"><?php echo $hasil[total]; ?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            </a>
      </div>
</div>
 <div class="col-xs-12">  
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Data pelanggan</h3>

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
                        <th>No sambungan </th>
                        <th>Nama </th>
                        <th>Alamat </th>
                        <th>No HP </th>
                        <th>Tanggal </th>
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $tampil = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM pelanggan where cabang ='$cabang' ORDER BY tgl_pelanggan DESC");
                    $no = 1;
                    while($r=mysqli_fetch_array($tampil)){
                    echo "<tr><td>$no</td>
                              <td>$r[no_sambungan]</td>
                              <td>$r[nama]</td>
                              <td>$r[alamat]</td>
                              <td>$r[nohp]</td>
                              <td>$r[tgl_pelanggan]</td>
                          </tr>";
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
    
