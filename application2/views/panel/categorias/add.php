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
                                <legend>Registrar Categoria</legend>                                                             

                                <div class="row">
                                    <div class="col-xs-12">
                                        <label for="categoria">Categoria:</label>
                                        <input type="text" name="categoria" id="categoria" class="form-control" maxlength="255" required autofocus>
                                    </div>  
                                                                                                
                                </div>

                                <div class="row">
                                    <div class="col-xs-12">
                                        <label for="descripcion">Descripción:</label>
                                        <textarea class="form-control ckeditor" rows="3" name="descripcion" id="descripcion"></textarea>
                                    </div>                                                                                                     
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <label for="imagen_path">Imagen Path (URL):</label>
                                        <input type="text" name="imagen_path" id="imagen_path" class="form-control">
                                    </div>                                                                                                 
                                </div>                                
                                <div class="row">
                                    <div class="col-xs-6">
                                        <label for="autor">Autor:</label>
                                        <input type="text" name="autor" id="autor" class="form-control" maxlength="255">
                                    </div>  
                                    <div class="col-xs-3">
                                        <label for="fecha_publicado">Fecha Publicado:</label>
                                        <div class="input-group date" id="dp1" data-date="<?php echo date("d/m/Y"); ?>" data-date-format="dd/mm/yyyy"> 
                                        <input type="text" name="fecha_publicado" class="form-control" type="text" readonly="" value="<?php echo date("d/m/Y"); ?>"> 
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i>
                                        </span> 
                                        </div>                                         
                                    </div> 
                                    <div class="col-xs-3">
                                        <label for="activo">Activo:</label>
                                        <select name="activo" id="activo" class="form-control" required>
                                            <option value="">SELECCIONE...</option>
                                            <option value="SI">SI</option>
                                            <option value="NO">NO</option>
                                        </select>
                                    </div>                                                                    
                                </div>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <label for="meta_des">Meta Descripción:</label>
                                        <input type="text" name="meta_des" id="meta_des" maxlength="255" class="form-control" required>
                                    </div>  
                                    <div class="col-xs-6">
                                        <label for="meta_key">Meta Palabras Claves (Separar con Comas):</label>
                                        <input type="text" name="meta_key" id="meta_key" maxlength="255" class="form-control" required>
                                    </div>                                                                                                 
                                </div> 
                                <div class="row">                                    
                                    <div class="col-xs-4">
                                        <label for="config_categoria">Publicar Categoria:</label>
                                        <select name="config_categoria" id="config_categoria" class="form-control" required>
                                            <option value="">SELECCIONE...</option>
                                            <option value="SI">SI</option>
                                            <option value="NO">NO</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-4">
                                        <label for="config_descripcion">Publicar Descripción:</label>
                                        <select name="config_descripcion" id="config_descripcion" class="form-control" required>
                                            <option value="">SELECCIONE...</option>
                                            <option value="SI">SI</option>
                                            <option value="NO">NO</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-4">
                                        <label for="config_fecha">Publicar Fecha:</label>
                                        <select name="config_fecha" id="config_fecha" class="form-control" required>
                                            <option value="">SELECCIONE...</option>
                                            <option value="SI">SI</option>
                                            <option value="NO">NO</option>
                                        </select>
                                    </div>                                                                    
                                </div>
                                <div class="row">                                    
                                    <div class="col-xs-6">
                                        <label for="config_autor">Publicar Autor:</label>
                                        <select name="config_autor" id="config_autor" class="form-control" required>
                                            <option value="">SELECCIONE...</option>
                                            <option value="SI">SI</option>
                                            <option value="NO">NO</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="config_imagen">Publicar Imagen:</label>
                                        <select name="config_imagen" id="config_imagen" class="form-control" required>
                                            <option value="">SELECCIONE...</option>
                                            <option value="SI">SI</option>
                                            <option value="NO">NO</option>
                                        </select>
                                    </div>                                                                                                    
                                </div>


                                <br />
                                <button type="submit" class="btn btn-default">Guardar</button>
                                <a href="<?php echo site_url($controller.'/table'); ?>" class="btn btn-default">Volver</a>
                                <input type="hidden" name="id_usuario" value="<?php echo $session['id_usuario']; ?>">
                                </fieldset>   
                                
                                <?php 
                                    echo form_close(); 
                                ?>

                            </div>
                            </div>
                </div>
            </div>                            
    </div>