<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>

<div class="home-row image-filters-enabled">
	<?php

	/* Get all sticky posts */
	$sticky = get_option( 'sticky_posts' );

	/* Sort the stickies with the newest ones at the top */
	rsort( $sticky );

	/* Get the 5 newest stickies (change 5 for a different number) */
	$sticky = array_slice( $sticky, 0, 1 );

	$latest_blog_posts = new WP_Query( array( 'posts_per_page' => 1, 'post__in' => $sticky ) );

	if ( $latest_blog_posts->have_posts() ) : while ( $latest_blog_posts->have_posts() ) : $latest_blog_posts->the_post(); ?>

<?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
 <div class="home-column left" style="background: url('<?php echo $backgroundImg[0]; ?>'); background-position: center;
 background-repeat: no-repeat;
 background-size: cover;">

<?php
  //  get_template_part( 'template-parts/content/content', 'excerptshap' );

 ?>
 	 <h2 class="entry-title-home"><a href="?page_id=17" rel="bookmark">Read our stories </a></h2>

 </div>

 <?php endwhile; endif; ?>
 <div class="home-column middle" style="background:url('http://thecursor.net/shap/wp-content/uploads/2019/05/mm_d_11_11_09-web2.jpg'); background-position: center; background-repeat: no-repeat; background-size: cover;">
	 <h2 class="entry-title-home"><a href="?page_id=19" rel="bookmark">Browse our photo archive </a></h2>
</div>
 <div class="home-column right" style="background:url('http://thecursor.net/shap/wp-content/uploads/2019/04/map-placeholder-01.jpg'); background-position: center; background-repeat: no-repeat; background-size: cover;">
	 <h2 class="entry-title-home"><a href="?page_id=829" rel="bookmark">Discover Syrian Heritage</a></h2>
 </div>
</div>





<?php
get_footer();
