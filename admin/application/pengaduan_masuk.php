          <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data pengaduan masuk </h3>
                </div><!-- /.box-header -->
                <div class="box-body">
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
                        <th style='width:40px'>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $tampil = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from pengaduan inner join pelanggan on pengaduan.id_pelanggan = pelanggan.id_pelanggan where status_pengaduan='dikirim' group by id_pengaduan desc");
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
                              <td><center>
                                <a class='btn btn-success btn-xs' title='proses pengaduan' href='index.php?view=pengaduan_masuk&proses=$r[id_pengaduan]'><span class='glyphicon glyphicon-edit'></span></a>
                                <a class='btn btn-danger btn-xs' title='tolak pengaduan' href='index.php?view=pengaduan_masuk&tolak=$r[id_pengaduan]'><span class='glyphicon glyphicon-remove'></span></a>
                              </center></td>
                          </tr>";
                      $no++;
                      }if (isset($_GET[proses])) {
                         mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE pengaduan SET status_pengaduan='diproses' where id_pengaduan='$_GET[proses]'");
                          echo "<script>document.location='index.php?view=pengaduan_masuk';</script>";
                      }
                      elseif (isset($_GET[tolak])){
                          mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE pengaduan SET status_pengaduan='ditolak' where id_pengaduan='$_GET[tolak]'");
                         
                          echo "<script>document.location='index.php?view=pengaduan_masuk';</script>";
                      }

                  ?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
