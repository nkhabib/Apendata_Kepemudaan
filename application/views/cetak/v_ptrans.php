
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
                   		<a href="<?= base_url('cetak/cetak/transaksi'); ?>" class="btn btn-round btn-default" >Kembali</a>
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
                    <div class="text-center">
                      <?php $nama = $trans->row_array();?>
                      <h4>Laporan Transaksi Surat Warga  Dusun Basongan</h4>
                      <h4>Atas Nama <?php echo $nama['nama'];?> Tahun <?php echo "$tahun"; ?></h4>
                      <h4>Dicetak Tanggal <?php echo tgl_indo(date('Y-m-d')); ?></h4>
                    </div>

                    <div class="x_title"></div><br>
                    <table class="table table-striped jambo_table bulk_action">
                      <thead>
                        <tr class="headings">
                          <th>No Ktp</th>
                          <th>Nama</th>
                          <th>Tanggal Lahir</th>
                          <th>Jenis Kelamin</th>
                          <th>Umur</th>
                          <th>Agama</th>
                          <th>Status</th>
                          <th>Alamat</th>
                          <th>Pekerjaan</th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php // offset agar urutan nomor tabel tetap urut di pagination  
                        foreach ($penduduk as $pen) { ?>
                         <tr class="even pointer">
                          <td><?= $pen->no_ktp; ?></td>
                          <td><?= $pen->nama; ?></td>
                          <td><?= tgl_indo($pen->tanggal_lahir); ?></td>
                          <td><?= $pen->jenis_kelamin ?></td>
                          <td><?= $pen->umur ?></td>
                          <td><?= $pen->agama ?></td>
                          <td><?= $pen->status ?></td>
                          <td><?= $pen->alamat ?></td>
                          <td><?= $pen->pekerjaan ?></td>
                        </tr>
                      <?php } ?>
                      </tbody>
                    </table>

                    <br><br>
                      <table class="table table-striped jambo_table bulk_action">
                      <thead>
                        <tr class="headings">
                          <th>NO</th>
                          <th>Jenis Transaksi</th>
                          <th>Tanggal Transaksi</th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php // offset agar urutan nomor tabel tetap urut di pagination  
                        $no = +1;
                        foreach ($trans->result() as $tr) { ?>
                         <tr class="even pointer">
                          <td><?php echo $no; ?></td>
                          <td><?php echo $tr->transaksi; ?></td>
                          <td><?php echo tgl_indo($tr->tanggal); ?></td>
                        </tr>
                      <?php $no++; } ?>
                      </tbody>
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