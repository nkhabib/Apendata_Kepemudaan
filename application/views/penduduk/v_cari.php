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
                    <div class="col-md-4">
                      <a href="<?php echo base_url('penduduk/penduduk/get_penduduk'); ?>" class="btn btn-info" >Kembali</a>
                    </div>
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
                    <?php echo form_open("penduduk/penduduk/cari"); ?>

                      <select class="btn btn-default" name="cariberdasarkan" >

                        <option value="">Cari Berdasarkan</option>
                        <option value="no_ktp">No KTP</option>
                        <option value="no_kk">No KK</option>
                        <option value="nama">Nama</option>
                        <option value="tanggal_lahir">Tanggal Lahir</option>
                        <option value="umur">Umur</option>
                        <option value="status">Status</option>
                        <option value="alamat">Alamat</option>
                        <option value="pekerjaan">Pekerjaan</option>
                        <option value="rt">RT</option>
                      </select>

                      <input form-control mr-sm-2 type="text" name="yangdicari" id="">
                      <button class="btn btn-default" type="submit" >Search</button>

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
                        
                          <th>No KTP</th>
                          <th>No KK</th>
                          <th>Nama</th>
                          <th>Tanggal Lahir</th>
                          <th>Jenis Kelamin</th>
                          <th>Umur</th>
                          <th>Agama</th>
                          <th>Status</th>
                          <!-- <th>Alamat</th> -->
                          <th>Pekerjaan</th>
                          <th>RT</th>
                          <th>Action</th>
                      </thead>


                      <tbody>
                        <?php foreach ($penduduk as $use) { ?>
                        <tr>
                          <?php if ($use->tahun==date('Y')&&$use->status!="Meninggal"):?>
                          <td><?= $use->no_ktp; ?></td>
                          <td><?= $use->no_kk; ?></td>
                          <td><?= $use->nama; ?></td>
                          <td><?= tgl_indo($use->tanggal_lahir); ?></td>
                          <td><?= $use->jenis_kelamin; ?></td>
                          <td><?= $use->umur; ?></td>
                          <td><?= $use->agama; ?></td>
                          <td><?= $use->status; ?></td>
                          <!-- <td><?= $use->alamat; ?></td> -->
                          <td><?= $use->pekerjaan; ?></td>
                          <td><?= $use->rt; ?></td>
                          <!-- <td><?= $use->tahun; ?></td> -->
                          <?php if ($this->session->userdata('masuk')=='kadus'): ?>
                            <td>
                              <a href="<?=base_url('penduduk/penduduk/edit/'.$use->id_penduduk); ?>">
                                <i class="glyphicon glyphicon-edit" style="color: orange"></i>
                              </a>
                              
                              <a class="hapus" href="<?=base_url('penduduk/penduduk/hapus/'.$use->id_penduduk); ?>">
                                <i class="glyphicon glyphicon-trash" style="color: red"></i>
                              </a>

                              <a href="<?=base_url('penduduk/penduduk/tampil/'.$use->id_penduduk); ?>">
                                <i class="fa fa-eye" style="color: blue"></i>
                              </a>
                            </td>
                            <?php else: ?>
                              <td>
                                <a href="<?=base_url('penduduk/penduduk/tampil/'.$use->id_penduduk); ?>">
                                <i class="fa fa-eye" style="color: blue"></i> Lihat
                                </a>
                              </td>
                          <?php endif;?>
                        <?php endif; ?>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                    <div class="col-md-12 col-md-offset-5">
                      <a href="<?= base_url('penduduk/penduduk/get_penduduk'); ?>">
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