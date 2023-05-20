        <div class="right_col" role="main"><!-- -->
          <div class="flashdatagagal" data-flashdata="<?= $this->session->flashdata('gagal'); ?>" ></div>
          <div class=""><!-- -->
            <div class="clearfix"></div><!-- -->

            <div class="row"><!-- -->

              <!-- form input -->
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?=($judul)?></small></h2>
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

                    <form class="form-horizontal form-label-left" action="<?php echo base_url().'seksi/seksi/input_seksi' ?>" method="POST" >
                      
                      <div class="col-md-8 col-sm-12 col-xs-12 col-md-offset-2">
                        <div class="x_panel">
                          <div class="x_title">
                            <h2><?=($judul)?></small></h2>
                            <div class="clearfix"></div>
                        </div>

                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Pilih Seksi Dari RT</label>

                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <select name="rt" class="form-control" id="rt_seksi_pemuda" >
                            <!-- required oninvalid="this.setCustomValidity('Jenis kelamin tidak boleh kosong')" oninput="setCustomValidity('')" -->
                            <?php if (isset($_POST['tambah'])): ?>
                              <?php $rtsubmit = $this->db->get_where('rt',['id_rt'=>$_POST['rt']])->row_array(); ?>
                              <option value="<?php echo set_value('rt'); ?>"><?php echo $rtsubmit['rt']; ?></option>
                              <?php else: ?>
                                <option value="">--Pilih--</option>
                            <?php endif; ?>
                            <?php foreach ($rt as $tr):?>
                              <option value="<?php echo $tr->id_rt; ?>"><?php echo "$tr->rt"; ?></option>
                            <?php endforeach; ?>
                          </select>
                          <font color="red"><?= form_error('rt'); ?></font>
                        </div>
                      </div>


                      <?php if (isset($_POST['tambah'])):?>
                        <div class="show_seksi_pemuda">
                          <?php else:?>
                            <div id="hiden_seksi_pemuda" >
                      <?php endif; ?>

                        <div class="form-group">
                        <label for="ktp_seksi_pemuda" class="control-label col-md-3 col-sm-3 col-xs-3">Pilih No KTP</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <select name="ktp" id="ktp_seksi_pemuda" class="form-control">
                            <?php if (isset($_POST['tambah'])): ?>
                              <?php
                                $idpenduduk = $this->db->get_where('pemuda',['id_pemuda' => $_POST['ktp']])->row_array();
                                $penduduk = $this->db->get_where('penduduk',['id_penduduk'=>$idpenduduk['id_penduduk']])->row_array();
                              ?>
                              <option value="<?=set_value('ktp'); ?>"><?php echo $penduduk['no_ktp']; ?> <?php echo $penduduk['nama']; ?></option>
                              <?php foreach ($ktp as $key): ?>
                                <option value="<?php echo $key->id_pemuda; ?>"><?php echo $key->no_ktp; ?> <?php echo $key->nama; ?></option>
                              <?php endforeach; ?>
                            <?php endif; ?>
                          </select>
                          <font color="red"><?= form_error('ktp'); ?></font>
                        </div>
                      </div>
                        
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Nama</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                              <input type="text" name="nama" id="nama_seksi" value="<?= set_value('nama'); ?>" class="form-control" readonly >
                              <!-- required oninvalid="this.setCustomValidity('Nama tidak boleh kosong')" oninput="setCustomValidity('')" -->
                              <font color="red"><?= form_error('nama'); ?></font>
                              <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Jenis Kelamin</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                              <input type="text" name="jk" id="jk_seksi" class="form-control" value="<?= set_value('jk'); ?>" readonly>
                              <!-- required oninvalid="this.setCustomValidity('Umur tidak boleh kosong')" oninput="setCustomValidity('')" -->
                              <font color="red"><?= form_error('jk'); ?></font>
                              <span aria-hidden="true"></span>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">alamat</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                              <input type="text" name="alamat" id="alamat_seksi" class="form-control" value="<?= set_value('alamat'); ?>" readonly>
                              <!-- required oninvalid="this.setCustomValidity('Umur tidak boleh kosong')" oninput="setCustomValidity('')" -->
                              <font color="red"><?= form_error('alamat'); ?></font>
                              <span aria-hidden="true"></span>
                            </div>
                          </div>

    					             <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Jabatan</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                              <select name="jabatan" class="form-control" id="jabatan" >
                                <?php if (isset($_POST['tambah'])): ?>
                                  <option value="<?php echo set_value('jabatan'); ?>"><?php echo set_value('jabatan'); ?></option>
                              <?php endif; ?>
                              <option value="">--Pilih--</option>
                              <option value="Humas">Humas</option>
                              <option value="Keagamaan"> Keagamaan</option>
                              <option value="Keamanan">Keamanan</option>
                              <option value="Kesenian">Kesenian</option>
                              <option value="Olahraga">Olahraga</option>
                              <option value="Perekonomian">Perekonomian</option>

                              </select>
                              <font color="red"><?= form_error('jabatan'); ?></font>
                            </div>
                          </div>
                        </div>
                      </div>
                      
                    </div>
                  </div>

                      <br>
                      <div class="col-md-6 col-md-offset-3">
                          <div class="col-md-9 col-md-offset-3" id="btn_show_seksi_pemuda" >
                            <a href="<?php echo base_url('home'); ?>" type="button" class="btn btn-primary">Batal</a>
                            <a href="<?php echo base_url().'seksi/seksi/input_seksi'; ?>" type="submit" class="btn btn-primary">Reset</a>
                            <button type="submit" name="tambah" class="btn btn-success">Tambah</button>
                        </div>
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