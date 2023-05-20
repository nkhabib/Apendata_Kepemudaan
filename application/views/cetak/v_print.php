
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>
            <div class="row">
                  
              <div class="col-md-12 col-sm-12 col-xs-12">
                <!-- <div class="x_panel"> -->
                  <div class="x_title">
                    
                    <div class="none-print">
                      <h2><?= $judul ?></h2>
                    </div>

                   <div class="col-md-5 none-print">
                   		<a href="<?= base_url('cetak/cetak/cetak'); ?>" class="btn btn-round btn-default" >Kembali</a>
                   		<a onclick="window.print()" class="btn btn-round btn-default" target="blank"><i class="fa fa-print"></i> Cetak</a>
                    </div>

                    <ul class="nav navbar-right panel_toolbox none-print">
                      <li>
                        <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li>
                        <a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>

                    <br>
                    <br>
                    <!-- end x tittle -->
                  </div>

                  <div class="x_content">
                    <?php if ($jenis == 'penduduk'):?>
                    <div class="text-center">
                      <h3>Laporan Jumlah Penduduk Dusun Basongan</h3>
                      <h3>Dicetak Tanggal <?php echo $tanggal; ?></h3>
                    </div>
                    <?php else: ?>
                      <div class="text-center">
                        <h2>Laporan Jumlah Penduduk <?= strtoupper($macam); ?> Dusun Basongan Tahun <?php echo $tahun; ?></h2>
                        <h2>Dicetak Tanggal <?= $tanggal; ?></h2>
                      </div>
                    <?php endif;?>
                    <div class="x_title"></div><br>
                    <table class="table table-striped jambo_table bulk_action">
                      <thead>
                        <tr class="headings">
                          <th>NO</th>
                          <th>No Ktp</th>
                          <th>No KK</th>
                          <th>Nama</th>
                          <th>Tanggal Lahir</th>
                          <th>Jenis Kelamin</th>
                          <th>Umur</th>
                          <th>Agama</th>
                          <th>Status</th>
                          <th>Alamat</th>
                          <th>Pekerjaan</th>
                          <th>RT</th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php $no = + 1; // offset agar urutan nomor tabel tetap urut di pagination  
                        foreach ($data as $penduduk) { ?>
                         <tr class="even pointer">
                          <td><?= $no; ?></td>
                          <td><?= $penduduk->no_ktp; ?></td>
                          <td><?= $penduduk->no_kk ?></td>
                          <td><?= $penduduk->nama; ?></td>
                          <td><?= tgl_indo($penduduk->tanggal_lahir); ?></td>
                          <td><?= $penduduk->jenis_kelamin ?></td>
                          <td><?= $penduduk->umur ?></td>
                          <td><?= $penduduk->agama ?></td>
                          <td><?= $penduduk->status ?></td>
                          <td><?= $penduduk->alamat ?></td>
                          <td><?= $penduduk->pekerjaan ?></td>
                          <td><?= $penduduk->rt ?></td>
                        </tr>
                        <?php $no++; } ?>
                      </tbody>
                    </table>
                    <?php $jml = count($data); ?>
                      <table class="table">
                        <?php if ($jenis=='penduduk'): ?>
                          <td><?="Jumlah Total Penduduk = $jml";?></td>
                          <td><?="Jumlah Laki-laki = $laki";?></td>
                          <td><?="Jumlah Perempuan = $cewek";?></td>
                          <td><?="Jumlah KK = $kepala"?></td>
                          <tr>
                            <?php foreach ($jmlrt as $total):?>
                              <td>
                                <?php echo "$total"; ?>
                              </td>
                            <?php endforeach; ?>
                          </tr>
                        <?php else:?>
                          <td>Jumlah Penduduk <?= strtoupper($macam);?> = <?= $jml?></td>
                          <td><?="Jumlah Laki-laki = $laki";?></td>
                          <td><?="Jumlah Perempuan = $cewek";?></td>
                          <td><?="Jumlah KK = $kepala"?></td>
                        <?php endif;?>
                      </table>
                      <!-- strtrouper adalah sintak php untuk mengubahh huruf menjadi besar semua -->
                  </div>
                </div>
              </div>

              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->