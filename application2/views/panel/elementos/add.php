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
                                <legend>Registrar Elemento</legend> 
                                
                                <div class="row">                                    
                                    <div class="col-xs-8">
                                        <label for="elemento">Elemento:</label>
                                        <input type="text" name="elemento" id="elemento" class="form-control" required>
                                    </div> 
                                    <div class="col-xs-2">
                                        <label for="id">Id:</label>
                                        <input type="text" name="id" id="id" class="form-control" maxlength="20">
                                    </div>  
                                    <div class="col-xs-2">
                                        <label for="orden">Orden:</label>
                                        <input type="text" name="orden" id="orden" class="form-control" maxlength="4" required>
                                    </div>                                                                  
                                </div>

                                <div class="row">                                    
                                    <div class="col-xs-9">
                                        <label for="url">Url:</label>
                                        <input type="text" name="url" id="url" class="form-control">
                                    </div>  
                                    <div class="col-xs-3">
                                        <label for="metodo">Metodo:</label>
                                        <select name="metodo" id="metodo" class="form-control">
                                            <option value="">SELECCIONE...</option>
                                            <option value="_blank">_blank</option>
                                            <option value="_self">_self</option> 
                                            <option value="_parent">_parent</option> 
                                            <option value="_top">_top</option> 
                                        </select>
                                    </div>                                                                                                    
                                </div>

                                <div class="row">
                                    <div class="col-xs-3">
                                        <label for="id_menu">Menu:</label>
                                        <select name="id_menu" id="id_menu" class="form-control" required>
                                            <option value="">SELECCIONE...</option>
                                            <?php foreach ($table_menus as $r) : ?>
                                            <option value="<?php echo $r['id_menu']; ?>"><?php echo $r['menu']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>  
                                    <div class="col-xs-3">
                                        <label for="tipo">Tipo:</label>
                                        <select name="tipo" id="tipo" class="form-control" required>
                                            <option value="">SELECCIONE...</option>
                                            <option value="CONTENIDO">CONTENIDO</option>
                                            <option value="CATEGORIA">CATEGORIA</option>
                                            <option value="ENLACE">ENLACE</option>
                                        </select>
                                    </div>  
                                    <div class="col-xs-3">
                                        <label for="fecha">Fecha:</label>
                                        <div class="input-group date" id="dp1" data-date="<?php echo date("d/m/Y"); ?>" data-date-format="dd/mm/yyyy"> 
                                        <input type="text" name="fecha" class="form-control" type="text" readonly="" value="<?php echo date("d/m/Y"); ?>"> 
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