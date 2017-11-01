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
                                            <label>Clave</label>
                                            <input type="password" name="user_password" class="form-control">
                                        </div>
                                    </div> 
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Repetir Clave</label>
                                            <input type="password" name="user_password_matches" class="form-control">
                                        </div>
                                    </div>
                                </div> 
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-info pull-right"><i class="fa fa-save"></i> Guardar</button>
                                    <input name="user_uid" class="form-control" type="hidden" value="<?php echo $row['user_uid']; ?>">
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