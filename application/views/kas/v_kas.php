
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
                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg'); ?>" ></div>
                    <div class="flashdatagagal" data-flashdata="<?= $this->session->flashdata('gagal'); ?>" ></div>
                   <h2><?php echo "$judul"; ?></h2>
                    
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
                    

                      
                      <?php $masuk = $this->session->userdata('masuk');?>

                    <table class="table table-striped jambo_table bulk_action">
                      <thead>
                        <tr class="headings">
                          <?php if ($masuk == 'kpemuda' || $masuk == 'bendahara') :?>
                  
                        <?php endif; ?>
                          <th>No</th>
                          <th>Tanggal</th>
                          <th>Masuk/Keluar</th>
                          <th>Keterangan</th>
                          <th>Jumlah</th>
                          <th>Saldo Ahir</th>
                        <?php if ($masuk == 'kpemuda' || $masuk == 'bendahara') :?>
                          <th>Action</th>
                        <?php endif; ?>
                        </tr>
                      </thead>


                      <tbody>
                        <?php $no = 1; foreach ($data as $item => $kas): ?>
                         <tr class="even pointer">
                          <?php $masuk = $this->session->userdata('masuk'); 
                          if ($masuk == 'kpemuda' || $masuk == 'bendahara') :?>
                          
                        <?php endif; ?>
                          <td><?php echo $no++; ?></td>  
                          <td><?php echo tgl_indo($kas->tanggal); ?></td>
                          <td><?php echo $kas->makel; ?></td>
                          <td><?php echo $kas->keterangan; ?></td>
                          <td><?php echo rupiah(abs($kas->jumlah)); ?></td>
                          <td><?php echo rupiah(abs($kas->saldo_ahir)); ?></td>
                          <?php $masuk = $this->session->userdata('masuk'); 
                          if ($masuk == 'kpemuda' || $masuk == 'bendahara') :?>
                          <td>
                            
                              <!-- <a href="<?php echo site_url('kas/kas/edit/'.$kas->id);?>" >
                                <i class="glyphicon glyphicon-edit" style="margin: 3px; color: orange;"><font size="3">Edit</font></i>
                              </a> -->
                            
                            
                              <a class="hapus" href="<?php echo site_url('kas/kas/hapus/'.$kas->id);?>">
                                <i class="glyphicon glyphicon-trash" style="margin: 3px; color: red;" ><font size="3">Hapus</font></i>
                              </a>
                            
                          </td>
                        <?php endif; ?>
                        </tr>
                        <?php endforeach; ?>
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
        </div>
        <!-- /page content -->