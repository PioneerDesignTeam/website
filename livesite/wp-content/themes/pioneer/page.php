<?php
/**
 * Template Name:  Page Template
 */

get_header(); ?>

<div class="page-holder">
<!-- BEGIN MAIN SECTION -->
	<div id="main">
	<?php if(have_posts()) : while( have_posts() ) : the_post(); ?>
					<div class="post-item">
						 	<h1><?php the_title(); ?></h1>
							<?php the_content(); ?>

						<?php endwhile; ?>
					</div>
				<?php endif; ?>
	</div>
<!-- END  MAIN SECTION -->
<?php get_footer();?>