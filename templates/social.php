<?php
// ============================
// Social Menu Template
// ============================
?>

	<div class="social-wrap">
		<div id="social-navigation" class="social-links">


			<a class="social-link social-link-fb" href="https://www.linkedin.com/in/bylucas/" target="_blank" rel="noopener">
				<?php get_template_part('assets/icons/linkedin'); ?>
			</a>

			<a class="social-link social-link-fb" href="https://www.behance.net/howardl" target="_blank" rel="noopener">
				<?php get_template_part('assets/icons/behance'); ?>
			</a>

			<a class="social-link social-link-fb" href="https://github.com/bylucas" target="_blank" rel="noopener">
				<?php get_template_part('assets/icons/github'); ?>
			</a>

		</div>
		<section id="app-social-modal">

			<div id="show-modal" class="social-subscribe" @click="showModal = true">Subscribe</div>
			<!-- use the modal component, pass in the prop -->
			<modal v-if="showModal" @close="showModal = false">
				<div slot="body">
					<contact></contact>
				</div>
			</modal>
		</section>

	</div>

