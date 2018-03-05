<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Content Manager System | Validar Cuenta</title>
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
            <a href="<?php echo site_url(); ?>">Sistema Integral de Salud</a>
        </div>

        <div class="register-box-body">
            <h4 class="text-center">Validar Cuenta</h4>
            <hr>
            <?php 
                if (!empty($alert['success'])) {
                    foreach ($alert['success'] as $key => $value) { 
                        echo '<div class="alert alert-success">'.$value.'</div>';
                    }
                } 
                if (!empty($alert['info'])) {
                    foreach ($alert['info'] as $key => $value) { 
                        echo '<div class="alert alert-info">'.$value.'</div>';
                    }
                }
                if (!empty($alert['warning'])) {
                    foreach ($alert['warning'] as $key => $value) { 
                        echo '<div class="alert alert-warning">'.$value.'</div>';
                    }
                }
                if (!empty($alert['danger'])) {
                    foreach ($alert['danger'] as $key => $value) { 
                        echo '<div class="alert alert-danger">'.$value.'</div>';
                    }
                }               
            ?>
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
