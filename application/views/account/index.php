<?php $this->load->view('dashboard/head'); ?>    
<?php $this->load->view('dashboard/header'); ?>
<?php $this->load->view('dashboard/aside-sidebar'); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <?php $this->load->view('dashboard/content-header'); ?>

            <!-- Main content -->
            <section class="content">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <i class="fa fa-user"></i>
                                <h3 class="box-title"><?php echo $module_description; ?></h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-6"><p><b>Usuario:</b> <?php echo $row['dus_usuario']; ?></p></div>        
                                    <div class="col-md-6"><p><b>Email:</b> <?php echo $row['dus_email']; ?></p></div>        
                                </div>
                                <hr>                              
                                <div class="row">
                                    <div class="col-md-12"><p><b>Cedula de Identidad:</b> <?php echo $row['dus_identidad']; ?></p></div>        
                                    <div class="col-md-6"><p><b>Apellidos:</b> <?php echo $row['dus_apellidos']; ?></p></p></div>        
                                    <div class="col-md-6"><p><b>Nombres:</b> <?php echo $row['dus_nombres']; ?></p></div>        
                                    <div class="col-md-6"><p><b>Dirección:</b> <?php echo $row['dus_direccion']; ?></p></div>        
                                    <div class="col-md-6"><p><b>Teléfono:</b> <?php echo $row['dus_telefono']; ?></p></div>        
                                </div>                                
                            </div>
                        <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- ./col -->
                </div>
            </section>
            <!-- /.content -->
        </div>
<?php $this->load->view('dashboard/footer'); ?>      