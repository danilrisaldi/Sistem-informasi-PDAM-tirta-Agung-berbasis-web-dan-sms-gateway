<?php if ($_GET[act]==''){ ?> 
            <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data pegawai </h3>
                  <a class='pull-right btn btn-success btn-sm fa fa-print' href='print_pegawai.php'> cetak</a>
                  <a class='pull-right btn btn-primary btn-sm' href='index.php?view=pegawai&act=tambah'>Tambahkan Data</a>
                </div><!-- /.box-header -->
                <div class="box-body">
                <?php 
                  if (isset($_GET['sukses'])){
                      echo "<div class='alert alert-success alert-dismissible fade in' role='alert'> 
                          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>×</span></button> <strong>Sukses!</strong> - Data telah Berhasil Di simpan,..
                          </div>";
                  }elseif(isset($_GET['gagal'])){
                      echo "<div class='alert alert-danger alert-dismissible fade in' role='alert'> 
                          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>×</span></button> <strong>Gagal!</strong> - Data gagal disimpan,..
                          </div>";
                  }
                ?>
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style='width:30px'>No</th>
                        <th>Nama </th>
                        <th>Alamat </th>
                        <th>Jenis kelamin </th>
                        <th>Agama </th>
                        <th>Foto </th>
                        <th>Cabang </th>
                        <th>level</th>
                        <th style='width:40px'>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $tampil = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM pegawai ORDER BY level DESC");
                    $no = 1;
                    while($r=mysqli_fetch_array($tampil)){
                    echo "<tr><td>$no</td>
                              <td>$r[nama]</td>
                              <td>$r[alamat]</td>
                              <td>$r[jk]</td>
                              <td>$r[agama]</td>
                              <td><img src='../images/$r[foto]' width='40'></td>
                              <td>$r[cabang]</td>
                              <td>$r[level]</td>                              
                              <td><center>
                                <a class='btn btn-success btn-xs' title='Edit Data' href='index.php?view=pegawai&act=edit&id_pegawai=$r[id_pegawai]'><span class='glyphicon glyphicon-edit'></span></a>
                                <a class='btn btn-danger btn-xs' title='Delete Data' href='index.php?view=pegawai&hapus=$r[id_pegawai]'><span class='glyphicon glyphicon-remove'></span></a>
                              </center></td>
                          </tr>";
                      $no++;
                      }
                      if (isset($_GET[hapus])){
                          mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM pegawai where id_pegawai='$_GET[hapus]'");
                          echo "<script>document.location='index.php?view=pegawai';</script>";
                      }

                  ?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
<?php 
}elseif($_GET[act]=='edit'){
    if (isset($_POST[update])){
       $data = md5($_POST[pw]);
       $pass=hash("sha512",$data);
        $namae = $_FILES['f']['name'];
       $tmp_file = $_FILES['f']['tmp_name'];
    // Set path folder tempat menyimpan gambarnya
    $path = "../images/".$namae;
     move_uploaded_file($tmp_file, $path);
        $query = mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE pegawai SET Nama = '$_POST[b]',alamat='$_POST[c]',jk='$_POST[d]',agama='$_POST[e]', foto='".$namae."',cabang='$_POST[g]',level='$_POST[lvl]',username='$_POST[un]',password='$pass' where id_pegawai='$_POST[a]'");
        
        if ($query){
            echo "<script>document.location='index.php?view=pegawai&sukses';</script>";
        }else{
            echo "<script>document.location='index.php?view=pegawai&gagal';</script>";
        }
    }
    $edit = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM pegawai where id_pegawai='$_GET[id_pegawai]'");
    $s = mysqli_fetch_array($edit);   
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Edit Data pegawai</h3>
                </div>
              <div class='box-body'>
              <form method='POST' class='form-horizontal' action='' enctype='multipart/form-data'>
                <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                   <tbody>
                      <tr><th width='120px' scope='row'>id pegawai</th> <td><input type='text' class='form-control' name='a' readonly='readonly' value='$s[id_pegawai]'> </td></tr>
                    <tr><th width='120px' scope='row'>Nama </th> <td><input type='text' class='form-control' name='b' value='$s[nama]'> </td></tr>
                    <tr><th width='120px' scope='row'>Alamat </th> <td><input type='text' class='form-control' name='c' value='$s[alamat]'> </td></tr>
                    <tr><th width='120px' scope='row'>jenis kelamin </th> <td><select name='d' class='form-control'><option>pria</option><option>wanita</option></select>                    
                    </td></tr>
                    <tr><th width='120px' scope='row'>agama </th> <td><select name='e' class='form-control'><option>islam</option><option>kristen</option><option>hindu</option><option>budha</option><option>konghucu</option></select>                    
                    </td></tr>
                   <tr><th width='120px' scope='row'>foto </th> <td><input type='file' name='f' value='$s[foto]'> </td></tr>
                    <tr><th width='120px' scope='row'>bagian </th> <td><select name='g' class='form-control'><option>teknik</option><option>unit</option><option>administrasi</option></select>      </td></tr>

                    <tr><th width='120px' scope='row'>cabang </th> <td>
                    <select name='g' class='form-control'>
                         <option>pusat</option>
                        <option>sp padang</option>
                        <option>tanjung lubuk</option> 
                        <option>pedamaran</option>
                        <option>pampangan</option>
                        <option>pangarayan</option>
                        <option>tulung selapan</option> 
                        <option>mesuji</option>
                        <option>serinanti</option>
                        <option>pk lampam</option>
                        <option>tugumulyo</option>
                        <option>jejawi</option>
                        <option>kandis</option>
                        <option>bungin tinggi</option>
                    </select>  </td></tr>
                     <tr><th scope='row'>level</th>   <td><select class='form-control' name='lvl'><option>admin</option><option>teknik</option><option>unit</option><option>pimpinan</option></select</td></tr>
                     <tr><th width='120px' scope='row'>Username</th> <td><input type='text' class='form-control' name='un' value='$s[username]'> </td></tr>
                    <tr><th scope='row'>Password</th>   <td><input type='text' class='form-control' name='pw' placeholder='masukan Password baru'></td></tr>
                  </tbody>
                  </table>
                </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='update' class='btn btn-info'>Update</button>
                   <button type='reset' class='btn btn-default pull-right'>Cancel</button>
                    
                  </div>
              </form>
            </div>";
}elseif($_GET[act]=='tambah'){
    if (isset($_POST[tambah])){
       $data = md5($_POST[pw]);
       $passs=hash("sha512",$data);
       $namaf = $_FILES['f']['name'];
       $tmp_file = $_FILES['f']['tmp_name'];
    // Set path folder tempat menyimpan gambarnya
      $path = "../images/".$namaf;
     move_uploaded_file($tmp_file, $path);
      $query = mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO pegawai VALUES('$_POST[a]','$_POST[b]','$_POST[c]','$_POST[d]','$_POST[e]','".$namaf."','$_POST[g]','$_POST[lvl]','$_POST[un]','$passs')");
      if ($query){
            echo "<script>document.location='index.php?view=pegawai&sukses';</script>";
      }else{
            echo "<script>document.location='index.php?view=pegawai&gagal';</script>";
      }
    }

    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Tambah Data pegawai</h3>
                </div>
              <div class='box-body'>
              <form method='POST' class='form-horizontal' action='' enctype='multipart/form-data'>
                <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <tr><th width='120px' scope='row'>id pegawai</th> <td><input type='text' class='form-control' name='a'> </td></tr>
                    <tr><th width='120px' scope='row'>Nama </th> <td><input type='text' class='form-control' name='b'> </td></tr>
                    <tr><th width='120px' scope='row'>Alamat </th> <td><input type='text' class='form-control' name='c'> </td></tr>
                    <tr><th width='120px' scope='row'>jenis kelamin </th> <td><select name='d' class='form-control'><option>pria</option><option>wanita</option></select>                    
                    </td></tr>
                    <tr><th width='120px' scope='row'>agama </th> <td><select name='e' class='form-control'><option>islam</option><option>kristen</option><option>hindu</option><option>budha</option><option>konghucu</option></select>                    
                    </td></tr>
                   <tr><th width='120px' scope='row'>foto </th> <td><input type='file' name='f'> </td></tr>
                    <tr><th width='120px' scope='row'>cabang </th> <td>
                    <select name='g' class='form-control'>
                         <option>pusat</option>
                        <option>sp padang</option>
                        <option>tanjung lubuk</option> 
                        <option>pedamaran</option>
                        <option>pampangan</option>
                        <option>pangarayan</option>
                        <option>tulung selapan</option> 
                        <option>mesuji</option>
                        <option>serinanti</option>
                        <option>pk lampam</option>
                        <option>tugumulyo</option>
                        <option>jejawi</option>
                        <option>kandis</option>
                        <option>bungin tinggi</option>
                    </select>  </td></tr>
                     <tr><th width='120px' scope='row'>Username</th> <td><input type='text' class='form-control' name='un'> </td></tr>
                    <tr><th scope='row'>Password</th>     <td><input type='text' class='form-control' name='pw'></td></tr>
                    <tr><th scope='row'>level</th>        <td><select class='form-control' name='lvl'><option>admin</option><option>teknik</option><option>unit</option><option>pimpinan</option></select</td></tr>
                  </tbody>
                  </table>
                </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='tambah' class='btn btn-info'>Tambahkan</button>
                    <a href='index.php?view=guru'><button class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
              </form>
            </div>";
}
?>