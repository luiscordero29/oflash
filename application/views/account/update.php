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
                                <?php echo form_open(); ?>
                                <?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?> 
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
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Usuario</label>
                                            <input name="dus_usuario" class="form-control" disabled="" type="text" value="<?php echo $row['dus_usuario']; ?>">
                                        </div>
                                    </div> 
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Cedula de Identidad</label>
                                            <input name="dus_identidad" class="form-control" disabled="" type="text" value="<?php echo $row['dus_identidad']; ?>">
                                        </div>
                                    </div> 
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Apellidos</label>
                                            <input name="dus_apellidos" class="form-control" type="text" value="<?php echo $row['dus_apellidos']; ?>">
                                        </div>
                                    </div> 
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nombres</label>
                                            <input name="dus_nombres" class="form-control" type="text" value="<?php echo $row['dus_nombres']; ?>">
                                        </div>
                                    </div>  
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Dirección</label>
                                            <input name="dus_direccion" class="form-control" type="text" value="<?php echo $row['dus_direccion']; ?>">
                                        </div>
                                    </div>  
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Teléfono</label>
                                            <input name="dus_telefono" class="form-control" type="text" value="<?php echo $row['dus_telefono']; ?>">
                                        </div>
                                    </div>  
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input name="dus_email" class="form-control" type="text" value="<?php echo $row['dus_email']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input name="dus_email" class="form-control" type="text" value="<?php echo $row['dus_email']; ?>">
                                        </div>
                                    </div> 

                                </div> 
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-info pull-right"><i class="fa fa-save"></i> Guardar</button>
                                    <input name="dus_id" class="form-control" type="hidden" value="<?php echo $row['dus_id']; ?>">
                                </div>                              
                                <?php echo form_close(); ?>
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