
<?php
/**
 * Template Name:  Where to buy Template
 */

get_header(); ?>





<div class="page-holder map-page">	
	<div id="main">
		<div class="map-section">
		<?php query_posts('post_type=page&page_id=353' ); ?>
		<?php if(have_posts()) : while( have_posts() ) : the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; ?>
		<!-- <div class="types-dealers">
			<ul>
				<li><strong>Types of dealers</strong></li>
				<li><span class="showroom">Showroom</span></li>
				<li><span class="wholesaler">Wholesaler</span></li>
			</ul>
		</div> -->

		<?php endif; ?>
		<?php wp_reset_query();?>
		</div>
		
		<div class="retailers-section" id="retailers-section">
		<?php query_posts('post_type=page&page_id=474' ); ?>
		<?php if(have_posts()) : while( have_posts() ) : the_post(); ?>
			<div class="wrap">
				<div class="heading">
						<?php the_content(); ?>
				</div>
			</div>
			<div class="logo-holder">
				<ul>
				<?php if(get_field('online_retailers')): ?>
				<?php while(has_sub_field('online_retailers')): ?>
					<li>
						<a target="_blank" href="<?php the_sub_field('link'); ?>"><img class="grayscale" src="<?php the_sub_field('logo'); ?>" alt=""></a>
					</li>
				<?php endwhile; ?>
				<?php endif; ?>
				</ul>
			</div>
		<?php endwhile; ?>
		<?php endif; ?>
		<?php wp_reset_query();?>
		</div>
	</div>
	</div>
<!-- END  MAIN SECTION -->
<?php get_footer();?>
