        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?php echo $this->Dashboard_model->get_gravatar($this->session->userdata('user_email'),160); ?>" class="img-circle" alt="<?php echo $this->session->userdata('user_email'); ?>">
                    </div>
                    <div class="pull-left info">
                      <p><?php echo $this->session->userdata('user_firstname').' '.$this->session->userdata('user_lastname'); ?></p>
                      <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>

                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu">
                    <li class="header">MENU PRINCIPAL</li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-cogs"></i> <span>Contenidos</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo site_url('contents/index') ?>"><i class="fa fa-circle-o"></i> Tabla de Contenidos</a></li>
                            <li><a href="<?php echo site_url('categories/index') ?>"><i class="fa fa-circle-o"></i> Tabla de Categorias</a></li>
                        </ul>
                    </li> 
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-users"></i> <span>Usuarios</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo site_url('users/index') ?>"><i class="fa fa-circle-o"></i> Tabla de Usuarios</a></li>
                        </ul>
                    </li> 
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-user"></i> <span>Cuenta</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo site_url('account/index') ?>"><i class="fa fa-circle-o"></i> Ver Cuenta</a></li>
                            <li><a href="<?php echo site_url('account/update') ?>"><i class="fa fa-circle-o"></i> Editar Cuenta</a></li>
                            <li><a href="<?php echo site_url('account/password') ?>"><i class="fa fa-circle-o"></i> Cambiar Clave</a></li>
                            <li><a href="<?php echo site_url('account/logout') ?>"><i class="fa fa-circle-o"></i> Cerrar Sesión</a></li>
                        </ul>
                    </li>        
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>