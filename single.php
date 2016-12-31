<?php
/**
 * @package WordPress
 * @subpackage Lawyers
 */

/* 
 * <div class="subscribe">
                    <h3>Subscribe to our insights</h3>
                    <?php echo do_shortcode( '[stc-subscribe category_in="Corporate, Dispute resolution, Employment law, Intellectual property, Tax law"]' ); ?>
                </div>
 * 
 */
get_header();
?>

<?php

$mt_page_title = get_post_meta(get_option('page_for_posts'), "mt_page_title", true);
$mt_page_tagline = get_post_meta(get_option('page_for_posts'), "mt_page_tagline", true);
$mt_page_bkg_img = get_post_meta(get_option('page_for_posts'), "mt_page_bkg_img", true);
   
  ?>

<div class="page-head" style="background-image:url(<?php echo $mt_page_bkg_img ?>);">
<div class="vertical">
<div class="container">

<?php if (!empty($mt_page_title)) :?>
<h4 class="page-title"><?php echo $mt_page_title ;?></h4>
<?php else: ?>
<h4 class="page-title"><?php echo get_the_title(get_option('page_for_posts')); ?></h4>
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
            <div class="leftColumn topCol hidden-xs hidden-sm col-md-3 ">
                <div class="leftSidebar "  >  
                 <?php ubermenu( 'sidebar-menu' , array( 'theme_location' => 'left-sidebar-menu' ) ); ?> 
                    <?php if ( shortcode_exists( 'sibra_cases' ) ) {
                    echo do_shortcode( '[sibra_cases]' );
                }  ?>
                    
                    
                </div>
            </div> <!-- /col-md-3 -->
            
            
            
            <div class="col-xs-12 col-md-6 middle" itemscope itemtype="http://schema.org/BlogPosting">
            <?php 		
                if (have_posts()) : while (have_posts()) : the_post();
                $classes_post = array('blog-post-single');
                ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class($classes_post); ?> > 
                <?php $pageTitle =  get_the_title(); ?>
                
            <?php include( locate_template( 'content_header.php', false, false ) ); ?>
                <div class="content-holder" itemprop="articleBody">
                <?php the_content(); ?>
                </div>

            <?php
            wp_link_pages(array(
                'before' => '<div class="page-links">',
                'after' => '</div>',
                'nextpagelink' => '<span class="next-page">'.__('Next Page', 'match').'</span>',
                'previouspagelink' => '<span class="previous-page">'.__('Previous Page', 'match').'</span>',
                'next_or_number' => 'next'
            ));
            ?>

            <?php the_tags('<h5 class="single-page-tags">'.__('Tags', 'match').': ',' , ', '</h5>'); ?>
            </article>
            <?php endwhile; else: ?>
                <p><?php _e('Sorry, no posts matched your criteria.', 'match')?></p>
                <?php endif; ?>

            <?php comments_template(); ?>
            </div><!--.col-md-6-->
            
            
            
            
            <div class="leftColumn col-xs-12 hidden-md hidden-lg">
                 <?php ubermenu( 'sidebar-menu' , array( 'theme_location' => 'left-sidebar-menu' ) ); ?> 
                <?php if ( shortcode_exists( 'sibra_cases' ) ) {
                    echo do_shortcode( '[sibra_cases]' );
                }  ?>
                <?php // if ( is_active_sidebar( 'events' ) ) { ?>		        
                <?php // dynamic_sidebar( 'events' ); }?>    

            </div> <!-- /col-md-3 --> 
            
            
            
            <div class="rightColumn col-xs-12  col-md-3">
                    <div class="authPic">          
                     <div class="rightSidebar"   >             
                        <?php  contactInfo( get_the_author_meta( 'ID' ), get_the_ID(), get_permalink() ); ?>                           
                     <div class="relatedContent">
                        <?php if ( shortcode_exists( 'related' ) ) {
                            echo do_shortcode( '[related]' );
                        }
                        ?>
                                             
                      <?php // get_template_part( 'social_share' ); ?> 
                        <?php if ( is_active_sidebar( 'events' ) ) { ?>		        
                        <?php dynamic_sidebar( 'events' ); }?> 
                       </div>  
                         
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
