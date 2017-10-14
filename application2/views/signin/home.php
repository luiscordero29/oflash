<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="SISTEMA DE ADMINISTRACION DE EVENTOS">
    <meta name="author" content="Ing. Luis Cordero">
    <link rel="icon" href="<?php echo base_url();?>assets/public/images/favicon.ico" type="image/x-icon" />

    <title>ADMINISTRADOR DE EVENTOS</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>assets/panel/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>assets/panel/css/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="<?php echo base_url(); ?>assets/panel/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="<?php echo base_url(); ?>assets/panel/js/html5shiv.js"></script>
      <script src="<?php echo base_url(); ?>assets/panel/js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">

      <?php 
      $at = array('class' => 'form-signin' , 'role' => 'form');
      echo form_open('',$at); 
      ?>
        <h2 class="form-signin-heading" align="center">Iniciar Sesión</h2>
        
        <input type="text" name="user" class="form-control" placeholder="Usuario"  required autofocus>
        
        <input type="password" name="pass" class="form-control" placeholder="Contraseña" required>
        
        <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
        <br />
        <?php echo validation_errors('<div class="alert alert-danger">','<div>'); ?>
      <?php echo form_close(); ?>

    </div> 
  </body>
</html>
