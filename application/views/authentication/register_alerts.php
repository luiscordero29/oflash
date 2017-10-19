<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Registrarse | Sistema Integral de Salud</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css'); ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url('assets/ionicons/css/ionicons.min.css'); ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/css/AdminLTE.css'); ?>">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/iCheck/square/blue.css'); ?>">

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
            <h4 class="text-center">Registrarse</h4>
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

    <!-- jQuery 2.2.3 -->
    <script src="<?php echo base_url('assets/plugins/jQuery/jquery-2.2.3.min.js'); ?>"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url('assets/plugins/iCheck/icheck.min.js'); ?>"></script>
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
