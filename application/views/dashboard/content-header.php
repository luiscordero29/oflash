<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
        <!-- Content Header (Page header) -->
            <section class="content-header">
              <h1>
                <?php echo $module_title ?>
                <small><?php echo $module_description ?></small>
              </h1>
              <ol class="breadcrumb">
                <?php 
                    if (!empty($breadcrumb)) {
                      $i=1; $n = count($breadcrumb);
                        foreach ($breadcrumb as $key => $value) { 
                ?>                                                
                        <?php 
                        if($n<=$i){
                        ?>
                          <li class="active"><?php echo $key; ?></li>
                        <?php
                        }else{
                        ?>
                          <li><a href="<?php echo site_url($value); ?>"><?php echo $key; ?></a></li>
                        <?php 
                      }                   
                        $i++; 
                        ?>
                <?php 
                        }
                    } 
                ?>    
              </ol>
            </section>