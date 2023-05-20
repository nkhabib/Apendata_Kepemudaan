<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="right_col" role="main">
		<form class="form-horizontal form-label-left" id="surat" method="POST" target="_blank" action="<?=base_url('edaran/edaran/cetak');?>" >
			<!-- target="_blank" -->
			<div class="col-md-8 col-sm-12 col-xs-12 col-md-offset-2">
				<div class="x_panel">
					<div class="x_title">
                		<h2><?= $judul ?></h2>
                
                		<div class="clearfix"></div>
              		</div>

              		<div class="x_content">
              			
              			<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-3" for="lampiran">Kepada</label>
							<div class="col-md-9 col-sm-9 col-xs-9">
								<select class="form-control" name="kepada" id="kepada" required oninvalid="this.setCustomValidity('Harap Memilih Pilihan Ini')" oninput="setCustomValidity('')">
									<option value="">--Pilih--</option>
									<option value="Anggota Karang Taruna">Anggota Karang Taruna</option>
									<option value="Kepengurusan Karang Taruna">Kepengurusan Karang Taruna</option>
								</select>
								<font color="red"><?php echo form_error('kepada'); ?></font>
							</div>
						</div>


							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-3" for="perihal">Perihal</label>
								<div class="col-md-9 col-sm-9 col-xs-9">
									<input type="text" class="form-control" name="perihal" id="perihal" value="<?php echo set_value('perihal'); ?>" required oninvalid="this.setCustomValidity('Perihal tidak boleh kosong')" oninput="setCustomValidity('')">
									<font color="red"><?php echo form_error('perihal'); ?></font>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-3" for="tanggal">Tanggal</label>
								<div class="col-md-4 col-sm-4 col-xs-4">
									<input type="date" name="tanggal" id="tanggal" class="form-control" value="<?php echo set_value('tanggal'); ?>" required oninvalid="this.setCustomValidity('Tanggal tidak boleh kosong')" oninput="setCustomValidity('')">
									<font color="red"><?php echo form_error('tanggal'); ?></font>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-3" for="waktu">Waktu</label>
								<div class="col-md-4 col-sm-4 col-xs-4">
									<input type="time" class="form-control" name="waktu" id="waktu" value="<?php echo set_value('waktu'); ?>" required oninvalid="this.setCustomValidity('Waktu tidak boleh kosong')" oninput="setCustomValidity('')" >
									<font color="red"><?php echo form_error('waktu'); ?></font>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-3" for="tempat">Tempat</label>
								<div class="col-md-9 col-sm-9 col-xs-9">
									<input type="text" name="tempat" id="tempat" class="form-control" value="<?php echo set_value('tempat'); ?>" required oninvalid="this.setCustomValidity('Tempat tidak boleh kosong')" oninput="setCustomValidity('')" >
									<font color="red"><?php echo form_error('tempat'); ?></font>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-3" for="acara">acara</label>
								<div class="col-md-9 col-sm-9 col-xs-9">
									<input type="text" name="acara" id="acara" class="form-control" value="<?php echo set_value('acara'); ?>" required oninvalid="this.setCustomValidity('Acara tidak boleh kosong')" oninput="setCustomValidity('')" >
									<font color="red"><?php echo form_error('acara'); ?></font>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-3" for="lampiran">Lampiran</label>
								<div class="col-md-9 col-sm-9 col-xs-9">
									<select class="form-control" name="lampiran" id="lampiran" required oninvalid="this.setCustomValidity('Harap Memilih Lampiran')" oninput="setCustomValidity('')">
										<option value="">--Pilih--</option>
										<option value="--">Tidak Ada</option>
										<?php for ($i=1; $i <= 10 ; $i++): ?>
											<option value="<?php echo $i; ?> Lembar"><?php echo $i; ?> Lembar</option>
										<?php endfor; ?>
									</select>
									<font color="red"><?php echo form_error('lampiran'); ?></font>
								</div>
							</div>

						<div class="form-group">
            				<div class="col-md-8 col-md-offset-5">
            					<a class="btn btn-round btn-default" href="<?=base_url('home')?>">Kembali</a>
            					<button class="btn btn-round btn-default">cetak</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>

</body>
</html>