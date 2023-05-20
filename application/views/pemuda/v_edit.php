<!-- page conten -->
<div class="right_col" rol="main">
	<div class="">
		<div class="clearfix"></div>
		<div class="row"></div>

		<!-- form edit -->
		<form class="form-horizontal form-label-left" action="<?php echo base_url('pemuda/pemuda/update'); ?>" method="POST" >
			<?php $itung = count($data); ?>
			<?php foreach ($data as $key => $pemuda):?>
				<?php if ($itung == 1):?>
			<div class="col-md-8 col-sm-12 col-xs-12 col-md-offset-2">
				<?php else:?>
					<div class="col-md-6 col-sm-12 col-xs-12">
					<?php endif; ?>
				<div class="x_panel">
					<div class="x_title">
						<h2><?php echo "$judul"; ?></h2>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<br>

						<div class="form-group">
                          <input type="hidden" name="id_penduduk" value="<?php echo $pemuda->id_penduduk; ?>" >
                        	<label class="control-label col-md-3 col-sm-3 col-xs-3">No KTP</label>
                        	<div class="col-md-9 col-sm-9 col-xs-9">
                          		<input type="number" class="form-control" name="ktp" value="<?= $pemuda->no_ktp ?>" readonly>
                          		<span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        	</div>
                      	</div>

                      	<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">No KK</label>
	                        <div class="col-md-9 col-sm-9 col-xs-9">
	                          <input type="number" class="form-control" name="kk" value="<?= $pemuda->no_kk ?>" readonly >
	                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
	                        </div>
                      	</div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Nama</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="text" class="form-control" name="nama" value="<?= $pemuda->nama ?>" required oninvalid="this.setCustomValidity('Nama tidak boleh kosong')" oninput="setCustomValidity('')">
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Tempat Lahir</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="text" class="form-control" name="tempat" value="<?= $pemuda->tempat_lahir ?>" required oninvalid="this.setCustomValidity('Tempat Lahir tidak boleh kosong')" oninput="setCustomValidity('')">
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Tanggal Lahir</label>
                        <?php if ($itung ==1):?>
                        <div class="col-md-4 col-sm-9 col-xs-9">
                          <?php else:?>
                            <div class="col-md-5 col-sm-9 col-xs-9">
                            <?php endif;?>
                          <input type="date" class="form-control" name="ttl[]" value="<?= $pemuda->tanggal_lahir ?>" required oninvalid="this.setCustomValidity('Tanggal Lahir tidak boleh kosong')" oninput="setCustomValidity('')" readonly >
                          <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Umur</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                              <input type="number" class="form-control" name="umur" value="<?= $pemuda->umur ?>" required oninvalid="this.setCustomValidity('Umur Lahir tidak boleh kosong')" oninput="setCustomValidity('')" readonly >
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Jenis Kelamin</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="text" name="kelamin" class="form-control" value="<?php echo $pemuda->jenis_kelamin; ?>" required oninvalid="this.setCustomValidity('Jenis Kelamin Lahir tidak boleh kosong')" oninput="setCustomValidity('')" readonly >
                          <!-- <select name="kelamin" id="kelamin" class="form-control" required oninvalid="this.setCustomValidity('Jenis Kelamin tidak boleh kosong')" oninput="setCustomValidity('')">
                            <option><?= $pemuda->jenis_kelamin ?></option>
                            <?php $kelamin = $pemuda->jenis_kelamin;
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
                          </select> -->
                        </div>
                      </div>





                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Status</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="text" name="status" class="form-control" value="<?php echo $pemuda->status; ?>" required oninvalid="this.setCustomValidity('Status Lahir tidak boleh kosong')" oninput="setCustomValidity('')" readonly >
                          <!-- <select name="status" id="status" class="form-control" required oninvalid="this.setCustomValidity('Jenis Kelamin tidak boleh kosong')" oninput="setCustomValidity('')">
                            <option><?= $pemuda->status ?></option>
                            <?php $status = $pemuda->status;
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
                             <?php endif;?>

                             <?php if($status=='Menikah' && $kelamin=='Perempuan'): ?>
                              <option value="Janda">Janda</option>
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
                          </select> -->
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Agama</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input class="form-control" type="text" name="agama" value="<?= $pemuda->agama ?>" required oninvalid="this.setCustomValidity('Agama Tidak Boleh Kosong')" oninput="setCustomValidity('')" >
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Pekerjaan</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="text" class="form-control" name="kerja" value="<?= $pemuda->pekerjaan ?>" required oninvalid="this.setCustomValidity('Pekerjaan Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">RT</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <select name="rt" class="form-control" required oninvalid="this.setCustomValidity('Jenis Kelamin tidak boleh kosong')" oninput="setCustomValidity('')">
                            <?php if ($pemuda->rt == 0):?>
                              <option></option>
                              <?php else:?>
                                <option><?= $pemuda->rt ?></option>
                            <?php endif;?>
                              <?php foreach ($rt as $tr):?>
                                <option value="<?php echo $tr->id_rt; ?>"><?php echo $tr->rt; ?></option>
                              <?php endforeach; ?>
                          </select>
                        </div>
                      </div>

                      <div class="In_solid"></div>

					</div>
				</div>
				</div>
				<?php endforeach; ?>
				<div class="form-group">
	                <div class="col-md-8 col-md-offset-5">
	                    <a type="button" class="btn btn-primary" href="<?= base_url('pemuda/pemuda/get_pemuda'); ?>">Batal</a>
	                    <button type="submit" class="btn btn-success" >Update</button>
	                </div>
             </div>
			</div>
		</form>
		<!-- end form -->
	</div>
</div>