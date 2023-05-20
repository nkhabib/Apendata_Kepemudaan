<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            

            <div class="clearfix"></div>

            <div class="row">
              <!-- form input mask -->

            <form class="form-horizontal form-label-left" action="<?= base_url('admin/admin/aturupdate'); ?>" method="POST" >
              <?php foreach ($data as $key => $user): ?>

              <div class="col-md-8 col-md-offset-2 col-sm-12">

                <div class="x_panel">
                  <div class="x_title">
                    <h2><?= $judul ?></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">No KTP</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <?php if (isset($_POST['update'])) :?>
                            <input type="number" class="form-control" name="ktp" value="<?php echo set_value('ktp') ?>" readonly>
                          <?php else: ?>
                            <input type="number" class="form-control" name="ktp" value="<?= $user->no_ktp ?>" readonly>
                        <?php endif; ?>
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">No Kk</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="number" class="form-control" name="kk" value="<?= $user->no_kk ?>" readonly>
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Nama</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="text" class="form-control" name="nama" value="<?= $user->nama ?>" required oninvalid="this.setCustomValidity('Nama tidak boleh kosong')" oninput="setCustomValidity('')" readonly >
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Username</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="text" class="form-control" name="username" value="<?= $user->username ?>" required oninvalid="this.setCustomValidity('Username tidak boleh kosong')" oninput="setCustomValidity('')">
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Password Baru</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="password" class="form-control" name="password1" placeholder="Kosongkan Jika Tidak Ganti Password">
                          <font color="red"><?php echo form_error('password1'); ?></font>
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Konfirmasi Password</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="password" class="form-control" name="password2" placeholder="Kosongkan Jika Tidak Ganti Password">
                          <font color="red"><?php echo form_error('password2'); ?></font>
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Jabatan</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="text" name="jabatan" class="form-control" value="<?php echo $user->jabatan; ?>" readonly>
                          <!-- <select name="jabatan[]" class="form-control" required oninvalid="this.setCustomValidity('Jabatan tidak boleh kosong')" oninput="setCustomValidity('')">
                            <option value="<?=$user->jabatan; ?>"><?php echo $user->jabatan; ?></option>
                            <?php $jabatan = $user->jabatan; ?>
                            
                            <?php if ($jabatan == 'Kadus'): ?>
                              <option value="RT">Ketua RT</option>
                              <option value="RW">Ketua RW</option>
                            <?php endif;?>

                            <?php if ($jabatan == 'RT'): ?>
                              <option value="RW">Ketua RW</option>
                              <option value="Kadus">Kadus</option>
                            <?php endif;?>

                            <?php if ($jabatan == 'RW'): ?>
                              <option value="RT">Ketua RT</option>
                              <option value="Kadus">Kadus</option>
                            <?php endif;?>

                            <?php if ($jabatan == 'Ketua Pemuda'): ?>
                              <option value="Wakil Ketua Pemuda">Wakil Ketua Pemuda</option>
                              <option value="Sekretaris">Sekretaris</option>
                              <option value="Bendahara">Bendahara</option>
                            <?php endif;?>

                            <?php if ($jabatan == 'Wakil Ketua Pemuda'): ?>
                              <option value="Ketua Pemuda">Ketua Pemuda</option>
                              <option value="Sekretaris">Sekretaris</option>
                              <option value="Bendahara">Bendahara</option>
                            <?php endif;?>

                            <?php if ($jabatan=='Bendahara'): ?>
                              <option value="Ketua Pemuda">Ketua Pemuda</option>
                              <option value="Wakil Ketua Pemuda">Wakil Ketua Pemuda</option>
                              <option value="Sekretaris">Sekretaris</option>
                            <?php endif;?>

                            <?php if ($jabatan == 'Sekretaris'): ?>
                              <option value="Bendahara">Bendahara</option>
                              <option value="Ketua Pemuda">Ketua Pemuda</option>
                              <option value="Wakil Ketua Pemuda">Wakil Ketua Pemuda</option>
                            <?php endif;?>
                          </select> -->
                        </div>
                      </div>
                      <div class="ln_solid"></div>

                  </div>
                </div>
              </div>
              
                    
                  
              <?php endforeach; ?>
              <div class="form-group">
                <div class="col-md-8 col-md-offset-5">
                    <a href="<?= base_url('home'); ?>" type="button" class="btn btn-primary" >Batal</a>
                    <button type="submit" class="btn btn-success" name="update" >Update</button>
                </div>
              </div>
              
            </form>
              <!-- /form input mask -->


            </div>




            
          </div>
        </div>
        <!-- /page content -->