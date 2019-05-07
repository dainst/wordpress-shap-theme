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
get_template_part( 'template-parts/header/site', 'filter' );

?>
	<section id="primary" class="content-area">
		<main id="main" class="site-main">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="entry-content">

			<?php

			$ids = get_posts(
					array(
							'post_type'      => 'attachment',
							'post_mime_type' => 'image',
							'post_status'    => 'inherit',
							'posts_per_page' => -1,
							'fields'         => 'ids',
							'tax_query' => array(
																	array(
																		'taxonomy' => 'places',
																		'field'    => 'slug',
																		'terms'    => 'aleppo',
																	),
																),
					)
			);


			$images = array();
			foreach ( $ids as $id )
					$images[]= $id;



			$ids_for_JIG = $images;
			$ids_for_JIG = implode(',',$ids_for_JIG);




			$args = array(
			        'post_type' => 'attachment',
			        'post_mime_type' => 'image',
			        'orderby' => 'post_date',
			        'order' => 'desc',
			        'posts_per_page' => '30',
			        'post_status'    => 'inherit'
			         );
	$loop = new WP_Query( $args );

			/* Start the Loop */
		//	while ( $loop->have_posts() ) : $loop->the_post();
get_jig(array('ids' => $ids_for_JIG));

			//	get_template_part( 'template-parts/content/content', 'gallery' );



	//		endwhile; // End of the loop.


			?>
		</div>

		</main><!-- #main -->
		</article>
	</section><!-- #primary -->
</div>
<?php
get_footer();
