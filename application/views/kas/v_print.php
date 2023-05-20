
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
                   		<a href="<?= base_url('kas/kas/laporan'); ?>" class="btn btn-round btn-default" >Kembali</a>
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
                      <h3>Laporan Keuangan Karang Taruna Dusun Basongan</h3>
                      <?php $tgl = date('Y-m-d'); ?>
                      <h3>Dicetak Tanggal <?php echo tgl_indo($tgl); ?></h3>
                    </div>

                    <div class="x_title"></div><br>
                    <table class="table table-striped jambo_table bulk_action">
                      <thead>
                        <tr class="headings">
                          <th>No</th>
                          <th>Tanggal</th>
                          <th>Masuk/Keluar</th>
                          <th>Keterangan</th>
                          <th>Jumlah</th>
                          <th>Saldo Ahir</th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php $no = 1; foreach ($data as $item => $kas): ?>
                         <tr class="even pointer">
                          <td><?php echo $no++; ?></td>  
                          <td><?php echo tgl_indo($kas->tanggal); ?></td>
                          <td><?php echo $kas->makel; ?></td>
                          <td><?php echo $kas->keterangan; ?></td>
                          <td><?php echo rupiah(abs($kas->jumlah)); ?></td>
                          <td><?php echo rupiah(abs($kas->saldo_ahir)); ?></td>
                        </tr>
                        <?php endforeach; ?>
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