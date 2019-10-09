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

					<p>A <em>no thrills</em>, <em>down to earth</em> theme based on the <strong>Casper</strong> theme from the popular <strong>casper</strong> blogging platform. This theme is built for blogging with a <em>simple design</em> and <em>very user-friendly fonts</em> which makes <em>easy reading</em>.</p>

					<h4>Post Meta - SEO</h4>
					<p>SEO post meta:</p>

					<p>mm_seo_desc
						<br> mm_seo_keywords
						<br> mm_seo_title
					</p>

					<p>The reading time to be set by user with post-meta tag:</p>

					<p>mm_reading_time</p>

					<blockquote>
						<p>To Do: Set the reading time to automatic</p>
					</blockquote>

					<h4>Classes</h4>
					<p>Tables</p>

					<p>.table-bordered
						<br> .table-striped
						<br> .table-condensed
					</p>

					<h4>Full page images</h4>
					<p>Full page images are achieved with the following markdown <code>#full</code></p>
					<pre><code>[img](some/image/file.jpg#full)</code></pre>

					<h4>Other Images</h4>

					<p>img-framed
						<br> img-circle
					</p>



					<h4>Prism js</h4>

					<p>Prism is an alternative code to Google code. The theme has a copy of the js and css files in the theme. Call using</p>
					<pre><code>pre/code class="langauge-css"</code></pre>
					<p>Change the css for the required code type.</p>

				</div>
				<!-- .col -->
				<div class="col about-text">
					<img src="<?php echo trailingslashit( get_template_directory_uri() ); ?>screenshot.png" alt="wp-casper screenshot" width="250" height="250" />

					<h4>The Author Page</h4>
					<p>You can set an image for the <em>Author page background</em> in the <em>Profile</em> area of the <em>admin</em> section.</p>


					<h4>Post Images</h4>
					<p>The post images don't use the <em>alignleft, alignright, aligncenter</em> and <em>alignnone</em>. The images are set to be centered so try and use the full width if possible for more effect.</p>
					<h4>Sitemap</h4>
					<p>Enable this page via the <em>page templates</em> when creating a new page. Add some content <em>eg a sitemap introduction</em>, add a <em>post thumbnail</em> if you wish. When viewed the page should show all your <em>posts</em>, <em>pages</em>, <em>categories</em> etc. This sitemap is a <em>user friendly quick access to your site links</em> and is not a substitute for a <em>search engine xml sitemap</em>, which are usually created via a plugin eg.<em>'Yoast SEO'</em></p>

					<h4>Finally</h4>
					<p>Information about this theme is also shown in <em>readme.txt</em> and <em>readme.md</em> files within the theme folder. The <em>readme.md</em> can be viewed on the github <a href="https://github.com/bylucas/wp-casper">wp-casper</a> theme page.</p>

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
						<a class="button" href="https://howardlucas.io/" target="_blank">
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
