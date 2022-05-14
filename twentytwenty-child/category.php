<?php

/**
 * Custom page template for archives
 */

get_header(); ?>

<main id="site-content" role="main">

	<?php if ( is_active_sidebar( 'feature_box' ) ) :
	dynamic_sidebar( 'feature_box' );
	endif; ?>
	
	<?php
	
	if ( is_archive() && ! have_posts() ) {
		$archive_title = __( 'Nothing Found', 'twentytwenty' );
	} else {
		$archive_title    = get_the_archive_title();
		$archive_subtitle = get_the_archive_description();
	}

	?>

		<header class="archive-header has-text-align-center header-footer-group">

			<div class="archive-header-inner section-inner medium">

				<?php if ( $archive_title ) { ?>
					<h1 class="archive-title"><?php echo wp_kses_post( $archive_title ); ?></h1>
				<?php } ?>

				<?php if ( $archive_subtitle ) { ?>
					<div class="archive-subtitle section-inner thin max-percentage intro-text"><?php echo wp_kses_post( wpautop( $archive_subtitle ) ); ?></div>
				<?php } ?>

			</div><!-- .archive-header-inner -->

		</header><!-- .archive-header -->

	<div class="custom-archive">
	
		<?php

		if ( have_posts() ) {

			while ( have_posts() ) {

				the_post();

				get_template_part( 'template-parts/content', get_post_type() );

			}
		}
		?>

		<?php get_template_part( 'template-parts/pagination' ); ?>
		
	</div><!-- .custom-archive -->

</main><!-- #site-content -->

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php get_footer();
