  <div class="container">
    <div class="row">                            
      <div class="col-xs-12">
      <div class="panel panel-default">
      <div class="panel-heading"><h4>GESTOR DE MENUS</h4></div>
      <div class="panel-body">
        
            <div class="row">
              <div class="col-xs-6">                                      
                <?php 
                $at = array('role'=>'form','class'=>'form-inline');
                echo form_open('',$at); 
                ?>
                  <div class="form-group">
                    <input type="text" name="s" class="form-control" maxlength="120" value="">
                    
                  </div> 
                  <div class="form-group">
                  <button type="submit" class="btn btn-default">Buscar</button>
                  
                  </div>                                     
                <?php 
                echo form_close(); 
                ?>
              </div>
              <div align="right" class="col-xs-6">                                     
                <a href="<?php echo site_url($controller.'/add'); ?>" class="btn btn-primary"><i class="icon-file"></i> Nuevo Registro</a>       
              </div>
            </div>

            <div class="row">
              <div class="col-xs-12">
                <div class="separador">
                <?php if($table){ ?>
                  <div class="table-responsive">
                  <table class="table table-bordered">
                  <thead>
                      <tr>
                        <th>Menu</th>
                        <th width="1%">Fecha</th>
                        <th width="1%">Activo</th> 
                        <th width="1%">Id</th>                        
                        <th width="120px">Acción</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php foreach ($table as $r) : ?>
                      <tr>
                        <td><?php echo $r['menu']; ?></td>
                        <td><?php echo date("d/m/Y", strtotime($r['fecha'])); ?></td>
                        <td><?php echo $r['activo']; ?></td>  
                        <td><?php echo $r['id_menu']; ?></td>                        
                        <td align="center">                              
                          <div class="btn-group" align="left">
                            <button type="button" class="btn btn-default">Acción</button>
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                              <span class="caret"></span>
                              <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                              <li><a href="<?php echo site_url($controller.'/edit/'.$r['id_menu']); ?>"><span class="glyphicon glyphicon-pencil"></span> Editar</a></li>                              
                              <li><a href="<?php echo site_url($controller.'/delete/'.$r['id_menu']); ?>"><span class="glyphicon glyphicon-remove"></span> Eliminar</a></li>                                                            
                            </ul>
                          </div>
                        </td>
                      </tr>
                      <?php endforeach; ?>
                  </tbody>
                  </table>
                  </div>
                <?php } ?>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-xs-12">                           
                
                <ul class="pagination pagination-sm">

                <?php 
                              
                  $pagination = (int)($table_rows / $table_limit);
                  for ($item=0; $item <= $pagination ; $item++) { 
                                                                
                    if ($item==0) 
                    {
                      if($item == $table_page)
                      {
                        echo "<li class='active'><a href='".site_url($controller.'/table/table_page/'.$item)."'>Primera Pág. <span class='sr-only'>(current)</span></a></li>";    
                      }else{
                        echo "<li><a href='".site_url($controller.'/table/table_page/'.$item)."'>Primera Pág.</a></li>";  
                      }                                  
                    }
                    elseif($item==$pagination)
                    {
                      if($item == $table_page)
                      {
                        echo "<li class='active'><a href='".site_url($controller.'/table/table_page/'.$item)."'>Ultima Pág.</a></li>"; 
                      }
                      else
                      {
                        echo "<li><a href='".site_url($controller.'/table/table_page/'.$item)."'>Ultima Pág.</a></li>"; 
                      }
                    }
                    else
                    {
                      if ($item == $table_page) 
                      {
                        echo "<li class='active'><a href='".site_url($controller.'/table/table_page/'.$item)."'>".$item."</a></li>";
                      }
                      else
                      {
                        echo "<li><a href='".site_url($controller.'/table/table_page/'.$item)."' class='page larger'>".$item."</a></li>";
                      }
                    }
                                
                  }
                ?>
                </ul>

              </div>
            </div>


      </div>
      </div>
      </div>
    </div>
  </div>