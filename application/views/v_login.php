<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login Admin Dusun Basongan</title>

    <!-- Bootstrap -->
    <!-- <link href="<?php echo base_url().'assets/vendor/bootstrap/dist/css/bootstrap.min.css' ?>" rel="stylesheet"> -->
    <!-- Font Awesome -->
    <!-- <link href="<?php echo base_url().'assets/vendor/font-awesome/css/font-awesome.min.css'?>" rel="stylesheet"> -->
    <!-- NProgress -->
    <!-- <link href="<?php echo base_url().'assets/vendor/nprogress/nprogress.css'?>" rel="stylesheet"> -->
    <!-- Animate.css -->
    <!-- <link href="<?php echo base_url().'assets/vendor/animate.css/animate.min.css'?>" rel="stylesheet"> -->

    <!-- Custom Theme Style -->
    <!-- <link href="<?php echo base_url().'assets/build/css/custom.min.css'?>" rel="stylesheet"> -->

    <link href="<?php echo base_url().'assets/css/loginpage.css'?>" rel="stylesheet">
  </head>
  <body>
    <img class="wave" src="<?php echo base_url('assets/foto/login/wave.png');?>" />
    <div class="container">
      <div class="img"></div>
      <div class="login-content">
        <form action="<?php echo base_url().'login/cek' ?>" method="post" >
          <img src="<?php echo base_url('assets/foto/login/avatar.svg');?>" />
          <h2 class="title">Masuk</h2>
          <h4>Dusun Basongan</h4>
          <div class="input-div one">
            <div class="i">
              <i class="fas fa-user"></i>
            </div>
            <div class="div">
              <!-- <h5>Username  -->
                <font color="red" size="2" ><?php echo form_error('username'); ?> </font>
                <font color="#ff0000"><?php echo $this->session->flashdata('msg');?></font>
              <!-- </h5> -->
              <input type="text" class="input" name="username" placeholder="username" value="<?php echo set_value('username'); ?>" />
            </div>
          </div>
          <div class="input-div pass">
            <div class="i">
              <i class="fas fa-lock"></i>
            </div>
            <div class="div">
              <h5>Password 
                <font color="red" size="2" ><?= form_error('password'); ?></font>
                <font color="#ff0000"><?php echo $this->session->flashdata('msgp');?></font>
              </h5>
              <input type="password" class="input" name="password" />
            </div>
          </div>
          <a href="#">Forgot Password?</a>
          <input type="submit" class="btn" value="Login" />
          <!-- <input type="submit" class="btn" value="Batal" /> -->
          <a href="<?php echo base_url() ?>" type="button" class="btn" style="text-align: center; text-ma" >Batal</a>
        </form>
      </div>
    </div>
    <script type="text/javascript" src="<?php echo base_url('assets/js/login.js'); ?>"></script>
  </body>

  <!-- <body class="login">
    <div>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="<?php echo base_url().'login/cek' ?>" method="post" >
              <h1>Login Dusun Basongan</h1>
              <div>
                <img src="<?php echo base_url('assets/foto/img.png'); ?>" style="width: 150px; height: 150px;" >
                <br><br>
                <font color="#ff0000"><?php echo $this->session->flashdata('msg');?></font>
                <font color="red" ><?= form_error('username'); ?></font>
                <input type="text" name="username" id="username" class="form-control" placeholder="Username" value="<?php echo set_value('username'); ?>">
              </div>
              <div>
                <font color="#ff0000"><?php echo $this->session->flashdata('msgp');?></font>
                <font color="red" ><?= form_error('password'); ?></font>
                <input type="password" name="password" class="form-control" placeholder="Password">
              </div>
              <div>
                <a type="button" class="btn btn-default" href="<?php echo base_url('login'); ?>">Batal</a>
                <button class="btn btn-default" type="submit">Login</button>
                <a href="#">Lupa Password?</a>
              </div>

              <div class="form-group">
                <div class="col-md-8 col-md-offset-5">
                    <a href="<?= base_url('admin/admin/get_admin'); ?>" type="button" class="btn btn-primary" >Batal</a>
                    <button type="submit" class="btn btn-success" >Update</button>
                </div>
              </div>

              <div class="clearfix"></div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body> -->
</html>
