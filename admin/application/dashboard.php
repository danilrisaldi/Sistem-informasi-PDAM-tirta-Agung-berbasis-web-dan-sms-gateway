  <div class="row">
            <a style='color:#000' href='index.php?view=pelanggan'>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-blue"><i class="fa fa-id-card"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Pelanggan</span>
                  <span class="info-box-number"><?php echo $pelanggan[total]; ?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            </a>

            <a style='color:#000' href='index.php?view=pegawai'>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-purple"><i class="fa fa-id-card-o"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Pegawai</span>
                  <span class="info-box-number"><?php echo $pegawai[total]; ?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            </a>

            <a style='color:#000' href='index.php?view=pengumuman'>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-orange"><i class="fa fa-bullhorn"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">pengumuman</span>
                  <span class="info-box-number"><?php echo $pengumuman[total]; ?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            </a>

            <a style='color:#000' href='index.php?view=pengaduan_masuk'>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-pencil"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Pengaduan</span>
                  <span class="info-box-number"><?php echo $pengaduan_masuk[total]; ?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            </a>

            <a style='color:#000' href='index.php?view=inbox'>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-envelope"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Inbox</span>
                  <span class="info-box-number"><?php echo $a[total]; ?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            </a>

            <a style='color:#000' href='index.php?view=outbox'>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-envelope-o"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Outbox</span>
                  <span class="info-box-number"><?php echo $b[total]; ?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            </a>

            <a style='color:#000' href='index.php?view=sentitems'>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-send"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Sent Items</span>
                  <span class="info-box-number"><?php echo $c[total]; ?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            </a>

            <a style='color:#000' href='index.php?view=hasil'>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-gray"><i class="fa fa-calendar"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Cek Berkala</span>
                  <span class="info-box-number"><?php echo $hasil[total]; ?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            </a>
</div>

<div class="row">


<section class="col-lg-7 connectedSortable">
             <div class="box box-success">
            <div class="box-header ui-sortable-handle" style="cursor: move;">
              <i class="fa fa-comments-o"></i>
              <h3 class="box-title">Inbox</h3>
              <div class="box-tools pull-right" data-toggle="tooltip" title="Status">
                <div class="btn-group" data-toggle="btn-toggle">
                </div>
              </div>
            </div>
            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 360px;">
            <div class="box-body chat" id="chat-box" style="overflow: hidden; width: auto; height: 360px;">
              <?php 
                $smsq = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM sms_inbox ORDER BY id DESC LIMIT 5");
                while($r=mysqli_fetch_array($smsq)){
                    $nohp = str_replace('+62','0',$r[nohp]);
                    echo "<div class='item'>
                            <img src='../dist/img/users.gif' alt='user image' class='online'>
                            <p class='message'>
                              <a href='index.php?view=sms&nohp=$nohp' class='name'>
                                <small class='text-muted pull-right'><i class='fa fa-clock-o'></i> $r[waktu]</small>
                                $r[nohp]
                              </a>
                              $r[pesan]
                            </p>
                          </div>";
                }
              ?>
              
            </div>
            </div>
           
          </div>
      </section>

<section class="col-lg-5 connectedSortable">
                 <div class="box box-info">
                <div class="box-header">
                  <i class="fa fa-envelope"></i>
                  <h3 class="box-title">Quick SMS</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <form action="" method="post">
                    <div class="form-group">
                      <input type="number" class="form-control" name="a" placeholder="Phone Number..." required>
                    </div>
                    <div>
                      <textarea name='b' placeholder="Write a Message..." onKeyDown="textCounter(this.form.b,this.form.countDisplay);" onKeyUp="textCounter(this.form.b,this.form.countDisplay);" style="width: 100%; height: 205px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
                      <input type='number' name='countDisplay' size='3' maxlength='3' value='160' style='width:25%; text-align:center; border:1px solid #cecece' readonly> Sisa Karakter
                    </div>
                      <?php 
                        if (isset($_POST[kirim])){
                          if (isset($_POST[kirim])){
                            $m = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT ID FROM phones ORDER BY ID DESC LIMIT 1"));
                            $hasil = mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO outbox (DestinationNumber, SenderID, TextDecoded, CreatorID) VALUES ('$_POST[a]', '$m[ID]', '$_POST[b]', 'Gammu 1.28.90')");
                            if ($hasil){
                              echo "<center style='color:green; padding:15px 0px'>Success! - Pesan SMS Telah dikirim,...</center>";
                            }else{
                              echo "<center style='color:red; padding:15px 0px'>Pengiriman SMS gagal,...</center>";
                            }
                          }
                        }
                      ?>
                </div>
                <div class="box-footer clearfix">
                  <button type='submit' name='kirim' class="pull-right btn btn-default" id="sendEmail">Send <i class="fa fa-arrow-circle-right"></i></button>
                </div>
                </form>
              </div>
</section>

</div>