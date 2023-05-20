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

                    <form class="form-horizontal form-label-left" action="<?php echo base_url().'kas/kas/update' ?>" method="POST" >
                      
                      <div class="col-md-8 col-sm-12 col-xs-12 col-md-offset-2">
                        <div class="x_panel">
                          <div class="x_title">
                            <h2><?=($judul)?></small></h2>
                            <div class="clearfix"></div>
                        </div>
                        <?php foreach ($data as $key): ?>

                          <input type="hidden" name="id" value="<?php echo $key->id; ?>" >
    
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Tanggal</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                              <input type="date" name="tgl" value="<?php echo $key->tanggal ?>" class="form-control" required oninvalid="this.setCustomValidity('Tanggaal tidak boleh kosong')" oninput="setCustomValidity('')">
                              <font color="red"><?= form_error('tanggal'); ?></font>
                              <span class="fa fa-calender form-control-feedback right" aria-hidden="true"></span>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Keterangan</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                              <textarea type="text" name="ket" class="form-control" value="<?php echo $key->keterangan; ?>" required oninvalid="this.setCustomValidity('Keterangan tidak boleh kosong')" oninput="setCustomValidity('')" ><?php echo "$key->keterangan"; ?></textarea>
                              <font color="red"><?= form_error('keterangan'); ?></font>
                              <span aria-hidden="true"></span>
                            </div>
                          </div>

                          <div class="form-group form-inline">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Jumlah</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                              <input type="number" name="jum" value="<?php echo $key->jumlah; ?>" class="form-control" required oninvalid="this.setCustomValidity('Jumlah tidak boleh kosong')" oninput="setCustomValidity('')">
                              <font color="red"><?= form_error('jumlah'); ?></font>

                            <label class="">Masuk/Keluar</label>
                              <select name="makel" class="form-control" required oninvalid="this.setCustomValidity('Harap dipilih')" oninput="setCustomValidity('')" >
                                <?php $makel = $key->makel; if ($makel == 'keluar'): ?>
                                  <option value="keluar">Keluar</option>
                                  <option value="masuk">Masuk</option>
                                  <?php else: ?>
                                    <option value="masuk">Masuk</option>
                                    <option value="keluar">Keluar</option>
                                  <?php endif; ?>
                              </select>
                              <font color="red"><?= form_error('makel'); ?></font>
                              <span aria-hidden="true"></span>
                          </div>

                      </div>

                    <?php endforeach; ?>
                      
                    </div>
                  </div>

                      <br>
                      <div class="col-md-6 col-md-offset-3">
                          <div class="col-md-9 col-md-offset-3" id="btn_show_seksi_pemuda" >
                            <a href="<?php echo base_url('kas/kas/get_kas'); ?>" type="button" class="btn btn-primary">Batal</a>
                            <button type="submit" name="tambah" class="btn btn-success">Update</button>
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