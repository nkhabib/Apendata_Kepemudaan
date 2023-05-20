
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
                    <!-- <?php echo form_open("kematian/kematian/cari"); ?>

                      <select class="btn btn-default" name="cariberdasarkan" >

                        <option value="">Cari Berdasarkan</option>
                        <option value="no_ktp">No KTP</option>
                        <option value="no_kk">No KK</option>
                        <option value="nama">Nama</option>
                        <option value="jenis_kelamin">Jenis Kelamin</option>
                        <option value="alamat">Alamat</option>
                        <option value="rt">RT</option>
                        <option value="tanggal_lahir">Tanggal Lahir</option>
                        <option value="tanggal_lahir">Tanggal Kematian</option>
                        <option value="umur">Umur</option>
                        <option value="Agama">Agama</option>
                      </select>

                      <input form-control mr-sm-2 type="text" name="yangdicari" id="">
                      <button class="btn btn-default" type="submit" >Cari</button>
                      <?php echo  form_close(); ?> -->

                      <?php echo form_open("kematian/kematian/hapus"); ?>
                      <?php if ($this->session->userdata('masuk')=='kadus') :?>
                      <button class="btn-danger" formaction="<?php echo base_url().'kematian/kematian/hapus_banyak' ?>" onclick="return confirm('Yakin Hapus ?')">
                        <i class="glyphicon glyphicon-trash">Hapus</i>
                      </button>

                      <!-- <button class="btn-danger" name="banyak[]" formaction="<?php echo base_url().'kematian/kematian/edit_banyak' ?>">
                        <i class="glyphicon glyphicon-edit">Edit</i>
                      </button> -->
                    <?php endif; ?>
                    

                    <table class="table table-striped jambo_table bulk_action">
                      <thead>
                        <tr class="headings">
                          <?php if ($this->session->userdata('masuk')=='kadus') :?>
                          <th>
                            <input type="checkbox" id="pilih-semua">
                          </th>
                        <?php endif; ?>
                          <th>NO</th>
                          <th>No Ktp</th>
                          <th>No KK</th>
                          <th>Nama</th>
                          <th>Jenis Kelamin</th>
                          <th>Agama</th>
                          <th>Status</th>
                          <th>Tanggal Lahir</th>
                          <th>Tanggal Kematian</th>
                          <th>Umur</th>
                          <th>Alamat</th>
                          <?php if ($this->session->userdata('masuk')=='kadus'): ?>
                          <th>Action</th>
                        <?php endif; ?>
                        </tr>
                      </thead>


                      <tbody>
                        <?php $no =$offset + 1; // offset agar urutan nomor tabel tetap urut di pagination  
                        foreach ($data as $kematian) { ?>
                         <tr class="even pointer">
                          <?php if ($this->session->userdata('masuk')=='kadus') :?>
                          <td class="a-center ">
                            <input type="checkbox" class="tercek" name="ktp[]" value="<?php echo $kematian->no_ktp; ?>"> <!-- namae="ktp[]" menandakan ktp akan menyimpan array nama ini nanti akan dipanggil dalam controller admin hapus -->
                          </td>
                        <?php endif; ?>
                          
                          <td><?= $no; ?></td>
                          <td><?= $kematian->no_ktp; ?></td>
                          <td><?= $kematian->no_kk ?></td>
                          <td><?= $kematian->nama; ?></td>
                          <td><?= $kematian->jenis_kelamin ?></td>
                          <td><?= $kematian->agama ?></td>
                          <td><?= $kematian->status ?></td>
                          <td><?= tgl_indo($kematian->tanggal_lahir); ?></td>
                          <td><?= tgl_indo($kematian->tanggal_kematian); ?></td>
                          <!-- tgl_indo adalah helper yang dibuat senditi, file helper ini ada di application/helper/FormatIndo_helper.php -->
                          <td><?= $kematian->umur ?></td>
                          <td><?= $kematian->alamat ?></td>
                          <?php if($this->session->userdata('masuk')=='kadus'): ?>
                          <td>

                              <a href="<?php echo site_url('kematian/kematian/edit/'.$kematian->id_penduduk);?>">
                                <i class="glyphicon glyphicon-edit" style="margin: 3px; color: orange">Edit</i>
                              </a>
                            
                            
                              <a class="hapus" href="<?php echo site_url('kematian/kematian/remove/'.$kematian->id_penduduk);?>">
                                <i class="glyphicon glyphicon-trash" style="margin: 3px; color: red" >Hapus</i>
                              </a>
                            
                            
                          </td>
                          <?php endif; ?>
                        </tr>
                        <?php $no++; } ?>
                      </tbody>
                    </table>
                    <?php form_close(); ?>
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