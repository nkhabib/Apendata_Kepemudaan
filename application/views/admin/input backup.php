        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  

              <div class="col-md-12 col-sm-12 col-xs-12">
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
                    
                  </div>
                  <div class="x_content">
                    <br/>
                    <?php if ($page == 'Tambah'): ?>
                    <form action="<?php echo base_url().'admin/admin/input_admin' ?>" method="POST">
                      <label for="total">data yang ingin dimasukan</label>
                      <input type="number" name="total" id="total" required>
                      <button class="btn btn-success">Tambah</button>
                    </form>
                  <?php endif; ?>
                    <?php if (isset($_POST['<?= $page ?>'])): //jika tombil submit ditekan?>
                      <?php echo validation_errors() ; // jalankan validasi error?>
                    <?php endif; ?>

                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo base_url().'admin/admin/proses' ?>" method="POST" >
                    <?php if (isset($_POST['total'])): //jika tombol total ditekan?>
                        <?php for ($i=1; $i<=$_POST['total']; $i++) { ?>
                        


                    <br><br><br>
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo base_url().'admin/admin/proses' ?>" method="POST" >
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">No KTP</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="number" name="noktp[]" value="<?= $row->no_ktp ?>" class="form-control" pattern="[1-9]++" required oninvalid="this.setCustomValidity('No KTP tidak boleh kosong')" oninput="setCustomValidity('')" >
                          <span class="fa fa-list form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>                        

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">No KK</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="number" name="kk[]" value="<?= $row->no_kk ?>" class="form-control" pattern="[1-9]++" required oninvalid="this.setCustomValidity('No KTP tidak boleh kosong')" oninput="setCustomValidity('')">
                          <span class="fa fa-list form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Nama</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="text" name="nama[]" value="<?= $row->nama ?>" class="form-control" required oninvalid="this.setCustomValidity('Nama tidak boleh kosong')" oninput="setCustomValidity('')">
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Username</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="text" name="username[]" value="<?= $row->username ?>" class="form-control" required oninvalid="this.setCustomValidity('Username tidak boleh kosong')" oninput="setCustomValidity('')">
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Password</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="password" name="password[]" value="<?= $row->password ?>" class="form-control" required oninvalid="this.setCustomValidity('Password tidak boleh kosong')" oninput="setCustomValidity('')">
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Jabatan</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <select name="jabatan[]" class="form-control" required>
                            <option></option>
                            <option value="Kadus">Kadus</option>
                            <option value="RT">RT</option>
                            <option value="RW">RW</option>
                            <option value="Kpemuda">Ketua Pemuda</option>
                            <option value="Sekretaris">Sekretaris</option>
                            <option value="Bendahara">Bendahara</option>
                          </select>
                        </div>
                      </div>
                    <?php } ?>
                      <!--
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">No Telp</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="text" name="notelp" class="form-control" pattern="[0-9]++" required>
                          dalam html5 pattern digunakan untuk apa saja yang boleh diinputkan dalam contoh ini adalah angka dari 0-9
                          <span class="fa fa-phone-square form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                    -->

                    <?php else : { ?>

                      <?php if ($page=='Edit'):?>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">No KTP</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="number" name="noktp[]" value="<?= $row->no_ktp ?>" class="form-control" pattern="[1-9]++" required oninvalid="this.setCustomValidity('No KTP tidak boleh kosong')" oninput="setCustomValidity('')">
                          <span class="fa fa-list form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">No KK</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="number" name="kk[]" value="<?= $row->no_kk ?>" class="form-control" pattern="[1-9]++" required oninvalid="this.setCustomValidity('No KK tidak boleh kosong')" oninput="setCustomValidity('')">
                          <span class="fa fa-list form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                    <?php else: { ?>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">No KTP</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="number" name="noktp[]" class="form-control" pattern="[1-9]++" required oninvalid="this.setCustomValidity('No KK tidak boleh kosong')" oninput="setCustomValidity('')">
                          <span class="fa fa-list form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">No KK</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="number" name="kk[]" value="<?= $row->no_kk ?>" class="form-control" pattern="[1-9]++" required oninvalid="this.setCustomValidity('No KK tidak boleh kosong')" oninput="setCustomValidity('')">
                          <span class="fa fa-list form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>

                      <?php ;} endif; ?>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Nama</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="text" name="nama[]" value="<?= $row->nama ?>" class="form-control" required oninvalid="this.setCustomValidity('Nama tidak boleh kosong')" oninput="setCustomValidity('')">
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Username</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="text" name="username[]" value="<?= $row->username ?>" class="form-control" required oninvalid="this.setCustomValidity('Username tidak boleh kosong')" oninput="setCustomValidity('')">
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Password</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="password" name="password[]" value="<?= $row->password ?>" class="form-control" required oninvalid="this.setCustomValidity('Password tidak boleh kosong')" oninput="setCustomValidity('')">
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Jabatan</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <select name="jabatan[]" class="form-control" required>
                            <option value="<?= $row->jabatan;?>"><?= $row->jabatan; ?></option>
                            <option value="Kadus">Kadus</option>
                            <option value="RT">RT</option>
                            <option value="RW">RW</option>
                            <option value="Kpemuda">Ketua Pemuda</option>
                            <option value="Sekretaris">Sekretaris</option>
                            <option value="Bendahara">Bendahara</option>
                          </select>
                        </div>
                      </div>
                      <?php ;} ?>
                    <?php endif; ?>
                      <div class="ln_solid"></div>

                      <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                          <a href="<?php if ($page == 'Tambah'){
                          echo base_url('home'); }
                          else {
                            echo base_url('admin/admin/get_admin');
                          }
                          ?>" type="button" name="cancel" class="btn btn-primary">Cancel</a>
                          <?php if($page == 'Tambah'): ?>
                          <a href="<?php echo base_url().'admin/admin/input_admin' ?>" type="submit" name="reset" class="btn btn-primary">Reset</a>
                        <?php endif; ?>
                          <button type="submit" name="<?= $page ?>" class="btn btn-success">Submit</button>
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