        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="../images/<?php echo $foto; ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $nama; ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header" style='color:#fff; text-transform:uppercase; border-bottom:2px solid #00c0ef'>MENU <?php echo $level; ?></li>
            <li><a href="index.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
             <li class="treeview">
              <a href="#"><i class="fa fa-th-list"></i> <span>Data master</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                 <li><a href="index.php?view=pegawai"><i class="fa fa-th-list"></i> pegawai <span class="badge"><?php echo $pegawai[total]; ?></span></a></li>
                 <li><a href="index.php?view=pelanggan"><i class="fa fa-th-list"></i> pelanggan<span class="badge"><?php echo $pelanggan[total]; ?></span></a></li>
                 <li><a href="index.php?view=pengumuman"><i class="fa fa-th-list"></i> pengumuman <span class="badge"><?php echo $pengumuman[total]; ?></span></a></li>        
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-th-list"></i> <span>Data pengaduan</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                 <li><a href="index.php?view=pengaduan_masuk"><i class="fa fa-th-list"></i> masuk <span class="badge"><?php echo $pengaduan_masuk[total]; ?></span></a></li>
                 <li><a href="index.php?view=pengaduan_proses"><i class="fa fa-th-list"></i> proses<span class="badge"><?php echo $pengaduan_proses[total]; ?></span></a></li>
                 <li><a href="index.php?view=pengaduan_selesai"><i class="fa fa-th-list"></i> selesai <span class="badge"><?php echo $pengaduan_selesai[total]; ?></span></a></li> 
                  <li><a href="index.php?view=penilaian"><i class="fa fa-th-list"></i> Penilaian <span class="badge"><?php echo $penilaian[total]; ?></span></a></li>             
              </ul>
            </li>
            <li class="treeview">
            <a href="#"><i class="fa fa-th-list"></i> <span>Data Cek berkala</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                 <li><a href="index.php?view=jadwal"><i class="fa fa-th-list"></i> jadwal <span class="badge"><?php echo $jadwal[total]; ?></span></a></li>
                 <li><a href="index.php?view=hasil"><i class="fa fa-th-list"></i> hasil<span class="badge"></span></a></li>            
              </ul>
            </li>
           
            <li class="treeview">
              <a href="#"><i class="fa fa-send"></i> <span>Send SMS</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="index.php?view=sms"><i class="fa fa-circle-o"></i> Single SMS</a></li>
                <li><a href="index.php?view=sms_pengumuman"><i class="fa fa-circle-o"></i> SMS Pengumuman</a></li>
                <li><a href="index.php?view=sms_cekberkala"><i class="fa fa-circle-o"></i> SMS Cek berkala</a></li>
                <li><a href="index.php?view=sms_pengaduan"><i class="fa fa-circle-o"></i> SMS Pengaduan</a></li>
              </ul>
            </li>
             <li class="treeview">
              <a href="#"><i class="fa fa-th-list"></i> <span>Data sms</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                 <li><a href="index.php?view=inbox"><i class="fa fa-th-list"></i> Inbox <span class="badge"><?php echo $a[total]; ?></span></a></li>
                 <li><a href="index.php?view=outbox"><i class="fa fa-list"></i> Outbox <span class="badge"><?php echo $b[total]; ?></span></a></li>
                 <li><a href="index.php?view=sentitems"><i class="fa fa-share-alt"></i> Sent Items <span class="badge"><?php echo $c[total]; ?></span></a></li>               
              </ul>
            </li>
           
            <li class="treeview">
              <a href="#"><i class="fa fa-cog"></i> <span>Setting</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="index.php?view=setting"><i class="fa fa-circle-o"></i> Modem Setting</a></li>
              </ul>
            </li>
          </ul>
        </section>