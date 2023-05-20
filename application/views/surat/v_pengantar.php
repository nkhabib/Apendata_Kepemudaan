<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="right_col" role="main">
		<form class="form-horizontal form-label-left" id="surat" method="POST" action="<?=base_url('surat/surat/print');?>" target="_blank">
			<div class="col-md-8 col-sm-12 col-xs-12 col-md-offset-2">
				<div class="x_panel">
					<div class="x_title">
                		<h2><?= $judul ?></h2>
                		<div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg'); ?>" ></div>
                    	<div class="flashdatagagal" data-flashdata="<?= $this->session->flashdata('gagal'); ?>" ></div>
                		<div class="clearfix"></div>
              		</div>

              		<div class="x_content">
              			<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-3" for="rtdinamis">Pilih RT</label>
							<div class="col-md-9 col-sm-9 col-xs-9">
								<select class="form-control" name="rtdinamis" id="rtdinamis">
									<option value="">--Pilih--</option>
									<?php if ($this->session->userdata('masuk')=='kadus' || $this->session->userdata('masuk')=='rw'): ?>
										<?php foreach ($rt as $key):?>
											<option value="<?php echo $key->id_rt; ?>"><?php echo $key->rt; ?></option>
										<?php endforeach;?>

										<?php elseif ($this->session->userdata('masuk')=='rt'): ?>
											
											<?php foreach ($rtadmin as $key): ?>
												<option value="<?=$key->id_rt; ?>"><?=$key->rt; ?></option>
											<?php endforeach; ?>

									<?php endif; ?>
								</select>
							</div>
						</div>

						<div id="hiden">
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-3" for="ktpdinamis">No KTP</label>
								<div class="col-md-9 col-sm-9 col-xs-9">
									<select class="form-control" id="ktpdinamis" name="ktpdinamis">
										<option value="">--Pilih--</option>
									</select>
								</div>
							</div>
						</div>

						<div id="namahiden">
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-3" for="namadinamis">Nama</label>
								<div class="col-md-9 col-sm-9 col-xs-9">
									<input type="text" class="form-control" name="namadinamis" id="namadinamis" readonly="">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-3" for="kelamindinamis">Jenis Kelamin</label>
								<div class="col-md-9 col-sm-9 col-xs-9">
									<input type="text" name="kelamindinamis" id="kelamindinamis" class="form-control" readonly="">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-3" for="ttldinamis">Tanggal Lahir</label>
								<div class="col-md-9 col-sm-9 col-xs-9">
									<input type="text" class="form-control" name="ttldinamis" id="ttldinamis" readonly="">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-3" for="umurdinamis">Umur</label>
								<div class="col-md-9 col-sm-9 col-xs-9">
									<input type="number" name="umurdinamis" id="umurdinamis" class="form-control" readonly="">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-3" for="agamadinamis">Agama</label>
								<div class="col-md-9 col-sm-9 col-xs-9">
									<input type="text" name="agamadinamis" id="agamadinamis" class="form-control" readonly="">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-3" for="kerjadinamis">Pekerjaan</label>
								<div class="col-md-9 col-sm-9 col-xs-9">
									<input type="text" class="form-control" name="kerjadinamis" id="kerjadinamis" readonly="">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-3" for="kawindinamis">Status Perkawinan</label>
								<div class="col-md-9 col-sm-9 col-xs-9">
									<input type="text" class="form-control" name="kawindinamis" id="kawindinamis" readonly="">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-3" for="alamatdinamis">Alamat</label>
								<div class="col-md-9 col-sm-9 col-xs-9">
									<input type="text" class="form-control" name="alamatdinamis" id="alamatdinamis" readonly="">
								</div>
							</div>

							<div class="form-group" id="jenis-hide">
							<label class="control-label col-md-3 col-sm-3 col-xs-3" for="rtdinamis">Jenis Surat</label>
								<div class="col-md-9 col-sm-9 col-xs-9">
									<select class="form-control" name="jenis" id="jenis">
										<option value="">--Pilih--</option>
										<!-- <option value="Pengantar Pembuatan KTP">Pengantar KTP</option> -->
										<option value="Pengantar Pembuatan KK">Pengantar KK</option>
										<option value="Pengantar Catatan Kepolisian" >Pengantar SKCK</option>
										<option value="Pengantar Akta Kelahiran">Pengantar Kelahiran</option>
										<option value="Pengantar Pindah Penduduk">Pengantar Pindah Penduduk</option>
									</select>
								</div>
							</div>

							<div id="pindah">
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-3">Pindah Ke</label>
								</div>

								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-3">Desa / Kelurahan</label>
									<div class="col-md-3 col-sm-3 col-xs-3">
										<input type="text" class="form-control" name="desa" id="desa">
									</div>

									<label class="control-label col-md-3 col-sm-3 col-xs-3">Kecamatan</label>
									<div class="col-md-3 col-sm-3 col-xs-3">
										<input type="text" class="form-control" name="kec" id="kec">
									</div>


								</div>
									
									<label class="control-label col-md-3 col-sm-3 col-xs-3">Kota / Kabupaten</label>
									<div class="col-md-3 col-sm-3 col-xs-3">
										<input type="text" class="form-control" name="kab" id="kab">
									</div>

									<label class="control-label col-md-3 col-sm-3 col-xs-3">Provinsi</label>
									<div class="col-md-3 col-sm-3 col-xs-3">
										<input type="text" class="form-control" name="prov" id="prov">
									</div>

									<div class="form-group"></div>

								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-3" for="alasan">Alasan Pindah</label>
									<div class="col-md-9 col-sm-9 col-xs-9">
										<input type="text" class="form-control" name="alasan" id="alasan">
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-3" for="jumlah">Jumlah Anggota Keluarga</label>
									<div class="col-md-4 col-sm-4 col-xs-4">
										<input type="numer" class="form-control" name="jumlah" id="jumlah">
									</div>
								</div>

							</div>

							<div id="lahir">
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-3" for="alamatdinamis">Nama Anak</label>
									<div class="col-md-3 col-sm-3 col-xs-3">
										<input type="text" class="form-control" name="anak" id="anak">
									</div>

									<label class="control-label col-md-3 col-sm-3 col-xs-3" for="alamatdinamis">Tanggal Lahir</label>
									<div class="col-md-3 col-sm-3 col-xs-3">
										<input type="date" class="form-control" name="ttlanak" id="ttlanak">
									</div>
								</div>

							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-3" for="keterangan" id="label">Pengantar lain</label>
								<div class="col-md-9 col-sm-9 col-xs-9">
									<input id="pengantar" class="form-control" type="text" name="pengantar">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-3" for="lain">Keterangan Lain</label>
								<div class="col-md-9 col-sm-9 col-xs-9">
									<textarea name="lain" id="lain" class="form-control"></textarea>
								</div>
							</div>
							
						</div>

						<div class="form-group">
            				<div class="col-md-8 col-md-offset-5">
            					<a class="btn btn-round btn-default" href="<?=base_url('home')?>">Kembali</a>
            					<a class="btn btn-round btn-default" href="<?=base_url('surat/surat/cetaksurat')?>">Reset</a>
            					<button class="btn btn-round btn-default" id="btn-hide">
            						<!-- <a href="<?=base_url('surat/surat/print');?>" target="_blank">cetak</a> -->
            						cetak
            					</button>
								<!-- <a href="<?=base_url('surat/surat/print');?>" target="_blank" class="btn btn-round btn-default" id="btn-hide">Cetak</a> -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>

</body>
</html>