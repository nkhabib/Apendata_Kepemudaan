<div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Tabel Penduduk</small></h2>
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
                    <?php echo form_open("pengunjung/pengunjung/cari_penduduk"); ?>

                      <select class="btn btn-default" name="cariberdasarkan" >

                        <option value="">Cari Berdasarkan</option>
                        <option value="nama">Nama</option>
                        <option value="tanggal_lahir">Tanggal Lahir</option> <!-- value sesuai dengan nama field di database --> 
                        <option value="umur">Umur</option>
                        <option value="agama">Agama</option>
                        <option value="status">Status</option>
                        <option value="alamat">Alamat</option>
                        <option value="pekerjaan">Pekerjaan</option>
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
                          <th>Nama</th>
                          <th>Tanggal Lahir</th>
                          <th>Jenis Kelamin</th>
                          <th>Umur</th>
                          <th>Agama</th>
                          <th>Status</th>
                          <th>Alamat</th>
                          <th>Pekerjaan</th>
                          <th>RT</th>
                      </thead>


                      <tbody>
                        <?php foreach ($penduduk as $use) { ?>
                        <tr>
                          <td><?= $use->nama; ?></td>
                          <td><?= tgl_indo($use->tanggal_lahir); ?></td>
                          <td><?= $use->jenis_kelamin; ?></td>
                          <td><?= $use->umur; ?></td>
                          <td><?= $use->agama; ?></td>
                          <td><?= $use->status; ?></td>
                          <td><?= $use->alamat; ?></td>
                          <td><?= $use->pekerjaan; ?></td>
                          <td><?= $use->rt; ?></td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                    <div class="col-md-12 col-md-offset-5">
                      <a href="<?= base_url('pengunjung/pengunjung/get_penduduk'); ?>">
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