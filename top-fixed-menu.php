<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * This code went under  <nav class="navbar navbar-custom" role="navigation">
 * <div class="navbar-header"> 
                              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapse-navigation"> <span class="sr-only"><?php _e('Toggle navigation', 'match'); ?></span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                            </div>  
 */
?>

<div class="container-fluid menuFixed" data-spy="affix" data-offset-top="400"> 
      
    <div class="row">
        <div class="container">
          <div class="row">
              <div class="col-xs-12">

                  <nav class="navbar navbar-custom" >

                            

                             <div class="collapse navbar-collapse" id="collapse-navigation"> 

                                        <?php  wp_nav_menu(array('theme_location' => 'primary-menu', 'menu_class' => 'nav menu-nav', 'container' => 'false')); 
                                        ?>

                           </div>  <!-- /.navbar-collapse -->
                  </nav> 
              </div> 
          </div> 
        </div> 
    </div>
  
  </div> 