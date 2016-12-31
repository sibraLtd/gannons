<?php
/*
Template Name: SibraContact
*/
?>

<?php get_header(); ?>

<?php

$mt_page_title = get_post_meta($post->ID, "mt_page_title", true);
$mt_page_tagline = get_post_meta($post->ID, "mt_page_tagline", true);
$mt_page_bkg_img = get_post_meta($post->ID, "mt_page_bkg_img", true);
   
  ?>

<div class="page-head" style="background:url(<?php echo $mt_page_bkg_img ?>);  background-size: 100%;">
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

</div><!--.container-->
</div><!--.vertical-->
</div><!--.page-head-->
  <?php get_template_part( 'top-fixed-menu' ); ?>  

<section class="page-content">

<div class="container">

<div class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">
    <?php if(function_exists('bcn_display'))
    {
        bcn_display();
    }?>
</div>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <h1 class="page-title2"><?php echo $pageTitle; ?> </h1>
<?php if($post->post_content!="") : ?>

            <div class="row">
                <div class="col-md-12 content-holder">
                <?php the_content(); ?>
                    
                    
                    
                    
                    <h2>Other Gannons meeting venues:</h2>
                </div><!--.col-md-12-->

            </div><!--.row-->

<?php  endif; endwhile; endif; ?>



<div class="row">
    <a href="http://www.gannons.co.uk/contact/the-city/" title="68, Lombard Street, London. EC3V 9LJ map" target="_blank">
    <div class="col-xs-5  col-sm-3 col-md-2  col-lg-2 text-center locationBox">
        <div class="locations"><p>The City</p></div>
    </div> </a>
            
    <a href="http://www.gannons.co.uk/contact/canary-wharf/" title="1 Canada Square, London. E14 5AA map" target="_blank">
    <div class="col-xs-7 col-sm-3  col-sm-offset-1  col-md-3 col-lg-2  text-center">
        <div class="locations"><p>Canary Wharf</p></div>
    </div></a>
</div>








</div><!--.container-->

</section><!--.page-content-->

</div><!-- end main-->
<?php get_footer(); ?>
