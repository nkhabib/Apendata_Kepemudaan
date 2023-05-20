
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
                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg'); ?>" ></div>
                    <div class="flashdatagagal" data-flashdata="<?= $this->session->flashdata('gagal'); ?>" ></div>
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
                    <?php echo form_open("penduduk/penduduk/cari"); ?>

                      <select class="btn btn-default" name="cariberdasarkan" >

                        <option value="">Cari Berdasarkan</option>
                        <option value="no_ktp">No KTP</option>
                        <option value="no_kk">No KK</option>
                        <option value="nama">Nama</option>
                        <option value="tanggal_lahir">Tanggal Lahir</option> <!-- value sesuai dengan nama field di database --> 
                        <option value="umur">Umur</option>
                        <option value="agama">Agama</option>
                        <option value="status">Status</option>
                        <option value="alamat">Alamat</option>
                        <option value="pekerjaan">Pekerjaan</option>
                        <option value="rt">RT</option>
                      </select>

                      <input form-control mr-sm-2 type="text" name="yangdicari" id="">
                      <button class="btn btn-default" type="submit" >Search</button>
                      <?php echo  form_close(); ?>

                    <?php foreach ($rt as $t):?>
                      <a href="<?php echo base_url('rt/rt/get_rt/'.$t->id_rt);?>">
                        <input type="button" name="" value="RT <?php echo $t->id_rt; ?>" class="btn-success" >
                      </a>
                    <?php endforeach; ?>
                    <a href="<?php echo base_url('penduduk/penduduk/get_penduduk') ?>">
                      <input type="button" name="" value="RW 05" class="btn-success" >
                    </a>
                    

                    <table class="table table-striped jambo_table bulk_action">
                      <thead>
                        <tr class="headings">
                          <?php if ($this->session->userdata('masuk')=='kadus') :?>
                          <!-- <th>
                            <input type="checkbox" id="pilih-semua" name="pilih-semua">
                          </th> -->
                        <?php endif; ?>
                          <th>NO</th>
                          <th>No Ktp</th>
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
                        
                        </tr>
                      </thead>


                      <tbody>
                        <?php $no =$offset + 1; // offset agar urutan nomor tabel tetap urut di pagination  
                        foreach ($data as $penduduk) { ?>
                         <tr class="even pointer">
                          <?php if ($this->session->userdata('masuk')=='kadus') :?>
                          <!-- <td class="a-center ">
                            <input type="checkbox" class="tercek" name="ktp[]" value="<?php echo $penduduk->no_ktp; ?>"> --> <!-- namae="ktp[]" menandakan ktp akan menyimpan array nama ini nanti akan dipanggil dalam controller admin hapus -->
                          <!-- </td> -->
                        <?php endif; ?>
                          
                          <td><?= $no; ?></td>
                          <td><?= $penduduk->no_ktp; ?></td>
                          <td><?= $penduduk->no_kk ?></td>
                          <td><?= $penduduk->nama; ?></td>
                          <td><?= tgl_indo($penduduk->tanggal_lahir); ?></td>
                          <td><?= $penduduk->jenis_kelamin ?></td>
                          <td><?= $penduduk->umur ?></td>
                          <td><?= $penduduk->agama ?></td>
                          <td><?= $penduduk->status ?></td>
                          <!-- <td><?= $penduduk->alamat ?></td> -->
                          <td><?= $penduduk->pekerjaan ?></td>
                          <td><?= $penduduk->id_rt ?></td>
                          <?php if ($this->session->userdata('masuk')!='kadus'):?>
                            <td>
                              <a href="<?php echo site_url('penduduk/penduduk/tampil/'.$penduduk->id_penduduk);?>" >
                                  <i class="fa fa-eye" style="margin: 4px; color: green">Lihat</i>
                                </a>
                            </td>
                          <?php endif; ?>
                          <?php if($this->session->userdata('masuk')=='kadus'): ?>
                          <td>
                            
                            
                              <a href="<?php echo site_url('penduduk/penduduk/tampil/'.$penduduk->id_penduduk);?>" >
                                <i class="fa fa-eye" style="margin: 4px; color: green">Lihat</i>
                              </a>

                              <a href="<?php echo site_url('penduduk/penduduk/edit/'.$penduduk->id_penduduk);?>" >
                                <i class="glyphicon glyphicon-edit" style="margin: 3px; color: orange">Edit</i>
                              </a>
                            
                            
                              <a class="hapus" href="<?php echo site_url('penduduk/penduduk/hapus/'.$penduduk->id_penduduk);?>">
                                <i class="glyphicon glyphicon-trash" style="margin: 3px; color: red" >Hapus</i>
                              </a>
                            
                            
                          </td>
                          <?php endif; ?>
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