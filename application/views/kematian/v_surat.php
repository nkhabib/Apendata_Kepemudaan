<div class="right_col" role="main">
	<div class="col-md-8 col-sm-12 col-xs-12 col-md-offset-2">
		<div class="x_panel">
			<div class="x_title">
				<h2><?php echo $judul; ?></h2><br>
				<div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg'); ?>" ></div>
                <div class="flashdatagagal" data-flashdata="<?= $this->session->flashdata('gagal'); ?>" ></div>
				<div class="clearfix"></div>
			</div>

			<div class="x_content">
				<div class="col-xl-12">
					<font color="red">Surat Kematian Berdasarkan Tabel Kematian Jika Belum Ada Silahkan Edit Data Penduduk Menjadi Meninggal</font>
				</div>
				
				<br>

				<form class="form-horizontal form-label-left" id="surat" method="POST" action="<?=base_url('kematian/kematian/print');?>" target="_blank">
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-3" for="rtkematian">Pilih RT</label>
						<div class="col-md-9 col-sm-9 col-xs-9">
							<select class="form-control" name="rtkematian" id="rtkematian">
								<option value="">--Pilih--</option>
								<?php foreach ($mati as $key): ?>
									<option value="<?php echo $key->id_rt; ?>"><?php echo $key->rt; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>

					<div class="form-group" id="hiden-ktp-kematian">
						<label class="control-label col-md-3 col-sm-3 col-xs-3" for="ktpkematian">Pilih NO KTP</label>
						<div class="col-md-9 col-sm-9 col-xs-9">
							<select class="form-control" name="ktpkematian" id="ktpkematian">
								<option value="">--Pilih--</option>
							</select>
						</div>
					</div>

					<div id="hidenkematian">
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-3" for="namakematian">Nama Lengkap</label>
							<div class="col-md-9 col-sm-9 col-xs-9">
								<input type="text" name="namakematian" id="namakematian" class="form-control" readonly="">
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-3" for="kelaminkematian">Jenis Kelamin</label>
							<div class="col-md-9 col-sm-9 col-xs-9">
								<input type="text" name="kelaminkematian" id="kelaminkematian" class="form-control" readonly="">
							</div>
						</div>

						<div class="form-group">
							
							<label class="control-label col-md-3 col-sm-3 col-xs-3" for="ttlkematian">Tanggal Lahir</label>
							<div class="col-md-3 col-sm-3 col-xs-3">
								<input type="text" name="ttlkematian" id="ttlkematian" class="form-control" readonly="">
							</div>
							
							<label class="control-label col-md-1 col-sm-1 col-xs-1" for="umurkematian">Umur</label>
							<div class="col-md-4 col-sm-4 col-xs-4">
								<input type="text" name="umurkematian" id="umurkematian" class="form-control" readonly="">
							</div>

						</div>

						<div class="form-group">
						</div>

						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-3" for="agamakematian">Agama</label>
							<div class="col-md-9 col-sm-9 col-xs-9">
								<input type="text" name="agamakematian" id="agamakematian" class="form-control">
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-3" for="alamatkematian">Alamat</label>
							<div class="col-md-9 col-sm-9 col-xs-9">
								<input type="text" name="alamatkematian" id="alamatkematian" class="form-control" readonly="">
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-3" for="tanggalkematian">Tanggal Kematian</label>
							<div class="col-md-4 col-sm-4 col-xs-4">
								<input type="date" name="tanggalkematian" id="tanggalkematian" class="form-control">
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-3" for="sebabkematian">Sebab Kematian</label>
							<div class="col-md-9 col-sm-9 col-xs-9">
								<textarea type="text" name="sebabkematian" id="sebabkematian" class="form-control" required oninvalid="this.setCustomValidity('Sebab Kematian tidak boleh kosong')" oninput="setCustomValidity('')"></textarea>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-3" for="lokasikematian">Lokasi Kematian</label>
							<div class="col-md-9 col-sm-9 col-xs-9">
								<textarea class="form-control" name="lokasikematian" id="lokasikematian" required oninvalid="this.setCustomValidity('Lokasi tidak boleh kosong')" oninput="setCustomValidity('')"></textarea>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-3" for="pemohon">Pemohon</label>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-3" for="rtpemohon">RT</label>
							<div class="col-md-2 col-sm-2 col-xs-2">
								<select class="form-control" name="rt" id="rtpemohon" required oninvalid="this.setCustomValidity('Pilih RTa')" oninput="setCustomValidity('')" >
									<option value="">--Pilih---</option>
									<?php foreach ($rt as $key):?>
										<option value="<?php echo $key->id_rt; ?>"><?php echo $key->rt; ?></option>
									<?php endforeach;?>
								</select>
							</div>
							<label class="control-label col-md-2 col-sm-2 col-xs-2" for="ktppemohon" >Nomor KTP</label>
							<div class="col-md-5 col-sm-5 col-xs-5">
								<select class="form-control" name="ktppemohon" id="ktppemohon" required oninvalid="this.setCustomValidity('Pilih Nomor KTP')" oninput="setCustomValidity('')">
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-3" for="pemohon">Nama</label>
							<div class="col-md-9 col-sm-9 col-xs-9">
								<input type="text" name="pemohon" id="pemohon" class="form-control" readonly >
							</div>
						</div>

					</div>

					<div class="col-md-12 col-md-offset-5 col-xs-12 col-xs-offset-5">
						<a class="btn btn-round btn-default" href="<?=base_url('home'); ?>">Kembali</a>
						<button class="btn btn-round btn-default" id="btn-kematian-hide">Cetak</button>
					</div>


				</form>
			</div>
		</div>
	</div>
</div>