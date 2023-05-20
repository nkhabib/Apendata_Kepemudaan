
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
                   <h2><?= $judul ?></h2>
                    
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
                    <?php echo form_open("lahir/lahir/cari"); ?>

                      <select class="btn btn-default" name="cariberdasarkan" >

                        <option value="">Cari Berdasarkan</option>
                        <option value="no_ktp">No KTP</option>
                        <option value="no_kk">No KK</option>
                        <option value="nama">Nama</option>
                        <option value="tanggal_lahir">Tanggal Lahir</option> <!-- value sesuai dengan nama field di database --> 
                        <option value="jenis_kelamin">Jenis Kelamin</option>
                        <option value="umur">Umur</option>
                        <option value="agama">Agama</option>
                        <option value="status">Status</option>
                        <option value="alamat">Alamat</option>
                        <option value="pekerjaan">Pekerjaan</option>
                        <option value="rt">RT</option>
                      </select>

                      <input form-control mr-sm-2 type="text" name="yangdicari" id="">
                      <button class="btn btn-default" type="submit" >Search</button>
                      <?php echo  form_close(); ?>

                      <?php echo form_open("lahir/lahir/hapus"); ?>
                      <?php if ($this->session->userdata('masuk')=='kadus') :?>
                      <button class="btn-danger" formaction="<?php echo base_url().'lahir/lahir/hapusbanyak' ?>" onclick="return confirm('Yakin Hapus ?')">
                        <i class="glyphicon glyphicon-trash">Hapus</i>
                      </button>
                      
                    <?php endif; ?>

                    <table class="table table-striped jambo_table bulk_action">
                      <thead>
                        <tr class="headings">
                          <?php if ($this->session->userdata('masuk')=='kadus') :?>
                          <th>
                            <input type="checkbox" id="pilih-semua" name="pilih-semua">
                          </th>
                        <?php endif; ?>
                          <th>NO</th>
                          <th>No KK</th>
                          <th>Nama</th>
                          <th>Jenis Kelamin</th>
                          <th>Tempat Lahir</th>
                          <th>Tanggal Lahir</th>
                          <th>Ayah</th>
                          <th>Ibu</th>
                          <th>Kondisi</th>
                          <th>Berat</th>
                          <th>Panjang</th>
                          <th>Pelapor</th>
                          <?php if ($this->session->userdata('masuk')=='kadus'): ?>
                          <th>Action</th>
                        <?php endif; ?>
                        </tr>
                      </thead>


                      <tbody>
                        <?php $no =$offset + 1; // offset agar urutan nomor tabel tetap urut di pagination  
                        foreach ($data as $lahir) { ?>
                         <tr class="even pointer">
                          <?php if ($this->session->userdata('masuk')=='kadus') :?>
                          <td class="a-center ">
                            <input type="checkbox" class="tercek" name="id[]" value="<?php echo $lahir->id_lahir; ?>"> <!-- namae="ktp[]" menandakan ktp akan menyimpan array nama ini nanti akan dipanggil dalam controller admin hapus -->
                          </td>
                        <?php endif; ?>
                          
                          <td><?php echo $no; ?></td>
                          <td><?php echo $lahir->no_kk; ?></td>
                          <td><?php echo $lahir->nama; ?></td>
                          <td><?php echo $lahir->jenis_kelamin; ?></td>
                          <td><?php echo $lahir->tempat_lahir; ?></td>
                          <td><?php echo tgl_indo($lahir->tanggal_lahir); ?></td>
                          <td><?php echo $lahir->nama_ayah; ?></td>
                          <td><?php echo $lahir->nama_ibu; ?></td>
                          <td><?php echo $lahir->kondisi; ?></td>
                          <td><?php echo $lahir->berat; ?></td>
                          <td><?php echo $lahir->panjang; ?></td>
                          <td><?php echo $lahir->pelapor; ?></td>
                          <?php if($this->session->userdata('masuk')=='kadus'): ?>
                          <td>

                              <a href="<?php echo site_url('lahir/lahir/edit/'.$lahir->id_lahir);?>" >
                                <i class="glyphicon glyphicon-edit" style="margin: 3px; color: orange"><font size="3">Edit</font></i>
                              </a>
                            
                            
                              <a class="hapus" href="<?php echo site_url('lahir/lahir/hapus/'.$lahir->id_lahir);?>">
                                <i class="glyphicon glyphicon-trash" style="margin: 3px; color: red" ><font size="3">Hapus</font></i>
                              </a>
                            
                            
                          </td>
                          <?php endif; ?>
                        </tr>
                        <?php $no++; } ?>
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