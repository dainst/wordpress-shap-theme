<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template/hierarchy/#single-post
 *
 * @package Simplelin
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

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

			<?php endwhile; ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>