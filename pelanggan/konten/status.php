 <div class="col-md-12" align="center">
    <div class="row">

       
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
                  <h3 class="box-title">Status pengaduan</h3> 
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
                        <th>status</th>
                      
                      </tr>
                    </thead>
                    <tbody>
                  <?php 

                    $tampil = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from pengaduan where id_pelanggan='$id_pelanggan' AND status_nilai=''AND status_pengaduan !='ditolak' order by tgl_pengaduan");
                    $no = 1;
                    while($r=mysqli_fetch_array($tampil)){
                    echo "<tr><td>$no</td>
                              <td>$r[jenis]</td>
                              <td>$r[deskripsi]</td>
                              <td><img src='../images/$r[foto_pengaduan]' width='40'></td>
                              <td ><b>$r[tgl_pengaduan] </b></td>
                              <td ><b>$r[tgl_survei] </b></td>
                              <td>$r[note_survei]</td>
                              <td bgcolor='yellow'>$r[status_pengaduan]</td>
                          </tr>";
                      $no++;
                      }
                  ?>
                    </tbody>
                  </table>
                </div>
            </div>
           
          </div>
        
      </div>
</div>