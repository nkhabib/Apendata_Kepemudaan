        <div class="right_col" role="main"><!-- -->
          <div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg'); ?>" ></div>
          <div class="flashdatagagal" data-flashdata="<?= $this->session->flashdata('gagal'); ?>" ></div>
          <div class=""><!-- -->
            <div class="clearfix"></div><!-- -->

            <div class="row"><!-- -->

              <!-- form input -->
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?=($judul)?></small></h2>
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

                    <form class="form-horizontal form-label-left" action="<?php echo base_url().'penduduk/penduduk/input_penduduk' ?>" method="POST" >
                      
                      <div class="col-md-8 col-sm-12 col-xs-12 col-md-offset-2">
                        <div class="x_panel">
                          <div class="x_title">
                            <h2><?=($judul)?></small></h2>
                            <div class="clearfix"></div>
                        </div>

                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">No KTP</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="number" name="ktp" value="<?= set_value('ktp'); ?>" class="form-control" >
                          <!-- required oninvalid="this.setCustomValidity('No KTP tidak boleh kosong')" oninput="setCustomValidity('')" -->
                          <font color="red" ><?= form_error('ktp'); ?></font>
                          <span aria-hidden="true"></span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">No KK</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="number" name="kk" class="form-control" value="<?= set_value('kk'); ?>" >
                          <!-- required oninvalid="this.setCustomValidity('No KK tidak boleh kosong')" oninput="setCustomValidity('')" -->
                          <font color="red"><?= form_error('kk'); ?></font>
                          <span  aria-hidden="true"></span>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Nama</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="text" name="nama" value="<?= set_value('nama'); ?>" class="form-control" >
                          <!-- required oninvalid="this.setCustomValidity('Nama tidak boleh kosong')" oninput="setCustomValidity('')" -->
                          <font color="red"><?= form_error('nama'); ?></font>
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Tempat Lahir</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="text" name="tempat" value="<?= set_value('tempat'); ?>" class="form-control" >
                          <!-- required oninvalid="this.setCustomValidity('Nama tidak boleh kosong')" oninput="setCustomValidity('')" -->
                          <font color="red"><?= form_error('tempat'); ?></font>
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>	                 

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Tanggal Lahir</label>
                        <div class="col-md-4 col-sm-9 col-xs-9">
                          <input type="date" name="ttl" id="ttl" value="<?= set_value('ttl'); ?>" class="form-control" >
                          <!-- required oninvalid="this.setCustomValidity('Tanggal lahir tidak boleh kosong')" oninput="setCustomValidity('')" -->
                          <font color="red"><?= form_error('ttl'); ?></font>
                          <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Jenis Kelamin</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <select name="kelamin" class="form-control" id="kelamin" >
                            <!-- required oninvalid="this.setCustomValidity('Jenis kelamin tidak boleh kosong')" oninput="setCustomValidity('')" -->
                            <?php if (isset($_POST['tambah'])):?>
                              <option value="<?php echo set_value('kelamin'); ?>"><?php echo set_value('kelamin'); ?></option>
                              <?php else: ?>
                                <option value="">--pilih--</option>
                              <?php endif; ?>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                          </select>
                          <font color="red"><?= form_error('kelamin'); ?></font>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Umur</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="number" name="umur" id="umur" class="form-control" value="<?= set_value('umur'); ?>" readonly >
                          <!-- required oninvalid="this.setCustomValidity('Umur tidak boleh kosong')" oninput="setCustomValidity('')" -->
                          <font color="red"><?= form_error('umur'); ?></font>
                          <span aria-hidden="true"></span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Agama</label>
                        <div class=" col-md-9 col-sm-9 col-xs-9">
                          <input type="text" name="agama" class="form-control" value="<?=set_value('agama'); ?>">
                          <font color="red"><?= form_error('agama'); ?></font>
                          <span aria-hidden="true"></span>
                        </div>
                      </div>


					             <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Status</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <select name="status" class="form-control" id="status" >
                            <?php if (isset($_POST['tambah'])): ?>
                              <option value="<?php echo set_value('status'); ?>"><?php echo set_value('status'); ?></option>
                              <?php
                              $kelamin = $post['kelamin'];
                              if ($kelamin == 'Laki-laki'):?>
                                <option value="Lajang">Lajang</option>
                                <option value="Menikah">Menikah</option>
                                <option value="Duda">Duda</option>
                                <?php elseif ($kelamin == 'Perempuan'): ?>
                                  <option value="Lajang">Lajang</option>
                                  <option value="Menikah">Menikah</option>
                                  <option value="Janda">Janda</option>
                            <?php endif; endif; ?>
                            <!-- required oninvalid="this.setCustomValidity('Status tidak boleh kosong')" oninput="setCustomValidity('')" -->
                          </select>
                          <font color="red"><?= form_error('status'); ?></font>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Status Keluarga</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <select name="statuskeluarga" class="form-control" id="statuskeluarga" >
                            <!-- required oninvalid="this.setCustomValidity('Status keluarga tidak boleh kosong')" oninput="setCustomValidity('')" -->
                            <!-- <option></option>
                            <option>Suami</option>
                            <option>Istri</option>
                            <option>Anak</option>
                            <option>Duda</option>
                            <option>Janda</option> -->
                            <?php if (isset($_POST['tambah'])): ?>
                              <option value="<?php echo set_value('statuskeluarga') ?>"><?php echo set_value('statuskeluarga'); ?></option>
                            <?php endif; ?>
                          </select>
                          <font color="red"><?= form_error('statuskeluarga'); ?></font>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Apakah Kepala Keluarga ?</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <select name="statuskk" class="form-control" id="kepala_kk" >
                            <!-- required oninvalid="this.setCustomValidity('Kepala KK tidak boleh kosong')" oninput="setCustomValidity('')" -->
                              <!-- <option></option>
                              <option value="0">Tidak</option>
                              <option value="1">Ya</option> -->
                              <?php if (isset($_POST['tambah'])): 
                                $statuskk = $post['statuskk'];
                                if ($statuskk ==1):?>
                                  <option value="1">YA</option>
                                  <?php elseif ($statuskk == 0):?>
                                    <option value="0">Tidak</option>
                              <?php endif; endif; ?>
                          </select>
                          <font color="red"><?= form_error('statuskk'); ?></font>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Pekerjaan</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="text" name="pekerjaan" class="form-control" value="<?= set_value('pekerjaan'); ?>" >
                          <!-- required oninvalid="this.setCustomValidity('Pekerjaan tidak boleh kosong')" oninput="setCustomValidity('')" -->
                          <font color="red"><?= form_error('pekerjaan'); ?></font>
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">RT</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <select name="rt" class="form-control" >
                            <?php $rtpost = $this->db->get_where('rt',['id_rt' => $_POST['rt']])->row_array();
                            if (isset($_POST['tambah'])):?>
                              <option value="<?php echo set_value('rt') ?>"><?php echo $rtpost['rt']; ?></option>
                              <?php else: ?>
                              <option value="" >--Pilih--</option>
                            <?php endif; ?>
                            <?php foreach ($rt as $tr):?>
                              <option value="<?php echo $tr->id_rt; ?>"><?php echo $tr->rt; ?></option>
                            <?php endforeach; ?>
                          </select>
                          <font color="red"><?= form_error('rt'); ?></font>
                        </div>
                      </div>
                      
                    </div>
                  </div>

                      <br>
                      <div class="col-md-6 col-md-offset-3">
                        <div class="col-md-9 col-md-offset-3">
                          <a href="<?php echo base_url('home'); ?>" type="button" class="btn btn-primary">Batal</a>
                          <a href="<?php echo base_url().'penduduk/penduduk/input_penduduk'; ?>" type="submit" class="btn btn-primary">Reset</a>
                          <button type="submit" name="tambah" class="btn btn-success">Tambah</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
          
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>