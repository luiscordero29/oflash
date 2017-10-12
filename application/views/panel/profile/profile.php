            <div class="container">
                <div class="row">                            
                    <div class="col-xs-12">
                        <div>
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
                            	<legend>Editar Perfil</legend>                                    
                                <div class="row">
                                    <div class="col-xs-3">
                                        <label for="usuario">Usuario:</label>
                                        <input type="text" name="usuario" id="usuario" class="form-control" maxlength="15" disabled value="<?php echo $row['usuario']; ?>">
                                    </div>
                                    <div class="col-xs-9">
                                        <label for="nick">Nick:</label>
                                        <input type="text" name="nick" id="nick" class="form-control" maxlength="120" required autofocus value="<?php echo $row['nick']; ?>" >
                                    </div>                                    
                                </div>

                                <div class="row">
                                    <div class="col-xs-4">
                                        <label for="identidad">Cédula de Identidad:</label>
                                        <input type="text" name="identidad" id="identidad" class="form-control" maxlength="10" required autofocus value="<?php echo $row['identidad']; ?>">
                                    </div>
                                    <div class="col-xs-4">
                                        <label for="apellidos">Apellidos:</label>
                                        <input type="text" name="apellidos" id="apellidos" class="form-control" maxlength="120" required value="<?php echo $row['apellidos']; ?>" >
                                    </div>                                    
                                    <div class="col-xs-4">
                                        <label for="nombres">Nombres:</label>
                                        <input type="text" name="nombres" id="nombres" class="form-control" maxlength="120" required value="<?php echo $row['nombres']; ?>">
                                    </div>                                    
                                </div>

                                <div class="row">
                                    <div class="col-xs-3">
                                        <label for="sexo">Sexo:</label>
                                        <select name="sexo" id="sexo" class="form-control" required>
                                            <option value="">SELECCIONE...</option>
                                            <option value="MASCULINO" <?php if($row['sexo']=='MASCULINO'){ echo 'selected'; } ?>>MASCULINO</option>
                                            <option value="FEMENINO" <?php if($row['sexo']=='FEMENINO'){ echo 'selected'; } ?>>FEMENINO</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-3">
                                        <label for="fecha_nacimiento">Fecha Nacimiento:</label>
                                        <div class="input-group date" id="dp1" data-date="01/01/2000" data-date-format="dd/mm/yyyy"> 
                                        <input type="text" name="fecha_nacimiento" class="form-control" type="text" readonly="" value="<?php echo date("d/m/Y", strtotime($row['fecha_nacimiento'])); ?>"> 
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i>
                                        </span> 
                                        </div> 
                                        
                                    </div>                                    
                                    <div class="col-xs-3">
                                        <label for="telefono">Teléfono:</label>
                                        <input type="text" name="telefono" id="telefono" class="form-control" maxlength="15" required value="<?php echo $row['telefono']; ?>">
                                    </div>
                                    <div class="col-xs-3">
                                        <label for="direccion">Dirección:</label>
                                        <input type="text" name="direccion" id="direccion" class="form-control" maxlength="100" required value="<?php echo $row['direccion']; ?>">
                                    </div>                                    
                                </div>

                            	<br />
                                <button type="submit" class="btn btn-default">Guardar</button>
                                <a href="<?php echo site_url('panel/index'); ?>" class="btn btn-default">Volver</a>
                                <input type="hidden" name="id_usuario" value="<?php echo $row['id_usuario']; ?>">
                                <input type="hidden" name="usuario" value="<?php echo $row['usuario']; ?>">
                                </fieldset>

                                
                                
                                </div>
                            <?php 
                                echo form_close(); 
                            ?>

                            </div>
                            </div>
                        </div>
                    </div>                            
                </div>
            </div>
                
        