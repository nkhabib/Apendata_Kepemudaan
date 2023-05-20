<!DOCTYPE html>
<html>
<head>
    <title><?php echo $judul; ?></title>
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/login.css' ?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/rumah.css' ?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css'?>">
</head>
<body>
  <div class="container">
      <br>
      <div class="row">
        <a href="<?php echo base_url(); ?>"><h4>
        Dusun Basongan<br>
        <font size="2">Desa Kalisalak</font>
      </h4></a>
        
        <div class="text-center">
          <div class="col-md-1"></div>
            <div class="col-md-2">
              <div class="btn-group">
                    <a href="" class="btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Profil Dusun &#9660;
                    </a>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="<?php echo base_url('pengunjung/pengunjung/sejarah'); ?>">Sejarah Dusun</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="<?php echo base_url('pengunjung/pengunjung/visimisi'); ?>">Visi Misi Dusun</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="<?php echo base_url('pengunjung/pengunjung/pemerintah'); ?>">Pemerintahan Dusun</a>
                    </div>
              </div>
            </div>

            <div class="col-md-2">
              <div class="btn-group">
                    <a href="" class="btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Karang Taruna &#9660;
                    </a>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="#">Susunan Organisasi</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="<?php echo base_url('pengunjung/pengunjung/get_pemuda'); ?>">Anggota Karang Taruna</a>
                    </div>
              </div>
            </div>

            <div class="col-md-2">
                <div class="btn-group">
                      <a href="" class="btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Data Dusun &#9660;
                      </a>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?php echo base_url('pengunjung/pengunjung/get_penduduk'); ?>">Data Penduduk</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php echo base_url('pengunjung/pengunjung/get_kelahiran'); ?>">Data Kelahiran</a>
                        <div class="dropdown-divider"></div>
                        <!-- <a class="dropdown-item" href="#">Data Jenis Kelamin</a> -->
                      </div>
                </div>
              
            </div>
            
            <div class="col-md-2">
                <div class="btn-group">
                  <a href="<?php echo base_url('pengunjung/pengunjung/uang'); ?>" class="btn-default">Keuangan Karang Taruna</a>
                </div>
            </div>
            
            <div class="col-md-2">
              <div class="btn-group">
                  <a href="<?php echo base_url().'login/halaman' ?>" class="btn-default">
                        <i class="glyphicon glyphicon-user"></i>
                         Login
                   </a>
              </div>
            </div>
            <div class="col-md-1"></div>
        </div>
      </div>
    </div>
    <!-- </div> -->