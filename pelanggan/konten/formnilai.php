 <div class="col-md-12" align="center">
    <div class="row">

       
          <!-- Box Comment -->
          <div class="box box-widget">
            <div class="box-header with-border">
               <div class="user-block" align="left"><a href="index.php?view=penilaian" class="fa fa-reply"> kembali</a></div>
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
                  <h3 class="box-title">form penilaian</h3> 
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
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                  $id=$_GET[id_pengaduan];
                    $tampil = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from pengaduan where id_pengaduan='$id'  order by tgl_pengaduan");
                    $no = 1;
                    while($r=mysqli_fetch_array($tampil)){
                    echo "<tr><td>$no</td>
                              <td>$r[jenis]</td>
                              <td>$r[deskripsi]</td>
                              <td><img src='../images/$r[foto_pengaduan]' width='40'></td>
                              <td ><b>$r[tgl_pengaduan] </b></td>
                              <td ><b>$r[tgl_survei] </b></td>
                              <td>$r[note_survei]</td>
                          </tr>
                          <tr>
                           <input value='' type='number' class='rating' min=0 max=5 step=1 data-size='md' data-stars='5' id_pengaduan='$r[id_pengaduan]'>
                           </tr>
                          ";
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