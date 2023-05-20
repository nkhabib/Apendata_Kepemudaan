<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="right_col" role="main">
		<form class="form-horizontal form-label-left" id="surat" method="POST" action="<?=base_url('cetak/cetak/printtrans');?>">
			<div class="col-md-8 col-sm-12 col-xs-12 col-md-offset-2">
				<div class="x_panel">
					<div class="x_title">
						<div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg'); ?>" ></div>
                    	<div class="flashdatagagal" data-flashdata="<?= $this->session->flashdata('gagal'); ?>" ></div>
                		<h2><?= $judul ?></h2>
                
                		<div class="clearfix"></div>
              		</div>

              		<div class="x_content">

              			<div class="form-group">
              				<label class="control-label col-md-3 col-sm-3 col-xs-3" for="tahun" >Tahun Transaksi</label>
              				<div class="col-md-9 col-sm-9 col-xs-9">
              					<select class="form-control" name="tahun" required="">
              						<option value="">--Pilih--</option>
              						<?php 
              							$now = date('Y');
              							$min = $now-3;
              							$max = $now+3;
              						for ($i=$min; $i <= $max ; $i++):?>
              							<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
              						<?php endfor; ?>
              					</select>
              				</div>
              			</div>

              			<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-3" for="rtdinamis">Pilih RT</label>
							<div class="col-md-9 col-sm-9 col-xs-9">
								<select class="form-control" name="rt" id="rttrans">
									<option value="">--Pilih--</option>
									<?php foreach ($rt as $tr):?>
										<option value="<?php echo $tr->id_rt; ?>"><?php echo $tr->rt; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>

						<div id="hidentransaksi">
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-3" for="ktptransaksi">No KTP</label>
								<div class="col-md-9 col-sm-9 col-xs-9">
									<select class="form-control" id="ktptransaksi" name="ktp">
										<option value="">--Pilih--</option>
									</select>
								</div>
							</div>
						</div>

						<div id="namatransaksi">
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-3" for="namatrans">Nama</label>
								<div class="col-md-9 col-sm-9 col-xs-9">
									<input type="text" class="form-control" name="nama" id="namatrans" readonly="">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-3" for="kelamindinamis">Jenis Kelamin</label>
								<div class="col-md-9 col-sm-9 col-xs-9">
									<input type="text" name="kelamin" id="kelamintrans" class="form-control" readonly="">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-3" for="ttltrans">Tanggal Lahir</label>
								<div class="col-md-9 col-sm-9 col-xs-9">
									<input type="text" class="form-control" name="ttldinamis" id="ttltrans" readonly="">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-3" for="umurtrans">Umur</label>
								<div class="col-md-9 col-sm-9 col-xs-9">
									<input type="number" name="umur" id="umurtrans" class="form-control" readonly="">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-3" for="agamatrans">Agama</label>
								<div class="col-md-9 col-sm-9 col-xs-9">
									<input type="text" name="agama" id="agamatrans" class="form-control" readonly="">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-3" for="kerjatrans">Pekerjaan</label>
								<div class="col-md-9 col-sm-9 col-xs-9">
									<input type="text" class="form-control" name="kerja" id="kerjatrans" readonly="">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-3" for="kawintrans">Status Perkawinan</label>
								<div class="col-md-9 col-sm-9 col-xs-9">
									<input type="text" class="form-control" name="kawin" id="kawintrans" readonly="">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-3" for="alamattrans">Alamat</label>
								<div class="col-md-9 col-sm-9 col-xs-9">
									<input type="text" class="form-control" name="alamat" id="alamattrans" readonly="">
								</div>
							</div>

						</div>
							
						<div class="form-group">
            				<div class="col-md-8 col-md-offset-5">
            					<a class="btn btn-round btn-default" href="<?=base_url('home')?>">Kembali</a>
            					<a class="btn btn-round btn-default" href="<?=base_url('cetak/cetak/transaksi')?>">Reset</a>
            					<button class="btn btn-round btn-default" id="btn-hide">cetak</button>
							</div>
						</div>

					</div>
				</div>
			</div>
		</form>
	</div>

</body>
</html>