<?php
/*
Template Name: Sibra About Gannons

*/
?>
<?php get_header(); ?>

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



    <div class="rightColumn col-xs-12  col-md-3">        
        <div class="authPic team">          
         <div class="rightSidebar" >             
             <div class="contactPerson">
                 <h2>Who to contact</h2>
                 <a href="http://www.gannons.co.uk/about-gannons/team/catherine-gannon/" target="_blank" >
                 <img class="catherine" src="http://www.gannons.co.uk/wp-content/uploads/2016/08/catherine-gannon-navy-330.jpg" 
                      alt="Catherine Gannon, managing partner Gannons Solicitors" />
                <div class="hoverText aboutGannons">
                    <p>Clients tell us we’re approachable, knowledgeable and cost-conscious. We continuously invest in our industry knowledge and our lawyers’ careers. </p>
                </div>
                 </a> 
                 <div class="contactDetails">
                     <p>“I am proud of all that we have achieved and look forward to even greater success for the firm and our clients”</p>
                     <img class="signature" src="http://www.gannons.co.uk/wp-content/uploads/2015/06/catherineSig.png" 
                          alt="Catherine Gannon: With a tax and accountancy as well as a legal background, Catherine stands out from the average lawyer" />
                     <p class="sig">Catherine Gannon</p>
                     <p class="sig">Managing Partner </p>
                     <a class="emailAuthor" href="mailto:cg@gannons.co.uk?cc=clientservices@gannons.co.uk&amp;subject=<?php get_the_title( $ID )?>&body=Dear%20Catherine,%0D%0AFurther%20to%20<?php get_the_title( $ID )?>,"><i class="fa fa-envelope"></i>&nbsp;Email Catherine</a>               
                     <p>Call&nbsp;Catherine &nbsp;<i class="fa fa-phone"></i>+44 (0)207 438 1060</p>
                 </div>
                 </div>
            <?php  // contactInfo( get_the_author_meta( 'ID' ), get_the_ID() ); ?>         
             <div class="relatedContent">
                <?php if ( shortcode_exists( 'related' ) ) {
                    echo do_shortcode( '[related]' );
                }
                ?>             
            </div>
         <?php get_template_part( 'social_share' ); ?>         
    </div> <!-- /rightSidebar --> 
     </div> <!-- /authPic -->
    </div> <!-- /col-md-3 --> 



 <?php /*
			$mt_team_items_nr = ot_get_option('mt_team_items_nr', '3');
			global $wp_query;
			wp_reset_query();

	$paged = get_query_var('paged') ? get_query_var('paged') : 1;
	
	$query = array('post_type' => 'mt_team','posts_per_page' => $mt_team_items_nr, 'paged'=> $paged, 'orderby' => 'post_title', 'order' => 'ASC');
	$wp_query = new WP_Query($query);
	
	$count_team = 0;
			
*/ ?>
</div> <!-- /row -->
<?php /*
<div class="row">
<?php if (have_posts()) : while (have_posts()) : the_post();

			$get_item_ID = get_the_ID();
						
			start of comment if ($count_team % 3 == 0):
	   
	    ?>
             
      <div class="row">
         <div class="col-lg-4 col-md-6">
          <div class="lawyer-holder">
          
          <?php if ( has_post_thumbnail($get_item_ID) ){ ?>

<?php the_post_thumbnail('team-img', array('class'=> 'img-responsive', 'alt' => ''.get_the_title().'', 'title' => ''.get_the_title().'')); ?>

<?php } ?>
          
            <h5 class="lawyer-title"><?php the_title(); ?></h5>
    	
        <?php the_excerpt(); ?>
        
        <div class="view-more margin-t32"><a href="<?php the_permalink(); ?>"><?php _e('View Profile', 'match') ?></a></div>
    		
          </div><!--.lawyer-holder-->
        </div><!--.col-md-4-->
        
      <?php	else : end of comment here ?>  
        
        <div class="col-lg-4 col-md-6">
          <div class="lawyer-holder">
          
          <?php if ( has_post_thumbnail($get_item_ID ) ){ ?>

<?php the_post_thumbnail('team-img', array('class'=> 'img-responsive', 'alt' => ''.get_the_title().'', 'title' => ''.get_the_title().'')); ?>

<?php } ?>
          
            <h5 class="lawyer-title"><?php the_title(); ?></h5>
            
            <div class="view-more" style="margin-bottom: 15px;"><a href="<?php the_permalink(); ?>"><?php _e('View Profile', 'match') ?></a></div>
            
             <?php the_excerpt(); ?>
        
        
            
          </div><!--.lawyer-holder-->
        </div><!-- /col-lg-4 col-md-6 -->
        
     
      <?php startof comment endif; $count_team++; if(($count_team % 3) == 0) {?> </div><!--end row--> <?php } end of comment ?>

<?php endwhile; endif; start of comment if(($count_team % 3) == 1 || ($count_team % 3) == 2 ) {?> </div><!--end row--> <?php } end of comment ?> 
</div> 
<!-- /row -->
                       


<?php $count_posts = wp_count_posts('mt_team'); ?>

<?php if(function_exists('mt_pagenavi') && ($mt_team_items_nr < $count_posts->publish ) ) : ?>
                         

	<div class="margin72">

	<?php mt_pagenavi();  ?>
        
	</div><!--.margin72-->
        
	<?php else : ?>

  <ul class="other-entries">
			<li class="newer-entries"><span><?php previous_posts_link(__('Previous', 'match')); ?></span></li>
            <li class="older-entries"><span><?php next_posts_link(__('Next', 'match')); ?></span></li>
          </ul>
      
<?php endif; */ ?>
                         
                         

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