<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            

            <div class="clearfix"></div>

            <div class="row">
              <!-- form input mask -->

            <form class="form-horizontal form-label-left" action="<?= base_url('cetak/cetak/print'); ?>" method="POST" >
                <div class="col-md-8 col-sm-12 col-xs-12 col-md-offset-2">
                <div class="x_panel">
                  <div class="x_title">
                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg'); ?>" ></div>
                    <div class="flashdatagagal" data-flashdata="<?= $this->session->flashdata('gagal'); ?>" ></div>
                    <h2><?= $judul ?></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Tahun Laporan</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <select name="tahun" class="form-control" required oninvalid="this.setCustomValidity('Pilih Tahun Laporan')" oninput="setCustomValidity('')">
                            <option value="" >--Pilih--</option>
                          	<?php $now = date('Y');
                              $min = $now-3;
                              $max = $now+3;
                              for ($i=$min; $i <= $max; $i++):
                             ?>
                             <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                           <?php endfor; ?>
                          </select>
                        </div>
                      </div>

					           <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Berdasarkan</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <select name="jenis" class="form-control" required oninvalid="this.setCustomValidity('Pilih Jenis Laporan')" oninput="setCustomValidity('')">
                          	<option value="">--Pilih--</option>
                          	<?php foreach ($rt as $key):?>
                          		<option value="<?php echo $key->id_rt?>">RT <?php echo $key->rt; ?></option>
                          	<?php endforeach;?>
                          	<option value="penduduk">RW 05</option>
                          </select>
                        </div>
                     </div>

                      <div class="ln_solid"></div>

                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-8 col-md-offset-5">
                    <a type="button" class="btn btn-primary" href="<?= base_url('penduduk/penduduk/get_penduduk'); ?>">Batal</a>
                    <button type="submit" class="btn btn-success" >Lihat</button>
                </div>
              </div>
              
            </form>
              <!-- /form input mask -->


            </div>




            
          </div>
        </div>
        <!-- /page content -->