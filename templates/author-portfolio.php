<section class="author-portfolio">

	<div id="app-tab" class="tab-container">
		<div class="tabs">
			<ul>
				<li><a @click="activetab=0" v-bind:class="[ activetab === 0 ? 'active' : '' ]"><span class="tab-icon"><?php get_template_part('assets/icons/interests'); ?><span class="tab-label">interest</span></span></a></li>

				<li><a @click="activetab=1" v-bind:class="[ activetab === 1 ? 'active' : '' ]"><span class="tab-icon"><?php get_template_part('assets/icons/influences'); ?><span class="tab-label">influences</span></span></a></li>

				<li><a @click="activetab=2" v-bind:class="[ activetab === 2 ? 'active' : '' ]"><span class="tab-icon"><?php get_template_part('assets/icons/portfolio'); ?><span class="tab-label">work</span></span></a></li>
			</ul>
		</div>

		<div class="tab-content">
			<div class="tab-items">

				<transition name="flip" mode="out-in">
					<div class="tab-item" v-if="activetab === 0">
						<div>
							<a href="#"><img src="<?php echo get_template_directory_uri() . '/assets/images/interests-one.jpg'; ?>" alt="Annapurim Sanctuary walk Nepal image" class="img-framed"></a>
						</div>
						<div>
							<a href="#"><img src="<?php echo get_template_directory_uri() . '/assets/images/interests-two.jpg'; ?>" alt="Taj Mahal India image" class="img-framed"></a>
						</div>
						<div>
							<a href="#"><img src="<?php echo get_template_directory_uri() . '/assets/images/interests-three.jpg'; ?>" alt="Thailand image" class="img-framed"></a>
						</div>
					</div>
				</transition>

				<transition name="flip" mode="out-in">
					<div class="tab-item" v-if="activetab === 1">
						<div>
							<img src="<?php echo get_template_directory_uri() . '/assets/images/influence-one.jpg'; ?>" alt="Toulouse Lautrec image" class="img-framed">
						</div>
						<div>
							<img src="<?php echo get_template_directory_uri() . '/assets/images/influence-two.jpg'; ?>" alt="Neville Brodie image" class="img-framed">
						</div>
						<div>
							<img src="<?php echo get_template_directory_uri() . '/assets/images/influence-three.jpg'; ?>" alt="Ian Swift typography image" class="img-framed">
						</div>
					</div>
				</transition>
				<transition name="flip" mode="out-in">
					<div class="tab-item" v-if="activetab === 2">
						<div>
							<img src="<?php echo get_template_directory_uri() . '/assets/images/work-one.jpg'; ?>" alt="Excel Hotel Annual Report image" class="img-framed">
						</div>
						<div>
							<img src="<?php echo get_template_directory_uri() . '/assets/images/work-two.jpg'; ?>" alt="Cycling India home page image" class="img-framed">

							<p>See more on
								<a class="behance-link" href="https://www.behance.net/howardl">
									<?php get_template_part('assets/icons/behance'); ?>
								</a>
							</p>
						</div>
						<div>
							<img src="<?php echo get_template_directory_uri() . '/assets/images/work-three.jpg'; ?>" alt="Gen2 brochure cover image" class="img-framed">
						</div>
					</div>
				</transition>
			</div>
		</div>
	</div>
</section>
