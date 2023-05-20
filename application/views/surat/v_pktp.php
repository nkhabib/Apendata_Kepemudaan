        <div class="right_col" role="main"><!-- -->
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

                    <form class="form-horizontal form-label-left" action="<?php echo base_url('surat/surat/printpktp'); ?>" method="POST" target="_blank" >
                      
                      <div class="col-md-8 col-sm-12 col-xs-12 col-md-offset-2">
                        <div class="x_panel">
                          <div class="x_title">
                            <h2><?=($judul)?></small></h2>
                            <div class="clearfix"></div>
                        </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3" for="kk">RT</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <select name="rtSelect" class="form-control" required oninvalid="this.setCustomValidity('Pilih RT')" oninput="setCustomValidity('')" id="selectPktp" >
                            <option value="">---</option>
                            <?php $masuk = $this->session->userdata('masuk'); ?>
                              <?php if ($masuk == 'kadus'):?>
                              <?php foreach ($rt as $r): ?>
                                <option value="<?php echo $r->id_rt ?>"><?php echo $r->rt ?></option>
                              <?php endforeach; ?>
                            <?php else: ?>
                              <option value="<?php echo $this->session->userdata('ses_idrt'); ?>">
                                <?php echo $this->session->userdata('ses_rt'); ?>
                              </option>
                            <?php endif; ?>
                          </select>
                          <font color="red"><?= form_error('rtSelect'); ?></font>
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>

                      <div class="pktpHide" id="pktpHide">
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-3" for="no_kk">NO KK</label>
                          <div class="col-md-9 col-sm-9 col-xs-9">
                            <select name="no_kk" class="form-control" required oninvalid="this.setCustomValidity('Pilih No KK')" oninput="setCustomValidity('')" id="kkDinamis" >
                            </select>
                            <font color="red"><?php echo form_error('no_kk'); ?></font>
                            <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                          </div>
                        </div>
                      </div>

                      <div id="pktpHideForm">
                        
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-3">Nama</label>
                          <div class="col-md-9 col-sm-9 col-xs-9">
                            <input type="text" name="nama" class="form-control" required oninvalid="this.setCustomValidity('Nama tidak boleh kosong')" oninput="setCustomValidity('')" >
                            <font color="red"><?php echo form_error('nama'); ?></font>
                            <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-3">Tanggal Lahir</label>
                          <div class="col-md-4 col-sm-9 col-xs-9">
                            <input type="date" name="ttl" id="ttl" class="form-control" required oninvalid="this.setCustomValidity('Tanggal Lahir tidak boleh kosong')" oninput="setCustomValidity('')" >
                            <font color="red"><?php echo form_error('ttl');?></font>
                            <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-3">Jenis Kelamin</label>
                          <div class="col-md-9 col-sm-9 col-xs-9">
                            <select name="kelamin" class="form-control" id="kelamin" required oninvalid="this.setCustomValidity('Jenis Kelamin tidak boleh kosong')" oninput="setCustomValidity('')" >
                              <option value="">---</option>
                              <option value="Laki-laki">Laki-laki</option>
                              <option value="Perempuan">Perempuan</option>
                            </select>
                            <font color="red"><?php echo form_error('kelamin'); ?></font>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-3">Umur</label>
                          <div class="col-md-9 col-sm-9 col-xs-9">
                            <input type="number" minlength="3" maxlength="4" name="umur" id="umur" class="form-control" required readonly >
                            <font color="red"><?= form_error('umur'); ?></font>
                            <font color="red">Minimal Umur 17 Tahun</font>
                            <span aria-hidden="true"></span>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-3">Agama</label>
                          <div class=" col-md-9 col-sm-9 col-xs-9">
                            <input type="text" name="agama" class="form-control" required oninvalid="this.setCustomValidity('Agama tidak boleh kosong')" oninput="setCustomValidity('')" >
                            <font color="red"><?php echo form_error('agama'); ?></font>
                            <span aria-hidden="true"></span>
                          </div>
                        </div>


  					             <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-3">Status</label>
                          <div class="col-md-9 col-sm-9 col-xs-9">
                            <select name="status" class="form-control" id="status" required oninvalid="this.setCustomValidity('Status tidak boleh kosong')" oninput="setCustomValidity('')" >
                              <option value="">--Pilih--</option>
                                <option value="Lajang">Lajang</option>
                                <option value="Menikah">Menikah</option>
                                <option value="Janda">Janda</option>
                            </select>
                            <font color="red"><?php echo form_error('status'); ?></font>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-3" for="alamat">Alamat</label>
                          <div class="col-md-9 col-sm-9 col-xs-9">
                            <textarea name="alamat" id="alamat" class="form-control" required oninvalid="this.setCustomValidity('Alamat tidak boleh kosong')" oninput="setCustomValidity('')"></textarea>
                            <font color="red"><?php echo form_error('alamat'); ?></font>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-3">Pekerjaan</label>
                          <div class="col-md-9 col-sm-9 col-xs-9">
                            <input type="text" name="pekerjaan" class="form-control" required oninvalid="this.setCustomValidity('Pekerjaan tidak boleh kosong')" oninput="setCustomValidity('')" >
                            <font color="red"><?php echo form_error('pekerjaan'); ?></font>
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
                          <a href="<?php echo base_url('surat/surat/pktp'); ?>" type="submit" class="btn btn-primary">Reset</a>
                          <button type="submit" name="tambah" class="btn btn-success" id="pktpPrint">Cetak</button>
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