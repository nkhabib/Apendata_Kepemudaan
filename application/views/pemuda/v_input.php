        <div class="right_col" role="main"><!-- -->
          <div class="flashdatagagal" data-flashdata="<?= $this->session->flashdata('msg'); ?>" ></div>
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

                    <form class="form-horizontal form-label-left" action="<?php echo base_url().'pemuda/pemuda/input_pemuda' ?>" method="POST" >
                      
                      <div class="col-md-8 col-sm-12 col-xs-12 col-md-offset-2">
                        <div class="x_panel">
                          <div class="x_title">
                            <h2><?=($judul)?></small></h2>
                            <div class="clearfix"></div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-3">Pilih dari RT</label>
                          <div class="col-md-9 col-sm-9 col-xs-9">
                            <select name="rt" class="form-control" id="rt_pemuda">
                              <?php if (isset($_POST['tambah'])): ?>
                                <option value="<?php echo set_value('rt'); ?>"><?php echo set_value('rt'); ?></option>
                                <?php else: ?>
                                  <option value="">--Pilih RT--</option>
                              <?php endif; ?>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                            </select>
                            <font color="red"><?php echo form_error('rt'); ?></font>
                            <span aria-hidden="true"></span>
                          </div>
                        </div>

                        <?php if (isset($_POST['tambah'])):?>
                          <div class="form-group" id="show_ktp_pemuda">
                            <?php else: ?>
                              <div class="form-group" id="hiden_ktp_pemuda">
                        <?php endif; ?>
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Pilih No KTP</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <select name="ktp" id="ktp_pemuda" class="form-control">
                            <?php if (isset($_POST['tambah'])): ?>
                              <?php $np = $this->db->get_where('penduduk',['id_penduduk'=>$_POST['ktp']])->row_array(); ?>
                              <option value="<?php echo set_value('ktp'); ?>"><?php echo $np['no_ktp']; ?> <?php echo $np['nama']; ?></option>
                              <?php foreach ($ktp as $key): ?>
                                <option value="<?php echo $key->id_penduduk; ?>"><?php echo $key->no_ktp; ?> <?php echo $key->nama; ?></option>
                              <?php endforeach; ?>
                            <?php else: endif; ?>
                          </select>
                          <font color="red" ><?= form_error('ktp'); ?></font>
                          <span aria-hidden="true"></span>
                        </div>
                      </div>

                      <?php if (isset($_POST['tambah'])):?>
                      <div id="show_pemuda">
                        <?php else: ?>
                          <div id="hiden_pemuda">
                      <?php endif; ?>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-3">No KK</label>
                          <div class="col-md-9 col-sm-9 col-xs-9">
                            <input type="number" name="kk" id="kk_pemuda" class="form-control" value="<?= set_value('kk'); ?>" readonly >
                            <!-- required oninvalid="this.setCustomValidity('No KK tidak boleh kosong')" oninput="setCustomValidity('')" -->
                            <font color="red"><?= form_error('kk'); ?></font>
                            <span  aria-hidden="true"></span>
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-3">Nama</label>
                          <div class="col-md-9 col-sm-9 col-xs-9">
                            <input type="text" name="nama" id="nama_pemuda" value="<?= set_value('nama'); ?>" class="form-control" readonly >
                            <!-- required oninvalid="this.setCustomValidity('Nama tidak boleh kosong')" oninput="setCustomValidity('')" -->
                            <font color="red"><?= form_error('nama'); ?></font>
                            <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                          </div>
                        </div>	                 

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-3">Tanggal Lahir</label>
                          <div class="col-md-4 col-sm-9 col-xs-9">
                            <input type="date" name="ttl" id="ttl_pemuda" value="<?= set_value('ttl'); ?>" class="form-control" readonly >
                            <!-- required oninvalid="this.setCustomValidity('Tanggal lahir tidak boleh kosong')" oninput="setCustomValidity('')" -->
                            <font color="red"><?= form_error('ttl'); ?></font>
                            <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-3">Jenis Kelamin</label>
                          <div class="col-md-9 col-sm-9 col-xs-9">
                            <input type="text" name="kelamin" id="kelamin_pemuda" class="form-control" value="<?php echo set_value('kelamin') ?>" readonly >
                            <font color="red"><?= form_error('kelamin'); ?></font>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-3">Umur</label>
                          <div class="col-md-9 col-sm-9 col-xs-9">
                            <input type="number" name="umur" id="umur_pemuda" class="form-control" value="<?= set_value('umur'); ?>" readonly >
                            <!-- required oninvalid="this.setCustomValidity('Umur tidak boleh kosong')" oninput="setCustomValidity('')" -->
                            <font color="red"><?= form_error('umur'); ?></font>
                            <span aria-hidden="true"></span>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-3">Agama</label>
                          <div class=" col-md-9 col-sm-9 col-xs-9">
                            <input type="text" name="agama" id="agama_pemuda" class="form-control" value="<?=set_value('agama'); ?>" readonly >
                            <font color="red"><?= form_error('agama'); ?></font>
                            <span aria-hidden="true"></span>
                          </div>
                        </div>


  					             <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-3">Status</label>
                          <div class="col-md-9 col-sm-9 col-xs-9">
                            <input type="text" name="status" id="status_pemuda" class="form-control" value="<?php echo set_value('status'); ?>" readonly >
                            <font color="red"><?= form_error('status'); ?></font>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-3">Status Keluarga</label>
                          <div class="col-md-9 col-sm-9 col-xs-9">
                            <input type="text" name="statuskeluarga" id="statuskeluarga_pemuda" class="form-control" value="<?php echo set_value('statuskeluarga'); ?>" readonly >
                            <font color="red"><?= form_error('statuskeluarga'); ?></font>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-3">Apakah Kepala Keluarga ?</label>
                          <div class="col-md-9 col-sm-9 col-xs-9">
                            <input type="text" name="statuskk" id="statuskk_pemuda" class="form-control" value="<?php echo set_value('statuskk'); ?>" readonly >
                            <font color="red"><?= form_error('statuskk'); ?></font>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-3">Alamat</label>
                          <div class="col-md-9 col-sm-9 col-xs-9">
                            <textarea class="form-control" name="alamat" id="alamat_pemuda" readonly="" >
                              <?php if (isset($_POST['tambah'])) 
                              {
                                echo set_value('alamat') ;
                              } ?>
                            </textarea>
                            <font color="red"><?= form_error('alamat'); ?></font>
                            <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-3">Pekerjaan</label>
                          <div class="col-md-9 col-sm-9 col-xs-9">
                            <input type="text" name="pekerjaan" id="pekerjaan_pemuda" class="form-control" value="<?= set_value('pekerjaan'); ?>" readonly >
                            <!-- required oninvalid="this.setCustomValidity('Pekerjaan tidak boleh kosong')" oninput="setCustomValidity('')" -->
                            <font color="red"><?= form_error('pekerjaan'); ?></font>
                            <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                          </div>
                        </div>
                      </div>
                      
                    </div>
                  </div>

                      <br>
                      <div class="col-md-6 col-md-offset-3">
                        <div class="col-md-9 col-md-offset-3">
                          <a href="<?php echo base_url('home'); ?>" type="button" class="btn btn-primary">Batal</a>
                          <a href="<?php echo base_url().'pemuda/pemuda/input_pemuda'; ?>" type="submit" class="btn btn-primary">Reset</a>
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