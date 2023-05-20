        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  

              <div class="col-md-8 col-md-offset-2">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?php echo $judul; ?></small></h2>
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

                    <form class="form-horizontal form-label-left" action="<?php echo base_url().'rtrw/rtrw/update'; ?>" method="POST" >
                        
                    	<?php foreach ($data as $key): ?>
                    		
                    		<input type="hidden" name="id" value="<?php echo $key->id_penduduk; ?>">

                    		<div class="form-group">
	                          <label for="ktp" class="control-label col-md-3 col-sm-3 col-xs-3">NO KTP</label>
	                          <div class="col-md-9 col-sm-9 col-xs-9">
	                            		<input type="number" name="ktp" class="form-control" value="<?php echo $key->no_ktp; ?>" readonly>
	                          </div>
	                        </div>

	                        <div class="form-group">
	                          <label for="kk" class="control-label col-md-3 col-sm-3 col-xs-3">NO KK</label>
	                          <div class="col-md-9 col-sm-9 col-xs-9">
	                          	<font color="red"><?php echo form_error('kk'); ?></font>
	                          	<?php if (isset($_POST['update'])):?>
	                          		<input type="number" name="kk" class="form-control" value="<?php echo set_value('kk') ?>" required oninvalid="this.setCustomValidity('KK tidak boleh kosong')" oninput="setCustomValidity('')" readonly >
	                          		<?php else: ?>
	                          			<input type="number" name="kk" class="form-control" value="<?php echo $key->no_kk; ?>" required oninvalid="this.setCustomValidity('KK tidak boleh kosong')" oninput="setCustomValidity('')" readonly >
	                        	<?php endif; ?>
	                          </div>
	                        </div>

	                        <div class="form-group">
	                          <label for="nama_rtrw" class="control-label col-md-3 col-sm-3 col-xs-3">Nama</label>
	                          <div class="col-md-9 col-sm-9 col-xs-9">
	                          	<?php if (isset($_POST['update'])):?>
	                          		<input type="text" name="nama" class="form-control" value="<?php echo set_value('nama'); ?>" required oninvalid="this.setCustomValidity('Nama tidak boleh kosong')" oninput="setCustomValidity('')" readonly >
	                          		<?php else: ?>
	                            		<input type="text" name="nama" class="form-control" value="<?php echo $key->nama; ?>" required oninvalid="this.setCustomValidity('Nama tidak boleh kosong')" oninput="setCustomValidity('')" readonly >
	                            <?php endif; ?>
	                          </div>
	                        </div>

	                        <div class="form-group">
	                          <label for="ttl_rtrw" class="control-label col-md-3 col-sm-3 col-xs-3">Tanggal Lahir</label>
	                          <div class="col-md-9 col-sm-9 col-xs-9">
	                          	<?php if (isset($_POST['update'])):?>
	                          		<input type="date" name="tanggal" id="ttl" class="form-control" value="<?php echo set_value('tanggal'); ?>" required oninvalid="this.setCustomValidity('Tanggal lahir tidak boleh kosong')" oninput="setCustomValidity('')" readonly >
	                          		<?php else: ?>
	                            		<input type="date" name="tanggal" id="ttl" class="form-control" value="<?php echo $key->tanggal_lahir; ?>" required oninvalid="this.setCustomValidity('Tanggal lahir tidak boleh kosong')" oninput="setCustomValidity('')" readonly >
	                            <?php endif; ?>
	                          </div>
	                        </div>

	                        <div class="form-group">
	                          <label for="umur_rtrw" class="control-label col-md-3 col-sm-3 col-xs-3">Umur</label>
	                          <div class="col-md-9 col-sm-9 col-xs-9">
	                          	<font color="red"><?php echo form_error('umur'); ?></font>
	                          	<?php if (isset($_POST['update'])):?>
	                          		<input type="number" name="umur" id="umur" class="form-control" value="<?php echo set_value('umur'); ?>" readonly required oninvalid="this.setCustomValidity('Umur tidak boleh kosong')" oninput="setCustomValidity('')">
	                          		<?php else: ?>
	                            		<input type="number" name="umur" id="umur" class="form-control" value="<?php echo $key->umur; ?>" readonly required oninvalid="this.setCustomValidity('Umur tidak boleh kosong')" oninput="setCustomValidity('')">
	                            <?php endif; ?>
	                          </div>
	                        </div>

	                        <div class="form-group">
	                          <label for="agama" class="control-label col-md-3 col-sm-3 col-xs-3">Agama</label>
	                          <div class="col-md-9 col-sm-9 col-xs-9">
	                          	<?php if (isset($_POST['update'])):?>
	                          		<input type="text" name="agama" class="form-control" value="<?php echo set_value('agama'); ?>" required oninvalid="this.setCustomValidity('Agama tidak boleh kosong')" oninput="setCustomValidity('')" readonly >
	                          		<?php else: ?>
	                            		<input type="text" name="agama" class="form-control" value="<?php echo $key->agama; ?>" required oninvalid="this.setCustomValidity('Agama tidak boleh kosong')" oninput="setCustomValidity('')" readonly >
	                            <?php endif; ?>
	                          </div>
	                        </div>

	                        <div class="form-group">
	                          <label for="kerja" class="control-label col-md-3 col-sm-3 col-xs-3">Pekerjaan</label>
	                          <div class="col-md-9 col-sm-9 col-xs-9">
	                          	<?php if (isset($_POST['update'])):?>
	                          		<input type="text" name="kerja" class="form-control" value="<?php echo set_value('kerja'); ?>" required oninvalid="this.setCustomValidity('Pekerjaan tidak boleh kosong')" oninput="setCustomValidity('')" readonly >
	                          		<?php else: ?>
	                         	   		<input type="text" name="kerja" class="form-control" value="<?php echo $key->pekerjaan; ?>" required oninvalid="this.setCustomValidity('Pekerjaan tidak boleh kosong')" oninput="setCustomValidity('')" readonly >
	                        	<?php endif; ?>
	                          </div>
	                        </div>

	                        <div class="form-group">
	                          <label for="jabatan" class="control-label col-md-3 col-sm-3 col-xs-3">Jabatan</label>
	                          <div class="col-md-9 col-sm-9 col-xs-9">
	                            <font color="red"><?=form_error('jabatan'); ?></font>
	                            <select name="jabatan" class="form-control" required oninvalid="this.setCustomValidity('Jabatan tidak boleh kosong')" oninput="setCustomValidity('')" >
	                            	<?php $rt = $key->rt; if (isset($_POST['update'])):?>
	                            		<option value="<?php echo set_value('jabatan'); ?>"><?php echo set_value('jabatan'); ?></option>
	                            		<?php else: ?>
	                            			<option value="<?php echo $key->jabatan;?>"><?php echo $key->jabatan;?></option>
	                            	<?php endif; ?>
	                            		<!-- <option value="Ketua RT <?php echo $rt ?>">Ketua RT <?php echo $rt; ?></option> -->
	                            		<?php if ($key->jabatan == "Ketua RW"):?>
	                            			<option value="Ketua RT <?php echo $key->rt; ?>">Ketua RT <?php echo $key->rt; ?></option>
	                            			<?php else: ?>
	                            		<option value="Ketua RW">Ketua RW</option>
	                            		<?php endif; ?>
	                            </select>
	                          </div>
	                        </div>

	                    <?php endforeach; ?>
                      <div class="col-md-8 col-md-offset-5">
                        <a class="btn btn-round btn-danger" href="<?php echo base_url('rtrw/rtrw/get_rtrw');?>">Batal</a>
                        <button class="btn btn-round btn-success" name="update">Update</button>
                      </div>

                    </form>

                  </div>
                </div>
              </div>

          
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>