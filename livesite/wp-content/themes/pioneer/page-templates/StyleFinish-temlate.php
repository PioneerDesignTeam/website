
<?php
/**
 * Template Name:  Style & finish Template
 */

get_header(); the_post(); ?>

<?php
  $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
  $url = $thumb['0'];    
?>

<div class="page-holder">
<section class="blog-section">
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
</section>
<!-- BEGIN MAIN SECTION -->
	<div id="main">
		<!-- BEGIN colection-gallery SECTION -->
			<div class="collection-gallery">
			<?php query_posts('post_type=page&page_id=309'); ?>
				<div class="wrap">
					<div class="row">
						<div class="sliderTL">
							<div class="flexslider" >
								<ul class="slides">
									<?php if(have_posts()) : while( have_posts() ) : the_post(); ?>
										<?php if(get_field('collection_1')): ?>
										<?php while(has_sub_field('collection_1')): ?>
										<li>
											<img src="<?php the_sub_field("image");?>" alt="<?php the_sub_field('collection_name'); ?>">
											<div class="text">
												<div class="holder">
													<div class="hover-box">
														<h2><?php the_sub_field('collection_name'); ?></h2>
														<span>collection</span>
															<p><?php the_sub_field('description'); ?></p>
															<div class="link-holder">
																<a href="<?php the_sub_field('shop_kitchen_link'); ?>">Shop Kitchen &raquo;</a>
																<a href="<?php the_sub_field('shop_bath_link'); ?>">Shop Bath &raquo;</a>
															</div>
													</div>
												</div>
											</div>
										</li>
										<?php endwhile; ?>
										<?php endif; ?>		 
									<?php endwhile; ?>
									<?php endif; ?>
								</ul>
							</div>
						</div>
						<div class="sliderTR">
							<div class="flexslider" >
								<ul class="slides">
									<?php if(have_posts()) : while( have_posts() ) : the_post(); ?>
										<?php if(get_field('collection_2')): ?>
										<?php while(has_sub_field('collection_2')): ?>
										<li>
											<img src="<?php the_sub_field("image");?>" alt="<?php the_sub_field('collection_name'); ?>">
											<div class="text">
												<div class="holder">
													<div class="hover-box">
														<h2><?php the_sub_field('collection_name'); ?></h2>
														<span>collection</span>
															<p><?php the_sub_field('description'); ?></p>
															<div class="link-holder">
																<a href="<?php the_sub_field('shop_kitchen_link'); ?>">Shop Kitchen &raquo;</a>
																<a href="<?php the_sub_field('shop_bath_link'); ?>">Shop Bath &raquo;</a>
															</div>
													</div>
												</div>
											</div>
										</li>
										<?php endwhile; ?>
										<?php endif; ?>		 
									<?php endwhile; ?>
									<?php endif; ?>
								</ul>
							</div>
						</div>
						<div class="sliderBL">
							<div class="flexslider" >
								<ul class="slides">
									<?php if(have_posts()) : while( have_posts() ) : the_post(); ?>
										<?php if(get_field('collection_3')): ?>
										<?php while(has_sub_field('collection_3')): ?>
										<li>
											<img src="<?php the_sub_field("image");?>" alt="<?php the_sub_field('collection_name'); ?>">
											<div class="text">
												<div class="holder">
													<div class="hover-box">
														<h2><?php the_sub_field('collection_name'); ?></h2>
														<span>collection</span>
															<p><?php the_sub_field('description'); ?></p>
															<div class="link-holder">
																<a href="<?php the_sub_field('shop_kitchen_link'); ?>">Shop Kitchen &raquo;</a>
																<a href="<?php the_sub_field('shop_bath_link'); ?>">Shop Bath &raquo;</a>
															</div>
													</div>
												</div>
											</div>
										</li>
										<?php endwhile; ?>
										<?php endif; ?>		 
									<?php endwhile; ?>
									<?php endif; ?>
								</ul>
							</div>
						</div>
						<div class="sliderBR">
							<div class="flexslider" >
								<ul class="slides">
									<?php if(have_posts()) : while( have_posts() ) : the_post(); ?>
										<?php if(get_field('collection_4')): ?>
										<?php while(has_sub_field('collection_4')): ?>
										<li>
											<img src="<?php the_sub_field("image");?>" alt="<?php the_sub_field('collection_name'); ?>">
											<div class="text">
												<div class="holder">
													<div class="hover-box">
														<h2><?php the_sub_field('collection_name'); ?></h2>
														<span>collection</span>
															<p><?php the_sub_field('description'); ?></p>
															<div class="link-holder">
																<a href="<?php the_sub_field('shop_kitchen_link'); ?>">Shop Kitchen &raquo;</a>
																<a href="<?php the_sub_field('shop_bath_link'); ?>">Shop Bath &raquo;</a>
															</div>
													</div>
												</div>
											</div>
										</li>
										<?php endwhile; ?>
										<?php endif; ?>		 
									<?php endwhile; ?>
									<?php endif; ?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			<?php wp_reset_query();?>
			</div>
		<!-- END colection-gallery SECTION -->
		<!--  Finish Swatches SECTION -->
			<div class="finish-swatches-section">
				<?php query_posts('post_type=page&page_id=319' ); ?>
				<?php if(have_posts()) : while( have_posts() ) : the_post(); ?>
				<div class="content">
					<h2><?php the_field('title'); ?></h2>
					<h3><?php the_field('subheading'); ?></h3>
					<p><?php the_field('description'); ?></p>
					<strong><?php the_field('sub_description'); ?></strong>
				</div>
				<?php endwhile; ?>
				<?php endif; ?>
				<div class="swatches-slider">
					<div class="flexslider">
						<ul class="slides">
						<?php if(have_posts()) : while( have_posts() ) : the_post(); ?>
							<?php if(get_field('finish_swatches')): ?>
							<?php while(has_sub_field('finish_swatches')): ?>
							<li>
								<div class="img">
									<figure><img src="<?php the_sub_field("swatches_image");?>" alt=""></figure>
								</div>
								<div class="text">
									<span><?php the_sub_field("title");?></span>
									<strong><?php the_sub_field("subtitle");?></strong>
								</div>
							</li>
							<?php endwhile; ?>
							<?php endif; ?>		 
						<?php endwhile; ?>
						<?php endif; ?>
						</ul>
					</div>
				</div>
				<?php wp_reset_query();?>
			<div class="bottom-text">
				<?php query_posts('post_type=page&page_id=319' ); ?>
				<?php if(have_posts()) : while( have_posts() ) : the_post(); ?>

						<?php the_content(); ?>

				<?php endwhile; ?>
				<?php endif; ?>
				<?php wp_reset_query();?>
			</div>
			</div>
		<!-- END Finish Swatches SECTION -->
		
	</div>
<!-- END  MAIN SECTION -->
</div>
<a class="top-btn"></a>
<?php get_footer();?>