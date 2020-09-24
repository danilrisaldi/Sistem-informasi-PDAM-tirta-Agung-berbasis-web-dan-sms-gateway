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
                        <th>No sambungan </th>
                        <th>Nama </th>
                        <th>Alamat </th>
                        <th>Cabang </th>
                        <th>No Telepon </th>
                        <th>Jenis </th>
                        <th>Deskripsi </th>
                        <th>tangal pengaduan </th>
                        <th>status</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $tampil = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from pengaduan inner join pelanggan on pengaduan.id_pelanggan = pelanggan.id_pelanggan where status_pengaduan='diproses' || status_pengaduan='terjadwal' ||status_pengaduan='disurvei'");
                    $no = 1;
                    while($r=mysqli_fetch_array($tampil)){
                    echo "<tr><td>$no</td>
                              <td>$r[no_sambungan]</td>
                              <td>$r[nama]</td>
                              <td>$r[alamat]</td>
                              <td>$r[cabang]</td>
                              <td>$r[nohp]</td>
                              <td>$r[jenis]</td>
                              <td>$r[deskripsi]</td>
                              <td>$r[tgl_pengaduan] </td>
                              <td bgcolor='yellow'>$r[status_pengaduan] </td>
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
