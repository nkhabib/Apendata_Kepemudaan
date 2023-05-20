<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            

            <div class="clearfix"></div>

            <div class="row">
              <!-- form input mask -->

            <form class="form-horizontal form-label-left" action="<?= base_url('kematian/kematian/update'); ?>" method="POST" >
              <?php foreach ($data as $key => $kematian): ?>
              <div class="col-md-8 col-sm-12 col-xs-12 col-md-offset-2">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?= $judul ?></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />

                    <input type="hidden" name="id_penduduk" value="<?php echo $kematian->id_penduduk; ?>" >

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">No KTP</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="number" class="form-control" name="ktp" value="<?= $kematian->no_ktp ?>" readonly>
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">No KK</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="number" class="form-control" name="kk" value="<?= $kematian->no_kk ?>" readonly>
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Nama</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="text" class="form-control" name="nama" value="<?= $kematian->nama ?>" required oninvalid="this.setCustomValidity('Nama tidak boleh kosong')" oninput="setCustomValidity('')">
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Jenis Kelamin</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <select name="kelamin" id="kelamin" class="form-control" required oninvalid="this.setCustomValidity('Jenis Kelamin tidak boleh kosong')" oninput="setCustomValidity('')">
                            <option><?= $kematian->jenis_kelamin ?></option>
                            <?php $kelamin = $kematian->jenis_kelamin;
                             if ($kelamin=='Laki-laki'):?>
                              <option value="Perempuan">Perempuan</option>
                             <?php endif; ?>
                             <?php if ($kelamin=='Perempuan'):?>
                              <option value="Laki-laki">Laki-laki</option>
                            <?php endif; ?>
                          </select>
                        </div>
                      </div>

                      <!-- <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Alamat</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="text" class="form-control" name="alamat[]" value="<?= $kematian->alamat ?>" required oninvalid="this.setCustomValidity('Tanggal Lahir tidak boleh kosong')" oninput="setCustomValidity('')">
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div> -->

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">RT</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <select name="rt" class="form-control" required oninvalid="this.setCustomValidity('Pilih RT')" oninput="setCustomValidity('')">
                            <option><?= $kematian->rt ?></option>
                              <?php foreach ($rt as $tr):?>
                                <option value="<?php echo $tr->id_rt; ?>"><?php echo $tr->rt; ?></option>
                              <?php endforeach; ?>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Status</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <select name="status" id="status" class="form-control" required oninvalid="this.setCustomValidity('Pilih Status')" oninput="setCustomValidity('')">
                            <option><?= $kematian->status ?></option>
                            <?php if ($kelamin=='Laki-laki'):?>
                              <option value="Menikah">Menikah</option>
                              <option value="Duda">Duda</option>
                              <option value="Lajang">Lajang</option>
                            <?php endif;?>

                            <?php if ($kelamin=='Perempuan'):?>
                              <option value="Menikah">Menikah</option>
                              <option value="Janda">Janda</option>
                              <option value="Lajang">Lajang</option>
                            <?php endif;?>

                             <option value="Meninggal">Meninggal</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Agama</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="text" class="form-control" name="agama" value="<?= $kematian->agama ?>" required oninvalid="this.setCustomValidity('Agama tidak boleh kosong')" oninput="setCustomValidity('')">
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Tempat Lahir</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="text" class="form-control" name="tempat" value="<?= $kematian->tempat_lahir ?>" required oninvalid="this.setCustomValidity('Tempat Lahir tidak boleh kosong')" oninput="setCustomValidity('')">
                          <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Tanggal Lahir</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="date" class="form-control" name="ttl" value="<?= $kematian->tanggal_lahir ?>" required oninvalid="this.setCustomValidity('Tanggal Lahir tidak boleh kosong')" oninput="setCustomValidity('')">
                          <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Tanggal Kematian</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="date" class="form-control" name="tkm" value="<?= $kematian->tanggal_kematian ?>" required oninvalid="this.setCustomValidity('Tanggal kematian tidak boleh kosong')" oninput="setCustomValidity('')">
                          <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Umur</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="number" class="form-control" name="umur" value="<?= $kematian->umur ?>" required oninvalid="this.setCustomValidity('Umur tidak boleh kosong')" oninput="setCustomValidity('')">
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>


                      <div class="ln_solid"></div>

                  </div>
                </div>
              </div>
              
                    
                  
              <?php endforeach; ?>
              <div class="form-group">
                <div class="col-md-8 col-md-offset-5">
                    <a type="button" class="btn btn-primary" href="<?= base_url('kematian/kematian/get_kematian'); ?>">Batal</a>
                    <button type="submit" class="btn btn-success" >Update</button>
                </div>
              </div>
              
            </form>
              <!-- /form input mask -->


            </div>




            
          </div>
        </div>
        <!-- /page content -->