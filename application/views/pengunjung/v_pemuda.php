
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
                    
                      <?php $angka = array(1,2,3,4,5,6); ?>
                      <?php foreach ($angka as $key):?>
                        <a href="<?php echo base_url().'pengunjung/pengunjung/get_pemudart'?>?angka=<?php echo $key ?>">
                          <!-- dalam mengirim menggunakan link tag a pada html caranya adalah 
                          setelah alamat link lalu tanda tanya kemudian beri variabel untuk menampung apa yang akan dikirim
                          isi yang dikirim adalah setelah tanda =  dalam metode ini pengirimanya menggunakan metode get -->
                          <input class="btn-success" type="button" name="" value="RT<?php echo $key; ?>">
                        </a>
                      <?php endforeach;?>
              
                        <a href="<?= base_url('pengunjung/pengunjung/get_pemuda') ?>">
                        <input type="button" name="" value="Semua" class="btn-success">
                      </a>
                    

                    <table class="table table-striped jambo_table bulk_action">
                      <thead>
                        <tr class="headings">
                          <th>NO</th>
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
                        <?php $no =$offset + 1; // offset agar urutan nomor tabel tetap urut di pagination  
                        foreach ($data as $pemuda) { ?>
                         <tr class="even pointer">
                          
                          <td><?= $no; ?></td>
                          <td><?= $pemuda->nama; ?></td>
                          <td><?= tgl_indo($pemuda->tanggal_lahir); ?></td>
                          <td><?= $pemuda->jenis_kelamin ?></td>
                          <td><?= $pemuda->umur ?></td>
                          <td><?= $pemuda->agama ?></td>
                          <td><?= $pemuda->status ?></td>
                          <td><?= $pemuda->alamat ?></td>
                          <td><?= $pemuda->pekerjaan ?></td>
                          <td><?= $pemuda->rt ?></td>
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