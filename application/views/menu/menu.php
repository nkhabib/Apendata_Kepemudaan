

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg'); ?>" ></div>
          <!-- top tiles -->
          <div class="row tile_count">
            <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Penduduk</span>
              <div class="count"><?php echo $jml; ?></div>
              <!-- <span class="count_bottom"><i class="green">4% </i> Tahun 2020</span> -->
            </div>
            <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-clock-o"></i> Total Laki-laki</span>
              <div class="count"><?php echo $lk; ?></div>
              <!-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i>Tahun 2020</span> -->
            </div>
            <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Perempuan</span>
              <div class="count green"><?php echo $pr; ?></div>
              <!-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> Tahun 2020</span> -->
            </div>
            <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Pemuda</span>
              <div class="count"><?php echo $pmd; ?></div>
              <!-- <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> Tahun 2020</span> -->
            </div>
            <!-- <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Kelas</span>
              <div class="count">2,315</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Karyawan</span>
              <div class="count">7,325</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
            </div> -->
          </div>



        </div>
        <!-- /page content -->

        