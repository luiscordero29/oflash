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
                                <legend>Editar Comentario</legend> 

                                <div class="row">
                                    <div class="col-xs-9">
                                        <label for="id_usuario">Usuario:</label>
                                        <input type="text" name="id_usuario" id="id_usuario" class="form-control" maxlength="255" disabled="true" value="<?php echo $row['nick']; ?>">
                                    </div>  
                                    <div class="col-xs-3">
                                        <label for="activo">Activo:</label>
                                        <select name="activo" id="activo" class="form-control" required autofocus>
                                            <option value="">SELECCIONE...</option>
                                            <option value="SI" <?php if($row['activo']=='SI'){ echo 'selected'; } ?>>SI</option>
                                            <option value="NO" <?php if($row['activo']=='NO'){ echo 'selected'; } ?>>NO</option>
                                        </select>
                                    </div> 
                                                                                                
                                </div>

                                <div class="row">
                                    <div class="col-xs-12">
                                        <label for="comentario">Comentario:</label>
                                        <textarea class="form-control ckeditor" rows="3" name="comentario" id="comentario"><?php echo $row['comentario']; ?></textarea>
                                    </div>                                                                                                     
                                </div>

                                
                                <br />
                                <button type="submit" class="btn btn-default">Guardar</button>
                                <a href="<?php echo site_url($controller.'/table'); ?>" class="btn btn-default">Volver</a>
                                <input type="hidden" name="id_comentario" value="<?php echo $row['id_comentario']; ?>">                                
                                
                                </fieldset>   
                                
                                <?php 
                                    echo form_close(); 
                                ?>

                            </div>
                            </div>
                </div>
            </div>                            
    </div>