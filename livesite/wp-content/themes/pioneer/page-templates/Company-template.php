
<?php
/**
 * Template Name:  Company Template
 */

get_header(); ?>



<div class="page-holder company-page">
<a href="" class="top-btn top-down"></a>
<div class="nav-container">
	<nav>
		<ul>
			<li><a class="scrollTo" href="#who_are_we">Who are we?</a></li>
			<li><a class="scrollTo" href="#customer_servise">Service </a></li>
			<li><a class="scrollTo" href="#history">History</a></li>
			<li><a class="scrollTo" href="#brands">Brands</a></li>
			<li><a class="scrollTo" href="#greenIn">Green Initiatives</a></li>
		</ul>
	</nav>
</div>
<div id="mobile" class="nav-container">
	<nav>
		<ul>
			<li><span>Who are we?</span></li>
			<li><a class="scrollTo" href="#customer_servise">Service </a></li>
			<li><a class="scrollTo" href="#history">History</a></li>
			<li><a class="scrollTo" href="#brands">Brands</a></li>
			<li><a class="scrollTo" href="#greenIn">Green Initiatives</a></li>
		</ul>
	</nav>
</div>
<!-- BEGIN MAIN SECTION -->
	<div id="main">
		<!-- BEGIN WHO ARE WE SECTION -->
		<section id="who_are_we" class="page-section who_are_we">
			<?php query_posts('post_type=page&page_id=71' ); ?>
			<?php if(have_posts()) : while( have_posts() ) : the_post(); ?>
						<?php
				$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
				$url = $thumb['0'];
				?>
					<div class="main-img" style="background:url(<?php echo $url;?>) no-repeat center 0; background-size:cover;"> 
						<?php //if ( has_post_thumbnail() ) {the_post_thumbnail();} ; ?>
					</div>
					<div class="page-content">
						<div class="wrap">
							<div class="heading">
								<h1><?php the_title(); ?></h1>
									<?php the_content(); ?>
								</div>
							</div>
						</div>
						<?php endwhile; ?>
			<?php endif; ?>
			<?php wp_reset_query();?>
		</section>
		<!-- END WHO ARE WE SECTION -->
		<!-- BEGIN Mission Statement SECTION -->
		<section id="mission_tatement" class="page-section mission_tatement">
			<?php query_posts('post_type=page&page_id=80' ); ?>
			<?php if(have_posts()) : while( have_posts() ) : the_post(); ?>
					<div class="page-content">
						<div class="wrap">
							<div class="heading">
								<div class="h1"><?php the_title(); ?></div>
									<?php the_content(); ?>
								</div>
								<div class="container">
									<div class="row">
										<div class="span6 left-col">
											<h4>Our vision</h4>
											<?php the_field('left_column'); ?>
										</div>
										<div class="span6 right-col">
											<h4 class="title">our core<span>values</span></h4>
											<?php the_field('right_column'); ?>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php endwhile; ?>
			<?php endif; ?>
			<?php wp_reset_query();?>
		</section>
		<!-- END Mission Statement SECTION -->
		<!-- BEGIN Customer Servise SECTION -->
		<section id="customer_servise" class="page-section customer_servise" >
			<?php query_posts('post_type=page&page_id=86' ); ?>
			<?php if(have_posts()) : while( have_posts() ) : the_post(); ?>
					<div class="page-content">
						<div class="wrap">
							<div class="heading">
								<div class="h1"><?php the_title(); ?></div>
									<?php the_content(); ?>
							</div>
							<div class="holder">
								<figure><?php if ( has_post_thumbnail() ) {the_post_thumbnail();} ; ?></figure>
								<div class="text">
									<?php the_field('additional_content'); ?>
								</div>
							</div>
						</div>
					</div>
					<?php endwhile; ?>
			<?php endif; ?>
			<?php wp_reset_query();?>
		</section>
		<!-- END Customer Servise SECTION -->
		<!-- BEGIN Engineering Excellence SECTION -->
		<section id="engineering_excellence" class="page-section engineering_excellence">
			<?php query_posts('post_type=page&page_id=93' ); ?>
			<?php if(have_posts()) : while( have_posts() ) : the_post(); ?>
					<div class="page-content">
						<div class="wrap">
							<div class="heading">
								<div class="h1"><?php the_title(); ?></div>
								</div>
								<div class="holder">
									<figure><?php if ( has_post_thumbnail() ) {the_post_thumbnail();} ; ?></figure>
									<div class="text">
										<?php the_content(); ?>
									</div>
								</div>
							</div>
						</div>
						<?php endwhile; ?>
			<?php endif; ?>
			<?php wp_reset_query();?>
		</section>
		<!-- END Engineering Excellence SECTION -->
		<!-- BEGIN R+D  WORK FLOW  SECTION-->
		<section id="r_d_workflow" class="page-section r_d_workflow">
					<div class="wrap">
						<h4 class="title"><span>R+D</span>WORK FLOW</h4>
						<div class="flexslider r_d_workflow-slider">
							<ul class="slides">
							<?php query_posts('post_type=r+d workflow'. '&order=ASC' ); ?>
							<?php if(have_posts()) : while( have_posts() ) : the_post(); ?>
								<li>
									<span><?php the_field('number'); ?></span>
									<div class="text">
										<h4><?php the_title(); ?></h4>
										<?php the_content(); ?>
									</div>
								</li>
							<?php endwhile; ?>
							<?php endif; ?>
							</ul>
						</div>
					</div>
			<?php wp_reset_query();?>
		</section>
		<!-- END R+D  WORK FLOW  SECTION -->

		<!-- BEGIN HISTORY SECTION-->
		<section id="history" class="page-section history">
			<div class="wrap">
				<div class="heading">
					<h4>Key moments in</h4>
					<div class="h1">our history</div>
				</div>
				<div class="flexslider history-slider">
					<ul class="slides">
					<?php query_posts('post_type=our history'. '&order=ASC' ); ?>
					<?php if(have_posts()) : while( have_posts() ) : the_post(); ?>
						<li>
							<div class="ico-holder">
								<figure>
									<img src="<?php the_field('moment_icon'); ?>" alt="">
								</figure>
							</div>
						
							<div class="text">
							<div class="text-heading">
								<span><?php the_field('moment_date'); ?></span>
								<h4><?php the_field('moment_title'); ?></h4>
							</div>
								<p><?php the_field('description'); ?></p>
							</div>
						</li>
					<?php endwhile; ?>
					<?php endif; ?>
					</ul>
				</div>
			</div>
			<?php wp_reset_query();?>
		</section>
    
    <section class="history-mobile">
      <div class="inner">
        <div class="heading">
					<h4>Key moments in</h4>
					<div class="h1">our history</div>
				</div>
        <div class="time-slide">
          <ul class="slides">
            <?php query_posts('post_type=our history'. '&order=ASC' ); ?>
            <?php if(have_posts()) : while( have_posts() ) : the_post(); ?>
              <div class="time-box">
                <div class="time-image">
                  <span>
                    <img src="<?php the_field('moment_icon'); ?>" alt="" />
                  </span>
                </div>
                
                <div class="time-text">
                  <span><?php the_field('moment_date'); ?></span>
                  <h4><?php the_field('moment_title'); ?></h4>
                  <p><?php the_field('description'); ?></p>
                </div>
              </div>
            <?php endwhile; endif; ?>
          </ul>
        </div>
      </div>  
    </section>
    
    
		<!-- END HISTORY  SECTION -->

		<!-- BEGIN BRANDS SECTION-->
		<section id="brands" class="page-section brands">
			<?php query_posts('post_type=page&page_id=151' ); ?>
			<?php if(have_posts()) : while( have_posts() ) : the_post(); ?>
					<div class="page-content">
						<div class="heading">
							<div class="h1"><?php the_title(); ?></div>
							<?php the_content(); ?>
						</div>
						<div class="holder">
							<div class="brand brandl">
								<div class="logo-wrap">
									<div>
										<img src="<?php the_field('logo_1'); ?>" alt="">
										<h4><?php the_field('title_1'); ?></h4>
									</div>
								</div>
								<div class="description-wrap">
									<div><img src="<?php the_field('logo_1'); ?>" alt="">
										<h4><?php the_field('title_1'); ?></h4>
										<?php the_field('text_1'); ?></div>
								</div>
							</div>
							<div class="brand brandc">
								<div class="logo-wrap">
									<div>
										<img src="<?php the_field('logo_2'); ?>" alt="">
										<h4><?php the_field('title_2'); ?></h4>
									</div>
								</div>
								<div class="description-wrap">
									<div><img src="<?php the_field('logo_2'); ?>" alt="">
										<h4><?php the_field('title_2'); ?></h4>
										<?php the_field('text_2'); ?></div>
								</div>
							</div>
							<div class="brand brandr">
								<div class="logo-wrap">
									<div>
										<img src="<?php the_field('logo_3'); ?>" alt="">
										<h4><?php the_field('title_3'); ?></h4>
									</div>
								</div>
								<div class="description-wrap">
									<div><img src="<?php the_field('logo_3'); ?>" alt="">
										<h4><?php the_field('title_3'); ?></h4>
										<?php the_field('text_3'); ?></div>
								</div>
							</div>
						</div>
					</div>
					<?php endwhile; ?>
			<?php endif; ?>
			<?php wp_reset_query();?>
		</section>
		<!-- END BRANDS  SECTION -->
		<!-- BEGIN Green Initiatives E SECTION -->
		<section id="greenIn" class="page-section greenIn">
			<?php query_posts('post_type=page&page_id=158' ); ?>
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
								<img src="<?php bloginfo( 'template_url' ); ?>/images/ico04c.png" alt="">
									<?php the_content(); ?>
								</div>
								<a href="<?php bloginfo( 'url' ); ?>/green-initiatives/" class="btn">read more</a>
							</div>
						</div>
						<?php endwhile; ?>
			<?php endif; ?>
			<?php wp_reset_query();?>
		</section>
		<!-- END Green Initiatives  SECTION -->
	</div>
<!-- END  MAIN SECTION -->
<?php get_footer();?>





