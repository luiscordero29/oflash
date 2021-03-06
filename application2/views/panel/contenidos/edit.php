    <div class="container">
        <div class="row">                            
            <div class="col-xs-12">
                            <?php 
                            if (!empty($alert['success'])) {
                            foreach ($alert['success'] as $key => $value) { 
                            ?>                            
                                <div class="alert alert-success"><?php echo $value; ?></div>
                            <?php 
                                }} 
                            ?>

                            <?php 
                            if (!empty($alert['info'])) {
                            foreach ($alert['info'] as $key => $value) { ?>                            
                                <div class="alert alert-info"><?php echo $value; ?></div>
                            <?php 
                                }} 
                            ?>

                            <?php 
                            if (!empty($alert['warning'])) {
                            foreach ($alert['warning'] as $key => $value) { 
                            ?>                            
                                <div class="alert alert-warning"><?php echo $value; ?></div>
                            <?php 
                                }} 
                            ?>

                            <?php 
                            if (!empty($alert['danger'])) {
                            foreach ($alert['danger'] as $key => $value) { 
                            ?>                            
                                <div class="alert alert-danger"><?php echo $value; ?></div>
                            <?php 
                                }} 
                            ?>

                            <?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?>   

                            <div class="panel panel-default">      
                            <div class="panel-body">

                                <?php 
                                    $at = array('role'=>'form');
                                    echo form_open('',$at); 
                                ?>

                                <fieldset>
                                <legend>Editar Contenido</legend> 

                                <div class="row">
                                    <div class="col-xs-12">
                                        <label for="titulo">Titulo:</label>
                                        <input type="text" name="titulo" id="titulo" class="form-control" maxlength="255" required autofocus value="<?php echo $row['titulo']; ?>">
                                    </div>                                                                                              
                                </div>

                                <div class="row">
                                    <div class="col-xs-12">
                                        <label for="resumen">Resumen:</label>
                                        <input type="text" name="resumen" id="resumen" class="form-control" required value="<?php echo $row['resumen']; ?>">
                                    </div>                                                                                              
                                </div>

                                <div class="row">
                                    <div class="col-xs-12">
                                        <label for="contenido">Contenido:</label>
                                        <textarea class="form-control ckeditor" name="contenido" id="contenido"><?php echo $row['contenido']; ?></textarea>
                                    </div>                                                                                                     
                                </div>
                                <div class="row">
                                    <div class="col-xs-9">
                                        <label for="imagen_path">Imagen Path (URL):</label>
                                        <input type="text" name="imagen_path" id="imagen_path" class="form-control" value="<?php echo $row['imagen_path']; ?>">
                                    </div> 
                                    <div class="col-xs-3">
                                        <label for="id_album">Album de Fotos:</label>
                                        <select name="id_album" id="id_album" class="form-control">
                                            <option value="null">SELECCIONE...</option>
                                            <?php foreach ($table_albumes as $r) : ?>
                                            <option value="<?php echo $r['id_album']; ?>" <?php  if($row['id_album']==$r['id_album']){ echo 'selected'; } ?>><?php echo $r['album']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>                                                                                                
                                </div>                                
                                <div class="row">
                                    <div class="col-xs-3">
                                        <label for="id_categoria">Categoria:</label>
                                        <select name="id_categoria" id="id_categoria" class="form-control" required>
                                            <option value="">SELECCIONE...</option>
                                            <?php foreach ($table_categorias as $r) : ?>
                                            <option value="<?php echo $r['id_categoria']; ?>" <?php  if($row['id_categoria']==$r['id_categoria']){ echo 'selected'; } ?>><?php echo $r['categoria']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div> 
                                    <div class="col-xs-3">
                                        <label for="autor">Autor:</label>
                                        <input type="text" name="autor" id="autor" class="form-control" maxlength="30" value="<?php echo $row['autor']; ?>">
                                    </div>  
                                    <div class="col-xs-3">
                                        <label for="fecha_publicado">Fecha Publicado:</label>
                                        <div class="input-group date" id="dp1" data-date="<?php echo date("d/m/Y"); ?>" data-date-format="dd/mm/yyyy"> 
                                        <input type="text" name="fecha_publicado" class="form-control" type="text" readonly="" value="<?php echo date("d/m/Y", strtotime($row['fecha_publicado'])); ?>"> 
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i>
                                        </span> 
                                        </div>                                         
                                    </div> 
                                    <div class="col-xs-3">
                                        <label for="activo">Activo:</label>
                                        <select name="activo" id="activo" class="form-control" required>
                                            <option value="">SELECCIONE...</option>
                                            <option value="SI" <?php if($row['activo']=='SI'){ echo 'selected'; } ?>>SI</option>
                                            <option value="NO" <?php if($row['activo']=='NO'){ echo 'selected'; } ?>>NO</option>
                                        </select>
                                    </div>                                                                    
                                </div>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <label for="meta_des">Meta Descripción:</label>
                                        <input type="text" name="meta_des" id="meta_des" class="form-control" required value="<?php echo $row['meta_des']; ?>">
                                    </div>  
                                    <div class="col-xs-6">
                                        <label for="meta_key">Meta Palabras Claves (Separar con Comas):</label>
                                        <input type="text" name="meta_key" id="meta_key" class="form-control" required value="<?php echo $row['meta_key']; ?>">
                                    </div>                                                                                                 
                                </div> 
                                <div class="row">                                    
                                    <div class="col-xs-4">
                                        <label for="config_titulo">Publicar Titulo:</label>
                                        <select name="config_titulo" id="config_titulo" class="form-control" required>
                                            <option value="">SELECCIONE...</option>
                                            <option value="SI" <?php if($row['config_titulo']=='SI'){ echo 'selected'; } ?>>SI</option>
                                            <option value="NO" <?php if($row['config_titulo']=='NO'){ echo 'selected'; } ?>>NO</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-4">
                                        <label for="config_contenido">Publicar Contenido:</label>
                                        <select name="config_contenido" id="config_contenido" class="form-control" required>
                                            <option value="">SELECCIONE...</option>
                                            <option value="SI" <?php if($row['config_contenido']=='SI'){ echo 'selected'; } ?>>SI</option>
                                            <option value="NO" <?php if($row['config_contenido']=='NO'){ echo 'selected'; } ?>>NO</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-4">
                                        <label for="config_fecha">Publicar Fecha:</label>
                                        <select name="config_fecha" id="config_fecha" class="form-control" required>
                                            <option value="">SELECCIONE...</option>
                                            <option value="SI" <?php if($row['config_fecha']=='SI'){ echo 'selected'; } ?>>SI</option>
                                            <option value="NO" <?php if($row['config_fecha']=='NO'){ echo 'selected'; } ?>>NO</option>
                                        </select>
                                    </div>                                                                    
                                </div>
                                <div class="row">                                    
                                    <div class="col-xs-4">
                                        <label for="config_autor">Publicar Autor:</label>
                                        <select name="config_autor" id="config_autor" class="form-control" required>
                                            <option value="">SELECCIONE...</option>
                                            <option value="SI" <?php if($row['config_autor']=='SI'){ echo 'selected'; } ?>>SI</option>
                                            <option value="NO" <?php if($row['config_autor']=='NO'){ echo 'selected'; } ?>>NO</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-4">
                                        <label for="config_album">Publicar Album:</label>
                                        <select name="config_album" id="config_album" class="form-control" required>
                                            <option value="">SELECCIONE...</option>
                                            <option value="SI" <?php if($row['config_album']=='SI'){ echo 'selected'; } ?>>SI</option>
                                            <option value="NO" <?php if($row['config_album']=='NO'){ echo 'selected'; } ?>>NO</option>
                                        </select>
                                    </div> 
                                    <div class="col-xs-4">
                                        <label for="config_imagen">Publicar Imagen:</label>
                                        <select name="config_imagen" id="config_imagen" class="form-control" required>
                                            <option value="">SELECCIONE...</option>
                                            <option value="SI" <?php if($row['config_imagen']=='SI'){ echo 'selected'; } ?>>SI</option>
                                            <option value="NO" <?php if($row['config_imagen']=='NO'){ echo 'selected'; } ?>>NO</option>
                                        </select>
                                    </div>                                                                                                                                                                                                                                           
                                </div>
                                <div class="row"> 
                                    <div class="col-xs-4">
                                        <label for="config_categoria">Publicar Categoria:</label>
                                        <select name="config_categoria" id="config_categoria" class="form-control" required>
                                            <option value="">SELECCIONE...</option>
                                            <option value="SI" <?php if($row['config_categoria']=='SI'){ echo 'selected'; } ?>>SI</option>
                                            <option value="NO" <?php if($row['config_categoria']=='NO'){ echo 'selected'; } ?>>NO</option>
                                        </select>
                                    </div>                                    
                                    <div class="col-xs-4">
                                        <label for="config_comentario">Publicar Cometarios:</label>
                                        <select name="config_comentario" id="config_comentario" class="form-control" required>
                                            <option value="">SELECCIONE...</option>
                                            <option value="SI" <?php if($row['config_comentario']=='SI'){ echo 'selected'; } ?>>SI</option>
                                            <option value="NO" <?php if($row['config_comentario']=='NO'){ echo 'selected'; } ?>>NO</option>
                                        </select>
                                    </div> 
                                    <div class="col-xs-4">
                                        <label for="config_comentario_estatus">Cerrar Comentarios:</label>
                                        <select name="config_comentario_estatus" id="config_comentario_estatus" class="form-control" required>
                                            <option value="">SELECCIONE...</option>
                                            <option value="SI" <?php if($row['config_comentario_estatus']=='SI'){ echo 'selected'; } ?>>SI</option>
                                            <option value="NO" <?php if($row['config_comentario_estatus']=='NO'){ echo 'selected'; } ?>>NO</option>
                                        </select>
                                    </div>                                                                                                                                                                                                                                           
                                </div>



                                
                                <br />
                                <button type="submit" class="btn btn-default">Guardar</button>
                                <a href="<?php echo site_url($controller.'/table'); ?>" class="btn btn-default">Volver</a>
                                <input type="hidden" name="id_contenido" value="<?php echo $row['id_contenido']; ?>">
                                <input type="hidden" name="id_usuario" value="<?php echo $row['id_usuario']; ?>">                                
                                
                                </fieldset>   
                                
                                <?php 
                                    echo form_close(); 
                                ?>

                            </div>
                            </div>
                </div>
            </div>                            
    </div>