<!-- News -->
<div class="g-bg-color--sky-light">
	<div class="container g-padding-y-70--xs g-padding-y-100--sm">
		<div class="g-text-center--xs g-margin-b-70--xs section-heading">
			<p class="g-font-size-16--xs g-color--primary g-letter-spacing--2 g-margin-b-30--xs"><?php echo esc_html(get_theme_mod('daron_blog_section_title', 'Blog')); ?></p>
			<h2 class="g-font-size-32--xs g-font-size-36--md g-margin-b-30--xs"><?php echo esc_html(get_theme_mod('daron_blog_section_desc', 'Latest News')); ?></h2>
		</div>
		<div class="row">
			<?php 
			// Get current page and append to custom query parameters array
			$custom_query_args = array( 'post_type' => 'post', 'posts_per_page' => 3);
			// Instantiate custom query
			$custom_query = new WP_Query( $custom_query_args );
			// Fetch All Post 
			if( $custom_query->have_posts()) {
				while ( $custom_query->have_posts()) : $custom_query->the_post(); 
				$post_id = get_the_ID();
				//feature img url
				$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' ); 
				?>
				<div class="<?php echo esc_attr(get_theme_mod('daron_blog_column_layout', 'col-md-4')); ?>">
					<!-- News -->
					<article class="daron-shadow">
						<div class="daron-blog g-bg-color--white g-box-shadow__dark-lightest-v2 g-padding-x-30--xs g-padding-y-30--xs">
							<h3 class="g-font-size-22--xs g-letter-spacing--1 formate-hading-color">
								<a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
							</h3>
							<p class="g-margin-b-0--xs g-font-size-14--xs g-letter-spacing--2 blog-date-color"><?php echo get_the_date(); ?> |
								<a href="#"><?php $categories = get_the_category();
									$separator = ", ";
									$output = '';

									if($categories){
										foreach($categories as $category){
											$output .= '<a class="categories-color-blog" href="' .get_category_link($category->term_id) .'">' . $category->cat_name . '</a>'  . $separator;
										}
										echo trim($output, $separator);
									} ?>
								</a> 
								| <span class=""><?php comments_number(); ?></span>
							</p>
						</div>
						<div class="g-margin-b-30--xs formate-hading-color">
							<a href="<?php the_permalink(); ?>">
								<?php if($url != NULL) { ?><?php echo the_post_thumbnail(); ?><?php } ?>
							</a> 
							<div class="daron-blog g-bg-color--white g-text-left--xs g-padding-x-30--xs g-padding-y-30--xs">
								<p><?php the_excerpt(); ?></p>
								<div class="g-padding-y-20--xs g-text-center--xs g-font-size-14--xs g-color--primary g-letter-spacing--2 read-more-wrap">
									<a class="read-more" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More', 'daron'); ?></a>
								</div>
							</div>
						</div>
					</article>
					<!-- End News -->
				</div>
				<?php
				endwhile;
				// Reset Post Data
				wp_reset_postdata();
			} ?>
		</div>
	</div>
</div>
 <!-- End News -->