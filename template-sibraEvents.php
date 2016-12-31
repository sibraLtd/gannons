<?php
/*
 
 Template Name: Sibra Events
 
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

<div class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">
    <?php if(function_exists('bcn_display'))
    {
        bcn_display();
    }?>
</div>

<div class="row">
<div class="col-xs-12 col-md-9 content-holder custom-page-template middle">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<h1 class="page-title2"><?php echo $pageTitle; ?> </h1>



<?php the_content(); ?>

<?php  endwhile; endif; ?>

</div><!--.col-md--->

<div class="rightColumn col-xs-12 col-md-3" style="margin-top:-40px">
    <div class="authPic" style="width: 305px">
    <div class="rightSidebar affix-top">
             <div class="comments-seminar relatedContent">
                 <div class="related-wrapper grey-bg">
                 <h2>Comments on our seminars</h2>
                 <ul>
                     <li>“Very well prepared. Very easy to understand, provided clear information and helpful guides”. Alison Mcgaughey,  General Pharmaceutical Council</li>
                     <li>“Really interesting and well presented”. Clair Kelly,  Sadlers Wells Theatre </li>
                     <li>“Excellent, very relevant”  Susan Mitchener,  Property Management Recruitment</li>
                 <li>“Excellent. Plenty of food for thought”. Clare Kissane, Director, Unbiased.co.uk </li>
                 <li>“Excellent, Catherine is very knowledgeable on the subject, she delivered. Very informative”. Helen Roberts HR Manager, JBW</li>
                 <li>“Speaker very good at pitching the topic at a level that was easily understood. Had good knowledge of both tax/legal aspect of the topic”.</li>
                 <li>“Good to hear practical examples and usual issues encountered in practice.”</li>                 
                 <li>“Very helpful, exactly what I needed to hear about this complex area”.</li>
                 <li>“Fantastic. Catherine was superb as always!” </li>  
                 </ul>
             </div>
             
             
          </div>
    </div>
    </div>
</div> <!-- /col-md-3 --> 

</div><!--.row-->

</div><!--.container-->

</section><!--.page-content-->

</div><!--end main-->
<?php get_footer(); ?>
