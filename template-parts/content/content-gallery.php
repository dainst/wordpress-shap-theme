<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( ! twentynineteen_can_show_post_thumbnail() ) : ?>
	<header class="entry-header">
		<?php get_template_part( 'template-parts/header/entry', 'header' ); ?>
	</header>
	<?php endif; ?>

	<div class="entry-content">

	<?php


		   get_jig(array('ids' => $ids_for_JIG));





		//   get_jig(array('filterby' => 'category', 'l2_filterby' => 'places','l3_filterby' => 'post_tag', 'image_tags' => 'all'));
		//	get_jig(array('ids' => '$images_ids_string', 'filter_style' => 'buttons', 'image_tags' => 'all'));
		?>



		<?php
	//  get_jig(array('ids' => 'ids' => '$ids_for_JIG', 'filterby' => 'category', 'l2_filterby' => 'places','l3_filterby' => 'post_tag', 'image_tags' => 'all'));

		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'twentynineteen' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
