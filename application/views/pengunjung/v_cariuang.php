<div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Tabel Keuangan Kas Karang Taruna</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li>
                        <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
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

                      <?php

                      if ($jumlah=="0")
                        {
                          echo "Pencarian Tidak Ditemukan Dengan Data Manapun";
                        } else {

                                  if(isset($jumlah))
                                    {
                                        if($cariberdasarkan=="")
                                          {


                                              echo "Hasil Pencarian <b>'". $yangdicari ."'</b> : " . $jumlah;



                                          } else  {
                                                    echo "Hasil Pencarian Berdasarkan <b>'" . $cariberdasarkan . " = " . $yangdicari . "'</b> adalah : " . $jumlah;
                                                  }
                                    }
                                }


    

                        ?>
                    
                    <table class="table table-striped table-bordered bulk_action">
                      <thead>
                        <tr>
                          <th>NO</th>
                          <th>Tanggal</th>
                          <th>Masuk / Keluar</th>
                          <th>Keterangan</th>
                          <th>Jumlah</th>
                      </thead>


                      <tbody>
                        <?php $no = 1; foreach ($uang as $key) { ?>
                        <tr>
                          <td><?php echo  $no; ?></td>
                          <td><?php  echo tgl_indo($key->tanggal); ?></td>
                          <td>
                            <?php $makel = $key->makel; 
                              if ($makel == 'masuk') 
                              {
                                echo "Masuk";
                              } else
                                {
                                  echo "Keluar";
                                }
                            ?>
                          </td>
                          <td><?php echo $key->keterangan; ?></td>
                          <td><?php echo rupiah(abs($key->jumlah)); ?></td>
                        </tr>
                        <?php $no++; } ?>
                      </tbody>
                    </table>
                    <div class="col-md-12 col-md-offset-5">
                      <a href="<?= base_url('pengunjung/pengunjung/uang'); ?>">
                        <input type="button" class="btn btn-round btn-success" value="Kembali" name="">
                      </a>
                    </div>
                  </div>
                </div>
              </div>

          
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>