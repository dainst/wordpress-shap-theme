<?php
/**
 * The template for displaying all single posts
 * Template Name: Themes Template 2
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
					//	twentynineteen_post_thumbnail();
					//	the_post();
					?>

		<div class="entry-header">
					<div id="content" class="site-content">


						<ul class="xiong-filters">

		      <?php
		          $args= array(
		            'show_option_all'   =>   'All Themes', //Text for button All
		            'title_li'          => __('')
		          );
		        wp_list_categories( $args );
		      ?>
		  </ul>





				<section id="primary" class="content-area">
					<main id="main" class="site-main">

						<!--LOOP  -->
						     <?php if ( have_posts() ) :?>
						      <div id="main-content" class="row">
						        <div id="inside">
						          <div class="container">

						      <?php while ( have_posts() ) : the_post(); ?>

						         <article>
						    <a class="xiong-articlebox" href="<?php the_permalink();?>">
						        <header>
						            <h3><?php the_title( );?></h3>
						            <p><em><?php the_date( 'j.n.Y'); ?> </em></p>

						            </header>
						             <p><?php the_excerpt();?></p>
						           </a>
						       </article>

						      <?php endwhile; endif; ?>


						    </div><!-- container-->
						  </div><!--inside -->
						</div>  <!--row -->

						
					</main><!-- #main -->
				</section><!-- #primary -->
</div>
</div>



				</div>
			<?php endif; ?>
		</header><!-- #masthead -->



<?php
get_footer();
