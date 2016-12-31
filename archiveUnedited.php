<?php
/**
 * @package WordPress
 * @subpackage Lawyers
 */

get_header();
?>

<?php

$mt_page_bkg_img = get_post_meta(get_option('page_for_posts'), "mt_page_bkg_img", true);
   
  ?>

<div class="page-head" style="background-image:url(<?php echo $mt_page_bkg_img ?>);">
<div class="vertical">

<div class="container">

<?php if (have_posts()) : ?>

	<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
	<?php /* If this is a category archive */ if (is_category()) { ?>
    <h2 class="page-title"><?php _e('Archive for', 'match')?> <?php single_cat_title(); ?></h2>
	<p> </p>
	<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
    <h2 class="page-title"><?php _e('Posts Tagged', 'match')?> &#8216;<?php single_tag_title(); ?>&#8217;</h2>
	<p> </p>
	<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
    <h2 class="page-title"><?php _e('Archive for', 'match')?> <?php the_time('F jS, Y'); ?></h2>
	<p> </p>
	<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
    <h2 class="page-title"><?php _e('Archive for', 'match')?> <?php the_time('F, Y'); ?></h2>
	<p> </p>
	<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
    <h2 class="page-title"><?php _e('Archive for', 'match')?> <?php the_time('Y'); ?></h2>
	<p> </p>
	<?php /* If this is an author archive */ } elseif (is_author()) { ?>
    <h2 class="page-title"><?php _e('Author Archive', 'match')?> </h2>
	<p> </p>
	<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
    <h2 class="page-title"><?php _e('Blog Archives', 'match')?> </h2>
	<p> </p>
	<?php } ?>

</div><!--.container-->
</div><!--.vertical-->
</div><!--.page-head-->
  <?php get_template_part( 'top-fixed-menu' ); ?> 
<section class="page-content">
<div class="container">

<div class="row">
<div class="col-md-8">
<div class="blog-articles">

<?php 
		
while (have_posts()) : the_post(); ?>


<article class="blog-post">

<?php if ( has_post_thumbnail($post->ID) ){ ?>

<?php the_post_thumbnail('blog-image', array('class'=> 'img-responsive', 'alt' => ''.get_the_title().'', 'title' => ''.get_the_title().'')); ?>

<?php } ?>

<h4 class="blog-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>

<ul class="blog-date">
<li><i class="fa fa-calendar"></i> <?php the_time('F jS, Y') ?></li>
<li><i class="fa fa-user"></i> <?php the_author(); ?> </li>
<li><i class="fa fa-comments"></i> <?php comments_popup_link(__('No comments', 'match'), __('1 Comment', 'match'), __('% Comments', 'match')); ?></li>
</ul>

<?php the_excerpt(); ?>

<div class="blog-button"><a href="<?php the_permalink() ?>"><?php _e('Continue Reading', 'match')?></a></div>

</article>

<?php endwhile; endif; ?>

</div><!--.blog-articles-->

<?php $count_posts = wp_count_posts('post'); ?>

<?php if(function_exists('mt_pagenavi') && ( get_option('posts_per_page') < $count_posts->publish ) ) : ?>

	<div class="margin72">

	<?php mt_pagenavi();  ?>
        
	</div><!--.margin72-->
        
	<?php else : ?>

  <ul class="other-entries">
			<li class="newer-entries"><span><?php previous_posts_link('&laquo; Previous') ?></span></li>
            <li class="older-entries"><span><?php next_posts_link('Next &raquo;') ?></span></li>
          </ul>
      
<?php endif; ?>

</div><!--.col-md-8-->


<?php get_sidebar(); ?>

</div><!--.row-->

</div><!--.container-->

</section><!--.page-content-->


</div><!--end main-->
<?php get_footer(); ?>