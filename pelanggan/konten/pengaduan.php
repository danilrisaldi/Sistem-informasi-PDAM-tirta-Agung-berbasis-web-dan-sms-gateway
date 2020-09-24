  <?php 
        if (isset($_GET['sukses'])){
                      echo "<div class='alert alert-success alert-dismissible fade in' role='alert'> 
                          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>×</span></button> <strong>Sukses!</strong>  pengaduan telah Di kirim,..
                          </div>";
                  }elseif(isset($_GET['gagal'])){
                      echo "<div class='alert alert-danger alert-dismissible fade in' role='alert'> 
                          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>×</span></button> <strong>Gagal!</strong> - pengaduan dikirim,..
                          </div>";
                  }?>
  <div class="col-xs-1"></div>
 <div class="col-xs-10"> 
  <?php
  if($_GET[act]==''){
  if (isset($_POST[simpan])){
       $tgl=date('y-m-d');
       $status='dikirim';
       $nama = $_FILES['foto']['name'];
       $tmp_file = $_FILES['foto']['tmp_name'];
    // Set path folder tempat menyimpan gambarnya
      $path = "../images/".$nama;
       move_uploaded_file($tmp_file, $path);
      $query = mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO pengaduan VALUES('','$_POST[id_pelanggan]','$_POST[jenis]','$_POST[deskripsi]','".$nama."','$tgl','','','$status','','','','')");

      if ($query){
            echo "<script>document.location='index.php?view=pengaduan&sukses';</script>";
      }else{
            echo "<script>document.location='index.php?view=pengaduan&gagal';</script>";
      }
    }
 echo "     <p> <h3>pengaduan </h3> apa itu pelayanan pengaduan ?
layanan pengaduan merupakan salah satu pelayanan yang dapat di gunakan pelanggan yang ingin melaporkan pengaduan permasalahan secara online.</p>
             <form action='' method='post' enctype='multipart/form-data'>
                  <input type='hidden' name='id_pelanggan' class='form-control' value='$id_pelanggan' ><br>
                  <label>jenis</label>
                  <select name='jenis' class='form-control'>
                    <option>air tidak mengalir</option>
                    <option>salah baca stand</option>
                    <option>kebocoran</option>
                    <option>kualitas air</option>
                    <option>pelanggaran</option>
                    <option>lainnya</option>
                  </select><br>
                  <label>deskripsi</label>
                  <textarea name='deskripsi' class='form-control'></textarea><br>
                  <label>foto</label>
                  <input type='file' name='foto'><br>
                  <button name='simpan' class='btn btn-primary'>simpan</button>
                  <button name='reset' class='btn btn-secondary'>batal</button>
                </form>
                <br>
                <br>
                <br>
                <br>
                <br>
    ";
   }
?>
