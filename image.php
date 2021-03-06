<?php
/**
 * The template for displaying image attachments
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
//get_template_part( 'template-parts/header/img', 'details' );

?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php
				// Start the loop.
			while ( have_posts() ) :
				the_post();
				?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<div class="entry-content">

						<figure class="entry-attachment wp-block-image">
						<?php
							/**
							 * Filter the default twentynineteen image attachment size.
							 *
							 * @since Twenty Sixteen 1.0
							 *
							 * @param string $image_size Image size. Default 'large'.
							 */
							$image_size = apply_filters( 'twentynineteen_attachment_size', 'full' );

							echo wp_get_attachment_image( get_the_ID(), $image_size );
						?>

							<figcaption class="wp-caption-text"><?php the_excerpt(); ?></figcaption>

						</figure><!-- .entry-attachment -->

						<?php
						the_content();
						wp_link_pages(
							array(
								'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentynineteen' ) . '</span>',
								'after'       => '</div>',
								'link_before' => '<span>',
								'link_after'  => '</span>',
								'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentynineteen' ) . ' </span>%',
								'separator'   => '<span class="screen-reader-text">, </span>',
							)
						);
						?>
					</div><!-- .entry-content -->

					<footer class="entry-footer">
					<?php
						// Retrieve attachment metadata.
						$metadata = wp_get_attachment_metadata();
					if ( $metadata ) {
						printf(
							'<span class="full-size-link"><span class="screen-reader-text">%1$s</span><a href="%2$s">%3$s &times; %4$s</a></span>',
							_x( 'Full size', 'Used before full size attachment link.', 'twentynineteen' ),
							esc_url( wp_get_attachment_url() ),
							absint( $metadata['width'] ),
							absint( $metadata['height'] )
						);
					}
					?>
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					<ul><?php _e('Thematic Category','shap-theme-text'); ?><?php echo get_the_term_list( $post->ID, 'category', '<li class="item">', ', ', '</li>' ) ?></ul>
					<ul><?php _e('Collection','shap-theme-text'); ?><?php echo get_the_term_list( $post->ID, 'shap_pool', '<li class="item">', ', ', '</li>' ) ?></ul>
					<ul><?php _e('Place','shap-theme-text'); ?><?php echo get_the_term_list( $post->ID, 'shap_places', '<li class="item">', ', ', '</li>' ) ?></ul>
					<ul><?php _e('Time Period','shap-theme-text'); ?><?php echo get_the_term_list( $post->ID, 'shap_time', '<li class="item">', ', ', '</li>' ) ?></ul>
					<ul><?php _e('Keywords','shap-theme-text'); ?><?php echo get_the_term_list( $post->ID, 'post_tag', '<li class="item">', ', ', '</li>' ) ?></ul>



						<?php twentynineteen_entry_footer(); ?>

					</footer><!-- .entry-footer -->
				</article><!-- #post-## -->

				<?php
				// Parent post navigation.
				the_post_navigation(
					array(
						'prev_text' => _x( '<span class="meta-nav">Published in</span><br><span class="post-title">%title</span>', 'Parent post link', 'twentynineteen' ),
					)
				);


				endwhile;
			?>

		</main><!-- .site-main -->
	</section><!-- .content-area -->
<!-- .site-filters</div> -->
<?php
get_footer();
