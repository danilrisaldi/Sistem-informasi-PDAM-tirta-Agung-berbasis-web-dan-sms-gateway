<div class="row" align="center">
    <div class="col-xs-12">
      <div class="col-xs-2"></div>
            <a style='color:#000' href='index.php?view=input_jadwal'>
            <div class="col-md-2 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-purple"><i class="fa fa-envelope"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Input Jadwal</span>
                  <span class="info-box-number"><?php echo $input_jadwal[total]; ?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            </a>
            <div class="col-md-1"></div>

            <a style='color:#000' href='index.php?view=outbox'>
            <div class="col-md-2 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-blue"><i class="fa fa-envelope-o"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Lihat Jadwal</span>
                  <span class="info-box-number"><?php echo $lihat_jadwal[total]; ?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            </a>
            <div class="col-md-1"></div>
            <a style='color:#000' href='index.php?view=sentitems'>
            <div class="col-md-2 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-send"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Input Note</span>
                  <span class="info-box-number"><?php echo $input_note[total]; ?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            </a>
            <div class="col-xs-2"></div>
      </div>
</div>