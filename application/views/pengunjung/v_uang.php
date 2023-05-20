
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                   <h2><?= $judul ?></h2>
                    
                    <ul class="nav navbar-right panel_toolbox">
                      <li>
                        <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <?php echo form_open("pengunjung/pengunjung/cari_uang"); ?>

                      <select class="btn btn-default" name="cariberdasarkan" >

                        <option value="">Cari Berdasarkan</option>
                        <option value="tanggal">Tanggal</option> <!-- value sesuai dengan nama field di database --> 
                        <option value="keterangan">Keterangan</option>
                        <option value="Jumlah">Jumlah</option>
                      </select>

                      <input form-control mr-sm-2 type="text" name="yangdicari" id="">
                      <button class="btn btn-default" type="submit" >Cari</button>
                      <?php echo  form_close(); ?>
              
                      <a href="<?= base_url('pengunjung/pengunjung/masuk_uang'); ?>">
                        <input type="button" name="" value="masuk" class="btn-success">
                      </a>

                      <a href="<?= base_url('pengunjung/pengunjung/keluar_uang'); ?>">
                        <input type="button" name="" value="keluar" class="btn-success">
                      </a>
                    

                    <table class="table table-striped jambo_table bulk_action">
                      <thead>
                        <tr class="headings">
                          <th>NO</th>
                          <th>Tanggal</th>
                          <th>Masuk / Keluar</th>
                          <th>Keterangan</th>
                          <th>Jumlah</th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php $no =$offset + 1; $total = 0; // offset agar urutan nomor tabel tetap urut di pagination  
                        foreach ($data as $uang): ?>
                         <tr class="even pointer">
                          
                          <td><?php echo $no; ?></td>
                          <td><?php echo tgl_indo($uang->tanggal); ?></td>
                          <td>
                            <?php $makel =  $uang->makel;
                              if ($makel == 'masuk') 
                              {
                                echo "Masuk";
                              } else
                                {
                                  echo "Keluar";
                                }
                            ?>
                              
                            </td>
                          <td><?php echo $uang->keterangan; ?></td>
                          <td><?php echo rupiah(abs($uang->jumlah)); ?></td>
                        </tr>
                        <?php $no++;
                        $total += $uang->jumlah;
                         endforeach; ?>
                         <tr>
                            <td></td>
                            <td><h2>Saldo Ahir</h2></td>
                            <td></td>
                            <td></td>
                            <td><h4><?php echo rupiah($total); ?></h4></td>
                            <td></td>
                          </tr>
                      </tbody>
                    </table>
                    <?php echo $halaman; ?>
                  </div>
                </div>
              </div>
          
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->