<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<h1 class="page-title2" itemprop="headline"><?php echo $pageTitle; ?> </h1>
 <ul id="blog-data">
    <li><i class="fa fa-user byline"></i><span itemprop="author" content="<?php the_author(); ?>" />
        <?php the_author_posts_link();//the_author(); ?> <?php // the_author(); ?></span>
    </li>
    <li><i class="fa fa-calendar"></i>Updated:<span <meta itemprop="dateModified" content="<?php the_modified_date('c');?>"/>
        <?php the_modified_date('D, jS M Y '); ?></span>
    </li>
    <li><meta itemprop="copyrightHolder" content="Gannons solicitors"/></li>
    <li><meta itemprop="wordCount" content="<?php echo word_count( get_the_ID() ); ?>"/></li>
    <li><meta itemprop="image" content="<?php echo sibra_author_link( get_the_author_meta( 'display_name' ) ); ?>"
              alt="<?php echo get_the_author_meta( 'display_name' ); ?>: Picture of the author " /></li>
                 <?php // Retrieve description meta data from the SEO Pack https://michaeldozark.wordpress.com/2010/02/03/all-in-one-seo-without-using-wp_head/
    $seodesc = stripslashes(get_post_meta($post->ID, '_aioseop_description', true));

                // Default description in case none is specified for the page
                if (empty($seodesc)) { $seodesc = "Gannons solicitors: Corporate, disputes, employment, IP & tax issues solved";}

                // Output the html code
                $seodesc_block = "<meta itemprop=\"description\" content=\"".$seodesc."\"/>\n";
                    echo $seodesc_block; ?>
                </ul>

 


        