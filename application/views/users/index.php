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
                                                echo form_open('users/index', array('class' => 'form-inline pull-right')); 
                                            ?>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="Users_search" class="form-control pull-right" placeholder="Buscar" value="<?php echo $Users_search; ?>">
                                            </div>
                                            <input type="hidden" name="Users_field" value="<?php echo $Users_field; ?>">
                                            <input type="hidden" name="Users_orderby" value="<?php echo $Users_orderby; ?>">
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
                                                                <button type="button" class="btn btn-default btn-xs <?php if($Users_field == 'users.user_lastname' and $Users_orderby == 'asc'){ echo 'btn-info'; } ?> users-search" data-field="users.user_lastname" data-orderby="asc"><i class="fa fa-sort-alpha-asc"></i></button>
                                                                <button type="button" class="btn btn-default btn-xs <?php if($Users_field == 'users.user_lastname' and $Users_orderby == 'desc'){ echo 'btn-info'; } ?> users-search" data-field="users.user_lastname" data-orderby="desc"><i class="fa fa-sort-alpha-desc"></i></button>
                                                            </div>
                                                        </div>
                                                    </th>
                                                    <th>
                                                        <div class="pull-left">
                                                            Nombre
                                                        </div>
                                                        <div class="pull-right">
                                                            <div class="btn-group" role="group">
                                                                <button type="button" class="btn btn-default btn-xs <?php if($Users_field == 'users.user_firstname' and $Users_orderby == 'asc'){ echo 'btn-info'; } ?> users-search" data-field="users.user_firstname" data-orderby="asc"><i class="fa fa-sort-alpha-asc"></i></button>
                                                                <button type="button" class="btn btn-default btn-xs <?php if($Users_field == 'users.user_firstname' and $Users_orderby == 'desc'){ echo 'btn-info'; } ?> users-search" data-field="users.user_firstname" data-orderby="desc"><i class="fa fa-sort-alpha-desc"></i></button>
                                                            </div>
                                                        </div>
                                                    </th>
                                                    <th>
                                                        <div class="pull-left">
                                                            Correo
                                                        </div>
                                                        <div class="pull-right">
                                                            <div class="btn-group" role="group">
                                                                <button type="button" class="btn btn-default btn-xs <?php if($Users_field == 'users.user_email' and $Users_orderby == 'asc'){ echo 'btn-info'; } ?> users-search" data-field="users.user_email" data-orderby="asc"><i class="fa fa-sort-alpha-asc"></i></button>
                                                                <button type="button" class="btn btn-default btn-xs <?php if($Users_field == 'users.user_email' and $Users_orderby == 'desc'){ echo 'btn-info'; } ?> users-search" data-field="users.user_email" data-orderby="desc"><i class="fa fa-sort-alpha-desc"></i></button>
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
                                                    <td>
                                                        <div class="btn-group-vertical pull-right">
                                                          <a title="Ver" href="<?php echo site_url($this->controller.'/view/'.$r['user_uid']); ?>" class="btn btn-default btn-xs"><i class="fa fa-eye"></i> Ver</a>
                                                          <a title="Editar" href="<?php echo site_url($this->controller.'/update/'.$r['user_uid']); ?>" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Editar</a>
                                                          <a title="Borrar" onclick="return confirm('¿Desea eliminar el registro?')" href="<?php echo site_url($this->controller.'/delete/'.$r['user_uid']); ?>" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i> Borrar</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php }} ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Apellidos</th>
                                                    <th>Nombres</th>
                                                    <th>Correo</th>
                                                    <th width="1%">Acciones</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                          
                                    <div class="dataTables_paginate paging_simple_numbers">
                                        <ul class="pagination">
                                            <?php            
                                                $pagination = (int)($table_rows / $table_limit);
                                                for ($item=1; $item < $pagination ; $item++) { 
                                            ?>                                         
                                                <li <?php if($item == $table_page): ?>class="active"<?php endif; ?>>
                                                    <a href="<?php echo site_url($this->controller.'/index/page/'.$item); ?>">
                                                        <?php echo $item; ?>
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
    <?php 
        echo form_open('users/index', array('id' => 'users-form-search')); 
    ?>
        <input type="hidden" id="users-form-search-field" name="Users_field" value="">
        <input type="hidden" id="users-form-search-orderby" name="Users_orderby" value="">
        <input type="hidden" id="users-form-search-search" name="Users_search" value="<?php echo $Users_search; ?>">
    <?php 
        echo form_close(); 
    ?>
<?php $this->load->view('dashboard/footer'); ?>      


