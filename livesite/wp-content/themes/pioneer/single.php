<?php



get_header(); ?>


<div class="page-holder">
	<div id="main">
		<section class="blog-section">
			<?php query_posts('post_type=page&page_id=262' ); ?>
			<?php if(have_posts()) : while( have_posts() ) : the_post(); ?>
			<div class="blog-heading">
					<?php
				$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
				$url = $thumb['0'];
				?>
					<div class="main-img" style="background:url(<?php echo $url;?>) no-repeat center center; background-size:cover;"> 
							<?php //if ( has_post_thumbnail() ) {the_post_thumbnail();} ; ?>
				</div>
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
				<?php if(have_posts()) : while( have_posts() ) : the_post(); ?>
				<div class="post-single-holder">
					<div class="post-single">
						<?php if ( has_post_thumbnail() ) : ?>
								<figure style="display:none;" ><?php the_post_thumbnail(); ?></figure>
						<?php endif; ?>
						<span class="post-category"><?php the_category(); ?></span>
						<span class="comment-num">
							<a class="scrollTo" href="#comments"><?php comments_number('0', '1', '%'); ?></a>
						</span>
						<?php the_date('d F Y', '<strong class="date">', '</strong>'); ?>
						<h1><?php the_title(); ?></h1>
						<div class="text">
							<?php the_content(); ?>
						</div>
						<div class="share">
							<div class="addthis_toolbox addthis_default_style " addthis:url="<?php echo $share_url;?>" >
								<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4ff009402e9515ba"></script>
								<ul>
									<li><a class="addthis_button"><span>Share</span><img src="<?php bloginfo( 'template_url' ); ?>/images/add-plus.gif" width="25" height="25" border="0" alt="Share" /> </a> </li>
									<li><a class="addthis_button_email"><span>Mail</span><img src="<?php bloginfo( 'template_url' ); ?>/images/mail-to-ico.gif" width="25" height="25" border="0" alt="Share" /> </a> </li>
									<li><a class="addthis_button_print"><span>Print</span><img src="<?php bloginfo( 'template_url' ); ?>/images/print-ico.gif" width="25" height="25" border="0" alt="Share" /> </a></li>
								</ul>
							</div>
						</div>
						
						<div class="tags-holder"><?php echo get_the_tag_list('<span class="title">TAGS</span> <p> ',', ','</p>'); ?></div>
					</div>
					<?php comments_template(); ?>
				</div>
				<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</section>
	</div>
</div>
<!-- END  MAIN SECTION -->
<?php get_footer();?>



