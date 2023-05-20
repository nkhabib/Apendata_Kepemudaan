<div class="right_col" role="main">
	<div class="">
		<div class="clearfix"></div>
		<div class="row">
			<!-- form edit -->
			<form class="form-horizontal form-label-left" method="POST" action="<?php echo base_url('lahir/lahir/update') ?>">
				<?php foreach ($edit as $key): ?>
				<div class="col-md-8 col-sm-12 col-xs-12 col-md-offset-2">
					<div class="x_panel">
						<div class="x_title">
							<h2><?php echo $judul; ?></h2>
							<div class="clearfix"></div>
						</div>

						<!-- page content -->
						<div class="x_content">
							
							<?php if (isset($_POST['update'])): ?>
								<input type="hidden" name="id" value="<?php echo set_value('id'); ?>">
							<?php else: ?>
								<input type="hidden" name="id" value="<?php echo $key->id_lahir; ?>">
							<?php endif; ?>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-3">Nama</label>
								<div class="col-md-9 col-sm-9 col-xs-9">
									<?php if (isset($_POST['update'])): ?>
										<input type="text" name="nama" class="form-control" value="<?php echo set_value('nama'); ?>">
										<font color="red"><?php echo form_error('nama'); ?></font>
										<?php else: ?>
											<input type="text" name="nama" class="form-control" value="<?php echo $key->nama; ?>">
									<?php endif; ?>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-3">Jenis Kelamin</label>
								<div class="col-md-9 col-sm-9 col-xs-9">
									<select class="form-control" name="kelamin">
										<?php if (isset($_POST['update'])): ?>
											<option value="<?php echo set_value('kelamin') ?>"><?php echo set_value('kelamin'); ?></option>
											<option>Laki-laki</option>
											<option>Perempuan</option>
											<font color="red"><?php echo form_error('kelamin'); ?></font>
										<?php else: ?>
											<?php $kelamin = $key->jenis_kelamin;
											if ($kelamin == "Laki-laki"): ?>
												<option value="<?php echo $key->jenis_kelamin; ?>"><?php echo $key->jenis_kelamin; ?></option>
												<option value="Perempuan">Perempuan</option>
												<?php elseif ($kelamin == "Perempuan"): ?>
													<option value="<?php echo $key->jenis_kelamin; ?>"><?php echo $key->jenis_kelamin; ?></option>
													<option value="Laki-laki">Laki-laki</option>
											<?php endif; ?>
										<?php endif; ?>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-3">Tempat Lahir</label>
								<div class="col-md-9 col-sm-9 col-xs-9">
									<?php if (isset($_POST['update'])): ?>
										<input type="text" name="tempat" class="form-control" value="<?php echo set_value('tempat'); ?>">
										<font color="red"><?php echo form_error('tempat'); ?></font>
										<?php else: ?>
											<input type="text" name="tempat" class="form-control" value="<?php echo $key->tempat_lahir; ?>">
									<?php endif; ?>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-3">Tanggal Lahir</label>
								<div class="col-md-4 col-sm-4 col-xs-4">
									<?php if (isset($_POST['update'])): ?>
										<input type="date" name="ttl" class="form-control" value="<?php echo set_value('ttl'); ?>">
										<font color="red"><?php echo form_error('ttl'); ?></font>
										<?php else: ?>
											<input type="date" name="ttl" class="form-control" value="<?php echo $key->tanggal_lahir; ?>">
									<?php endif; ?>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-3">RT</label>
								<div class="col-md-9 col-sm-9 col-xs-9">
									<?php if (isset($_POST['update'])): ?>
										<select class="form-control" name="rt" id="rteditlahirupdate">
											<?php else: ?>
												<select class="form-control" name="rt" id="rteditlahir">
									<?php endif; ?>
										<?php if (isset($_POST['update'])):?>
											<?php if ($_POST['rt']==""):?>
												<option value="">---Pilih Untuk Edit Orang Tua---</option>
												<?php else: ?>
													<option value="<?php echo set_value('rt'); ?>"><?php echo set_value('rt'); ?></option>
											<?php endif; ?>
										<?php endif; ?>
										<option value="">---Pilih Untuk Edit Orang Tua---</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-3">No KK</label>
								<div class="col-md-9 col-sm-9 col-xs-9">
									<?php if (isset($_POST['update'])): ?>
										<select class="form-control" name="kklahir" id="nokkeditlahirupdate">
											<?php else: ?>
												<select class="form-control" name="kklahir" id="nokkeditlahir">
									<?php endif; ?>
										<?php if (isset($_POST['update'])): ?>
											<option value="<?php echo set_value('kklahir'); ?>"><?php echo set_value('kklahir'); ?></option>
											<?php foreach ($kk as $kkedit):?>
												<option><?php echo $kkedit; ?></option>
											<?php endforeach; ?>
											<?php else: ?>
												<option value="<?php echo $key->no_kk; ?>"><?php echo $key->no_kk; ?></option>
										<?php endif; ?>
									</select>
									<font color="red"><?php echo form_error('kklahir'); ?></font>
								</div>
								
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-3">Nama Ayah</label>
								<div class="col-md-9 col-sm-9 col-xs-9">
									<?php if (isset($_POST['update'])): ?>
										<select class="form-control" name="ayah" id="ayaheditlahirupdate">
											<?php else: ?>
												<select class="form-control" name="ayah" id="ayaheditlahir">
									<?php endif; ?>
										<?php if (isset($_POST['update'])): ?>
											<option value="<?php echo set_value('ayah'); ?>"><?php echo set_value('ayah'); ?></option>
											<?php else: ?>
												<option value="<?php echo $key->nama_ayah; ?>"><?php echo $key->nama_ayah; ?></option>
											<?php endif; ?>
									</select>
									<font color="red"><?php echo form_error('ayah'); ?></font>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-3">Nama Ibu</label>
								<div class="col-md-9 col-sm-9 col-xs-9">
									<?php if (isset($_POST['update'])): ?>
										<select class="form-control" name="ibu" id="ibueditlahirupdate">
											<?php else: ?>
												<select class="form-control" name="ibu" id="ibueditlahir">
									<?php endif; ?>
										<option value="<?php echo $key->nama_ibu; ?>"><?php echo $key->nama_ibu; ?></option>
									</select>
									<font color="red"><?php echo form_error('ibu'); ?></font>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-3">Kondisi</label>
								<div class="col-md-9 col-sm-9 col-xs-9">
									<select class="form-control" name="kondisi">
										<?php if (isset($_POST['update'])): ?>
											<option value="<?php echo set_value('kondisi'); ?>"><?php echo set_value('kondisi'); ?></option>
											<option>Normal</option>
											<option>Prematur</option>
											<font color="red"><?php echo form_error('kondisi'); ?></font>
										<?php else: ?>
											<option value="<?php echo $key->kondisi; ?>"><?php echo $key->kondisi; ?></option>
											<option>Normal</option>
											<option>Prematur</option>
										<?php endif; ?>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-3">Berat</label>
								<div class="col-md-9 col-sm-9 col-xs-9">
									<?php if (isset($_POST['update'])): ?>
										<input type="number" name="berat" class="form-control" value="<?php echo set_value('berat'); ?>">
										<font color="red"><?php echo form_error('berat'); ?></font>
										<?php else: ?>
											<input type="number" name="berat" class="form-control" value="<?php echo $key->berat; ?>">
									<?php endif; ?>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-3">Panjang</label>
								<div class="col-md-9 col-sm-9 col-xs-9">
									<?php if (isset($_POST['update'])): ?>
										<input type="number" name="panjang" class="form-control" value="<?php echo set_value('panjang'); ?>">
										<font color="red"><?php echo form_error('panjang'); ?></font>
										<?php else: ?>
											<input type="number" name="panjang" class="form-control" value="<?php echo $key->panjang; ?>">
									<?php endif; ?>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-3">Pelapor</label>
								<div class="col-md-9 col-sm-9 col-xs-9">
									<?php if (isset($_POST['update'])): ?>
										<input type="text" name="lapor" class="form-control" value="<?php echo set_value('lapor'); ?>">
										<font color="red"><?php echo form_error('lapor'); ?></font>
										<?php else: ?>
											<input type="text" name="lapor" class="form-control" value="<?php echo $key->pelapor; ?>">
									<?php endif; ?>
								</div>
							</div>




						</div>
						<!-- end conten -->
					</div>
				</div>
				<?php endforeach; ?>
				<div class="col-md-8 col-md-offset-5">
					<a class="btn btn-round btn-danger" href="<?php echo base_url('lahir/lahir/get_lahir'); ?>">Batal</a>
					<button class="btn btn-round btn-success" name="update">Update</button>
				</div>
			</form>
			<!-- end form -->
		</div>
	</div>
</div>