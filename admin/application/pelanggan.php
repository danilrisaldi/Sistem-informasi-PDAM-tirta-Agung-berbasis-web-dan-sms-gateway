<?php if ($_GET[act]==''){ ?> 
            <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data pelanggan </h3><hr>
                  <form action="print_pelanggan.php">
                  <a class='pull-right btn btn-primary btn-sm' href='index.php?view=pelanggan&act=tambah'>Tambahkan Data</a>
                   <button class='btn btn-success fa fa-print'> cetak</button>                  
                   <select class=" btn btn-sm" name="cabang">
                        <option>--all--</option>
                        <option >sp padang</option>
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
                      </select>
                       <select class=" btn btn-sm" name="tahun">
                            <option>--all--</option>
                        <?php for ($i=2010; $i <2021; $i++) { 
                           echo "<option>$i</option>";
                        } ?>
                      </select>
                      <select class="btn btn-sm" name="bulan">
                            <option>--all--</option>
                        <?php for ($ii=1; $ii <13 ; $ii++) {
                            echo "<option>$ii</option>";
                        } ?>
                      </select>
                  </form>
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
                        <th>No sambungan </th>
                        <th>Nama </th>
                        <th>Alamat </th>
                        <th>Cabang </th>
                        <th>No HP </th>
                        <th>Tanggal </th>
                        <th style='width:40px'>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $tampil = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM pelanggan ORDER BY tgl_pelanggan DESC");
                    $no = 1;
                    while($r=mysqli_fetch_array($tampil)){
                    echo "<tr><td>$no</td>
                              <td>$r[no_sambungan]</td>
                              <td>$r[nama]</td>
                              <td>$r[alamat]</td>
                              <td>$r[cabang]</td>
                              <td>$r[nohp]</td>
                              <td>$r[tgl_pelanggan]</td>
                              <td><center>
                                <a class='btn btn-success btn-xs' title='Edit Data' href='index.php?view=pelanggan&act=edit&id_pelanggan=$r[id_pelanggan]'><span class='glyphicon glyphicon-edit'></span></a>
                                <a class='btn btn-danger btn-xs' title='Delete Data' href='index.php?view=pelanggan&hapus=$r[id_pelanggan]'><span class='glyphicon glyphicon-remove'></span></a>
                              </center></td>
                          </tr>";
                      $no++;
                      }
                      if (isset($_GET[hapus])){
                          mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM pelanggan where id_pelanggan='$_GET[hapus]'");
                          echo "<script>document.location='index.php?view=pelanggan';</script>";
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
        $query = mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE pelanggan SET no_sambungan='$_POST[no_sambungan]',Nama = '$_POST[nama]',alamat='$_POST[alamat]',cabang='$_POST[cabang]',nohp='$_POST[nohp]',tgl_pelanggan='$_POST[tgl]',username='$_POST[un]',password='$pass' where id_pelanggan='$_POST[id_pel]'");
        if ($query){
            echo "<script>document.location='index.php?view=pelanggan&sukses';</script>";
        }else{
            echo "<script>document.location='index.php?view=pelanggan&gagal';</script>";
        }
    }
    $edit = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM pelanggan where id_pelanggan='$_GET[id_pelanggan]'");
    $s = mysqli_fetch_array($edit);
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Edit Data pelanggan</h3>
                </div>
              <div class='box-body'>
              <form method='POST' class='form-horizontal' action='' enctype='multipart/form-data'>
                <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                   <tbody>
                        <tr><th width='120px' scope='row'>id pelanggan</th> <td><input type='text' class='form-control' name='id_pel' value='$s[id_pelanggan]' readonly='readonly'> </td></tr>
                     <tr><th width='120px' scope='row'>no sambungan</th> <td><input type='text' class='form-control' name='no_sambungan' value='$s[no_sambungan]'> </td></tr>
                    <tr><th width='120px' scope='row'>Nama </th> <td><input type='text' class='form-control' name='nama' value='$s[nama]'> </td></tr>
                    <tr><th width='120px' scope='row'>Alamat </th> <td><input type='text' class='form-control' name='alamat' value='$s[alamat]'> </td></tr>
                    <tr><th width='120px' scope='row'>cabang </th> <td>
                    <select name='cabang' class='form-control'>
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
                    <tr><th width='120px' scope='row'>No Telepon</th> <td><input type='text' class='form-control' name='nohp' value='$s[nohp]'> </td></tr>
                    <tr><th width='120px' scope='row'>Tanggal</th> <td><input type='date'  name='tgl' > </td></tr>
<tr><th width='120px' scope='row'>Username</th> <td><input type='text' class='form-control' name='un' value='$s[username]'> </td></tr>
                    <tr><th scope='row'>Password</th>     <td><input type='text' class='form-control' name='pw' placeholder='masukan Password baru'></td></tr>
                     <tr><th scope='row'>level</th>      <td><input class='form-control' name='lvl'value='pelanggan' readonly='readonly'></td></tr>
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

      $query = mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO pelanggan VALUES('$_POST[id_pel]','$_POST[no_sambungan]','$_POST[nama]','$_POST[alamat]','$_POST[cabang]','$_POST[nohp]','$_POST[tgl]','$_POST[un]','$passs')");
      if ($query){
            echo "<script>document.location='index.php?view=pelanggan&sukses';</script>";
      }else{
            echo "<script>document.location='index.php?view=pelanggan&gagal';</script>";
      }
    }

    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Tambah Data pelanggan</h3>
                </div>
              <div class='box-body'>
              <form method='POST' class='form-horizontal' action='' enctype='multipart/form-data'>
                <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <tr><th width='120px' scope='row'>id pelanggan</th> <td><input type='text' class='form-control' name='id_pel'> </td></tr>
                     <tr><th width='120px' scope='row'>no sambungan</th> <td><input type='text' class='form-control' name='no_sambungan'> </td></tr>
                    <tr><th width='120px' scope='row'>Nama </th> <td><input type='text' class='form-control' name='nama'> </td></tr>
                    <tr><th width='120px' scope='row'>Alamat </th> <td><input type='text' class='form-control' name='alamat'> </td></tr>
                    <tr><th width='120px' scope='row'>cabang </th> <td>
                    <select name='cabang' class='form-control'>
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
                    <tr><th width='120px' scope='row'>No Telepon</th> <td><input type='text' class='form-control' name='nohp'> </td></tr>
                    <tr><th width='120px' scope='row'>Tanggal</th> <td><input type='date'  name='tgl'> </td></tr>
                    <tr><th width='120px' scope='row'>Username</th> <td><input type='text' class='form-control' name='un'> </td></tr>
                    <tr><th scope='row'>Password</th>     <td><input type='text' class='form-control' name='pw'></td></tr>                    
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