<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            

            <div class="clearfix"></div>

            <div class="row">
              <!-- form input mask -->

            <form class="form-horizontal form-label-left" action="<?= base_url('seksi/seksi/update'); ?>" method="POST" >
              <?php $itung=count($data); 
              foreach ($data as $key => $seksi): ?>
                <?php if ($itung == 1):?>
                <div class="col-md-8 col-sm-12 col-xs-12 col-md-offset-2">
                  <?php else:?>
              <div class="col-md-6 col-sm-12 col-xs-12">
              <?php endif;?>
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?= $judul ?></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />

                      <input type="hidden" name="seksi" value="<?php echo $seksi->id_seksi; ?>" >
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">No KTP</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="number" class="form-control" name="ktp" value="<?= $seksi->no_ktp ?>" readonly>
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Nama</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="text" class="form-control" name="nama[]" value="<?= $seksi->nama ?>" required oninvalid="this.setCustomValidity('Nama tidak boleh kosong')" oninput="setCustomValidity('')" readonly >
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Jenis Kelamin</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="text" class="form-control" name="kelamin[]" value="<?= $seksi->jenis_kelamin ?>" required oninvalid="this.setCustomValidity('Jenis Kelamin tidak boleh kosong')" oninput="setCustomValidity('')" readonly >
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Alamat</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <textarea name="alamat[]" class="form-control" required oninvalid="this.setCustomValidity('Alamat Tidak Boleh Kosong')" oninput="setCustomValidity('')" readonly="" ><?=$seksi->alamat ?></textarea>
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Jabatan</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <select name="jabatan" class="form-control" required oninvalid="this.setCustomValidity('Jabatan tidak boleh kosong')" oninput="setCustomValidity('')">
                            <option value="<?php echo $seksi->jabatan; ?>"><?php echo $seksi->jabatan; ?></option>
                            <option value="Humas">Humas</option>
                            <option value="Keagamaan"> Keagamaan</option>
                            <option value="Keamanan">Keamanan</option>
                            <option value="Kesenian">Kesenian</option>
                            <option value="Olahraga">Olahraga</option>
                            <option value="Perekonomian">Perekonomian</option>
                          </select>
                        </div>
                      </div>

                      <div class="ln_solid"></div>

                  </div>
                </div>
              </div>
              
                    
                  
              <?php endforeach; ?>
              <div class="form-group">
                <div class="col-md-8 col-md-offset-5">
                    <a type="button" class="btn btn-primary" href="<?= base_url('seksi/seksi/get_seksi'); ?>">Batal</a>
                    <button type="submit" class="btn btn-success" >Update</button>
                </div>
              </div>
              
            </form>
              <!-- /form input mask -->


            </div>




            
          </div>
        </div>
        <!-- /page content -->