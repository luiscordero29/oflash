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
                                <dl class="dl-horizontal">
                                    <dt><b>Id:</b></dt>
                                    <dd><?php echo $row['user_uid']; ?></dd>
                                    <dt><b>Nombres:</b></dt>
                                    <dd><?php echo $row['user_firstname']; ?></dd>
                                    <dt><b>Apellidos:</b></dt>
                                    <dd><?php echo $row['user_lastname']; ?></dd>
                                    <dt><b>E-mail:</b></dt>
                                    <dd><?php echo $row['user_email']; ?></dd>
                                </dl>                            
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