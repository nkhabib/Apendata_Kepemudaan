<div class="right_col" role="main">
	<div class="">
		<div class="clearfix"></div>
		<div class="row"></div>
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<div class="flashdatagagal" data-flashdata="<?= $this->session->flashdata('msg_gagal'); ?>" ></div>
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

					<form method="POST" class="form-horizontal form-label-left" action="<?php echo base_url('lahir/lahir/tambah'); ?>">
						<div class="col-md-8 col-sm-12 col-xs-12 col-md-offset-2">
							<div class="x_panel">
								<div class="x_title">
									<h2><?php echo $judul; ?></h2>
									<div class="clearfix"></div>
								</div>

								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-3">Nama</label>
									<div class="col-md-9 col-sm-9 col-xs-9">
										<font color="red"><?php echo form_error('nama'); ?></font>
										<input type="text" name="nama" class="form-control" value="<?php echo set_value('nama'); ?>">
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-3">Jenis Kelamin</label>
									<div class="col-md-9 col-sm-9 col-xs-9">
										<font color="red"><?php echo form_error('kelamin'); ?></font>
										<select class="form-control" name="kelamin">
											
											<?php if (isset($_POST['tambah'])): ?>
												
												<option value="<?php echo set_value('kelamin'); ?>"><?php echo set_value('kelamin'); ?></option>
												
												<?php else: ?>
													
													<option></option>
												
												<?php endif; ?>
											
											<option value="Laki-laki">Laki-Laki</option>
											<option value="Perempuan">Perempuan</option>
										
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-3">Tempat Lahir</label>
									<div class="col-md-9 col-sm-9 col-xs-9">
										<font color="red"><?php echo form_error('tempat'); ?></font>
										<input type="text" name="tempat" class="form-control" value="<?php echo set_value('tempat'); ?>">
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-3">Tanggal Lahir</label>
									<div class="col-md-9 col-sm-9 col-xs-9">
										<font color="red"><?php echo form_error('ttl'); ?></font>
										<input type="date" name="ttl" class="form-control" value="<?php echo set_value('ttl'); ?>">
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-3">Pilih RT</label>
									<div class="col-md-9 col-sm-9 col-xs-9">
										<font color="red"><?php echo form_error('rt'); ?></font>
										<select class="form-control" name="rt" id="rt_lahir">													
											
											<?php if (isset($_POST['tambah'])): ?>
												
												<option value="<?php echo set_value('rt'); ?>"><?php echo set_value('rt'); ?></option>
												
												<?php else: ?>
													
													<option value="">--Pilih RT--</option>
												
												<?php endif;?>
											<?php foreach ($data as $key): ?>
												<option value="<?php echo $key->id_rt; ?>"><?php echo $key->rt; ?></option>
											<?php endforeach; ?>
										
										</select>
									</div>
								</div>

								<?php if (isset($_POST['tambah'])): ?>
									<div class="form-group" id="show_lahir">
										<?php else: ?>
											<div class="form-group" id="kk_lahir">
								<?php endif; ?>

									<label class="control-label col-md-3 col-sm-3 col-xs-3">NO KK</label>
									<div class="col-md-9 col-sm-9 col-xs-9">
										<font color="red"><?php echo form_error('kk'); ?></font>
										<select class="form-control" name="kk" id="nokk_lahir">
											<?php if (isset($_POST['tambah'])): ?>
												<option value="<?php echo set_value('kk'); ?>"><?php echo set_value('kk'); ?></option>
												
												<?php foreach ($kk as $key): ?>
													<option value="<?php echo $key; ?>"><?php echo $key; ?></option>
												<?php endforeach; ?>

												<?php else: ?>
													
											<?php endif; ?>
										</select>
									</div>
								</div>

								<?php if (isset($_POST['tambah'])): ?>
									<div id="show_lahirnama">
										<?php else: ?>
											<div id="hiden_lahir">
								<?php endif; ?>
									<div class="form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-3">Nama Ayah</label>
										<div class="col-md-9 col-sm-9 col-xs-9">
											<font color="red"><?php echo form_error('ayah'); ?></font>
											<!-- <input type="text" name="ayah" id="ayah_lahir" class="form-control" value="<?php echo set_value('ayah'); ?>"> -->
											<select class="form-control" name="ayah" id="ayah_lahir">
												<?php if (isset($_POST['tambah'])): ?>
													<option value="<?php echo set_value('ayah'); ?>"><?php echo set_value('ayah'); ?></option>
													<?php foreach ($ayah as $key): ?>
														<option value="<?php echo $key->nama; ?>"><?php echo $key->nama; ?></option>
													<?php endforeach; ?>
													<option value="Belum Diketahui">--Belum Diketahui--</option>
													<?php else: ?>
												<?php endif; ?>
											</select>
										</div>
									</div>

									<?php if (isset($_POST['tambah'])): ?>
										<div class="form-group" id="ibulahir_show">
										
										<?php else: ?>
											<div class="form-group" id="ibulahir">
									<?php endif; ?>
										<label class="control-label col-md-3 col-sm-3 col-xs-3">Nama Ibu</label>
										<div class="col-md-9 col-sm-9 col-xs-9">
											<font color="red"><?php echo form_error('ibu'); ?></font>
											<!-- <input type="text" name="ibu" id="ibu_lahir" class="form-control" value="<?php echo set_value('ibu'); ?>"> -->
											<select class="form-control" name="ibu" id="ibu_lahir">
												<?php if (isset($_POST['tambah'])): ?>
													<option value="<?php echo set_value('ibu'); ?>"><?php echo set_value('ibu'); ?></option>
													<?php foreach ($ibu as $key): ?>
														<option value="<?php echo $key->nama; ?>"><?php echo $key->nama; ?></option>
													<?php endforeach; ?>
													<option value="Belum Diketahui">--Belum Diketahui--</option>
													<?php else: ?>
												<?php endif; ?>
											</select>
										</div>
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-3">Kondisi</label>
									<div class="col-md-9 col-sm-9 col-xs-9">
										<font color="red"><?php echo form_error('kondisi'); ?></font>
										<select class="form-control" name="kondisi">
											<?php if (isset($_POST['tambah'])): ?>
												<option value="<?php echo set_value('kondisi'); ?>"><?php echo set_value('kondisi'); ?></option>
												<?php else: ?>
													<option></option>
												<?php endif; ?>
											<option value="Normal">Normal</option>
											<option value="Prematur">Prematur</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-3">Berat</label>
									<div class="col-md-9 col-sm-9 col-xs-9">
										<font color="red"><?php echo form_error('berat'); ?></font>
										<input type="number" name="berat" class="form-control" value="<?php echo set_value('berat'); ?>">
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-3">Panjang</label>
									<div class="col-md-9 col-sm-9 col-xs-9">
										<font color="red"><?php echo form_error('panjang'); ?></font>
										<input type="number" name="panjang" class="form-control" value="<?php echo set_value('panjang'); ?>">
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-3">Pelapor</label>
									<div class="col-md-9 col-sm-9 col-xs-9">
										<font color="red"><?php echo form_error('pelapor'); ?></font>
										<input type="text" name="pelapor" class="form-control" value="<?php echo set_value('pelapor'); ?>">
									</div>
								</div>


							</div>
						</div>

						<div class="col-md-5 col-sm-5 col-xs-5 col-md-offset-5 col-sm-offset-5 col-xs-offset-5">
							<a class="btn btn-round btn-success" href="<?php echo base_url('home'); ?>">Batal</a>
							<button class="btn btn-round btn-success" name="tambah">Tambah</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>