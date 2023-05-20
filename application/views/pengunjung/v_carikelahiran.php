<div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Tabel Kelahiran</small></h2>
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
                    <?php echo form_open("pengunjung/pengunjung/cari_kelahiran"); ?>

                      <select class="btn btn-default" name="cariberdasarkan" >

                        <option value="">Cari Berdasarkan</option>
                        <option value="nama">Nama</option>
                        <option value="tanggal_lahir">Tanggal Lahir</option> <!-- value sesuai dengan nama field di database --> 
                        <option value="tempat_lahir">Tempat Lahir</option>
                        <option value="nama_ayah">Nama Ayah</option>
                        <option value="nama_ibu">Nama Ibu</option>
                        <option value="berat">Berat</option>
                        <option value="panjang">Panjang</option>
                      </select>

                      <input form-control mr-sm-2 type="text" name="yangdicari" id="">
                      <button class="btn btn-default" type="submit" >Cari</button>
                      <?php echo  form_close(); ?>

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
                          <th>Nama</th>
                          <th>Jenis Kelamin</th>
                          <th>Tempat Lahir</th>
                          <th>Tanggal Lahir</th>
                          <th>Nama  Ayah</th>
                          <th>Nama Ibu</th>
                          <th>Kondisi</th>
                          <th>Berat</th>
                          <th>Panjang</th>
                      </thead>


                      <tbody>
                        <?php foreach ($kelahiran as $use) { ?>
                        <tr>
                          <td><?= $use->nama; ?></td>
                          <td><?= $use->jenis_kelamin; ?></td>
                          <td><?= $use->tempat_lahir; ?></td>
                          <td><?= tgl_indo($use->tanggal_lahir); ?></td>
                          <td><?= $use->nama_ayah; ?></td>
                          <td><?= $use->nama_ibu; ?></td>
                          <td><?= $use->kondisi; ?></td>
                          <td><?= $use->berat; ?></td>
                          <td><?= $use->panjang; ?></td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                    <div class="col-md-12 col-md-offset-5">
                      <a href="<?= base_url('pengunjung/pengunjung/get_kelahiran'); ?>">
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