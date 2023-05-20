
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                   <h2><?= $judul ?></h2>
                    
                    <ul class="nav navbar-right panel_toolbox">
                      <li>
                        <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      </li>
                      <li>
                      	<a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  	<a href="<?= base_url('penduduk/penduduk/get_penduduk')?>" class="btn btn-round btn-default">Kembali</a>
                  	<table class="table">
                  		<td>Nama</td>
                  		<td>: <?= $row->nama; ?></td>
                  		<td>NO KTP</td>
                  		<td>: <?= $row->no_ktp; ?></td>

                  		<tr></tr>
                  		<td>NO KK</td>
                  		<td>: <?= $row->no_kk; ?></td>
                  		<td>Tanggal Lahir</td>
                  		<td>: <?= tgl_indo($row->tanggal_lahir);?></td>

                  		<tr></tr>
                  		<td>Jenis Kelamin</td>
                  		<td>: <?= $row->jenis_kelamin; ?></td>
                  		<td>Umur</td>
                  		<td>: <?= $row->umur; ?></td>

                  		<tr></tr>
                  		<td>Status</td>
                  		<td>: <?= $row->status;?></td>
                  		<td>Status Keluarga</td>
                  		<td>: <?= $row->statuskeluarga;?></td>

                  		<tr></tr>
                  		<td>Alamat</td>
                  		<td>: <?= $row->alamat;?></td>
                  		<td>Pekerjaan</td>
                  		<td>: <?= $row->pekerjaan;?></td>

                  		
                  	</table>
                  	<br>


                   	<?php
                   	$kk = $row->no_kk;
                   	$this->db->where('no_kk',$kk);
                    $this->db->where('tahun',date('Y'));
                    $this->db->where('status !=','Meninggal');
                    $this->db->join('rt','rt.id_rt = penduduk.id_rt');
                   	$nokk = $this->db->get('penduduk',$kk)->result(); $jml = count($nokk); ?>

                    <?php if ($jml > 1): ?>
                   <h2>Anggota Keluarga</h2>
                   <div class="x_title"> </div>
                   	<table class="table table-striped jambo_table bulk_action">
                   		<h4>Kepala Keluarga : 
                   			<?php foreach ($nokk as $kkk) 
                        {
                          if ($kkk->kepalakk==1) 
                     			{
                     				echo "$kkk->nama";
                     			} 
                        } 
                        ?>
                   		</h4>
                   		
                   	<thead>
                   		<td>Nama</td>
                   		<td>NO KTP</td>
                   		<td>NO KK</td>
                   		<td>Tanggal Lahir</td>
                   		<td>Jenis Kelamin</td>
                   		<td>Umur</td>
                   		<td>Status</td>
                   		<td>Status Keluarga</td>
                   		<td>Alamat</td>
                   		<td>Pekerjaan</td>
                   		<td>RT</td>
                   	</thead>
                   	<?php foreach ($nokk as $kaka) 
                   	{ ?>
                   		<tbody>
                        <?php if ($kaka->id_penduduk!=$id&&$kaka->tahun==date('Y')):?>
                     			<td><?= $kaka->nama;?></td>
                     			<td><?= $kaka->no_ktp;?></td>
                     			<td><?= $kaka->no_kk;?></td>
                     			<td><?= tgl_indo($kaka->tanggal_lahir);?></td>
                     			<td><?= $kaka->jenis_kelamin;?></td>
                     			<td><?= $kaka->umur;?></td>
                     			<td><?= $kaka->status;?></td>
                     			<td><?= $kaka->statuskeluarga;?></td>
                     			<td><?= $kaka->alamat;?></td>
                     			<td><?= $kaka->pekerjaan;?></td>
                     			<td><?= $kaka->rt;?></td>
                        <?php endif; ?>
                   		</tbody>
			<?php } ?>
                      <?php endif; ?>
					</table>
                  </div>
                </div>
              </div>
          
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->