<?php
/**
 * @package WordPress
 * @subpackage Lawyers
 */
get_header(); ?>

<!-- opens main -->

<?php if( get_option('show_on_front') == 'page') :


$mt_page_title = get_post_meta(get_option('page_for_posts'), "mt_page_title", true);
$mt_page_tagline = get_post_meta(get_option('page_for_posts'), "mt_page_tagline", true);
$mt_page_bkg_img = get_post_meta(get_option('page_for_posts'), "mt_page_bkg_img", true);
   
  ?>

<div class="page-head" style="background:url(<?php echo $mt_page_bkg_img ?>);">
<div class="vertical"> 

<div class="container">

<?php if (!empty($mt_page_title)) :?>

<h1 class="page-title"><?php echo $mt_page_title ;?></h1>

<?php else: ?>

<h1 class="page-title"><?php echo get_the_title(get_option('page_for_posts')); ?></h1>

<?php endif; ?>

<p><?php echo $mt_page_tagline ;?></p>

<div class="gannons-search-sm"><?php get_search_form(); ?></div>

</div><!--.container-->
</div><!--.vertical-->
</div><!--.page-head-->
  <?php get_template_part( 'top-fixed-menu' ); ?> 
<?php else : ?>
<div class="margin72"></div>

<?php endif; ?>
<?php // get_template_part( 'social_share' ); ?>
<section class="page-content">
<div class="container">

<div class="breadcrumbs">
    <?php if(function_exists('bcn_display'))
    {
        bcn_display();
    }?>
</div><!-- /breadcrumbs -->
   <?php $blogCounter = 2; ?>
    

	
	<?php  if (have_posts()) : while (have_posts()) : the_post(); 
            $blogCounter++; 
            $classes_post = array('blog-post');
            if ( floor ($blogCounter/3 ) == ($blogCounter/3) ) { ?>
                <div class="row">
                <div class="col-md-12">
                <div class="blog-articles">
                    
                    <article id="post-<?php the_ID(); ?>" <?php post_class($classes_post); ?> >
                    <h2 class="blog-title"><a title="<?php echo get_post_meta($post->ID, '_aioseop_description', true); ?>" href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>

                    <ul class="blog-date">
                        <li><i class="fa fa-user"></i><?php the_author_posts_link();//the_author(); ?> </li>
                        <li><i class="fa fa-calendar"></i> <?php  the_time( 'l jS F Y' ); ?></li>
                    
                    
                    </ul>
                        <div class="authPic">
                            <?php   $author_full_name = get_the_author_meta( 'display_name' );     ?>
                                    <?php    echo sibra_author_image( $author_full_name ); ?>

                          </div>
                    <?php the_excerpt(); ?>

                    <div class="blog-button"><a href="<?php the_permalink() ?>"><?php _e('Continue Reading', 'match')?></a></div>

                    </article> <!-- /article -->
        </div> <!-- /blog-articles -->
        </div> <!-- /col-md-12 --> 
        </div> <!-- /row --> 
        
            
    <?php } else { ?>
        
        <?php if ( floor (($blogCounter-1)/3 ) == (($blogCounter-1)/3 ) ) { ?>
        
          <div class="row">
                <?php } ?>
                <div class="col-md-6">
                    <div class="blog-articles">

                        <article id="post-<?php the_ID(); ?>" <?php post_class($classes_post); ?> >
                            <h4 class="blog-title"><a title="<?php echo get_post_meta($post->ID, '_aioseop_description', true); ?>" href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>

                            <ul class="blog-date">
                                <li><i class="fa fa-user"></i> <?php the_author_posts_link();//the_author(); ?> </li>
                                <li><i class="fa fa-calendar"></i> <?php the_time( 'D jS M Y' ); ?></li>
                            </ul>
                            <div class="authPic">
                               <?php   $author_full_name = get_the_author_meta( 'display_name' );     ?>
                                    <?php    echo sibra_author_image( $author_full_name ); ?>

                              </div> 

                            <?php the_excerpt(); ?>

                            <div class="blog-button"><a href="<?php the_permalink() ?>"><?php _e('Continue Reading', 'match')?></a></div>

                            </article><!-- /article -->

                    </div> <!-- /blog-articles -->
                </div> <!-- /col-md-6 -->
                <?php if ( floor (($blogCounter-2)/3 ) == (($blogCounter-2)/3 ) ) { ?>
            </div> <!-- /row --> 
    <?php } ?> 
    <?php } ?>
<?php endwhile; endif; ?>

      <?php $count_posts = wp_count_posts('post'); ?>

<?php if(function_exists('mt_pagenavi') && ( get_option('posts_per_page') < $count_posts->publish ) ) : ?>

      <?php mt_pagenavi();  ?>



	<div class="margin72">
	</div><!--.margin72-->
        
	<?php else : ?>

            <ul class="other-entries">
			<li class="newer-entries"><span><?php previous_posts_link(__('Previous', 'match')); ?></span></li>
            <li class="older-entries"><span><?php next_posts_link(__('Next', 'match')); ?></span></li>
          </ul>
      
<?php endif; ?>




<?php //get_sidebar(); ?>



<?php //echo do_shortcode('[related]'); ?>

</div><!--.container-->

</section><!-- section.page-content-->


</div><!--end main-->
<?php get_footer(); ?>


