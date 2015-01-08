<?php
/**
 * Template Name: Home Page
 */

get_header(); ?>

<div class="page-holder">
<!-- BEGIN MAIN SECTION -->
	<div id="main">

		<?php query_posts('post_type=home_page_slider'); ?>
		<div class="flexslider  main-slider" >
			<ul class="slides">
			<?php if(have_posts()) : while( have_posts() ) : the_post(); ?>
				<li style="background:url(<?php the_field("image");?>) no-repeat 50% 0; background-size:cover; ">
					<!--<img src="<?php the_field("image");?>" alt="<?php the_field('title_1'); ?>">-->
					<div class="fake" style="background:url(<?php the_field("image");?>) no-repeat 50% 0; background-size:cover; " ></div>
					<div class="inner-holder">
            <div class="text">
              <div class="holder">
                <?php if ( get_field('title_1') ) : ?>
                  <h2><?php the_field('title_1'); ?></h2>
                <?php endif; ?>
                <?php if ( get_field('title_2') ) : ?>
                  <h1><?php the_field('title_2'); ?></h1>
                <?php endif; ?>
                <?php if ( get_field('description') ) : ?>
                  <p><?php the_field('description'); ?></p>
                <?php endif; ?>

                <?php if ( get_field('button_link') ) : ?>
                  <a class="btn" href="<?php the_field("button_link");?>"><?php the_field('button_title'); ?></a>
                <?php endif; ?>
              
              </div>
            </div>
          </div>
				</li>			 
				<?php endwhile; ?>
			<?php endif; ?>
			</ul>
		</div>
		<?php wp_reset_query();?> 
		<div class="btn-blocks">
			<div class="wrap">
				<div class="container">
					<div class="span7">
						<figure class="bg-img"><img src="<?php bloginfo( 'template_url' ); ?>/images/img01.jpg" alt=""></figure>
						<div class="text">
							<h1>Kitchen Faucets</h1>
							<div class="hover-box">
								<ul>
                  <?php query_posts( "page_id=69" ); ?>
                  <?php while ( have_posts() ) : the_post();?>
                    <?php if( have_rows('kitchen_faucets') ): ?>
                      <?php  while ( have_rows('kitchen_faucets') ) : the_row(); ?>
                        <li><a href="<?php the_sub_field('link'); ?>"><?php the_sub_field('titlt'); ?></a></li>
                      <?php endwhile; ?>
                    <?php endif; ?>
                  <?php endwhile; ?>
                  <?php wp_reset_query(); ?> 
								</ul>
								<a class="btn" href="/kitchen-faucets/">View all</a>
							</div>
							<a class="btn btn-hover-hidden" href="/kitchen-faucets/">Browse</a>
						</div>
					</div>
					<div class="span5">
						<figure class="bg-img"><img src="<?php bloginfo( 'template_url' ); ?>/images/img02.jpg" alt=""></figure>
						<div class="text">
							<h2>Bathroom Faucets</h2>
							<div class="hover-box">
								<ul>
                  <?php query_posts( "page_id=69" ); ?>
                  <?php while ( have_posts() ) : the_post();?>
                    <?php if( have_rows('bathroom_faucets') ): ?>
                      <?php  while ( have_rows('bathroom_faucets') ) : the_row(); ?>
                        <li><a href="<?php the_sub_field('link'); ?>"><?php the_sub_field('title'); ?></a></li>
                      <?php endwhile; ?>
                    <?php endif; ?>
                  <?php endwhile; ?>
                  <?php wp_reset_query(); ?> 
								</ul>
								<a class="btn" href="/bath-faucets">View all</a>
							</div>
							<a class="btn btn-hover-hidden" href="/bath-faucets">Browse</a>
						</div>
					</div>
					<div class="span4 ">
						<div class="text stat">
							<a href="/support/#faq"><?php the_field("title_sup"); ?></strong>
								<p><?php the_field("text_sup"); ?></p></a>
						</div>
					</div>
					<div class="span8 block04">
						<a href="/green-initiatives/#delivering_water"><figure class="bg-img"><img src="<?php bloginfo( 'template_url' ); ?>/images/img04.jpg" alt=""></figure>
							<div class="text">
								<figure><img src="<?php bloginfo( 'template_url' ); ?>/images/ico01.png" alt=""></figure>
								<div class="text-holder">
									<strong class="title"><?php the_field("support_title"); ?></strong>
									<p><?php the_field("support_text"); ?></p>
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="icon-section">
			<div id="icon-slider" class="flexslider ">				
				<ul class="slides">
					<?php		
					if( have_rows('slide') ):				
					while ( have_rows('slide') ) : the_row();?>					
						<li>
							<div class="content">
								<h2><?php the_sub_field('title');?></h2>
								<h3><?php the_sub_field('sub_title');?></h3>
								<p><?php the_sub_field('content');?></p>
							</div>							
						</li>
					<?php endwhile;			
					endif;?>					
				</ul>
				<div class="bar">
					<div class="bar-grey">
						<div class="bar-orange"></div>
					</div>
				</div>
			</div>
			<div id="icon-slider-carousel" class="flexslider">
				<div class="over"></div>
				<ul class="bullets">
					<?php		
					if( have_rows('slide') ):				
					while ( have_rows('slide') ) : the_row();?>					
						<li>
							<a href="<?php the_sub_field('url');?>">
								<em><span></span></em>
								<figure><img src="<?php the_sub_field('image');?>" alt=""></figure>
								<strong><?php the_sub_field('image_title');?></strong>
							</a>										
						</li>
					<?php endwhile;			
					endif;?>						
				</ul>
				<div class="mobile-icon-slider">
					<span class="one-part active">1</span>
					<span class="two-part">2</span>
          <span class="three-part">3</span>
          <span class="four-part">4</span>
				</div>
			</div>
		</div>
		<div class="bottom-section">
			<div class="wrap">
				<?php query_posts('post_type=post&posts_per_page=1' ); ?>
				<?php if(have_posts()) : while( have_posts() ) : the_post(); ?>
					<div class="post-item">
						<span class="title">inspiration blog</span>
						<div class="holder">

							<?php if ( has_post_thumbnail() ) : ?>
								<figure><?php the_post_thumbnail(); ?></figure>
							<?php endif; ?>

							<?php the_date('d F Y', '<strong class="date">', '</strong>'); ?>
						 	<h1><?php the_title(); ?></h1>
							<?php the_excerpt(); ?>
							<a href="<?php echo get_permalink(); ?>" class="btn">read more</a>
							
						</div>

						<?php endwhile; ?>
					</div>
				<?php endif; ?>
				<?php wp_reset_query();?>

				<?php query_posts('post_type=testimonials&posts_per_page=1' ); ?>
				<?php if(have_posts()) : the_post(); ?>
					<div class="testimonial">
						<blockquote>
							<q><?php the_field('quote'); ?></q>
						</blockquote>
							<cite>by <?php the_field('testimonial_author'); ?></cite>
						<span class="from">
							<?php if ( get_field('link') ) : ?>
								<a href="<?php the_field("link");?>" target="_blank">
							<?php endif; ?>
								<?php the_field('testimonial_from'); ?>
							<?php if ( get_field('link') ) : ?>
								</a>
							<?php endif; ?>
						</span>
					</div>			 
				<?php endif; ?>
				<?php wp_reset_query();?> </div>
			</div>
	</div>
<!-- END  MAIN SECTION -->
<?php get_footer();?>

