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
                                    echo form_open_multipart('upload/do_upload',$at); 
                                ?>

                            	<fieldset>
                                <legend>Registrar Foto</legend>                                                             

                                <div class="row">
                                    <div class="col-xs-6">
                                        <label for="id_album">Album:</label>
                                        <select name="id_album" id="id_album" class="form-control" required autofocus>
                                            <option value="">SELECCIONE...</option>
                                            <?php foreach ($table_albumes as $r) : ?>
                                            <option value="<?php echo $r['id_album']; ?>"><?php echo $r['album']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="userfile">Subir Archivo:</label>
                                        <input type="file" name="userfile" required />                                        
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