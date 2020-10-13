<!-- Testimonials -->
	<div class="g-padding-y-80--xs g-padding-y-100--sm g-bg-color--sky-light">
		<div class="container g-text-center--xs section-heading">
			<p class="g-font-size-16--xs g-color--primary g-letter-spacing--2 g-margin-b-30--xs"><?php echo esc_html(get_theme_mod('daron_testimonial_title', 'Testimonials')); ?></p>
			<h2 class="g-font-size-32--xs g-font-size-36--md g-margin-b-30--xs"><?php echo esc_html(get_theme_mod('daron_testimonial_desc', 'What Clients Say?')); ?></h2>
			<div class="s-swiper js__swiper-testimonials">
				<!-- Swiper Wrapper -->
				<div class="swiper-wrapper">
					<div class="swiper-slide g-padding-x-130--sm g-padding-x-150--lg">
						<div class="g-padding-x-20--xs g-padding-x-50--lg">
							<img class="g-width-80--xs g-height-80--xs g-hor-border-4__solid--white g-box-shadow__primary-v1 g-radius--circle g-margin-b-30--xs" src="<?php echo esc_html(get_theme_mod('daron_testimonial_image_one', get_template_directory_uri() . '/images/testimonial/client.jpg')); ?>" alt="">
							<div class="g-margin-b-40--xs">
								<p class="g-font-size-18--xs g-font-size-20--sm g-color--heading"><i>" <?php echo esc_html(get_theme_mod('daron_testimonial_desc_one', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam orci sapien, tempor ut sapien scelerisque, vestibulum tincidunt risus. Lorem ipsum dolor sit amet.')); ?> "</i></p>
							</div>
							<div class="center-block g-hor-divider__solid--heading-light g-width-100--xs g-margin-b-30--xs"></div>
							<h4 class="g-font-size-15--xs g-font-size-18--sm g-color--primary"><?php echo esc_html(get_theme_mod('daron_testimonial_designation_one', 'Jake Richardson')); ?></h4>
						</div>
					</div>
				</div>
				<!-- End Swipper Wrapper -->
			</div>
		</div>
	</div>
	<!-- End Testimonials -->
	<script>
	/* Testimonials */
		 /* var swiper = new Swiper('.js__swiper-testimonials', {
			pagination: '.swiper-pagination',
			slidesPerView: 1,
			speed: 1000,
			autoplay: 7000,
			paginationClickable: true,
			loop: true
		}); */
	</script>