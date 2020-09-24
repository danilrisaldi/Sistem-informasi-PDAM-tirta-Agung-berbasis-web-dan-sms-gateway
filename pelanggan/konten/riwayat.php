 <div class="col-md-12" align="center">
    <div class="row">
        <?php 
                  if (isset($_GET['berhasil'])){
                      echo "<div class='alert alert-success alert-dismissible fade in' role='alert'> 
                          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>×</span></button> <strong>riwayat</strong> berhasil di hapus,..
                          </div>";
                  }
                ?>

       
          <!-- Box Comment -->
          <div class="box box-widget">
            <div class="box-header with-border">
              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <div class="box-header">
                  <h3 class="box-title">Riwayat</h3> 
                </div><!-- /.box-header -->
                <div class="box-body">
                 <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <thead>
                     <tr>
                        <th style='width:30px'>No</th>
                        <th>Jenis </th>
                        <th>Deskripsi </th>
                        <th>Foto pengaduan </th>
                        <th>Tanggal pengaduan </th>
                        <th>jadwal survei </th>
                        <th>Note </th>
                        <th>foto survei</th>
                        <th>Status </th>
                        <th>action</th>
                      
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $tampil = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from pengaduan where id_pelanggan='$id_pelanggan' AND status_pengaduan='selesai' AND status_nilai='sudah' || status_pengaduan='ditolak' AND status_nilai='sudah' order by  tgl_pengaduan");
                    $no = 1;
                    while($r=mysqli_fetch_array($tampil)){
                    echo "<tr><td>$no</td>
                              <td>$r[jenis]</td>
                              <td>$r[deskripsi]</td>
                              <td><img src='../images/$r[foto_pengaduan]' width='150'></td>
                              <td ><b>$r[tgl_pengaduan] </b></td>
                              <td ><b>$r[tgl_survei] </b></td>
                              <td>$r[note_survei]</td>
                              <td><img src='../images/$r[foto_survei]' width='150'</td>
                              <td bgcolor='bluesoft'>$r[status_pengaduan]</td>
                              <td><a href='index.php?view=riwayat&riwayat=$r[id_pengaduan]' class='fa fa-trash'> hapus</a></td>
                          </tr>";
                      $no++;
                      }
                      if (isset($_GET[riwayat])) {
                     mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE pengaduan SET status_nilai='hapus' where id_pengaduan='$_GET[riwayat]'");
                          echo "<script>document.location='index.php?view=riwayat&berhasil';</script>";
                      }
                      
                  ?>
                    </tbody>
                  </table>
                </div>
            </div>
           
          </div>
        
      </div>
</div>