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
 <div class="home-column middle" style="background:url('http://thecursor.net/shap/wp-content/uploads/2019/02/Presse-2011-002-01-0680-A-Hajjar-cmyk2.jpg') no-repeat;"><h2 class="entry-title-home"><a href="" rel="bookmark">Browse our photo archive </a></h2></div>
 <div class="home-column right" style="background:url('http://thecursor.net/shap/wp-content/uploads/2019/04/map-placeholder-01.jpg') no-repeat;"><h2 class="entry-title-home"><a href="" rel="bookmark">Browse our places</a></h2></div>
</div>





<?php
get_footer();
