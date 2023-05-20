<div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Tabel Admin</small></h2>
                    <div class="col-md-4">
                      <a href="<?php echo base_url('admin/admin/get_admin'); ?>" class="btn btn-info" >Kembali</a>
                    </div>
                    <ul class="nav navbar-right panel_toolbox">
                      <li>
                        <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <?php echo form_open("admin/admin/cari"); ?>

                      <select class="btn btn-default" name="cariberdasarkan" >

                        <option value="">Cari Berdasarkan</option>
                        <option value="no_ktp">No Ktp</option>
                        <option value="no_kk">No KK</option>
                        <option value="nama">Nama</option>
                        <option value="username">Username</option>
                        <option value="jabatan">Jabatan</option>
                      </select>

                      <input form-control mr-sm-2 type="text" name="yangdicari" id="">
                      <button class="btn btn-default" type="submit" >Search</button>

                      <?php

                      if ($jumlah=="0")
                        {
                          echo "Pencarian Tidak Ditemukan Dengan Data Manapun";
                        } else {

                                  if(isset($jumlah))
                                    {
                                        if($cariberdasarkan=="")
                                          {


                                              echo "Hasil Pencarian <b>'". $yangdicari ."'</b> : " . $jumlah;



                                          } else  {
                                                    echo "Hasil Pencarian Berdasarkan <b>'" . $cariberdasarkan . " = " . $yangdicari . "'</b> adalah : " . $jumlah;
                                                  }
                                    }
                                }


    

                        ?>
                    
                    <table class="table table-striped table-bordered bulk_action">
                      <thead>
                        <tr>
                          <th>
               <th><input type="checkbox" id="check-all" class="flat"></th>
              </th>
                          <th>No KTP</th>
                          <th>No KK</th>
                          <th>Nama</th>
                          <th>Username</th>
                          <th>Jabatan</th>
                          <?php $masuk = $this->session->userdata('masuk'); if ($masuk == 'kadus' || $masuk=='kpemuda') :?>
                          <th>Action</th>
                        <?php endif; ?>
                        </tr>
                      </thead>


                      <tbody>
                        <?php foreach ($user as $use) { ?>
                        <tr>
                          <td>
               <th><input type="checkbox" id="check-all" class="flat"></th>
              </td>
                          <td><?= $use->no_ktp ?></td>
                          <td><?= $use->no_kk?></td>
                          <td><?= $use->nama ?></td>
                          <td><?= $use->username ?></td>
                          <td><?= $use->jabatan ?></td>
                          <?php if ($masuk == 'kadus' || $masuk=='kpemuda') :?>
                          <td>
                            
                              <a href="<?php echo site_url('admin/admin/edit/'.$use->id_penduduk);?>" >
                                <i class="glyphicon glyphicon-edit" style="margin: 3px; color: orange"><font size="3">Edit</font></i>
                              </a>
                            
                            
                              <a class="hapus" href="<?php echo site_url('admin/admin/remove/'.$use->id_penduduk);?>">
                                <i class="glyphicon glyphicon-trash" style="margin: 3px; color: red;" ><font size="3">Hapus</font></i>
                              </a>
                            
                          </td>
                        <?php endif; ?>
                        </tr>
                        <?php } ?>
                      </tbody>
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