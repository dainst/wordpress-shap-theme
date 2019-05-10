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


?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'twentynineteen' ); ?></a>

		<header id="masthead" class="<?php echo is_singular() && twentynineteen_can_show_post_thumbnail() ? 'site-header featured-image' : 'site-header'; ?>">

			<div class="site-branding-container">
				<?php get_template_part( 'template-parts/header/site', 'branding' ); ?>
			</div><!-- .layout-wrap -->

			<?php if ( is_singular() && twentynineteen_can_show_post_thumbnail() ) : ?>
				<div class="site-featured-image">
					<?php
						twentynineteen_post_thumbnail();
						the_post();
					?>

		<div class="entry-header">
					<div id="content" class="site-content">


						<ul class="xiong-filters">

	      <?php
	          $args= array(
	            'show_option_all'   =>   'All Articles', //Text for button All
	            'title_li'          => __('')
	          );
	        wp_list_categories( $args );
	      ?>
	  </ul>
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

					
								<?php
								while ( $query->have_posts() ) :
									$query->the_post();
									$do_not_duplicate[] = get_the_id();
									?>

									<div id="post-<?php the_ID(); ?>" <?php post_class( 'row category-listing' ); ?>>



										<div class="col-sm-6">

											<h3 class="entry-title">
												<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
											</h3>




											<a class="pull-right read-more" href="<?php the_permalink(); ?>">Read the full story &#8250; <i class="fa fa-angle-right"></i></a>
										</div>
									</div>

								<?php endwhile; wp_reset_postdata(); ?>

								<div class="row cat-read-all">

									<div class="col-sm-6">
										<a class="pull-right" href="<?php echo get_category_link( $category->term_id ); ?>">Explore <?php echo $category->name; ?> &#8250; </a>
									</div>
								</div>

						<?php endif;
					endforeach; ?>
					</main><!-- #main -->
				</section><!-- #primary -->
</div>
</div>



				</div>
			<?php endif; ?>
		</header><!-- #masthead -->



<?php
get_footer();
