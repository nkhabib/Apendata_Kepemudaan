
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
                    <?php echo form_open("pemuda/pemuda/cari"); ?>

                      <select class="btn btn-default" name="cariberdasarkan" >

                        <option value="">Cari Berdasarkan</option>
                        <option value="no_ktp">No KTP</option>
                        <option value="no_kk">No KK</option>
                        <option value="nama">Nama</option>
                        <option value="tanggal_lahir">Tanggal Lahir</option> <!-- value sesuai dengan nama field di database --> 
                        <option value="jenis_kelamin">Jenis Kelamin</option>
                        <option value="umur">Umur</option>
                        <option value="agama">Agama</option>
                        <option value="status">Status</option>
                        <option value="pekerjaan">Pekerjaan</option>
                        <option value="rt">RT</option>
                      </select>

                      <input form-control mr-sm-2 type="text" name="yangdicari" id="">
                      <button class="btn btn-default" type="submit" >Cari</button>
                      <?php echo  form_close(); ?>

                      <!-- <?php echo form_open("pemuda/pemuda/hapus"); ?>
                      <?php if ($this->session->userdata('masuk')=='kpemuda') :?>
                      <button class="btn-danger" formaction="<?php echo base_url().'pemuda/pemuda/hapus' ?>" onclick="return confirm('Yakin Hapus ?')">
                        <i class="glyphicon glyphicon-trash">Hapus</i>
                      </button>

                      <button class="btn-danger" formaction="<?php echo base_url().'pemuda/pemuda/editbanyak' ?>">
                        <i class="glyphicon glyphicon-edit">Edit</i>
                      </button> -->

                      
                    <?php endif; ?>
                    <!-- <a href="<?= base_url('rt/rt/get_rt1') ?>">
                        <input type="button" name="" value="RT 1" class="btn-success">
                      </a>

                      <a href="<?= base_url('rt/rt/get_rt2') ?>">
                        <input type="button" name="" value="RT 2" class="btn-success">
                      </a>

                      <a href="<?= base_url('rt/rt/get_rt3') ?>">
                        <input type="button" name="" value="RT 3" class="btn-success">
                      </a>

                      <a href="<?= base_url('rt/rt/get_rt4') ?>">
                        <input type="button" name="" value="RT 4" class="btn-success">
                      </a>

                      <a href="<?= base_url('rt/rt/get_rt5') ?>">
                        <input type="button" name="" value="RT 5" class="btn-success">
                      </a>

                      <a href="<?= base_url('rt/rt/get_rt6') ?>">
                        <input type="button" name="" value="RT 6" class="btn-success">
                      </a>
                      <?php if($judul!=='Daftar Penduduk'): ?>
                        <a href="<?= base_url('penduduk/penduduk/get_penduduk') ?>">
                        <input type="button" name="" value="Semua" class="btn-success">
                      </a> -->
                    <?php endif;?>

                    <table class="table table-striped jambo_table bulk_action">
                      <thead>
                        <tr class="headings">
                          <?php if ($this->session->userdata('masuk')=='kpemuda') :?>
                          <th>
                            <input type="checkbox" id="pilih-semua" name="pilih-semua">
                          </th>
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
                          <th>Pekerjaan</th>
                          <th>RT</th>
                          <?php if ($this->session->userdata('masuk')=='kpemuda'): ?>
                          <th>Action</th>
                        <?php endif; ?>
                        </tr>
                      </thead>


                      <tbody>
                        <?php $no =$offset + 1; // offset agar urutan nomor tabel tetap urut di pagination  
                        foreach ($data as $pemuda) { ?>
                         <tr class="even pointer">
                          <?php if ($this->session->userdata('masuk')=='kpemuda') :?>
                          <td class="a-center ">
                            <input type="checkbox" class="tercek" name="ktp[]" value="<?php echo $pemuda->no_ktp; ?>"> <!-- namae="ktp[]" menandakan ktp akan menyimpan array nama ini nanti akan dipanggil dalam controller admin hapus -->
                          </td>
                        <?php endif; ?>
                          
                          <td><?= $no; ?></td>
                          <td><?= $pemuda->no_ktp; ?></td>
                          <td><?= $pemuda->no_kk ?></td>
                          <td><?= $pemuda->nama; ?></td>
                          <td><?= tgl_indo($pemuda->tanggal_lahir); ?></td>
                          <td><?= $pemuda->jenis_kelamin ?></td>
                          <td><?= $pemuda->umur ?></td>
                          <td><?= $pemuda->agama ?></td>
                          <td><?= $pemuda->status ?></td>
                          <td><?= $pemuda->pekerjaan ?></td>
                          <td><?= $pemuda->rt ?></td>
                          <?php if($this->session->userdata('masuk')=='kpemuda'): ?>
                          <td>

                              <a href="<?php echo site_url('pemuda/pemuda/edit/'.$pemuda->id_penduduk);?>" >
                                <i class="glyphicon glyphicon-edit" style="margin: 3px; color: orange">Edit</i>
                              </a>
                            
                            
                              <a class="hapus" href="<?php echo site_url('pemuda/pemuda/remove/'.$pemuda->id_pemuda);?>">
                                <i class="glyphicon glyphicon-trash" style="margin: 3px; color: red" >Hapus</i>
                              </a>
                            
                            
                          </td>
                          <?php endif; ?>
                        </tr>
                        <?php $no++; } ?>
                      </tbody>
                    </table>
                    <!-- <?php form_close(); ?> -->
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