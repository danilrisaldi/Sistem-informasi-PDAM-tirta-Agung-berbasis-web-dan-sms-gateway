         <?php if ($_GET[act]==''){ ?> 
          <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Input Note Survei </h3>
                </div><!-- /.box-header -->
                <div class="box-body " >
                <?php 
                  if (isset($_GET['proses'])){
                      echo "<div class='alert alert-success alert-dismissible fade in' role='alert'> 
                          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>×</span></button> <strong>Sukses!</strong> -Note berhasil di masukan,..
                          </div>";
                  }elseif(isset($_GET['tolak'])){
                      echo "<div class='alert alert-danger alert-dismissible fade in' role='alert'> 
                          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>×</span></button> <strong>Gagal!</strong> - Note gagal di masukan,..
                          </div>";
                  }
                ?>
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped ">
                    <thead>
                     <tr>
                        <th style='width:20px'>No</th>
                        <th style='width:30px'>No sambungan </th>
                        <th>Nama </th>
                        <th>Alamat </th>
                        <th>Cabang </th>
                        <th>No Telepon </th>
                        <th>Jenis </th>
                        <th>Deskripsi </th>
                        <th>Foto pengaduan </th>
                        <th>Tanggal pengaduan </th>
                        <th>jadwal survei </th>
                        <th style='width:40px'>action</th>
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $tampil = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from pengaduan inner join pelanggan on pengaduan.id_pelanggan = pelanggan.id_pelanggan where status_pengaduan='terjadwal' AND note_survei=''");
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
                              <td bgcolor='greensoft'><b>$r[tgl_pengaduan] </b></td>
                              <td bgcolor='yellow'><b>$r[tgl_survei] </b></td>
                              <td><center>
                                <a class='btn btn-danger btn-xs' title='masukan note survei' href='index.php?view=input_note&act=input&id_pengaduan=$r[id_pengaduan]'><span class='glyphicon glyphicon-pencil'></span></a>
                              </center></td>
                          </tr>";
                      $no++;
                      }

                  ?>
                    </tbody>
                  </table>
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><?php 
}elseif($_GET[act]=='input'){
    if (isset($_POST[simpan])){
         $foto_survei = $_FILES['foto']['name'];
         $tmp_file = $_FILES['foto']['tmp_name'];
          $path = "../images/".$foto_survei;
      move_uploaded_file($tmp_file, $path);
        $query = mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE pengaduan SET note_survei = '$_POST[note_survei]',foto_survei='".$foto_survei."',status_pengaduan='disurvei',nama_survei='$nama' where id_pengaduan='$_POST[id]'");
        if ($query){
            echo "<script>document.location='index.php?view=input_note&sukses';</script>";
        }else{
            echo "<script>document.location='index.php?view=input_note&gagal';</script>";
        }    }
    $edit = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from pengaduan inner join pelanggan on pengaduan.id_pelanggan = pelanggan.id_pelanggan where  id_pengaduan='$_GET[id_pengaduan]'");
    $s = mysqli_fetch_array($edit);
   
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Input Note Survei</h3>
                </div>
              <div class='box-body'>
              <form method='POST' class='form-horizontal' action='' enctype='multipart/form-data'>
                <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                   <tbody>
                    <input type='hidden' class='form-control' name='id' readonly='readonly' value='$s[id_pengaduan]'> 
                    <tr><th width='120px' scope='row'>Nama </th> <td><input type='text' class='form-control' name='nama' value='$s[nama]' readonly='readonly'> </td></tr>
                    <tr><th width='120px' scope='row'>Alamat </th> <td><input type='text' class='form-control' name='alamat' value='$s[alamat]' readonly='readonly'> </td></tr>
                     <tr><th width='120px' scope='row'>Tanggal pengaduan</th> <td><input type='text' class='form-control' name='un' value='$s[tgl_pengaduan]' readonly='readonly'> </td></tr>
                     <tr><th scope='row'>jenis</th>   <td><input type='text' class='form-control' name='tlp' value='$s[jenis]' readonly='readonly'></td></tr>
                    <tr><th scope='row'>deskripsi</th>   <td><input type='text' class='form-control' name='tlp' value='$s[deskripsi]' readonly='readonly'></td></tr>
                    <tr><th scope='row'>Note survei</th>   <td><textarea class='form-control' name='note_survei'></textarea></td></tr>
                     <tr><th width='120px' scope='row'>foto </th> <td><input type='file' name='foto' > </td></tr>
                     
                  </tbody>
                  </table>
                </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='simpan' class='btn btn-info'>Simpan</button>
                   <button type='reset' class='btn btn-default pull-right'>Cancel</button>
                    
                  </div>
              </form>
            </div>";
}
?>