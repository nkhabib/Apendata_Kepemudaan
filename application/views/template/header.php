<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo base_url().'assets/images/favicon.ico'?>" type="image/ico">

    <title><?= $judul; ?></title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url().'assets/css/bootstrap.min.css'?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url().'assets/css/font-awesome.min.css'?>" rel="stylesheet">

    <link href="<?php echo base_url().'assets/css/custom.min.css'?>" rel="stylesheet">
    <!-- media cetak -->
    <link href="<?php echo base_url().'assets/css/mycss.css'?>" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?= base_url('home');?>" class="site_title">

                <span>Dusun Basongan</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix none-print">
              <div class="profile_pic">
                <img src="<?php echo base_url().'assets/foto/logo.png'?>" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Selamat Datang</span>
                <h2><?php echo $this->session->userdata('ses_name'); ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <!-- <h3>General</h3> -->
                <ul class="nav side-menu">
                  <li><a href="<?= base_url('home');?>"><i class="fa fa-home"></i>Beranda</a>
                    <ul class="nav child_menu"></ul>
                  </li>

                  <?php if ($this->session->userdata('masuk')!=='rt' and $this->session->userdata('masuk')!=='rw' ):?>
                  <li><a><i class="fa fa-edit"></i> Forms <span class="fa fa-chevron-down"></span></a>
                  <?php endif; ?>
                    <ul class="nav child_menu">
                      <?php if ($this->session->userdata('masuk')=='kadus'):?>
                      <li><a href="<?php echo base_url().'admin/admin/input_admin' ?>">Tambah Admin</a></li>
                      <li><a href="<?php echo base_url().'rtrw/rtrw/input_rtrw' ?>">Tambah RT/RW</a></li>
                      <li><a href="<?php echo base_url().'penduduk/penduduk/input_penduduk' ?>">Tambah Penduduk</a></li>
                      <li><a href="<?php echo base_url().'lahir/lahir/tambah' ?>">Tambah Kelahiran</a></li>
            
                        <?php elseif ($this->session->userdata('masuk')=='kpemuda'): ?>
                          <li><a href="<?php echo base_url().'pemuda/pemuda/input_admin' ?>">Tambah Admin Pemuda</a></li>
                          <li><a href="<?php echo base_url().'pemuda/pemuda/input_pemuda' ?>">Tambah Pemuda</a></li>
                          <li><a href="<?php echo base_url().'seksi/seksi/input_seksi' ?>">Tambah Seksi</a></li>
                          <li><a href="<?php echo base_url().'kas/kas/input_kas'?>">Tambah Kas</a></li>

                          <?php elseif ($this->session->userdata('masuk')=='sekretaris'): ?>
                          	<li><a href="<?= base_url().'seksi/seksi/input_seksi' ?>">Tambah Seksi</a></li>

                          	<?php elseif ($this->session->userdata('masuk')=='bendahara'): ?>
                          		<li><a href="<?= base_url().'kas/kas/input_kas' ?>">Tambah Kas</a></li>
                        <?php endif;?>
                    </ul>
                  </li>             
         
                  <li><a><i class="fa fa-table"></i> Tabel <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                    	<?php if ($this->session->userdata('masuk')=='kadus' || $this->session->userdata('masuk')=='rt' || $this->session->userdata('masuk')=='rw'):?>
                    		<li><a href="<?php echo base_url().'admin/admin/get_admin'?>">Tabel Admin</a></li>
                    		<li><a href="<?php echo base_url().'rtrw/rtrw/get_rtrw'?>">Tabel RT/RW</a></li>
                    		<li><a href="<?php echo base_url().'penduduk/penduduk/get_penduduk'?>">Tabel Penduduk</a></li>
                    		<li><a href="<?php echo base_url().'lahir/lahir/get_lahir'?>">Tabel Kelahiran</a></li>
                    		<li><a href="<?php echo base_url().'kematian/kematian/get_kematian'?>">Tabel Kematian</a></li>

                    		<?php elseif ($this->session->userdata('masuk')=='kpemuda' || $this->session->userdata('masuk')=='sekretaris' || $this->session->userdata('masuk')=='bendahara'): ?>
                          <li><a href="<?php echo base_url().'admin/admin/get_adminpemuda'?>">Tabel Admin Pemuda</a></li>
                      		<li><a href="<?php echo base_url().'pemuda/pemuda/get_pemuda' ?>">Tabel Pemuda</a></li>
                      		<li><a href="<?php echo base_url().'seksi/seksi/get_seksi' ?>">Tabel Seksi</a></li>
                      		<li><a href="<?php echo base_url().'kas/kas/get_kas' ?>">Tabel Kas</a></li>
                  <?php endif; ?>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-print"></i>Cetak<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <?php if ($this->session->userdata('masuk')=='kadus'):?>
                      <li><a href="<?= base_url().'cetak/cetak/cetak'?>">Laporan Penduduk</a></li>
                      <li><a href="<?= base_url().'cetak/cetak/transaksi'?>">Laporan Transaksi</a></li>
                      <li><a href="<?= base_url().'surat/surat/cetaksurat'?>">Surat Pengantar</a></li>
                      <li><a href="<?= base_url().'kematian/kematian/surat'?>">Surat Pengantar Kematian</a></li>
                      <li><a href="<?= base_url().'surat/surat/sktm'?>">SKTM</a></li>
                      <li><a href="<?php echo base_url('surat/surat/pktp'); ?>">Pengantar KTP</a></li>
                    <?php endif; ?>

                    <?php if ($this->session->userdata('masuk')=='rt' || $this->session->userdata('masuk')=='rw'):?>
                      <li><a href="<?= base_url().'surat/surat/cetaksurat'?>">Surat Pengantar</a></li>
                     
                     <?php if ($this->session->userdata('masuk')=='rw'):?> 
                      <li><a href="<?= base_url().'kematian/kematian/surat'?>">Surat Pengantar Kematian</a></li>
                      <?php endif; ?>
                      
                      <li><a href="<?php echo base_url('surat/surat/pktp'); ?>">Pengantar KTP</a></li>
                      <li><a href="<?= base_url().'surat/surat/sktm'?>">SKTM</a></li>
                    <?php endif;?>

                    <?php if ($this->session->userdata('masuk')=='kpemuda'):?>
                      <li><a href="<?php echo base_url('edaran/edaran/cetak'); ?>">Surat Edaran</a></li>
                      <li><a href="<?php echo base_url('kas/kas/laporan'); ?>">Laporan Keuangan</a></li>
                    <?php endif;?>

                    <?php if ($this->session->userdata('masuk')=='bendahara'):?>
                      <li><a href="<?php echo base_url('kas/kas/laporan'); ?>">Laporan Keuangan</a></li>
                    <?php endif;?>

                    <?php if ($this->session->userdata('masuk')=='sekretaris'):?>
                      <li><a href="<?php echo base_url('edaran/edaran/cetak'); ?>">Surat Edaran</a></li>
                    <?php endif;?>
                    </ul>
                  </li>

                  
                  
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu none-print">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo base_url().'assets/foto/logo.png'?>" alt=""><?php echo $this->session->userdata('ses_name'); ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    
                    <li>
                      <?php $sesktp = $this->session->userdata('ses_ktp'); ?>
                      <a href="<?php echo base_url('admin/admin/atur'); ?>">
                        <span>Pengaturan</span>
                      </a>
                    </li>

                    <li><a href="<?php echo base_url().'index.php/login/logout'?>"><i class="fa fa-sign-out pull-right"></i> Keluar</a></li>
                  </ul>
                </li>


              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->