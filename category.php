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
    <?php // what is this else doing here ?>
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
        <?php $srb_category = get_category( get_query_var( 'cat' ) ); ?>
        <?php $srb_cat_id = $srb_category->cat_ID; ?>
 <?php 
    //First, define your desired offset... Next, determine how many posts per page you want (we'll use WordPress's settings)
    $ppp = get_option('posts_per_page');
    $page_offset = 0; 
    //Next, detect and handle pagination...
    $page = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
        //Manually determine page query offset (offset + current page (minus one) x posts per page)
        $page_offset =  ( ($page - 1) * $ppp );
?>
    <?php $srb_args = array(        
        'offset' => $page_offset,
        'cat' => $srb_cat_id,
        'orderby'=> 'date'
            ); ?>
    <?php $srb_query = new WP_Query( $srb_args ); ?>
        <?php if ($srb_query->have_posts()) {            
        while ( $srb_query->have_posts() ) {
            $srb_query->the_post(); 
            $blogCounter++; 
            $classes_post = array('blog-post');
            if ( floor ($blogCounter/3 ) == ($blogCounter/3) ) { ?>
             <div class="row">
                <div class="col-md-12">
                    <div class="blog-articles">                    
                        <article id="post-<?php the_ID(); ?>" <?php post_class($classes_post); ?> >
                        <h2 class="blog-title"><a title="<?php echo get_post_meta($post->ID, '_aioseop_description', true); ?>" href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                         <?php include( locate_template( 'insights_content_header.php', false, false ) ); ?>

                        <?php the_excerpt(); ?>
                        <div class="blog-button"><a href="<?php the_permalink() ?>"><?php _e('Continue Reading', 'match')?></a></div>
                        </article> <!-- /article -->
                    </div> <!-- /blog-articles -->
                </div> <!-- /col-md-12 --> 
            </div> <!-- /row --> 
    <?php } 
    else { ?>        
        <?php if ( floor (($blogCounter-1)/3 ) == (($blogCounter-1)/3 ) ) { ?>
         <div class="row">
                <?php } ?>
                <div class="col-md-6">
                    <div class="blog-articles">
                        <article id="post-<?php the_ID(); ?>" <?php post_class($classes_post); ?> >
                            <h2 class="blog-title"><a title="<?php echo get_post_meta($post->ID, '_aioseop_description', true); ?>" href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                            <?php include( locate_template( 'insights_content_header.php', false, false ) ); ?>   
                                <?php the_excerpt(); ?>
                                    <div class="blog-button"><a href="<?php the_permalink() ?>"><?php _e('Continue Reading', 'match')?></a></div>
                        </article><!-- /article -->
                    </div> <!-- /blog-articles -->
                </div> <!-- /col-md-6 -->
                <?php if ( floor (($blogCounter-2)/3 ) == (($blogCounter-2)/3 ) ) { ?>
                    </div> <!-- /row --> 
                <?php } ?> 
    <?php } ?>
        
   <?php }  } ?>
            
            
<?php /* start of pagingation. */ ?>            
<?php if ( function_exists('base_pagination') ) {    
    base_pagination(); 
    
} else {
        if ( is_paged() ) { ?>
                <div class="navigation clearfix">
                    <div class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></div>
                    <div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div>
                </div>
        <?php }  else { ?>

            <h2 class="post-title">Sorry, no posts have been found.</h2>
            <div class="entry">
                <p>No posts have been found...</p>
            </div>
        <?php } ?>
     <?php } ?>
<?php /* end of pagingation. */ ?>
      <?php $count_posts = wp_count_posts('post'); ?>

<?php if(function_exists('mt_pagenavi') && ( get_option('posts_per_page') < $count_posts->publish ) ) : ?>
      <?php // mt_pagenavi();  ?>
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
<?php   wp_reset_postdata(); ?>    
</div><!--end main-->
<?php get_footer(); ?>


