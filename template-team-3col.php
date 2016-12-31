<?php
/*
Template Name: Sibra Team 3 Column

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

<h2 class="page-title"><?php echo $mt_page_title ;?></h2>

<?php else: ?>

<h1 class="page-title"><?php the_title();?></h1>

<?php endif; ?>

<p><?php echo $mt_page_tagline ;?></p>

<div class="gannons-search-sm"><?php get_search_form(); ?></div>

</div><!--.container-->
</div><!--.vertical-->
</div><!--.page-head-->

  <?php get_template_part( 'top-fixed-menu' ); ?>   

<section class="page-content">

<div class="container">
<div class="socialSharing"><?php wpsocialite_markup(); ?>    
    <a class="rssFeedLink" href="<?php bloginfo('rss2_url'); ?>" title="RSS 2.0 Feed">
        <img src="<?php echo get_stylesheet_uri(); ?>/../images/RSS-feed-icon.png" alt="RSS 2 Feed" /><p class="min">RSS feed</p><p class="med">RSS feed for updates</p><p class="big">Click here for regular RSS updates</p> </a>
    <a class="emailPage" href="mailto:blank?subject=<?php the_title(); ?>&body=Dear%20%0AI%20thought%20you%20might%20be%20interested%20in%20this%20page:%20<?php the_title(); ?>.%20You%20can%20view%20it%20at:%20<?php the_permalink() ?>"><i class="fa fa-envelope fa-2x"></i><p class="min">Email</p><p class="med">Email page link </p><p class="big">Email this page's link to a friend</p></a>    
</div>

<div class="breadcrumbs">
    <?php if(function_exists('bcn_display'))
    {
        bcn_display();
    }
    ?>
</div> <!-- /breadcrumbs --> 

<div class="row">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php if($post->post_content!="") : ?>
    
    <div class="col-md-3">
        <?php 
        // ubermenu( 'author' , array( 'theme_location' => 'authors' ) ); 
        ?>
        <?php ubermenu( 'author' , array( 'theme_location' => 'authors-sidebar-menu' ) ); ?>
        
        
        
        
    </div>

<div class="col-md-9 content-holder">
    
    <div class="teamImage">
        <?php $thumbImage = get_the_post_thumbnail( $post_id, 'large'  ); 
        $cleanThumbImage =  preg_replace( '/(height|width)="\d*"\s/', "", $thumbImage );
        
        echo $cleanThumbImage; ?>
    </div> <!-- /teamImage -->
    
    
<?php the_content(); ?>
</div><!--.col-md-12 content holder -->

<?php  endif; endwhile; endif; ?>

<?php 
			$mt_team_items_nr = ot_get_option('mt_team_items_nr', '3');
			global $wp_query;
			wp_reset_query();

	$paged = get_query_var('paged') ? get_query_var('paged') : 1;
	
	$query = array('post_type' => 'mt_team','posts_per_page' => $mt_team_items_nr, 'paged'=> $paged, 'orderby' => 'post_title', 'order' => 'ASC');
	$wp_query = new WP_Query($query);
	
	$count_team = 0;
			
?>
</div> <!-- /row -->
<div class="row">
<?php if (have_posts()) : while (have_posts()) : the_post();

			$get_item_ID = get_the_ID();
						
			/*if ($count_team % 3 == 0):
	   
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
        
      <?php	else : */?>  
        
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
        
     
      <?php /* endif; $count_team++; if(($count_team % 3) == 0) {?> </div><!--end row--> <?php } */?>

<?php endwhile; endif; /*if(($count_team % 3) == 1 || ($count_team % 3) == 2 ) {?> </div><!--end row--> <?php }*/ ?> 
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
      
<?php endif; ?>

</div><!--.container-->

</section><!--.page-content-->


</div><!--end main-->
<?php get_footer(); ?>
