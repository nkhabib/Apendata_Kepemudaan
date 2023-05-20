<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            

            <div class="clearfix"></div>

            <div class="row">
              <!-- form input mask -->

            <form class="form-horizontal form-label-left" action="<?= base_url('penduduk/penduduk/update'); ?>" method="POST" >
              <?php foreach ($data as $key => $penduduk): ?>
                
                <div class="col-md-8 col-sm-12 col-xs-12 col-md-offset-2">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?= $judul ?></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />

                    <input type="hidden" name="id_penduduk" value="<?php echo $penduduk->id_penduduk; ?>" >

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">No KTP</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="number" class="form-control" name="ktp" value="<?= $penduduk->no_ktp ?>" readonly>
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">No KK</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="number" class="form-control" name="kk" value="<?= $penduduk->no_kk ?>">
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Nama</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="text" class="form-control" name="nama" value="<?= $penduduk->nama ?>" required oninvalid="this.setCustomValidity('Nama tidak boleh kosong')" oninput="setCustomValidity('')">
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Tempat Lahir</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="text" class="form-control" name="tempat" value="<?= $penduduk->tempat_lahir ?>" required oninvalid="this.setCustomValidity('Tempat Lahir tidak boleh kosong')" oninput="setCustomValidity('')">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Tanggal Lahir</label>
                        <div class="col-md-4 col-sm-9 col-xs-9">
                          <input type="date" class="form-control" name="ttl" id="ttl" value="<?= $penduduk->tanggal_lahir ?>" required oninvalid="this.setCustomValidity('Tanggal Lahir tidak boleh kosong')" oninput="setCustomValidity('')">
                          <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Umur</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                              <input type="number" class="form-control" name="umur" id="umur" value="<?= $penduduk->umur ?>" required oninvalid="this.setCustomValidity('Umur Lahir tidak boleh kosong')" oninput="setCustomValidity('')" readonly>
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Jenis Kelamin</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <select name="kelamin" id="kelamin" class="form-control" required oninvalid="this.setCustomValidity('Jenis Kelamin tidak boleh kosong')" oninput="setCustomValidity('')">
                            <option><?= $penduduk->jenis_kelamin ?></option>
                            <?php $kelamin = $penduduk->jenis_kelamin;
                             if ($kelamin=='Laki-laki'):?>
                              <option value="Perempuan">Perempuan</option>
                             <?php endif; ?>
                             <?php if ($kelamin=='Perempuan'):?>
                              <option value="Laki-laki">Laki-laki</option>
                            <?php endif; ?>

                            <?php if ($kelamin==''):?>
                              <option value="Laki-laki">Laki-laki</option>
                              <option value="Perempuan">Perempuan</option>
                            <?php endif;?>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Status</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <select name="status" id="status" class="form-control" required oninvalid="this.setCustomValidity('Status tidak boleh kosong')" oninput="setCustomValidity('')">
                            <option><?= $penduduk->status ?></option>
                            <?php $status = $penduduk->status;
                             if ($status=='Lajang' && $kelamin=='Laki-laki'):?>
                              <option value="Menikah">Menikah</option>
                              <option value="Duda">Duda</option>
                             <?php endif; ?>

                             <?php if($status=='Lajang' && $kelamin=='Perempuan'): ?>
                              <option value="Menikah">Menikah</option>
                              <option value="Janda">Janda</option>
                             <?php endif;?>

                             <?php if($status=='Menikah' && $kelamin=='Laki-laki'): ?>
                              <option value="Duda">Duda</option>
                              <option value="Lajang">Lajang</option>
                             <?php endif;?>

                             <?php if($status=='Menikah' && $kelamin=='Perempuan'): ?>
                              <option value="Janda">Janda</option>
                              <option value="Lajang">Lajang</option>
                             <?php endif;?>

                             <?php if($status=='Janda' or $status=='Duda'): ?>
                              <option value="Menikah">Menikah</option>
                             <?php endif;?>

                             <?php if ($status==''):?>
                              <option value="Lajang">Lajang</option>
                              <option value="Menikah">Menikah</option>
                              <option value="Duda">Duda</option>
                              <option value="Janda">Janda</option>
                            <?php endif;?>
                             <option value="Meninggal">Meninggal</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Agama</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input class="form-control" type="text" name="agama" value="<?= $penduduk->agama ?>" required oninvalid="this.setCustomValidity('Agama Tidak Boleh Kosong')" oninput="setCustomValidity('')" >
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>




                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Status Keluarga</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <select name="statuskeluarga" id="statuskeluarga" class="form-control" required oninvalid="this.setCustomValidity('Status Keluarga Tidak Boleh Kosong')" oninput="setCustomValidity('')" readonly>
                            <option><?= $penduduk->statuskeluarga ?></option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Kepala Keluarga</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <select name="statuskk" id="kepala_kk" class="form-control" required oninvalid="this.setCustomValidity('Pilih Ya atau Tidak')" oninput="setCustomValidity('')">
                            <?php $yakk = $penduduk->kepalakk;
                            if ($yakk==1): ?>
                              <option value="1">YA</option>
                              <?php elseif ($yakk==0): ?>
                                <option value="0">TIDAK</option>
                            <?php endif; ?>
                          </select>
                        </div>
                      </div>


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">RT</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <select name="rt" class="form-control" required oninvalid="this.setCustomValidity('Jenis Kelamin tidak boleh kosong')" oninput="setCustomValidity('')">
                            <?php if ($penduduk->rt == 0):?>
                              <option></option>
                              <?php else:?>
                                <option value="<?php echo $penduduk->id_rt; ?>"><?= $penduduk->rt ?></option>
                            <?php endif;?>
                            <?php $this->db->order_by('rt','ASC');
                                 $rt = $this->db->get('rt')->result();
                             ?>
                             <?php foreach ($rt as $tr):?>
                              <option value="<?php echo $tr->id_rt; ?>"><?php echo $tr->rt; ?></option>
                             <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Pekerjaan</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="text" class="form-control" name="pekerjaan" value="<?= $penduduk->pekerjaan ?>" required oninvalid="this.setCustomValidity('Pekerjaan Tidak Boleh Kosong')" oninput="setCustomValidity('')">
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
                    <a type="button" class="btn btn-primary" href="<?= base_url('penduduk/penduduk/get_penduduk'); ?>">Batal</a>
                    <button type="submit" class="btn btn-success" >Update</button>
                </div>
              </div>
              
            </form>
              <!-- /form input mask -->


            </div>




            
          </div>
        </div>
        <!-- /page content -->