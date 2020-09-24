        <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Pengduan Proses </h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
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
                        <th>Foto pengaduan </th>
                        <th>Tanggal pengaduan </th>
                        <th style='width:40px'>Status</th>
                        <th >Note survei</th>
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
                              <td><img src='../images/$r[foto_pengaduan]' width='40'></td>
                              <td>$r[tgl_pengaduan] </td>
                              <td bgcolor='yellow'>$r[status_pengaduan]</td>
                              <td>- $r[note_survei]</td>
                          </tr>";
                      $no++;
                      }
                  ?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
