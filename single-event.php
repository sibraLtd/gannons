<?php
/*
 
 Template Name: Single-Event
 
 */

get_header(); ?>

<?php

$mt_page_title = get_post_meta($post->ID, "mt_page_title", true);
$mt_page_tagline = get_post_meta($post->ID, "mt_page_tagline", true);
$mt_page_bkg_img = get_post_meta($post->ID, "mt_page_bkg_img", true);
   
  ?>

<div class="page-head" style="background:url(http://www.gannons.co.uk/wp-content/uploads/2012/10/Services.jpg); background-size: 100%;">
<div class="vertical">

<div class="container">

<?php if (!empty($mt_page_title)) :?>
    <h3 class="page-title"><?php echo $mt_page_title ;?></h3>
     <?php  $pageTitle = $mt_page_title; ?>
<?php else: ?>
    <h3 class="page-title"><?php the_title();?></h3>
    <?php  $pageTitle =  get_the_title(); ?>
<?php endif; ?>

<p><?php echo $mt_page_tagline ;?></p>

<div class="gannons-search-sm"><?php get_search_form(); ?></div>

</div><!--.container-->
</div><!--.vertical-->
</div><!--.page-head-->
  <?php get_template_part( 'top-fixed-menu' ); ?> 

<section class="page-content">

<div class="container">

<div class="breadcrumbs">
    <?php if(function_exists('bcn_display'))
    {
        bcn_display();
    }?>
</div>

<div class="row">
<div class="col-md-12 content-holder custom-page-template">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<h1 class="page-title2"><?php echo $pageTitle; ?> </h1>
<?php the_content(); ?>

<?php  endwhile; endif; ?>

</div><!--.col-md-12-->

</div><!--.row-->

<?php //echo do_shortcode('[related]'); ?>

</div><!--.container-->

</section><!--.page-content-->

</div><!--end main-->
<?php get_footer(); ?>
