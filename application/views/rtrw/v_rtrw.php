<div class="right_col" role="main">
	<div class="">
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="x_panel">
							<div class="x_title">
								<div class="flash-data" data-flashdata="<?=$this->session->flashdata('msg'); ?>"></div>
								<div class="flashdatagagal" data-flashdata="<?= $this->session->flashdata('gagal'); ?>" ></div>
								<h2><?=$judul; ?></h2>
								<ul class="nav navbar-right panel_toolbox">
									<li>
										<a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
									</li>

									<li>
										<a class="close-link"><i class="fa fa-close"></i></a>
									</li>
								</ul>
								<div class="clearfix"></div>
							</div>

							<div class="x_content">
								<?php echo form_open("rtrw/rtrw/cari"); ?>
									<select class="btn btn-default" name="cariberdasarkan" >

				                        <option value="">Cari Berdasarkan</option>
				                        <option value="no_ktp">No KTP</option>
				                        <option value="no_kk">No KK</option>
				                        <option value="nama">Nama</option>
				                        <option value="status">Status</option>
				                        <option value="agama">Agama</option>
				                        <option value="pekerjaan">Pekerjaan</option>
				                        <!-- <option value="username">Username</option> -->
				                        <option value="jabatan">Jabatan</option>

			                    	</select>

			                      <input form-control mr-sm-2 type="text" name="yangdicari" id="">
			                      <button class="btn btn-default" type="submit" >Search</button>
								<?php echo form_close(); ?>

								<?php echo form_open("rtrw/rtrw/hapusbanyak");
									if ($this->session->userdata('masuk')=='kadus'): ?>
										<button class="btn-danger" onclick="return confirm('Yakin Hapus ?')">
											<i class="glyphicon glyphicon-trash"></i>
										</button>

										<!-- <button name="edit_banyak" class="btn-danger" formaction="<?php echo base_url("rtrw/rtrw/edit_banyak"); ?>">
											<i class="glyphicon glyphicon-edit"></i>
										</button> -->
									<?php endif; ?>

									<table class="table table-striped jambo_table">
										<thead>
											<tr class="headings">
												<?php if ($this->session->userdata('masuk')=='kadus'): ?>
													<th>
														<input type="checkbox" id="pilih-semua" name="item">
													</th>
												<?php endif;?>
													
												<th>No KTP</th>
												<th>No KK</th>
												<th>Nama</th>
												<th>Tangal Lahir</th>
												<th>Jenis Kelamin</th>
												<th>Umur</th>
												<th>Agama</th>
												<th>Status</th>
												<th>RT</th>
												<th>Pekerjaan</th>
												<th>Jabatan</th>
												<?php if ($this->session->userdata('masuk')=='kadus'): ?>
													<th>Action</th>
												<?php endif; ?>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($data as $key): ?>
												<tr class="headings">
													<?php if ($this->session->userdata('masuk')=='kadus'): ?>
														<td>
															<input type="checkbox" class="tercek" name="ktp[]" value="<?=$key->id_penduduk; ?>">
														</td>
													<?php endif;?>
													<td><?=$key->no_ktp; ?></td>
													<td><?=$key->no_kk; ?></td>
													<td><?=$key->nama; ?></td>
													<td><?=tgl_indo($key->tanggal_lahir); ?></td>
													<td><?=$key->jenis_kelamin; ?></td>
													<td><?=$key->umur; ?></td>
													<td><?=$key->agama; ?></td>
													<td><?=$key->status; ?></td>
													<td><?=$key->rt; ?></td>
													<td><?=$key->pekerjaan; ?></td>
													<td><?=$key->jabatan; ?></td>
													<!-- <td>Nanti</td> -->
													<?php if ($this->session->userdata('masuk')=='kadus'): ?>
														<td>
															<a href="<?php echo base_url("rtrw/rtrw/edit/".$key->id_penduduk); ?>">
																<i class="glyphicon glyphicon-edit" style="margin: 3px; color: orange">
																	Edit
																</i>
															</a>

															<a class="hapus" href="<?php echo base_url("rtrw/rtrw/hapus/".$key->id_penduduk); ?>">
																<i class="glyphicon glyphicon-trash" style="margin: 3px; color: red">
																	Hapus
																</i>
															</a>
														</td>
													<?php endif;?>
											<?php endforeach; ?>
											</tr>
										</tbody>
									</table>
								<?php form_close(); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>