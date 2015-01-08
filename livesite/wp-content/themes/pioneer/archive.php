<?php


get_header(); ?>

<div class="page-holder">
	<div id="main">
		<section class="blog-section">
			<?php query_posts('page_id=262' ); ?>
			<?php if(have_posts()) : while( have_posts() ) : the_post(); ?>
      <?php
        $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
        $url = $thumb['0'];    
      ?>
			<div class="blog-heading">
				<div class="main-img" style="background-image: url(<?php echo $url; ?>);"></div>
				<div class="page-content">
					<div class="wrap">
						<div class="heading">
							<h4><?php the_title(); ?></h4>
								<?php the_content(); ?>
						</div>
					</div>
				</div>
			</div>
			<?php endwhile; ?>
			<?php endif; ?>
			<?php wp_reset_query();?>
			
			<div class="post-holder">
				<aside >
					<div class="search-by-posts">
						<h3>Search</h3>
						<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ) ?>" >
							<div class="input-holder">
								<input type="text" placeholder="Search" name="s" id="s" />
								<input type="hidden" name="post" value="posts" />
								<input type="submit" id="searchsubmit" value="search" />
							</div>
						</form>
					</div>
					<?php dynamic_sidebar( 'blog-sidebar' ); ?>
				</aside>
				<div class="post-list">
					<ul>

					<?php if(have_posts()) : while( have_posts() ) : the_post(); ?>
						<li>
							<span class="post-category"><?php the_category(); ?></span>

							<?php if ( has_post_thumbnail() ) : ?>
								<a href="<?php echo get_permalink(); ?>"><figure><?php the_post_thumbnail(); ?></figure></a>
							<?php endif; ?>

							<div class="text">
								<span class="comment-num">
								<a href="<?php echo get_permalink(); ?>"><?php comments_number('0', '1', '%'); ?></a>
								</span>

								<strong class="date"><?php echo get_the_date('j F Y'); ?></strong>
									
								<a href="<?php echo get_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
								<?php the_excerpt(); ?>
							</div>
						</li>
						<?php endwhile; ?>

						<?php wp_pagenavi(); ?>

					<?php endif; ?>
					</ul>
				</div>
			</div>
		</section>
	</div>
</div>

<?php get_footer();?>
