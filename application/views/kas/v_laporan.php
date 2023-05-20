<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <div class="right_col" role="main">
    <form class="form-horizontal form-label-left" id="surat" method="POST" action="<?=base_url('kas/kas/laporan');?>">
      <div class="col-md-8 col-sm-12 col-xs-12 col-md-offset-2">
        <div class="x_panel">
          <div class="x_title">
            <div class="flashdatagagal" data-flashdata="<?= $this->session->flashdata('gagal'); ?>" ></div>
                    <h2><?= $judul ?></h2>
                
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                    <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-3" for="tahun">Pilih Tahun Laporan</label>
              <div class="col-md-9 col-sm-9 col-xs-9">
                <select class="form-control" name="tahun" id="tahun" required oninvalid="this.setCustomValidity('Harap Memilih Tahun Laporan')" oninput="setCustomValidity('')">
                  <option value="">--Pilih--</option>
                  <?php 
                  $tahun = date('Y');
                  $option = $tahun-4;
                  for ($i=$option; $i <= $tahun ; $i++):?>
                  <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php endfor; ?>
                <option value="semua">Semua Tahun</option>
                </select>
              </div>
            </div>

            <div class="form-group">
                    <div class="col-md-8 col-md-offset-5">
                      <a class="btn btn-round btn-default" href="<?=base_url('home')?>">Kembali</a>
                      <button class="btn btn-round btn-default" >cetak</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>

</body>
</html>