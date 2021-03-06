<?php
/*
 
 Template Name: Sibra-Previous seminars
 
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

<p><?php echo $mt_page_tagline ;?></p>


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

    
    
<div class="col-xs-12 middle content-holder custom-page-template" itemscope itemtype="http://schema.org/Article">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>    
        <h1 class="page-title2" itemprop="headline"><?php echo $pageTitle; ?> </h1>
        <meta itemprop="author" content="<?php the_author(); ?>" /> 
        <meta itemprop="datePublished" content="<?php echo get_the_date('c'); ?>" />
        <meta itemprop="copyrightHolder" content="Gannons solicitors"/>
        <meta itemprop="dateModified" content="<?php the_modified_date('c'); ?>"/>
        <meta itemprop="wordCount" content="<?php echo word_count( get_the_ID() ); ?>"/>
        
        <meta itemprop="image" content="<?php echo sibra_author_link( get_the_author_meta( 'display_name' ) ); ?>" alt="<?php echo get_the_author_meta( 'display_name' ); ?>: Picture of the author " />
                 <?php // Retrieve description meta data from the SEO Pack https://michaeldozark.wordpress.com/2010/02/03/all-in-one-seo-without-using-wp_head/
             $seodesc = stripslashes(get_post_meta($post->ID, '_aioseop_description', true));

                // Default description in case none is specified for the page
                if (empty($seodesc)) { $seodesc = "Gannons solicitors: Corporate, disputes, employment, IP & tax issues solved";}

                // Output the html code
                $seodesc_block = "<meta itemprop=\"description\" content=\"".$seodesc."\"/>\n";
                    echo $seodesc_block; ?>
        
        </div><!--.col-xs-12-->
    </div><!--.row-->
    
    <div class="row">    
        
        <div itemprop="articleBody">
            <?php the_content(); ?>
        </div>
    <?php  endwhile; endif; ?>
    </div> <!-- .row -->















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

