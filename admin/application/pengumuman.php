<?php if ($_GET[act]==''){ ?> 
            <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Pengumuman </h3>
                  <a class='pull-right btn btn-primary btn-sm' href='index.php?view=pengumuman&act=tambah'>Tambahkan Data</a>
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
                        <th>Judul </th>
                        <th>Isi </th>
                        <th>Foto </th>
                        <th>Tanggal </th>
                        <th style='width:40px'>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $tampil = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM pengumuman ORDER BY id_pengumuman DESC");
                    $no = 1;
                    while($r=mysqli_fetch_array($tampil)){
                    echo "<tr><td>$no</td>
                              <td>$r[judul]</td>
                              <td>$r[isi]</td>
                              <td><img src='../images/$r[foto]' width='40'></td>
                              <td>$r[tanggal]</td>
                              <td><center>
                                
                                <a class='btn btn-danger btn-xs' title='Delete Data' href='index.php?view=pengumuman&hapus=$r[id_pengumuman]'><span class='glyphicon glyphicon-remove'></span></a>
                              </center></td>
                          </tr>";
                      $no++;
                      }
                      if (isset($_GET[hapus])){
                          mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM pengumuman where id_pengumuman='$_GET[hapus]'");
                          echo "<script>document.location='index.php?view=pengumuman';</script>";
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
        $namae = $_FILES['foto']['name'];
       $tmp_file = $_FILES['foto']['tmp_name'];
     // Set path folder tempat menyimpan gambarnya
       $path = "../images/".$namae;
      move_uploaded_file($tmp_file, $path);
        $query = mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE pengumuman SET judul = '$_POST[judul]',isi='$_POST[isi]',foto='".$namae."',tanggal='$_POST[tanggal]' where id_pengumuman='$_POST[id_pengumuman]'");
        if ($query){
            echo "<script>document.location='index.php?view=pengumuman&sukses';</script>";
        }else{
            echo "<script>document.location='index.php?view=pengumuman&gagal';</script>";
        }
    }
    $edit = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM pengumuman where id_pengumuman='$_GET[id_pengumuman]'");
    $s = mysqli_fetch_array($edit);
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Edit Data pengumuman</h3>
                </div>
              <div class='box-body'>
              <form method='POST' class='form-horizontal' action='' enctype='multipart/form-data'>
                <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                   <tbody>
                      <tr><th width='120px' scope='row'>id pengumuman</th> <td><input type='text' class='form-control' name='id_pengumuman' readonly='readonly' value='$s[id_pengumuman]'> </td></tr>
                    <tr><th width='120px' scope='row'>Judul </th> <td><input type='text' class='form-control' name='judul' value='$s[judul]'> </td></tr>

                    <tr><th width='120px' scope='row'>isi </th> <td><textarea class='form-control' name='isi'>$s[isi]</textarea> </td></tr>                  
                   <tr><th width='120px' scope='row'>foto </th> <td><input type='file' name='foto' value='$s[foto]'> </td></tr>
                   <tr><th width='120px' scope='row'>foto </th> <td><input type='date' name='tanggal' value='$s[tanggal]'> </td></tr>
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
       $namaf = $_FILES['foto']['name'];
       $tmp_file = $_FILES['foto']['tmp_name'];
    // Set path folder tempat menyimpan gambarnya
      $path = "../images/".$namaf;
     move_uploaded_file($tmp_file, $path);
      $query = mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO pengumuman VALUES('','$_POST[judul]','$_POST[isi]','".$namaf."','$_POST[tanggal]','$id_pegawai')");
      if ($query){
            echo "<script>document.location='index.php?view=pengumuman&sukses';</script>";
      }else{
            echo "<script>document.location='index.php?view=pengumuman&gagal';</script>";
      }
    }

    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Tambah Data pengumuman</h3>
                </div>
              <div class='box-body'>
              <form method='POST' class='form-horizontal' action='' enctype='multipart/form-data'>
                <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <tr><th width='120px' scope='row'>Judul </th> <td><input type='text' class='form-control' name='judul'> </td></tr>
                    <tr><th width='120px' scope='row'>isi </th> <td><textarea class='ckeditor' name='isi' id='ckedtor'></textarea> </td></tr>                  
                   <tr><th width='120px' scope='row'>foto </th> <td><input type='file' name='foto' > </td></tr>
                   <tr><th width='120px' scope='row'>tanggal </th> <td><input type='date' name='tanggal'> </td></tr>
                  </tbody>
                  </table>
                </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='tambah' class='btn btn-info'>Tambahkan</button>
                    <a href='index.php?view=guru'><button class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
              </form>
            </div>


           


            ";
}
?>