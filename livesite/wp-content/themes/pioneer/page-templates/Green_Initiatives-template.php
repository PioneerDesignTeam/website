
<?php
/**
 * Template Name:  Green Initiatives Template
 */

get_header(); ?>



<div class="page-holder">
	<a href="#main" class="scrollTo top-btn"></a>
	<!-- BEGIN MAIN SECTION -->
	<div id="main">
		<!-- BEGIN Green Initiatives E SECTION -->
		<section id="greenIn" class="page-section greenIn">
			<?php query_posts('post_type=page&page_id=345' ); ?>
			<?php if(have_posts()) : while( have_posts() ) : the_post(); ?>
				<?php
				$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
				$url = $thumb['0'];
				?>
					<div class="main-img" style="background:url(<?php echo $url;?>) no-repeat center 0; background-size:cover;" >
						<?php //if ( has_post_thumbnail() ) {the_post_thumbnail();} ; ?>
					</div>
					<div class="page-content">
						<div class="wrap">
							<div class="heading">
								<img src="<?php bloginfo( 'template_url' ); ?>/images/ico04c.png" alt="">
									<?php the_content(); ?>
							</div>
						</div>
					</div>
					<?php endwhile; ?>
			<?php endif; ?>
			<?php wp_reset_query();?>
		</section>
		<!-- END Green Initiatives  SECTION -->
		<!-- BEGIN Sliding Carousel SECTION -->
		<section class="page-section slider-holder" >
			<?php query_posts('post_type=page&page_id=495' ); ?>
			<?php if(have_posts()) : while( have_posts() ) : the_post(); ?>
				<?php
				$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
				$url = $thumb['0'];
				?>
					<div class="main-img" style="background:url(<?php echo $url;?>) no-repeat; background-size:cover;"> 
					<?php// if ( has_post_thumbnail() ) {the_post_thumbnail();} ; ?>
				</div>
				<div class="page-content">
					<div class="wrap">
						<div class="flexslider" id="title-carousel">
							<ul class="slides">
								<?php
								if( have_rows('carousel') ):
								$id=1;
								while ( have_rows('carousel') ) : the_row();?>
									<li class="item<?php echo $id ?>" >
										<a href="#">
											<div>
												<strong>our</strong>
												<span><?php the_sub_field('subtitle');?></span>
											</div>
										</a>
									</li>
									<?php $id++ ?>
								<?php endwhile;
								endif;?>
							</ul>
						</div>
						<div class="flexslider" id="title-carousel-slider">
							<ul class="slides">
								<?php
								if( have_rows('carousel') ):
								while ( have_rows('carousel') ) : the_row();?>
									<li>
										<figure><img src="<?php the_sub_field('image');?>" alt=""></figure>
										<div class="text">
											<div class="title">
												<strong><?php the_sub_field('title');?></strong>
												<span><?php the_sub_field('subtitle');?></span>
											</div>
											<span><?php the_sub_field('content');?></span>
										</div>
									</li>
								<?php endwhile;
								endif;?>
							</ul>
						</div>
					</div>
				</div>
			<?php endwhile; ?>
			<?php endif; ?>
			<?php wp_reset_query();?>
		</section>
		<!-- END Sliding Carousel SECTION -->
		<!-- BEGIN Delivering Water SECTION -->
    <span class="anchor" id="delivering_water"></span>
		<section id="" class="page-section delivering_water" >
			<?php query_posts('post_type=page&page_id=522' ); ?>
			<?php if(have_posts()) : while( have_posts() ) : the_post(); ?>
				<?php
				$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
				$url = $thumb['0'];
				?>
					<div class="main-img" style="background:url(<?php echo $url;?>) no-repeat; background-size:cover;">
					<?php //if ( has_post_thumbnail() ) {the_post_thumbnail();} ; ?>
				</div>
				<div class="page-content">
					<div class="wrap">
						<div class="heading">
							<?php the_content(); ?>
						</div>
							<div class="content-block">
								<div class="holder">
									<figure><img src="<?php the_field('featured_image');?>" alt=""></figure>
									<div class="text">
										<figure><img src="<?php the_field('logo');?>" alt=""></figure>
										<?php the_field('content');?>
									</div>
								</div>
							</div>
					</div>
				</div>
			<?php endwhile; ?>
			<?php endif; ?>
			<?php wp_reset_query();?>
		</section>
		<!-- END Delivering Water SECTION -->
		<!-- BEGIN Tagging SECTION -->
		<section id="smart-tagging" class="page-section tagging" >
			<?php query_posts('post_type=page&page_id=531' ); ?>
			<?php if(have_posts()) : while( have_posts() ) : the_post(); ?>
				<div class="left-img">
					<?php if ( has_post_thumbnail() ) {the_post_thumbnail();} ; ?>
				</div>
				<div class="content">
					<div class="heading">
						<?php the_content(); ?>
					</div>
					<div class="tagging-list">
						<ul>
							<?php		
							if( have_rows('tagging') ):
							while ( have_rows('tagging') ) : the_row();?>
								<li>
									<figure><img src="<?php the_sub_field('ico');?>" alt=""></figure>
									<h4><?php the_sub_field('title');?></h4>
									<?php the_sub_field('text');?>
								</li>
							<?php endwhile;
							endif;?>
						</ul>	
					</div>
					
				</div>

			<?php endwhile; ?>
			<?php endif; ?>
			<?php wp_reset_query();?>
		</section>
		<!-- END Tagging SECTION -->
	</div>
<!-- END  MAIN SECTION -->
<?php get_footer();?>





