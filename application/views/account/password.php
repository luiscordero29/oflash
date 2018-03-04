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
                                <?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?> 
                                <?php $this->load->view('dashboard/alerts'); ?>    
                                <?php echo form_open('', array('class' => 'form-horizontal')); ?>
                                <div class="form-group">
                                    <label for="user_password" class="col-sm-3 control-label">Clave</label>
                                    <div class="col-sm-9">
                                        <input type="password" name="user_password" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="user_password_matches" class="col-sm-3 control-label">Repetir Clave</label>
                                    <div class="col-sm-9">
                                        <input type="password" name="user_password_matches" class="form-control">
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <a href="<?php echo site_url('account/index'); ?>" class="btn btn-default pull-left"><i class="fa fa-arrow-left"></i> Volver</a>
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