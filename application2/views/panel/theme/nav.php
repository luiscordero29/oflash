    <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo site_url('panel/index'); ?>"><img src="<?php echo base_url();?>assets/public/images/logo.png" alt="" width="80" height="50"></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">  
            <?php if($session['tipo'] === 'ADMINISTRADOR'){ ?>          
            	<li><a href="<?php echo site_url('panel/categorias/table'); ?>"> Categorias</a></li>
              	<li><a href="<?php echo site_url('panel/contenidos/table'); ?>"> Contenidos</a></li>
              	<li><a href="<?php echo site_url('panel/usuarios/table'); ?>"> Usuarios</a></li>

            
            <?php }elseif($session['tipo'] === 'SUPERVISOR'){ ?>                      
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Administración <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo site_url('salarios/index'); ?>"><span class="glyphicon glyphicon-euro"></span> Salarios</a></li>                
              </ul>
            </li>
            <?php } ?>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><?php echo $session['nick']; ?> (<?php echo $session['usuario']; ?>)</a></li>
            <li><a href="<?php echo site_url('panel/profile/pass'); ?>">Cambiar Contraseña</a></li>
            <li><a href="<?php echo site_url('panel/profile/profile'); ?>">Editar Perfil</a></li>
            <li><a href="<?php echo site_url('panel/logout'); ?>">Salir</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
