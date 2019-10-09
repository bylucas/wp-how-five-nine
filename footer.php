<footer class="site-footer outer" role="contentinfo">
	
	<div class="site-footer-content inner">
		<section class="copyright">
			<?php do_action( 'phone1st_credits' ); ?>
				<?php echo date('Y'); ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<?php bloginfo( 'name' ); ?>
					</a>
		</section>

		<?php get_template_part('templates/footer-menu'); ?>
	</div>
</footer>
</div><!-- #page -->
	<?php wp_footer(); ?>
</body>
</html>