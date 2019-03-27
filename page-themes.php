<?php
/**
 * The template for displaying all single posts
 * Template Name: Themes Template
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>
<?php wp_list_categories('style=none'); ?>
<section id="primary" class="content-area">
	<main id="main" class="site-main">

<?php
	/**
	 * Loop through 3 most recent posts from each category
	 * @see http://codex.wordpress.org/Function_Reference/get_categories
	 */
	$do_not_duplicate = array();
	$categories = get_categories();
	foreach ( $categories as $category ) :
		$args = array(
			'cat'            => $category->term_id,
			'post_type'      => 'post',
			'posts_per_page' => 3,
			'post__not_in'   => $do_not_duplicate
		);
		$query = new WP_Query( $args );
		if ( $query->have_posts() ) : ?>

			<div class="row">
				<div class="col-sm-12">
					<h3 class="cat-title"><?php echo $category->name; ?><span></span></h3>
				</div>
			</div>

				<?php
				while ( $query->have_posts() ) :
					$query->the_post();
					$do_not_duplicate[] = get_the_id();
					?>

					<div id="post-<?php the_ID(); ?>" <?php post_class( 'row category-listing' ); ?>>
						<div class="col-sm-2">
							<div class="datebox">
								<div class="day"><?php the_time('j'); ?></div>
				 				<div class="monthyear"><?php the_time('M, Y'); ?></div>
							 </div>
						</div>
						<div class="col-sm-10">
							<h3 class="entry-title">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h3>

							<div class="cat-name">
								<?php echo $category->name; ?>
							</div>

							<?php the_excerpt(); ?>

							<a class="pull-right read-more" href="<?php the_permalink(); ?>">Read More <i class="fa fa-angle-right"></i></a>
						</div>
					</div>

				<?php endwhile; wp_reset_postdata(); ?>

				<div class="row cat-read-all">
					<div class="col-sm-12">
						<a class="pull-right" href="<?php echo get_category_link( $category->term_id ); ?>">Read All <?php echo $category->name; ?></a>
					</div>
				</div>

		<?php endif;
	endforeach; ?>
	</main><!-- #main -->
</section><!-- #primary -->

<?php
get_footer();
