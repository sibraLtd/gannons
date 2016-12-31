<?php
/*
 
 Template Name: Events
 
 */

get_header(); ?>

<?php

$mt_page_title = get_post_meta($post->ID, "mt_page_title", true);
$mt_page_tagline = get_post_meta($post->ID, "mt_page_tagline", true);
$mt_page_bkg_img = get_post_meta($post->ID, "mt_page_bkg_img", true);
   
  ?>

<div class="page-head" style="background:url(<?php echo $mt_page_bkg_img ?>); background-size: 100%;">
<div class="vertical">

<div class="container">

<?php if (!empty($mt_page_title)) :?>

<h1 class="page-title"><?php echo $mt_page_title ;?></h1>

<?php else: ?>

<h1 class="page-title"><?php the_title();?></h1>

<?php endif; ?>

<p><?php echo $mt_page_tagline ;?></p>

<div class="gannons-search-sm"><?php get_search_form(); ?></div>

</div><!--.container-->
</div><!--.vertical-->
</div><!--.page-head-->


<section class="page-content">

<div class="container">
    

<div class="breadcrumbs xmlns:v="http://rdf.data-vocabulary.org/#">
    <?php if(function_exists('bcn_display'))
    {
        bcn_display();
    }?>
   </div>
    
<div class="row">
<div class="col-md-12 content-holder custom-page-template">
    

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php the_content(); ?>

<?php  endwhile; endif; ?>

</div><!--.col-md-12-->

</div><!--.row-->

<?php //echo do_shortcode('[related]'); ?>

</div><!--.container-->

</section><!--.page-content-->

</div><!--end main-->
<?php get_footer(); ?>
