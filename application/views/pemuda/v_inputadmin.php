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

                    <form class="form-horizontal form-label-left" action="<?php echo base_url().'pemuda/pemuda/input_admin' ?>" method="POST" >
                      
                      <div class="col-md-8 col-sm-12 col-xs-12 col-md-offset-2">
                        <div class="x_panel">
                          <div class="x_title">
                            <h2><?=($judul)?></small></h2>
                            <div class="clearfix"></div>
                        </div>

                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Pilih Admin Dari RT</label>

                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <select name="rt" class="form-control" id="rt_admin_pemuda" >
                            <!-- required oninvalid="this.setCustomValidity('Jenis kelamin tidak boleh kosong')" oninput="setCustomValidity('')" -->
                            <?php if (isset($_POST['tambah'])): ?>
                              <option value="<?php echo set_value('rt'); ?>"><?php echo set_value('rt'); ?></option>
                              <?php else: ?>
                            <option value="">--Pilih--</option>
                        <?php endif; ?>
                        <?php foreach ($rt as $tr):?>
                          <option value="<?php echo $tr->id_rt; ?>"><?php echo $tr->rt; ?></option>
                        <?php endforeach; ?>
                          </select>
                          <font color="red"><?= form_error('rt'); ?></font>
                        </div>
                      </div>
                      <?php if (isset($_POST['tambah'])):?>
                        <div class="show_admin_pemuda">
                          <?php else:?>
                            <div id="hiden_admin_pemuda" >
                      <?php endif; ?>

                        <div class="form-group">
                        <label for="ktp_admin_pemuda" class="control-label col-md-3 col-sm-3 col-xs-3">Pilih No KTP</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <font color="red"><?= form_error('ktp'); ?></font>
                          <select name="ktp" id="ktp_admin_pemuda" class="form-control">
                            <?php if (isset($_POST['tambah'])): ?>
                              <option value="<?=set_value('ktp'); ?>"><?php echo set_value('ktp'); ?></option>
                              <?php foreach ($ktp as $key): ?>
                                <option value="<?=$key->no_ktp; ?>"><?=$key->no_ktp; ?></option>
                              <?php endforeach; ?>
                            <?php endif; ?>
                          </select>
                        </div>
                      </div>
                        
                        <div id="hiden_ktp_admin_pemuda">
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">No KK</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                              <input type="number" name="kk" id="kkadmin" class="form-control" value="<?= set_value('kk'); ?>" readonly >
                              <!-- required oninvalid="this.setCustomValidity('No KK tidak boleh kosong')" oninput="setCustomValidity('')" -->
                              <font color="red"><?= form_error('kk'); ?></font>
                              <span  aria-hidden="true"></span>
                            </div>
                          </div>
                        
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Nama</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                              <input type="text" name="nama" id="namaadmin" value="<?= set_value('nama'); ?>" class="form-control" readonly >
                              <!-- required oninvalid="this.setCustomValidity('Nama tidak boleh kosong')" oninput="setCustomValidity('')" -->
                              <font color="red"><?= form_error('nama'); ?></font>
                              <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                          </div>	                 


                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Username</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                              <input type="text" name="username" id="username" class="form-control" value="<?= set_value('username'); ?>">
                              <!-- required oninvalid="this.setCustomValidity('Umur tidak boleh kosong')" oninput="setCustomValidity('')" -->
                              <font color="red"><?= form_error('username'); ?></font>
                              <span aria-hidden="true"></span>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Password</label>
                            <div class=" col-md-9 col-sm-9 col-xs-9">
                              <input type="password" name="password" class="form-control">
                              <font color="red"><?= form_error('password'); ?></font>
                              <span aria-hidden="true"></span>
                            </div>
                          </div>


    					             <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Jabatan</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                              <select name="jabatan" class="form-control" id="jabatan" >
                                <?php if (isset($_POST['tambah'])): ?>
                                  <option value="<?php echo set_value('jabatan'); ?>"><?php echo set_value('jabatan'); ?></option>
                              <?php endif; ?>
                              <option value="">--Pilih--</option>
                              <option value="Ketua Pemuda">Ketua Pemuda</option>
                              <option value="Wakil Ketua Pemuda"> Wakil Ketua Pemuda</option>
                              <option value="Sekretaris">Sekretaris</option>
                              <option value="Bendahara">Bendahara</option>
                              </select>
                              <font color="red"><?= form_error('jabatan'); ?></font>
                            </div>
                          </div>
                        </div>
                      </div>
                      
                    </div>
                  </div>

                      <br>
                      <div class="col-md-6 col-md-offset-3">
                        <div class="col-md-9 col-md-offset-3" id="btn_show_admin_pemuda" >
                          <a href="<?php echo base_url('home'); ?>" type="button" class="btn btn-primary">Batal</a>
                          <a href="<?php echo base_url().'pemuda/pemuda/input_admin'; ?>" type="submit" class="btn btn-primary">Reset</a>
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