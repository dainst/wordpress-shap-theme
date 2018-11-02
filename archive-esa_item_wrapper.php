<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Simplelin
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php if ( have_posts() ) : ?>
				<section class="archive-area">
					<header class="page-header">
						<?php
							the_archive_title( '<h1 class="page-title">', '</h1>' );
							the_archive_description( '<div class="taxonomy-description">', '</div>' );
						?>
					</header><!-- .page-header -->
				</section><!-- .archive-area -->

				<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post(); ?>

                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <div class="post-inner-content">


                            <div class="entry-content">
                                <?php the_excerpt(); ?>

                            </div><!-- .entry-content -->
                        </div><!-- .post-inner-content -->
                        </article><!-- #post-## -->
                    <?php
                    endwhile;

					else :

						get_template_part( 'template-parts', 'none' );

					endif;
				?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>