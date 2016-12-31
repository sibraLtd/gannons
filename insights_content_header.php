<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<ul class="blog-date">
    <li><i class="fa fa-user"></i><?php the_author_posts_link();//the_author()?> </li>
    <li><i class="fa fa-calendar"></i>Updated:<?php the_modified_date('D, jS M Y ');?></li>
</ul>
                           
<div class="authPic">
        <a href="<?php the_author_meta( 'user_url' ); ?> ">
           <?php   $author_full_name = get_the_author_meta( 'display_name' );     ?>
           <?php    echo sibra_author_image( $author_full_name ); ?>
        </a>
</div> 