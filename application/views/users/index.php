<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('dashboard/head'); ?>    
<?php $this->load->view('dashboard/header'); ?>
<?php $this->load->view('dashboard/aside-sidebar'); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <?php $this->load->view('dashboard/content-header'); ?>

            <!-- Main content -->
            <section class="content">
                <div class="box-body">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <a href="<?php echo site_url($this->controller.'/create'); ?>" class="btn-sm btn pull-left btn-success"><i class="fa fa-file"></i>  Crear Registro</a>
                                        </div>
                                        <div class="col-xs-4 col-xs-offset-4">
                                            <?php 
                                                echo form_open('', array('class' => 'form-inline pull-right')); 
                                            ?>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="s" class="form-control pull-right" placeholder="Buscar" value="<?php echo set_value('s'); ?>">
                                            </div>
                                            <button type="submit" class="btn btn-default btn-sm"><i class="fa fa-search"></i> BUSCAR</button>
                                            <?php 
                                                echo form_close(); 
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="table-responsive">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <div class="pull-left">
                                                            Apellidos
                                                        </div>
                                                        <div class="pull-right">
                                                            <div class="btn-group" role="group">
                                                                <button type="button" class="btn btn-default btn-xs"><i class="fa fa-sort-alpha-asc"></i></button>
                                                                <button type="button" class="btn btn-default btn-xs"><i class="fa fa-sort-alpha-desc"></i></button>
                                                            </div>
                                                        </div>
                                                    </th>
                                                    <th>
                                                        <div class="pull-left">
                                                            Nombre
                                                        </div>
                                                        <div class="pull-right">
                                                            <div class="btn-group" role="group">
                                                                <button type="button" class="btn btn-default btn-xs"><i class="fa fa-sort-alpha-asc"></i></button>
                                                                <button type="button" class="btn btn-default btn-xs"><i class="fa fa-sort-alpha-desc"></i></button>
                                                            </div>
                                                        </div>
                                                    </th>
                                                    <th>
                                                        <div class="pull-left">
                                                            Correo
                                                        </div>
                                                        <div class="pull-right">
                                                            <div class="btn-group" role="group">
                                                                <button type="button" class="btn btn-default btn-xs"><i class="fa fa-sort-alpha-asc"></i></button>
                                                                <button type="button" class="btn btn-default btn-xs"><i class="fa fa-sort-alpha-desc"></i></button>
                                                            </div>
                                                        </div>
                                                    </th>
                                                    <th>
                                                        <div class="pull-left">
                                                            Estatus
                                                        </div>
                                                        <div class="pull-right">
                                                            <div class="btn-group" role="group">
                                                                <button type="button" class="btn btn-default btn-xs"><i class="fa fa-sort-alpha-asc"></i></button>
                                                                <button type="button" class="btn btn-default btn-xs"><i class="fa fa-sort-alpha-desc"></i></button>
                                                            </div>
                                                        </div>
                                                    </th>
                                                    <th width="1%">Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                  if($table){ 
                                                    foreach ($table as $r) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $r['user_firstname']; ?></td>
                                                    <td><?php echo $r['user_lastname']; ?></td>
                                                    <td><?php echo $r['user_email']; ?></td>
                                                    <td><?php echo $r['user_status']; ?></td>
                                                    <td>
                                                        <?php if($this->session->userdata('user_uid')<>$r['user_uid']){ ?>
                                                        <div class="btn-group-vertical pull-right">
                                                          <a title="Ver" href="<?php echo site_url($this->controller.'/view/'.$r['user_uid']); ?>" class="btn btn-default btn-xs"><i class="fa fa-eye"></i> Ver</a>
                                                          <a title="Editar" href="<?php echo site_url($this->controller.'/update/'.$r['user_uid']); ?>" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Editar</a>
                                                          <a title="Borrar" onclick="return confirm('¿Desea eliminar el registro?')" href="<?php echo site_url($this->controller.'/delete/'.$r['user_uid']); ?>" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i> Borrar</a>
                                                        </div>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                                <?php }} ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Apellidos</th>
                                                    <th>Nombres</th>
                                                    <th>Correo</th>
                                                    <th>Activo</th>
                                                    <th width="1%">Acciones</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                          
                                    <div class="dataTables_paginate paging_simple_numbers">
                                        <ul class="pagination">
                                            <?php            
                                                $pagination = (int)($table_rows / $table_limit);
                                                for ($item=0; $item <= $pagination ; $item++) { 
                                            ?>                                         
                                                <li <?php if($item == $table_page): ?>class="active"<?php endif; ?>>
                                                    <a href="<?php echo site_url($this->controller.'/index/table_page/'.$item.$search_url); ?>">
                                                        <?php echo $item+1; ?>
                                                    </a>
                                                </li>
                                            <?php                            
                                                }
                                            ?> 
                                        </ul>
                                    </div>                        
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </section>
            <!-- /.content -->
        </div>
<?php $this->load->view('dashboard/footer'); ?>      


