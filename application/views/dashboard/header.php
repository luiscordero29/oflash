<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
        <header class="main-header">
            <!-- Logo -->
            <a href="<?php echo site_url('dashboard/index') ?>" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>CMS</b></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg">Content Manager System</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
    
            <nav class="navbar navbar-static-top">

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">          
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?php echo $this->Dashboard_model->get_gravatar($this->session->userdata('user_email'),160); ?>" class="user-image" alt="<?php echo $this->session->userdata('dus_apellidos').' '.$this->session->userdata('dus_nombres'); ?>">
                                <?php echo $this->session->userdata('user_firstname').' '.$this->session->userdata('user_lastname'); ?>
                                <span class="hidden-xs"><?php echo $this->session->userdata('dus_apellidos').' '.$this->session->userdata('dus_nombres'); ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="<?php echo $this->Dashboard_model->get_gravatar($this->session->userdata('user_email'),160); ?>" class="img-circle" alt="User Image">
                                    <p>
                                        <?php echo $this->session->userdata('user_firstname').' '.$this->session->userdata('user_lastname'); ?>
                                        <small><?php echo $this->session->userdata('user_email'); ?></small>
                                    </p>
                                </li>                              
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="<?php echo site_url('account/update') ?>" class="btn btn-default btn-flat">Editar Cuenta</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?php echo site_url('account/logout') ?>" class="btn btn-default btn-flat">Cerrar Sesión</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>