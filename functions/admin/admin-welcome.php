<?php
/**
* Handles the theme welcome/info screen in the admin.
* casper 1.0.0
*/
// Hook into the admin menu.
add_action( 'admin_menu', 'casper_admin_menu' );
/**
* Adds a custom themes sub-page.
*/
function casper_admin_menu() {
$theme = wp_get_theme( get_template() );
$page = add_theme_page( $theme->display( 'Name' ), $theme->display( 'Name' ), 'edit_theme_options', 'casper', 'casper_welcome_page' );
if ( $page )
add_action( "admin_head-{$page}", 'casper_welcome_page_css' );
}
/**
* Outputs some custom CSS to the welcome screen.
*/
function casper_welcome_page_css() { ?>
	<style type="text/css" media="screen">
		.appearance_page_casper .two-col {
			clear: both;
		}
		
		.appearance_page_casper .col .dashicons {
			margin-top: 3px;
			margin-right: 4px;
		}
		
		.about-wrap h1 {
			text-align: left;
		}
		
		.about-wrap p {
			font-size: 16px;
			margin-top: 10px;
			text-align: left;
		}
		
		.about-wrap h4 {
			margin-bottom: 0;
			text-align: left;
		}
		
		.about-wrap {
			text-align: center;
		}
		
		.about-wrap .about-text {
			margin: 1em 0;
		}
		
		.col h3 {
			text-align: left;
		}

	</style>
	<?php }
/**
* Outputs the custom admin screen.
*/
function casper_welcome_page() {
$theme = wp_get_theme( get_template() ); ?>
		<div class="wrap about-wrap">
			<h1><?php echo $theme->display( 'Name' ); ?></h1>
			<div class="two-col">
				<div class="col about-text">

					<p>This will hold Firestore Subscriptions</p>

					<h4>Subscriptions</h4>

					<ul>
						<li>One</li>
						<li>two</li>
						<li>three</li>
						<li>three</li>
					</ul>
					

					
				</div>
				<!-- .col -->
				<div class="col about-text">
					<img src="<?php echo trailingslashit( get_template_directory_uri() ); ?>screenshot.png" alt="wp-casper screenshot" width="250" height="250" />

					<h4>Some other information</h4>
					<p>Something else will be here</p>


					

				</div>
				<!-- .col -->
			</div>
			<!-- .two-col -->
			<div class="two-col">
				<div class="col">
					<h3><i class="dashicons dashicons-sos"></i><?php esc_html_e( 'Help &amp; Support', 'casper' ); ?></h3>
					<p>
						<?php esc_html_e( 'Contact via the howardl website', 'casper' ); ?>
					</p>
					<p>
						<a class="button" href="" target="_blank">
							<?php esc_html_e( 'Support', 'casper' ); ?>
						</a>
					</p>
				</div>
				<!-- .col -->
				<div class="col">
					<h3><i class="dashicons dashicons-admin-appearance"></i><?php esc_html_e( 'More Themes', 'casper' ); ?></h3>
					<p>
						<?php esc_html_e( 'More themes by howardlucas.io can be found here', 'casper' ); ?>
					</p>
					<p>
						<a class="button" href="https://github.com/bylucas/" target="_blank">
							<?php esc_html_e( 'View More Themes', 'casper' ); ?>
						</a>
					</p>
				</div>
				<!-- .col -->
			</div>
			<!-- .two-col -->
		</div>
		<!-- .wrap -->
		<?php }
