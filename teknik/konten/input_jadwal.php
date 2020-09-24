         <?php if ($_GET[act]==''){ ?> 
          <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Input Jadwal </h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                <?php 
                  if (isset($_GET['proses'])){
                      echo "<div class='alert alert-success alert-dismissible fade in' role='alert'> 
                          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>×</span></button> <strong>Sukses!</strong> - Jadwal berhasil dimasukan,..
                          </div>";
                  }elseif(isset($_GET['tolak'])){
                      echo "<div class='alert alert-danger alert-dismissible fade in' role='alert'> 
                          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>×</span></button> <strong>Gagal!</strong> - jadwal gagal dimasukan,..
                          </div>";
                  }
                ?>
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
                        <th style='width:40px'>jadwal</th>
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $tampil = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from pengaduan inner join pelanggan on pengaduan.id_pelanggan = pelanggan.id_pelanggan where status_pengaduan='diproses' AND tgl_survei='0000-00-00'");
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
                              <td><center>
                                <a class='btn btn-primary btn-xs' title='Masukan Jadwal' href='index.php?view=input_jadwal&act=input&id_pengaduan=$r[id_pengaduan]'><span class='glyphicon glyphicon-pencil'></span></a>
                              </center></td>
                          </tr>";
                      $no++;
                      }

                  ?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><?php 
}elseif($_GET[act]=='input'){
     $tgllalu=date('Y-m-d');
    if (isset($_POST[simpan])){
        $query = mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE pengaduan SET tgl_survei = '$_POST[tgl_survei]',status_pengaduan='terjadwal' where id_pengaduan='$_POST[id]'");
        if ($query){
            echo "<script>document.location='index.php?view=input_jadwal&sukses';</script>";
        }else{
            echo "<script>document.location='index.php?view=input_jadwal&gagal';</script>";
        }
    }
    $edit = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from pengaduan inner join pelanggan on pengaduan.id_pelanggan = pelanggan.id_pelanggan where  id_pengaduan='$_GET[id_pengaduan]'");
    $s = mysqli_fetch_array($edit);
   
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Input Jadwal survei</h3>
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
                    <tr><th scope='row'>Tanggal survei</th>   <td><input type='date' class='form-control' name='tgl_survei' min='$tgllalu'></td></tr>
                     
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