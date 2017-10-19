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
            <?php echo form_open(); ?>
                <?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?> 
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">                        
                        <div class="form-group has-feedback">
                            <input type="text" name="dus_identidad" class="form-control" placeholder="Cedula de Identidad *" autofocus="" autocomplete="off" maxlength="20" value="<?php echo set_value('dus_identidad'); ?>">
                            <span class="fa fa-address-card form-control-feedback"></span>
                        </div>
                    </div>                    
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">   
                        <div class="form-group has-feedback">
                            <input type="text" name="dus_apellidos" class="form-control" placeholder="Apellidos *" autocomplete="off" maxlength="60" value="<?php echo set_value('dus_apellidos'); ?>">
                            <span class="fa fa-address-card form-control-feedback"></span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6"> 
                        <div class="form-group has-feedback">
                            <input type="text" name="dus_nombres" class="form-control" placeholder="Nombres" autocomplete="off" maxlength="60" value="<?php echo set_value('dus_nombres'); ?>">
                            <span class="fa fa-address-card form-control-feedback"></span>
                        </div>
                    </div>                    
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="form-group has-feedback">
                            <input type="text" name="dus_telefono" class="form-control" placeholder="Teléfono *" autocomplete="off" maxlength="30" value="<?php echo set_value('dus_telefono'); ?>">
                            <span class="fa fa-address-card form-control-feedback"></span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                        <div class="form-group has-feedback">
                            <input type="text" name="dus_direccion" class="form-control" placeholder="Dirección *" autocomplete="off" maxlength="250" value="<?php echo set_value('dus_direccion'); ?>">
                            <span class="fa fa-address-card form-control-feedback"></span>
                        </div>
                    </div>                    
                </div>
                <div class="row">
                    <div class="ol-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="form-group has-feedback">
                            <input type="text" name="dus_usuario" class="form-control" placeholder="Usuario *" autocomplete="off" maxlength="15" value="<?php echo set_value('dus_usuario'); ?>">
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>
                    </div>
                    <div class="ol-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="form-group has-feedback">
                            <input type="email" name="dus_email" class="form-control" placeholder="Email *" autocomplete="off" maxlength="255" value="<?php echo set_value('dus_email'); ?>">
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="ol-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="form-group has-feedback">
                            <input type="password" name="dus_clave" class="form-control" placeholder="Clave">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        </div>
                    </div>
                    <div class="ol-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="form-group has-feedback">
                            <input type="password" name="dus_clave_repetir" class="form-control" placeholder="Repetir Clave">
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
