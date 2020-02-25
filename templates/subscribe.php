<div class="subscribe-area">
		<section class="call-modal">
	<div id="app-modal">
		<h3 id="show-modal" @click="showModal = true">Subscribe to <br><span><?php phone1st_call_title(); ?></span></h3>
		<p>Get the latest posts delivered right to your inbox</p>
		<!-- use the modal component, pass in the prop -->
		<modal v-if="showModal" @close="showModal = false">
			<div slot="body">
				<contact></contact>
			</div>
		</modal>
	</div>
</section>

<section class="social-area">
			<h4>Follow Howardl</h4>
		<div id="social-navigation" class="social-links">

			<a class="social-link social-link-fb" href="https://www.facebook.com/Phone1st-Developer-Theme-for-html-106336650945029/" target="_blank" rel="noopener">
				<?php get_template_part('assets/icons/facebook2'); ?>
			</a>

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

			</section>
		</div>