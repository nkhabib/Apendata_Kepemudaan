        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  

              <div class="col-md-8 col-md-offset-2">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?=ucfirst($page)?> Admin</small></h2>
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

                    <form data-parsley-validate class="form-horizontal form-label-left" action="<?php echo base_url().'admin/admin/input_admin' ?>" method="POST" >

                      <div class="form-group">
                        <label for="rt" class="control-label col-md-3 col-sm-3 col-xs-3">Pilih Admin dari RT</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <select name="rt" id="rtadmin" class="form-control" required>
                            <?php if (isset($_POST['tambah'])): ?>
                              <?php $rtpost = $this->db->get_where('rt',['id_rt' => $_POST['rt']])->row_array(); ?>
                              <option value="<?php echo set_value('rt'); ?>"><?php echo $rtpost['rt']; ?></option>
                            <?php else: ?>
                              <option value="">--Pilih--</option>
                            <?php endif;?>
                            
                            <?php foreach ($rt as $key):?>
                              <option value="<?php echo $key->id_rt ?>"><?php echo $key->rt;?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>

                      <?php if (isset($_POST['tambah'])):?>
                        <div class="form-group" id="show-ktp-admin">
                          <?php else: ?>
                            <div class="form-group" id="hide-ktp-admin">
                      <?php endif;?>
                        <label for="ktpadmin" class="control-label col-md-3 col-sm-3 col-xs-3">Pilih No KTP</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <font color="red"><?= form_error('ktp'); ?></font>
                          <select name="ktp" id="ktpadmin" class="form-control">
                            <?php if (isset($_POST['tambah'])): ?>
                              <?php $ktppost = $this->db->get_where('penduduk',['id_penduduk' => $_POST['ktp']])->row_array(); ?>
                              <option value="<?php echo set_value('ktp'); ?>"><?php echo $ktppost['no_ktp']; ?> <?php echo $ktppost['nama']; ?></option>
                              <?php foreach ($ktp as $key): ?>
                                <option value="<?php echo $key->id_penduduk; ?>"><?php echo $key->no_ktp;?>  <?php echo $key->nama;?></option>
                              <?php endforeach; ?>
                            <?php endif; ?>
                          </select>
                        </div>
                      </div>

                      <?php if (isset($_POST['tambah'])):?>
                        <div id="show-admin">
                          <?php else: ?>
                            <div id="hide-admin">
                      <?php endif;?>
                        <div class="form-group">
                          <label for="kkadmin" class="control-label col-md-3 col-sm-3 col-xs-3">NO KK</label>
                          <div class="col-md-9 col-sm-9 col-xs-9">
                            <font color="red"><?=form_error('kk'); ?></font>
                            <input type="number" name="kk" id="kkadmin" class="form-control" value="<?=set_value('kk'); ?>" readonly>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="namaadmin" class="control-label col-md-3 col-sm-3 col-xs-3">Nama</label>
                          <div class="col-md-9 col-sm-9 col-xs-9">
                            <font color="red"><?=form_error('nama'); ?></font>
                            <input type="text" name="nama" id="namaadmin" class="form-control" value="<?=set_value('nama'); ?>" readonly>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="username" class="control-label col-md-3 col-sm-3 col-xs-3">Username</label>
                          <div class="col-md-9 col-sm-9 col-xs-9">
                            <font color="red"><?=form_error('username'); ?></font>
                            <input type="text" name="username" id="username" class="form-control" value="<?=set_value('username') ;?>" required="" oninvalid="this.setCustomValidity('Username Tidak Boleh Kosong')" oninput="setCustomValidity('')" >
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="password" class="control-label col-md-3 col-sm-3 col-xs-3">Password</label>
                          <div class="col-md-9 col-sm-9 col-xs-9">
                            <font color="red"><?=form_error('password'); ?></font>
                            <input type="password" name="password" id="password" class="form-control" required oninvalid="this.setCustomValidity('Password Harus Diisi')" oninput="setCustomValidity('')" >
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="jabatan" class="control-label col-md-3 col-sm-3 col-xs-3">Jabatan</label>
                          <div class="col-md-9 col-sm-9 col-xs-9">
                            <font color="red"><?=form_error('jabatan'); ?></font>
                            <select name="jabatan" id="jabatan" class="form-control" required>
                              <?php if (isset($_POST['tambah'])): ?>
                              <option value="<?=set_value('jabatan'); ?>"><?=set_value('jabatan'); ?></option>
                              <?php else: ?>
                                <option value="">--Pilih--</option>
                            <?php endif;?>
                              <option value="Kadus">Kadus</option>
                              <option value="Ketua Pemuda">Ketua Pemuda</option>
                              <option value="Wakil Ketua Pemuda">Wakil Ketua Pemuda</option>
                              <option value="Sekretaris">Sekretaris</option>
                              <option value="Bendahara">Bendahara</option>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-8 col-md-offset-5">
                        <a class="btn btn-round btn-danger" href="<?=base_url('home');?>">Batal</a>
                        <?php if (isset($_POST['tambah'])):?>
                          <button class="btn btn-round btn-success" id="btn-admin-show" name="tambah">Tambah</button>
                          <?php else: ?>
                            <button name="tambah" class="btn btn-round btn-success" id="btn-admin">Tambah</button>
                          <?php endif;?>
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