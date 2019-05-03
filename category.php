<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
				?>

				<ul class="xiong-filters">
				    <?php
				          //This one is to display All in your category.
				          // Do not use show_option_all parameter since it includes all categories not just one your displaying
				          $args= array(
				            'include'          =>   4, //Put here ID of your category
				            'title_li'          => __('')
				          );
				        wp_list_categories( $args );
				      ?>
				      <?php
				          //This one displays subcategories of your category
				          $args= array(
				            'child_of'          =>   4, //Put here parent category
				            'title_li'          => __('')
				          );
				        wp_list_categories( $args );
				      ?>
				  </ul>

			</header><!-- .page-header -->


			<?php
			// Start the Loop.
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content/content', 'excerpt' );

				// End the loop.
			endwhile;

			// Previous/next page navigation.
			twentynineteen_the_posts_navigation();

			// If no content, include the "No posts found" template.
		else :
			get_template_part( 'template-parts/content/content', 'none' );

		endif;
		?>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
