<?php
/*
Template Name: Sibra JobPosting

*/
?>
<?php get_header(); ?>


<script type="application/ld+json">
    {  "@context": "http://schema.org",
       "@type": "JobPosting",
       "hiringOrganization": "Gannons solicitors",
       "datePosted": "<?php echo get_the_date('c'); ?>",
       "url": "<?php the_permalink(); ?> ",
       "title": "<?php echo get_post_meta($post->ID, "mt_page_title", true); ?>",
       "industry": "Law, boutique commercial solicitors' practice",
       "responsibilities": "<?php the_field('responsibilities'); ?>",
       "qualifications": "<?php the_field('qualifications'); ?>",
       "experienceRequirements": "<?php the_field('experience_requirements'); ?>",
       "educationRequirements": "<?php the_field('education_requirements'); ?>",
       "skills": "<?php the_field('skills'); ?>",
       "validThrough": "<?php the_field('valid_through'); ?>",
       "jobLocation": {
           "@type": "Place",
           "address": {
               "@type": "PostalAddress",
               "addressLocality": "London, UK",
               "postalCode": "WC1R 4BW",
               "streetAddress": "20-21 Jockey's Fields"
           }
       },
        "employmentType": "Full-time",      
        "baseSalary": "<?php the_field('base_salary'); ?>",
       "salaryCurrency": "£",
       "incentiveCompensation": "<?php the_field('incentive_compenssation'); ?>"
       
       
       
    }
    </script>


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

<div class="breadcrumbs"  xmlns:v="http://rdf.data-vocabulary.org/#">
    <?php if(function_exists('bcn_display'))
    {
        bcn_display();
    }
    ?>
</div> <!-- /breadcrumbs --> 

<div class="row">
 
   

  <!-- According to some, bootstrap push and pull with affix doesn't work on Safari Hence the repeat -->     
<div class="leftColumn topCol hidden-xs hidden-sm col-md-3 ">
    <div class="leftSidebar" >  
          <?php ubermenu( 'aboutgannons' , array( 'theme_location' => 'aboutgannons-sidebar-menu' ) ); ?>
          <?php if ( is_active_sidebar( 'events' ) ) { ?>		        
            <?php dynamic_sidebar( 'events' ); }?>     
        </div>  
    </div> <!-- /col-md-3 --> 

<div class="col-xs-12 col-md-6 middle content-holder custom-page-template" itemscope itemtype="http://schema.org/Article">
   <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php if($post->post_content!="") : ?>  
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
        <div itemprop="articleBody">
 
        
        <?php the_content(); endif; ?>
        </div>
    <?php  endwhile; endif;  ?>
</div><!--.col-md-6-->

<div class="leftColumn col-xs-12 hidden-md hidden-lg">
    <!-- <div class="leftSidebar" data-spy="affix" data-offset-top="450"  data-offset-bottom="430"> --> 
        <!-- <div class="leftSidebar"> -->
           <?php ubermenu( 'aboutgannons' , array( 'theme_location' => 'aboutgannons-sidebar-menu' ) ); ?>
          <?php if ( is_active_sidebar( 'events' ) ) { ?>		        
            <?php dynamic_sidebar( 'events' ); }?>     
       <!--  </div>  -->
    </div> <!-- /col-md-3 -->

<div class="rightColumn col-xs-12 col-md-3">
     <div class="authPic">
         <div class="rightSidebar" >
         <?php  contactInfo( get_the_author_meta( 'ID' ), get_the_ID(), get_permalink() ); ?>
             <div class="relatedContent">
                <?php if ( shortcode_exists( 'related' ) ) {
                    echo do_shortcode( '[related]' );
                }
                ?>
            </div>             
         <?php get_template_part( 'social_share' ); ?>         
        </div>    
     </div>    
</div> <!-- /col-md-3 --> 
</div><!--.row-->
<?php //echo do_shortcode('[related]'); ?>
</div><!--.container-->


         <?php get_template_part( 'social_share' ); ?>         
    </div> <!-- /rightSidebar --> 
     </div> <!-- /authPic -->
    </div> <!-- /col-md-3 --> 

</div> <!-- /row -->                        

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