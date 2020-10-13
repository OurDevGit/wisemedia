<?php
	$daron_service_column_layout = get_theme_mod('daron_service_column_layout', 'col-md-3');
	//$daron_service_layout = get_theme_mod('daron_service_layout', 2);
	
	$daron_service_title_1 = get_theme_mod('daron_service_title_1', 'Responsive Design');
	$daron_service_desc_1 = get_theme_mod('daron_service_desc_1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.');
	$daron_service_icon_1 = get_theme_mod('daron_service_icon_1', 'fa-desktop');
	
	$daron_service_title_2 = get_theme_mod('daron_service_title_2', 'Fully Customizable');
	$daron_service_desc_2 = get_theme_mod('daron_service_desc_2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.');
	$daron_service_icon_2 = get_theme_mod('daron_service_icon_2', 'fa-pencil');
	
	$daron_service_title_3 = get_theme_mod('daron_service_title_3', 'Pixel Perfect');
	$daron_service_desc_3 = get_theme_mod('daron_service_desc_3', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.');
	$daron_service_icon_3 = get_theme_mod('daron_service_icon_3', 'fa-balance-scale');
	
	$daron_service_title_4 = get_theme_mod('daron_service_title_4', 'Powerful Performance');
	$daron_service_desc_4 = get_theme_mod('daron_service_desc_4', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.');
	$daron_service_icon_4 = get_theme_mod('daron_service_icon_4', 'fa-star-o');
?>
	<div class="container g-padding-y-80--xs g-padding-y-100--sm g-bg-color--white">
		<div class="g-text-center--xs g-margin-b-100--xs section-heading">
			<p class="g-font-size-16--xs g-color--primary g-letter-spacing--2 g-margin-b-30--xs"><?php echo esc_html(get_theme_mod('daron_service_section_title', 'Services We Offer')); ?></p>
			<h2 class="g-font-size-32--xs g-font-size-36--md g-margin-b-30--xs"><?php echo esc_html(get_theme_mod('daron_service_section_desc', 'We Create Beautiful Experiences That Drive Successful Businesses.')); ?></h2>
		</div>
		<div class="row">
			<?php if($daron_service_icon_1 || $daron_service_title_1 || $daron_service_desc_1 ) { ?>
			<div class="<?php echo esc_attr($daron_service_column_layout); ?> g-margin-b-0--md g-margin-b-70--md">
				<div class="clearfix">
					<div class="g-media g-width-30--xs">
						<div class="g-media g-width-30--xs">
							<div class="wow fadeInDown" data-wow-duration=".3" data-wow-delay=".1s">
								<i class="g-font-size-28--xs g-color--primary fa <?php echo esc_attr($daron_service_icon_1); ?>"></i>
							</div>
						</div> 
					</div>
					<div class="g-media__body g-padding-x-20--xs">
						<h3 class="g-font-size-18--xs formate-hading-color"><a href="#" target=""><?php echo esc_html($daron_service_title_1); ?></a></h3>
						<p class="g-margin-b-0--xs"><?php echo esc_html($daron_service_desc_1); ?></p>
					</div>
				</div>
			</div>
			<?php } ?>
			<?php if($daron_service_icon_2 || $daron_service_title_2 || $daron_service_desc_2 ) { ?>
			<div class="<?php echo esc_attr($daron_service_column_layout); ?> g-margin-b-0--md g-margin-b-70--md">
				<div class="clearfix">
					<div class="g-media g-width-30--xs">
						<div class="g-media g-width-30--xs">
							<div class="wow fadeInDown" data-wow-duration=".3" data-wow-delay=".1s">
								<i class="g-font-size-28--xs g-color--primary fa <?php echo esc_attr($daron_service_icon_2); ?>"></i>
							</div>
						</div> 
					</div>
					<div class="g-media__body g-padding-x-20--xs">
						<h3 class="g-font-size-18--xs formate-hading-color"><a href="#" target=""><?php echo esc_html($daron_service_title_2); ?></a></h3>
						<p class="g-margin-b-0--xs"><?php echo esc_html($daron_service_desc_2); ?></p>
					</div>
				</div>
			</div>
			<?php } ?>
			<?php if($daron_service_icon_3 || $daron_service_title_3 || $daron_service_desc_3 ) { ?>
			<div class="<?php echo esc_attr($daron_service_column_layout); ?> g-margin-b-0--md g-margin-b-70--md">
				<div class="clearfix">
					<div class="g-media g-width-30--xs">
						<div class="g-media g-width-30--xs">
							<div class="wow fadeInDown" data-wow-duration=".3" data-wow-delay=".1s">
								<i class="g-font-size-28--xs g-color--primary fa <?php echo esc_attr($daron_service_icon_3); ?>"></i>
							</div>
						</div> 
					</div>
					<div class="g-media__body g-padding-x-20--xs">
						<h3 class="g-font-size-18--xs formate-hading-color"><a href="#" target=""><?php echo esc_html($daron_service_title_3); ?></a></h3>
						<p class="g-margin-b-0--xs"><?php echo esc_html($daron_service_desc_3); ?></p>
					</div>
				</div>
			</div>
			<?php } ?>
			<?php if($daron_service_icon_4 || $daron_service_title_4 || $daron_service_desc_4 ) { ?>
			<div class="<?php echo esc_attr($daron_service_column_layout); ?> g-margin-b-0--md g-margin-b-70--md">
				<div class="clearfix">
					<div class="g-media g-width-30--xs">
						<div class="g-media g-width-30--xs">
							<div class="wow fadeInDown" data-wow-duration=".3" data-wow-delay=".1s">
								<i class="g-font-size-28--xs g-color--primary fa <?php echo esc_attr($daron_service_icon_4); ?>"></i>
							</div>
						</div> 
					</div>
					<div class="g-media__body g-padding-x-20--xs">
						<h3 class="g-font-size-18--xs formate-hading-color"><a href="#" target=""><?php echo esc_html($daron_service_title_4); ?></a></h3>
						<p class="g-margin-b-0--xs"><?php echo esc_html($daron_service_desc_4); ?></p>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
  <!-- // end row  -->