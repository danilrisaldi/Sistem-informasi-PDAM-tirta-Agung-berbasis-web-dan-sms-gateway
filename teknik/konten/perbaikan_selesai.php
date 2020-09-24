          <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"> Konfirmasi perbaikan selesai </h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                <?php 
                  if (isset($_GET['proses'])){
                      echo "<div class='alert alert-success alert-dismissible fade in' role='alert'> 
                          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>×</span></button> <strong>Sukses!</strong> - note berhasil di edit,..
                          </div>";
                  }elseif(isset($_GET['tolak'])){
                      echo "<div class='alert alert-danger alert-dismissible fade in' role='alert'> 
                          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>×</span></button> <strong>Gagal!</strong> - note gagal di edit,..
                          </div>";
                  }
                ?>
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                     <tr>
                        <th style='width:30px'>No</th>
                        <th>No sambungan </th>
                        <th>Jenis </th>
                        <th>Deskripsi </th>
                        <th>Foto pengaduan </th>
                        <th>Tanggal pengaduan </th>
                        <th>jadwal survei </th>
                        <th>Note </th>
                        <th>foto survei</th>
                        <th style='width:40px'>action</th>
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $tampil = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from pengaduan inner join pelanggan on pengaduan.id_pelanggan = pelanggan.id_pelanggan where status_pengaduan='disurvei' ");
                    $no = 1;
                    while($r=mysqli_fetch_array($tampil)){
                    echo "<tr><td>$no</td>
                              <td>$r[no_sambungan]</td>
                              <td>$r[jenis]</td>
                              <td>$r[deskripsi]</td>
                              <td><img src='../images/$r[foto_pengaduan]' width='40'></td>
                              <td bgcolor='greensoft'><b>$r[tgl_pengaduan] </b></td>
                              <td bgcolor='yellow'><b>$r[tgl_survei] </b></td>
                              <td>$r[note_survei]</td>
                              <td><img src='../images/$r[foto_survei]' width='50'></td>
                              <td><center>
                                <a class='btn btn-danger btn-xs' title='selesai perbaikan' href='index.php?view=perbaikan_selesai&selesai=$r[id_pengaduan]'><span class='glyphicon glyphicon-pencil'>selesai</span></a>
                              </center></td>
                          </tr>";
                      $no++;
                      }if (isset($_GET[selesai])) {
                         mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE pengaduan SET status_pengaduan='selesai' where id_pengaduan='$_GET[selesai]'");
                          echo "<script>document.location='index.php?view=perbaikan_selesai';</script>";
                      }

                  ?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>