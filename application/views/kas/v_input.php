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

                    <form class="form-horizontal form-label-left" action="<?php echo base_url().'kas/kas/input_kas' ?>" method="POST" >
                      
                      <div class="col-md-8 col-sm-12 col-xs-12 col-md-offset-2">
                        <div class="x_panel">
                          <div class="x_title">
                            <h2><?=($judul)?></small></h2>
                            <div class="clearfix"></div>
                        </div>
  
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Tanggal</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                              <input type="date" name="tanggal" value="<?= set_value('tanggal'); ?>" class="form-control">
                              <!-- required oninvalid="this.setCustomValidity('Nama tidak boleh kosong')" oninput="setCustomValidity('')" -->
                              <font color="red"><?= form_error('tanggal'); ?></font>
                              <span class="fa fa-calender form-control-feedback right" aria-hidden="true"></span>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Keterangan</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                              <textarea type="text" name="keterangan" class="form-control" value="<?= set_value('keterangan'); ?>"> </textarea>
                              <!-- required oninvalid="this.setCustomValidity('Umur tidak boleh kosong')" oninput="setCustomValidity('')" -->
                              <font color="red"><?= form_error('keterangan'); ?></font>
                              <span aria-hidden="true"></span>
                            </div>
                          </div>

                          <div class="form-group form-inline">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Jumlah</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                              <input type="number" name="jumlah" value="<?= set_value('jumlah'); ?>" placeholder="Rp" class="form-control">
                              <!-- required oninvalid="this.setCustomValidity('Nama tidak boleh kosong')" oninput="setCustomValidity('')" -->
                              <font color="red"><?= form_error('jumlah'); ?></font>

                            <label class="">Masuk/Keluar</label>
                              <select name="makel" class="form-control">
                                <option value="">--Pilih--</option>
                                <option value="Masuk">Masuk</option>
                                <option value="Keluar">Keluar</option>
                              </select>
                              <font color="red"><?= form_error('makel'); ?></font>
                              <span aria-hidden="true"></span>
                          </div>

                      </div>
                      
                    </div>
                  </div>

                      <br>
                      <div class="col-md-6 col-md-offset-3">
                          <div class="col-md-9 col-md-offset-3" id="btn_show_seksi_pemuda" >
                            <a href="<?php echo base_url('home'); ?>" type="button" class="btn btn-primary">Batal</a>
                            <a href="<?php echo base_url().'kas/kas/input_kas'; ?>" type="submit" class="btn btn-primary">Reset</a>
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