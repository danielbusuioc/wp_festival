<?php
/**
 * Builds our admin page.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'asura_create_menu' ) ) {
	add_action( 'admin_menu', 'asura_create_menu' );
	/**
	 * Adds our "Asura" dashboard menu item
	 *
	 */
	function asura_create_menu() {
		$asura_page = add_theme_page( 'Asura', 'Asura', apply_filters( 'asura_dashboard_page_capability', 'edit_theme_options' ), 'asura-options', 'asura_settings_page' );
		add_action( "admin_print_styles-$asura_page", 'asura_options_styles' );
	}
}

if ( ! function_exists( 'asura_options_styles' ) ) {
	/**
	 * Adds any necessary scripts to the Asura dashboard page
	 *
	 */
	function asura_options_styles() {
		wp_enqueue_style( 'asura-options', get_template_directory_uri() . '/css/admin/admin-style.css', array(), ASURA_VERSION );
	}
}

if ( ! function_exists( 'asura_settings_page' ) ) {
	/**
	 * Builds the content of our Asura dashboard page
	 *
	 */
	function asura_settings_page() {
		?>
		<div class="wrap">
			<div class="metabox-holder">
				<div class="asura-masthead clearfix">
					<div class="asura-container">
						<div class="asura-title">
							<a href="<?php echo esc_url(ASURA_THEME_URL); ?>" target="_blank"><?php esc_html_e( 'Asura', 'asura' ); ?></a> <span class="asura-version"><?php echo ASURA_VERSION; ?></span>
						</div>
						<div class="asura-masthead-links">
							<?php if ( ! defined( 'ASURA_PREMIUM_VERSION' ) ) : ?>
								<a class="asura-masthead-links-bold" href="<?php echo esc_url(ASURA_THEME_URL); ?>" target="_blank"><?php esc_html_e( 'Premium', 'asura' );?></a>
							<?php endif; ?>
							<a href="<?php echo esc_url(ASURA_WPKOI_AUTHOR_URL); ?>" target="_blank"><?php esc_html_e( 'WPKoi', 'asura' ); ?></a>
                            <a href="<?php echo esc_url(ASURA_DOCUMENTATION); ?>" target="_blank"><?php esc_html_e( 'Documentation', 'asura' ); ?></a>
						</div>
					</div>
				</div>

				<?php
				/**
				 * asura_dashboard_after_header hook.
				 *
				 */
				 do_action( 'asura_dashboard_after_header' );
				 ?>

				<div class="asura-container">
					<div class="postbox-container clearfix" style="float: none;">
						<div class="grid-container grid-parent">

							<?php
							/**
							 * asura_dashboard_inside_container hook.
							 *
							 */
							 do_action( 'asura_dashboard_inside_container' );
							 ?>

							<div class="form-metabox grid-70" style="padding-left: 0;">
								<h2 style="height:0;margin:0;"><!-- admin notices below this element --></h2>
								<form method="post" action="options.php">
									<?php settings_fields( 'asura-settings-group' ); ?>
									<?php do_settings_sections( 'asura-settings-group' ); ?>
									<div class="customize-button hide-on-desktop">
										<?php
										printf( '<a id="asura_customize_button" class="button button-primary" href="%1$s">%2$s</a>',
											esc_url( admin_url( 'customize.php' ) ),
											esc_html__( 'Customize', 'asura' )
										);
										?>
									</div>

									<?php
									/**
									 * asura_inside_options_form hook.
									 *
									 */
									 do_action( 'asura_inside_options_form' );
									 ?>
								</form>

								<?php
								$modules = array(
									'Backgrounds' => array(
											'url' => ASURA_THEME_URL,
									),
									'Blog' => array(
											'url' => ASURA_THEME_URL,
									),
									'Colors' => array(
											'url' => ASURA_THEME_URL,
									),
									'Copyright' => array(
											'url' => ASURA_THEME_URL,
									),
									'Disable Elements' => array(
											'url' => ASURA_THEME_URL,
									),
									'Demo Import' => array(
											'url' => ASURA_THEME_URL,
									),
									'Hooks' => array(
											'url' => ASURA_THEME_URL,
									),
									'Import / Export' => array(
											'url' => ASURA_THEME_URL,
									),
									'Menu Plus' => array(
											'url' => ASURA_THEME_URL,
									),
									'Page Header' => array(
											'url' => ASURA_THEME_URL,
									),
									'Secondary Nav' => array(
											'url' => ASURA_THEME_URL,
									),
									'Spacing' => array(
											'url' => ASURA_THEME_URL,
									),
									'Typography' => array(
											'url' => ASURA_THEME_URL,
									),
									'Elementor Addon' => array(
											'url' => ASURA_THEME_URL,
									)
								);

								if ( ! defined( 'ASURA_PREMIUM_VERSION' ) ) : ?>
									<div class="postbox asura-metabox">
										<h3 class="hndle"><?php esc_html_e( 'Premium Modules', 'asura' ); ?></h3>
										<div class="inside" style="margin:0;padding:0;">
											<div class="premium-addons">
												<?php foreach( $modules as $module => $info ) { ?>
												<div class="add-on activated asura-clear addon-container grid-parent">
													<div class="addon-name column-addon-name" style="">
														<a href="<?php echo esc_url( $info[ 'url' ] ); ?>" target="_blank"><?php echo esc_html( $module ); ?></a>
													</div>
													<div class="addon-action addon-addon-action" style="text-align:right;">
														<a href="<?php echo esc_url( $info[ 'url' ] ); ?>" target="_blank"><?php esc_html_e( 'More info', 'asura' ); ?></a>
													</div>
												</div>
												<div class="asura-clear"></div>
												<?php } ?>
											</div>
										</div>
									</div>
								<?php
								endif;

								/**
								 * asura_options_items hook.
								 *
								 */
								do_action( 'asura_options_items' );
								?>
							</div>

							<div class="asura-right-sidebar grid-30" style="padding-right: 0;">
								<div class="customize-button hide-on-mobile">
									<?php
									printf( '<a id="asura_customize_button" class="button button-primary" href="%1$s">%2$s</a>',
										esc_url( admin_url( 'customize.php' ) ),
										esc_html__( 'Customize', 'asura' )
									);
									?>
								</div>

								<?php
								/**
								 * asura_admin_right_panel hook.
								 *
								 */
								 do_action( 'asura_admin_right_panel' );

								  ?>
                                
                                <div class="wpkoi-doc">
                                	<h3><?php esc_html_e( 'Asura documentation', 'asura' ); ?></h3>
                                	<p><?php esc_html_e( 'If You`ve stuck, the documentation may help on WPKoi.com', 'asura' ); ?></p>
                                    <a href="<?php echo esc_url(ASURA_DOCUMENTATION); ?>" class="wpkoi-admin-button" target="_blank"><?php esc_html_e( 'Asura documentation', 'asura' ); ?></a>
                                </div>
                                
                                <div class="wpkoi-social">
                                	<h3><?php esc_html_e( 'WPKoi on Facebook', 'asura' ); ?></h3>
                                	<p><?php esc_html_e( 'If You want to get useful info about WordPress and the theme, follow WPKoi on Facebook.', 'asura' ); ?></p>
                                    <a href="<?php echo esc_url(ASURA_WPKOI_SOCIAL_URL); ?>" class="wpkoi-admin-button" target="_blank"><?php esc_html_e( 'Go to Facebook', 'asura' ); ?></a>
                                </div>
                                
                                <div class="wpkoi-review">
                                	<h3><?php esc_html_e( 'Help with You review', 'asura' ); ?></h3>
                                	<p><?php esc_html_e( 'If You like Asura theme, show it to the world with Your review. Your feedback helps a lot.', 'asura' ); ?></p>
                                    <a href="<?php echo esc_url(ASURA_WORDPRESS_REVIEW); ?>" class="wpkoi-admin-button" target="_blank"><?php esc_html_e( 'Add my review', 'asura' ); ?></a>
                                </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}

if ( ! function_exists( 'asura_admin_errors' ) ) {
	add_action( 'admin_notices', 'asura_admin_errors' );
	/**
	 * Add our admin notices
	 *
	 */
	function asura_admin_errors() {
		$screen = get_current_screen();

		if ( 'appearance_page_asura-options' !== $screen->base ) {
			return;
		}

		if ( isset( $_GET['settings-updated'] ) && 'true' == $_GET['settings-updated'] ) {
			 add_settings_error( 'asura-notices', 'true', esc_html__( 'Settings saved.', 'asura' ), 'updated' );
		}

		if ( isset( $_GET['status'] ) && 'imported' == $_GET['status'] ) {
			 add_settings_error( 'asura-notices', 'imported', esc_html__( 'Import successful.', 'asura' ), 'updated' );
		}

		if ( isset( $_GET['status'] ) && 'reset' == $_GET['status'] ) {
			 add_settings_error( 'asura-notices', 'reset', esc_html__( 'Settings removed.', 'asura' ), 'updated' );
		}

		settings_errors( 'asura-notices' );
	}
}
