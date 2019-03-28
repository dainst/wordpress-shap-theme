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

<div class="home-row">
	<?php $latest_blog_posts = new WP_Query( array( 'posts_per_page' => 1 ) );

	if ( $latest_blog_posts->have_posts() ) : while ( $latest_blog_posts->have_posts() ) : $latest_blog_posts->the_post(); ?>

<?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
 <div class="home-column left" style="background: url('<?php echo $backgroundImg[0]; ?>') no-repeat;">

<?php
    get_template_part( 'template-parts/content/content', 'excerptshap' );

 ?>

 </div>

 <?php endwhile; endif; ?>
 <div class="home-column middle"><h2 class="entry-title"><a href="" rel="bookmark">Gallery</a></h2></div>
 <div class="home-column right"><h2 class="entry-title"><a href="" rel="bookmark">Map</a></h2></div>
</div>





<?php
get_footer();
