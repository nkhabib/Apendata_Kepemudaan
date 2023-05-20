        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  

              <div class="col-md-8 col-md-offset-2">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?=ucfirst($judul)?></small></h2>
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

                    <form data-parsley-validate class="form-horizontal form-label-left" action="<?php echo base_url().'rtrw/rtrw/input_rtrw'; ?>" method="POST" >

                      <div class="form-group">
                        <label for="rt_rw" class="control-label col-md-3 col-sm-3 col-xs-3">Pilih RT</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <font color="red"><?php echo form_error('rt_rw'); ?></font>
                          <select name="rt_rw" id="rt_rw" class="form-control">
                            <?php if (isset($_POST['tambah'])): ?>
                              <option value="<?php echo $rt_post['id_rt'];?>"><?php echo $rt_post['rt']; ?></option>                            
                            <?php else: ?>
                              <option value="">--Pilih--</option>
                            <?php endif; ?>
                              <?php foreach ($rt as $tr):?>
                                <option value="<?php echo $tr->id_rt; ?>"><?php echo $tr->rt; ?></option>
                              <?php endforeach; ?>
                          </select>
                        </div>
                      </div>

                      <?php if (isset($_POST['tambah'])): ?>
                        <div class="form-group" id="show-ktp-rtrw">
                          <?php else: ?>
                            <div class="form-group" id="hide-ktp-rtrw">
                      <?php endif; ?>
                        <label for="ktp_rtrw" class="control-label col-md-3 col-sm-3 col-xs-3">Pilih No KTP</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <font color="red"><?=form_error('ktp_rtrw'); ?></font>
                          <select name="ktp_rtrw" id="ktp_rtrw" class="form-control">
                            <?php if (isset($_POST['tambah'])):?>
                              <?php $ktppost = $this->db->get_where('penduduk',['id_penduduk' => $_POST['ktp_rtrw']])->row_array(); ?>
                              <option value="<?=set_value('ktp_rtrw'); ?>"><?php echo $ktppost['no_ktp'];?> <?php echo $ktppost['nama']; ?></option>

                              <?php foreach ($ktp as $key): ?>
                                <option value="<?php echo $key->id_penduduk; ?>"><?php echo $key->no_ktp;?>  <?php echo $key->nama?></option>
                              <?php endforeach;?>
                              <?php else: ?>
                                <option value="">--Pilih No KTP--</option>
                              <?php endif;?>
                          </select>
                        </div>
                      </div>

                      <?php if (isset($_POST['tambah'])): ?>
                        <div id="show-rtrw">
                          <?php else: ?>
                            <div id="hide-rtrw">
                      <?php endif; ?>
                        <div class="form-group">
                          <label for="kk_rtrw" class="control-label col-md-3 col-sm-3 col-xs-3">NO KK</label>
                          <div class="col-md-9 col-sm-9 col-xs-9">
                            <font color="red"><?=form_error('kk_rtrw'); ?></font>
                            <input type="number" name="kk_rtrw" id="kk_rtrw" class="form-control" value="<?=set_value('kk_rtrw'); ?>" readonly>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="nama_rtrw" class="control-label col-md-3 col-sm-3 col-xs-3">Nama</label>
                          <div class="col-md-9 col-sm-9 col-xs-9">
                            <font color="red"><?=form_error('nama_rtrw'); ?></font>
                            <input type="text" name="nama_rtrw" id="nama_rtrw" class="form-control" value="<?=set_value('nama_rtrw'); ?>" readonly>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="ttl_rtrw" class="control-label col-md-3 col-sm-3 col-xs-3">Tanggal Lahir</label>
                          <div class="col-md-9 col-sm-9 col-xs-9">
                            <font color="red"><?=form_error('ttl_rtrw'); ?></font>
                            <input type="date" name="ttl_rtrw" id="ttl_rtrw" class="form-control" value="<?=set_value('ttl_rtrw'); ?>" readonly>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="kelamin_rtrw" class="control-label col-md-3 col-sm-3 col-xs-3">Jenis Kelamin</label>
                          <div class="col-md-9 col-sm-9 col-xs-9">
                            <font color="red"><?=form_error('kelamin_rtrw'); ?></font>
                            <input type="text" name="kelamin_rtrw" id="kelamin_rtrw" class="form-control" value="<?=set_value('kelamin_rtrw'); ?>" readonly>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="umur_rtrw" class="control-label col-md-3 col-sm-3 col-xs-3">Umur</label>
                          <div class="col-md-9 col-sm-9 col-xs-9">
                            <font color="red"><?=form_error('umur_rtrw'); ?></font>
                            <input type="number" name="umur_rtrw" id="umur_rtrw" class="form-control" value="<?=set_value('umur_rtrw'); ?>" readonly>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="agama_rtrw" class="control-label col-md-3 col-sm-3 col-xs-3">Agama</label>
                          <div class="col-md-9 col-sm-9 col-xs-9">
                            <font color="red"><?=form_error('agama_rtrw'); ?></font>
                            <input type="text" name="agama_rtrw" id="agama_rtrw" class="form-control" value="<?=set_value('agama_rtrw'); ?>" readonly>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="status_rtrw" class="control-label col-md-3 col-sm-3 col-xs-3">Status</label>
                          <div class="col-md-9 col-sm-9 col-xs-9">
                            <font color="red"><?=form_error('status_rtrw'); ?></font>
                            <input type="text" name="status_rtrw" id="status_rtrw" class="form-control" value="<?=set_value('status_rtrw'); ?>" readonly>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="alamat_rtrw" class="control-label col-md-3 col-sm-3 col-xs-3">Alamat</label>
                          <div class="col-md-9 col-sm-9 col-xs-9">
                            <font color="red"><?=form_error('alamat_rtrw'); ?></font>
                            <input type="text" name="alamat_rtrw" id="alamat_rtrw" class="form-control" value="<?=set_value('alamat_rtrw'); ?>" readonly>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="pekerjaan_rtrw" class="control-label col-md-3 col-sm-3 col-xs-3">Pekerjaan</label>
                          <div class="col-md-9 col-sm-9 col-xs-9">
                            <font color="red"><?=form_error('pekerjaan_rtrw'); ?></font>
                            <input type="text" name="pekerjaan_rtrw" id="pekerjaan_rtrw" class="form-control" value="<?=set_value('pekerjaan_rtrw'); ?>" readonly>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="jabatan_rtrw" class="control-label col-md-3 col-sm-3 col-xs-3">Jabatan</label>
                          <div class="col-md-9 col-sm-9 col-xs-9">
                            <font color="red"><?=form_error('jabatan_rtrw'); ?></font>
                            <select name="jabatan_rtrw" id="jabatan_rtrw" class="form-control">
                              <?php if (isset($_POST['tambah'])):?>
                                <?php $jbtn = "Ketua RT 0$post_rt"; ?>
                                <option value="<?=$jabatan; ?>"><?=$jabatan; ?></option>
                                <option value="<?php echo $jbtn; ?>"><?php echo $jbtn; ?></option>
                                <option value="Ketua RW">Ketua RW</option>
                                <?php else: ?>
                              <?php endif;?>
                            </select>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="username_rtrw" class="control-label col-md-3 col-sm-3 col-xs-3">Username</label>
                          <div class="col-md-9 col-sm-9 col-xs-9">
                            <font color="red"><?=form_error('username_rtrw'); ?></font>
                            <input type="text" name="username_rtrw" id="username_rtrw" class="form-control" value="<?=set_value('username_rtrw'); ?>">
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="password_rtrw" class="control-label col-md-3 col-sm-3 col-xs-3">Password</label>
                          <div class="col-md-9 col-sm-9 col-xs-9">
                            <font color="red"><?=form_error('password_rtrw'); ?></font>
                            <input type="password" name="password_rtrw" id="password_rtrw" class="form-control">
                          </div>
                        </div>

                      </div>

                      <div class="col-md-8 col-md-offset-5">
                        <a class="btn btn-round btn-danger" href="<?=base_url('home');?>">Batal</a>
                        <?php if (isset($_POST['tambah'])):?>
                          <button class="btn btn-round btn-success" name="tambah" id="btn-rtrw-show">Tambah</button>
                          <?php else: ?>
                            <button class="btn btn-round btn-success" name="tambah" id="btn-rtrw">Tambah</button>
                        <?php endif; ?>
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