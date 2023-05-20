
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
                   <h2><?php echo $judul; ?></h2>
                    
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
                    <?php echo form_open("admin/admin/cari"); ?>

                      <select class="btn btn-default" name="cariberdasarkan" >

                        <option value="">Cari Berdasarkan</option>
                        <option value="no_ktp">No KTP</option>
                        <option value="no_kk">No KK</option>
                        <option value="nama">Nama</option>
                        <option value="username">Username</option>
                        <option value="jabatan">Jabatan</option>
                      </select>

                      <input form-control mr-sm-2 type="text" name="yangdicari" id="">
                      <button class="btn btn-default" type="submit" >Cari</button>
                      <?php echo  form_close(); ?>

                      <?php echo form_open("admin/admin/hapus"); ?>
                      <?php if ($this->session->userdata('masuk')=='kadus') :?>
                      <button class="btn-success" formaction="<?php echo base_url().'admin/admin/hapus' ?>" onclick="return confirm('Yakin Hapus ?')">
                        <i class="glyphicon glyphicon-trash"></i>
                      </button>

<!--                       <button class="btn-success" formaction="<?php echo base_url().'admin/admin/editbanyak' ?>">
                        <i class="glyphicon glyphicon-edit"></i>
                      </button> -->
                    <?php endif; ?>

                    <table class="table table-striped jambo_table bulk_action">
                      <thead>
                        <tr class="headings">
                          <?php $masuk = $this->session->userdata('masuk'); if ($masuk == 'kadus' || $masuk=='kpemuda') :?>
                          <th>
                            <input type="checkbox" id="pilih-semua" name="item">
                          </th>
                        <?php endif; ?>
                          <th>No Ktp</th>
                          <th>No KK</th>
                          <th>Nama</th>
                          <th>Username</th>
                          <th>Jabatan</th>
                        <?php if ($masuk == 'kadus' || $masuk=='kpemuda') :?>
                          <th>Action</th>
                        <?php endif; ?>
                        </tr>
                      </thead>


                      <tbody>
                        <?php foreach ($data as $user) { ?>
                         <tr class="even pointer">
                          <?php if ($masuk == 'kadus' || $masuk=='kpemuda') :?>
                          <td class="a-center ">
                            <input type="checkbox" class="tercek" name="ktp[]" value="<?php echo $user->id_penduduk; ?>"> <!-- namae="ktp[]" menandakan ktp akan menyimpan array nama ini nanti akan dipanggil dalam controller admin hapus -->
                          </td>
                        <?php endif; ?>

                          <td><?php echo $user->no_ktp; ?></td>
                          <td><?php echo $user->no_kk; ?></td>
                          <td><?php echo $user->nama; ?></td>
                          <td><?php echo $user->username; ?></td>
                          <td><?php echo $user->jabatan; ?></td>
                          <?php if ($masuk == 'kadus' || $masuk=='kpemuda') :?>
                          <td>
                            
                              <a href="<?php echo site_url('admin/admin/edit/'.$user->id_penduduk);?>" >
                                <i class="glyphicon glyphicon-edit" style="margin: 3px; color: orange"><font size="3">Edit</font></i>
                              </a>
                            
                            
                              <a class="hapus" href="<?php echo site_url('admin/admin/remove/'.$user->id_penduduk);?>">
                                <i class="glyphicon glyphicon-trash" style="margin: 3px; color: red;" ><font size="3">Hapus</font></i>
                              </a>
                            
                          </td>
                        <?php endif; ?>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                    <?php form_close(); ?>
                    <?php echo $halaman; ?>
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