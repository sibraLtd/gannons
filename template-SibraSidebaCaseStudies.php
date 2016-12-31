<?php
/*
 
 Template Name: Sibra-CaseStudies
 
 */

get_header(); ?>

<?php

$mt_page_title = get_post_meta($post->ID, "mt_page_title", true);
$mt_page_tagline = get_post_meta($post->ID, "mt_page_tagline", true);
$mt_page_bkg_img = get_post_meta($post->ID, "mt_page_bkg_img", true);
$pageTitle = ""; 

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

<p><?php echo $mt_page_tagline; ?></p>


<div class="gannons-search-sm"><?php get_search_form(); ?></div>
  


</div><!--.container-->
</div><!--.vertical-->
</div><!--.page-head-->

  <?php get_template_part( 'top-fixed-menu' ); ?>   

<?php // get_template_part( 'social_share' ); ?>
 

<section class="page-content"> 
<div class="container">
 
<div class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">
    <?php if(function_exists('bcn_display'))
    {
        bcn_display();
    }?>
</div>

<div class="row">
  <!-- According to some, bootstrap push and pull with affix doesn't work on Safari Hence the repeat -->     
<div class="leftColumn topCol hidden-xs hidden-sm col-md-3 ">
    <div class="leftSidebar" >         
           <?php ubermenu( 'case-study-menu' , array( 'theme_location' => 'case-study-sidebar-menu' ) ); ?>
     
        </div>  
    </div> <!-- /col-md-3 --> 
          
    
    
<div class="col-xs-12 col-md-6 middle content-holder custom-page-template" itemscope itemtype="http://schema.org/Article">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?> 
        <?php include( locate_template( 'content_header.php', false, false ) ); ?>

        <div itemprop="articleBody">
            <?php the_content(); ?>
        </div>
    <?php  endwhile; endif; ?>
</div><!--.col-md-6-->

<div class="leftColumn col-xs-12 hidden-md hidden-lg">
    <!-- <div class="leftSidebar" data-spy="affix" data-offset-top="450"  data-offset-bottom="430"> --> 
        <!-- <div class="leftSidebar"> -->
           <?php ubermenu( 'case-study-menu' , array( 'theme_location' => 'case-study-sidebar-menu' ) ); ?>
          
       <!--  </div>  -->
    </div> <!-- /col-md-3 --> 

<div class="rightColumn col-xs-12 col-md-3">        
        <div class="authPic">          
         <div class="rightSidebar" >             
            <?php  contactInfo( get_the_author_meta( 'ID' ), get_the_ID(), get_permalink() ) ; ?>             
          <div class="relatedContent">
            <?php if ( shortcode_exists( 'related' ) ) {
                echo do_shortcode( '[related]' );
            } ?> 
            <?php if ( is_active_sidebar( 'events' ) ) { ?>		        
            <?php dynamic_sidebar( 'events' ); }?>     
             
          </div>
         <?php get_template_part( 'social_share' ); ?> 
         
         

       
        
        
    </div> <!-- /rightSidebar --> 
     </div> <!-- /authPic -->
    </div> <!-- /col-md-3 --> 




</div><!--.row-->





</div><!--.container-->

</section><!--.page-content-->
<script type="application/ld+json">
    {  "@context" : "http://schema.org",
       "@type" : "WebSite",
       "name" : "Gannons solicitors",
       "alternateName" : "Corporate & Commercial, Disputes, Employment, IP & Tax issues solved",
       "url" : "http://www.gannons.co.uk"
    }
    </script>

</div><!--end main-->
<?php get_footer(); ?>

