<?php
/**
 * @package WordPress
 * @subpackage Lawyers
 */

get_header(); ?>

<?php

$mt_page_bkg_img = get_post_meta(get_option('page_for_posts'), "mt_page_bkg_img", true);
$all_posts = $all_pages = array();

$search = new WP_Query( array('s' => $s, 'posts_per_page'=>-1, 'post_type'=>'any') );

?>

<div class="page-head" style="background-image:url(<?php echo $mt_page_bkg_img ?>);">
<div class="vertical">

<div class="container">

<h1 class="page-title"><?php _e('Search Results', 'match');?></h1>
<p><?php _e('for', 'match');?> "<?php the_search_query(); ?>"</p>

<div class="gannons-search-sm"><?php get_search_form(); ?></div>

</div><!--.container-->
</div><!--.vertical-->
</div><!--.page-head-->
  <?php get_template_part( 'top-fixed-menu' ); ?> 
<section class="page-content searchResults">
<div class="container">

<div class="row">
<div style="margin-top: 40px" class="col-md-12">

<?php if ($search->have_posts()) : ?>
	<?php while ($search->have_posts()) : $search->the_post(); ?>
		<?php if ( $post->post_type == 'post' ) {
			$all_posts[] = array('title' => the_title('', '', false), 'link' => get_permalink() );
		} else if ( $post->post_type == 'page') {
			$all_pages[] = array('title' => the_title('', '', false), 'link' => get_permalink() );
		}
		?>		
	<?php endwhile; ?>
<?php endif; ?>


    <div class="row">
		<div class="col-md-12">
			<div class="tabs">
				<ul style="width: 100%; list-style-image: none;">
    				<li class="grey-bg"><a href="#tabs-1">Services' search results</a></li>
				    <li class="grey-bg"><a href="#tabs-2">Insights' search results</a></li>
				</ul>
				<div id="tabs-1">
					<ul>
						<?php foreach ($all_pages as $page) {
							echo "<li><a href=\"{$page['link']}\">{$page['title']}</a></li>";
						} ?>
					</ul>
				</div>
				<div id="tabs-2">
					<ul>
						<?php foreach ($all_posts as $post) {
							echo "<li><a href=\"{$post['link']}\">{$post['title']}</a></li>";
						} ?>
			
					</ul>
				</div>
		
			</div>
		</div>
	</div>

<?php /*if(function_exists('mt_pagenavi') ) : ?>

<div class="row">
	<div class="col-md-12">
		<div class="margin72">

		<?php mt_pagenavi();  ?>
		
		</div><!--.margin72-->
	</div>
</div>
      
<?php endif; */?>

<?php /*else : ?>

<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'match' ); ?></p>


<?php endif;  */?>


</div><!--.col-md-8-->


<?php //get_sidebar(); ?>

</div><!--.row-->

</div><!--.container-->

</section><!--.page-content-->


</div><!--end main-->
<?php get_footer(); ?>
