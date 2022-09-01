<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

	<div id="primary" <?php asura_content_class(); ?>>
		<main id="main" <?php asura_main_class(); ?>>
			<?php
			/**
			 * asura_before_main_content hook.
			 *
			 */
			do_action( 'asura_before_main_content' );
			?>

			<div class="inside-article">

				<?php
				/**
				 * asura_before_content hook.
				 *
				 *
				 * @hooked asura_featured_page_header_inside_single - 10
				 */
				do_action( 'asura_before_content' );
				?>

				<header class="entry-header">
					<h1 class="entry-title" itemprop="headline"><?php echo apply_filters( 'asura_404_title', __( 'Oops! That page can&rsquo;t be found.', 'asura' ) ); // WPCS: XSS OK. ?></h1>
				</header><!-- .entry-header -->

				<?php
				/**
				 * asura_after_entry_header hook.
				 *
				 *
				 * @hooked asura_post_image - 10
				 */
				do_action( 'asura_after_entry_header' );
				?>

				<div class="entry-content" itemprop="text">
					<?php
					echo '<p>' . apply_filters( 'asura_404_text', __( 'It looks like nothing was found at this location. Maybe try searching?', 'asura' ) ) . '</p>'; // WPCS: XSS OK.

					get_search_form();
					?>
				</div><!-- .entry-content -->

				<?php
				/**
				 * asura_after_content hook.
				 *
				 */
				do_action( 'asura_after_content' );
				?>

			</div><!-- .inside-article -->

			<?php
			/**
			 * asura_after_main_content hook.
			 *
			 */
			do_action( 'asura_after_main_content' );
			?>
		</main><!-- #main -->
	</div><!-- #primary -->

	<?php
	/**
	 * asura_after_primary_content_area hook.
	 *
	 */
	 do_action( 'asura_after_primary_content_area' );

	 asura_construct_sidebars();

get_footer();
