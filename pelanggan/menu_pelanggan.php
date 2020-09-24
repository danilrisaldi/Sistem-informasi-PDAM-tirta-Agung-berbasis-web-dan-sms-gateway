        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image" >
              ||
            </div>
            <div class="pull-left info">
              <p><?php echo $nama; ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header" style='color:#fff; text-transform:uppercase; border-bottom:2px solid #00c0ef'>MENU <?php echo $level; ?></li>
            <li><a href="home.php"><i class="fa fa-dashboard"></i> <span>Home</span></a></li>
             <li><a href="index.php?view=pengumuman"><i class="fa fa-bullhorn"></i> <span>Pengumuman</span></a></li>
            <li class="treeview">
              <a href="#"><i class="fa  fa-calendar-times-o"></i> <span> Cek Berkala</span><i class="fa fa-angle-left ></i></a>
              <ul class="treeview-menu">
                 <li><a href="index.php?view=jadwal"><i class="fa fa-calendar-plus-o"></i> jadwal </span></a></li>
                 <li><a href="index.php?view=hasil"><i class="fa fa-calendar-check-o"></i> hasil </a></li>
              </ul>
            </li>
             <li class="treeview">
              <a href="#"><i class="fa fa-th-list"></i> <span> Pengaduan</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                 <li><a href="index.php?view=pengaduan"><i class="fa fa-pencil"></i>Pengaduan </a></li>
                 <li><a href="index.php?view=status"><i class="fa fa-search"></i>Status<span class="badge"><?php echo $pengaduan_masuk[total]; ?></span></a></li>
                 <li><a href="index.php?view=penilaian"><i class="fa fa-star"></i>Penilaian<span class="badge"><?php echo $penilaian[total]; ?></span></a></li>
                 <li><a href="index.php?view=riwayat"><i class="fa fa-history"></i>Riwayat<span class="badge"><?php echo $riwayat[total]; ?></span></a></li>
              </ul>
            </li>
          </ul>
        </section>