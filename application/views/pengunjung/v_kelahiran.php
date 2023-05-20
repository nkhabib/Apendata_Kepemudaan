
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
                    
                    

                    <table class="table table-striped jambo_table bulk_action">
                      <thead>
                        <tr class="headings">
                          <th>NO</th>
                          <th>Nama</th>
                          <th>Jenis Kelamin</th>
                          <th>Tempat Lahir</th>
                          <th>Tanggal Lahir</th>
                          <th>Nama Ayah</th>
                          <th>Nama Ibu</th>
                          <th>Kondisi</th>
                          <th>Berat</th>
                          <th>Panjang</th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php $no =$offset + 1; // offset agar urutan nomor tabel tetap urut di pagination  
                        foreach ($data as $kelahiran) { ?>
                         <tr class="even pointer">
                          
                          <td><?= $no; ?></td>
                          <td><?= $kelahiran->nama; ?></td>
                          <td><?= $kelahiran->jenis_kelamin ?></td>
                          <td><?= $kelahiran->tempat_lahir ?></td>
                          <td><?= tgl_indo($kelahiran->tanggal_lahir); ?></td>
                          <td><?= $kelahiran->nama_ayah ?></td>
                          <td><?= $kelahiran->nama_ibu ?></td>
                          <td><?= $kelahiran->kondisi ?></td>
                          <td><?= $kelahiran->berat ?></td>
                          <td><?= $kelahiran->panjang ?></td>
                        </tr>
                        <?php $no++; } ?>
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