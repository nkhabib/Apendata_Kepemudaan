<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="right_col" role="main">
		<form class="form-horizontal form-label-left" id="surat" method="POST" action="<?=base_url('surat/surat/printsktm');?>" target="_blank">
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
									<?php foreach ($rt as $tr):?>
										<option value="<?php echo $tr->id_rt; ?>"><?php echo $tr->rt; ?></option>
									<?php endforeach; ?>
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

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-3" for="lain">Keperluan</label>
								<div class="col-md-9 col-sm-9 col-xs-9">
									<textarea name="perlu" id="pelu" class="form-control" placeholder="Contoh : Mohon Keringanan biaya ..." required oninvalid="this.setCustomValidity('Keperluan tidak boleh kosong')" oninput="setCustomValidity('')" ></textarea>
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