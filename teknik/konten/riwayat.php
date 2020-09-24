          <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Riwayat </h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                <?php 
                  if (isset($_GET['proses'])){
                      echo "<div class='alert alert-success alert-dismissible fade in' role='alert'> 
                          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>×</span></button> <strong>Sukses!</strong> - pengaduan akan diproses,..
                          </div>";
                  }elseif(isset($_GET['tolak'])){
                      echo "<div class='alert alert-danger alert-dismissible fade in' role='alert'> 
                          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>×</span></button> <strong>Gagal!</strong> - pengaduan ditolak,..
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
                        <th>status </th>
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $tampil = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from pengaduan inner join pelanggan on pengaduan.id_pelanggan = pelanggan.id_pelanggan where status_pengaduan='selesai'");
                    $no = 1;
                    while($r=mysqli_fetch_array($tampil)){
                    echo "<tr><td>$no</td>
                              <td>$r[no_sambungan]</td>
                              <td>$r[jenis]</td>
                              <td>$r[deskripsi]</td>
                              <td><img src='../images/$r[foto_pengaduan]' width='40'></td>
                              <td><b>$r[tgl_pengaduan] </b></td>
                              <td><b>$r[tgl_survei] </b></td>
                              <td>$r[note_survei]</td>
                              <td><img src='../images/$r[foto_survei]' width='40'></td>
                              <td bgcolor='softgreensoft'>$r[status_pengaduan]</td>
                                </tr>";
                      $no++;
                      }if (isset($_GET[proses])) {
                         mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE pengaduan SET status_pengaduan='diproses' where id_pengaduan='$_GET[proses]'");
                          echo "<script>document.location='index.php?view=pengaduan_masuk';</script>";
                      }

                  ?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
