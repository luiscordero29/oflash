<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Content Manager System | Registrarse</title>
    <meta name="generator" content="Luis Cordero - http://luiscordero29.com/" />   
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url('vendor/bootstrap/dist/css/bootstrap.min.css'); ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('vendor/font-awesome/css/font-awesome.min.css'); ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url('vendor/Ionicons/css/ionicons.min.css'); ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('vendor/admin-lte/dist/css/AdminLTE.min.css'); ?>">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url('vendor/admin-lte/plugins/iCheck/square/blue.css'); ?>">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <a href="<?php echo site_url(); ?>">Content Manager System</a>
        </div>

        <div class="register-box-body">
            <h4 class="text-center">Registrarse</h4>
            <hr>
            <?php echo form_open(); ?>
                <?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?> 
                
                <div class="row">
                    <div class="ol-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="form-group has-feedback">
                            <input type="text" name="user_firstname" class="form-control" placeholder="Nombres" autocomplete="off" maxlength="60" value="<?php echo set_value('user_firstname'); ?>">
                            <span class="fa fa-id-card form-control-feedback"></span>
                        </div>
                    </div>
                    <div class="ol-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="form-group has-feedback">
                            <input type="text" name="user_lastname" class="form-control" placeholder="Apellidos" autocomplete="off" maxlength="60" value="<?php echo set_value('user_lastname'); ?>">
                            <span class="fa fa-id-card form-control-feedback"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="ol-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group has-feedback">
                            <input type="email" name="user_email" class="form-control" placeholder="Email *" autocomplete="off" maxlength="300" value="<?php echo set_value('user_email'); ?>">
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="ol-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="form-group has-feedback">
                            <input type="password" name="user_password" class="form-control" placeholder="Clave">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        </div>
                    </div>
                    <div class="ol-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="form-group has-feedback">
                            <input type="password" name="user_password_matches" class="form-control" placeholder="Repetir Clave">
                            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                      <button type="submit" class="btn btn-primary btn-block btn-flat">Registrarse</button>
                    </div>
                    <!-- /.col -->
                </div>
            <?php echo form_close(); ?>
            <hr>
            <a href="<?php echo site_url('authentication/index'); ?>" class="text-center">Tengo una cuenta</a>
        </div>
        <!-- /.form-box -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery -->
    <script src="<?php echo base_url('vendor/jquery/dist/jquery.js'); ?>"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url('vendor/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url('vendor/admin-lte/plugins/iCheck/icheck.min.js'); ?>"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
</body>
</html>
