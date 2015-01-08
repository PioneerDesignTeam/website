
<?php
/**
 * Template Name:  Kitchen
 */

get_header(); ?>



<div class="page-holder">
	<div class="category-img">
		<?php query_posts('post_type=page&page_id=40' ); ?>
		<?php if(have_posts()) : while( have_posts() ) : the_post(); ?>
		<?php if ( has_post_thumbnail() ) {the_post_thumbnail();} ; ?>
		<div class="text">
			<div class="holder">
				<h3><?php the_title(); ?></h3>
				<?php the_content(); ?>
			</div>
		</div>
						<?php endwhile; ?>
		<?php endif; ?>
		<?php wp_reset_query();?>
	</div>
	<a href="#main" class="scrollTo top-btn"></a>
<div class="category-nav">
	<nav>
		<?php wp_nav_menu('menu=Kitchen Category menu'); ?>
	</nav>
</div>
<!-- BEGIN MAIN SECTION -->
	<div id="main" >
		<div class="catalog">
			<aside>
				<div id="accordion">
					<h3>Collections</h3>
					<div>
						<ul>
							<li><input type="checkbox" name="" id=""></li>
						</ul>
					</div>
					<h3>Handles</h3>
					<div>
						<ul>
							<li><input type="checkbox" name="" id=""></li>
						</ul>
					</div>
					<h3>Style</h3>
					<div>
						<ul>
							<li><input type="checkbox" name="" id=""></li>
						</ul>
					</div>
					<h3>Finish</h3>
					<div>
						<ul>
							<li><input type="checkbox" name="" id="id1"><label for="id1">Polished Chrome</label></li>
							<li><input type="checkbox" name="" id="id2"><label for="id2">Brushed Nickel</label></li>
							<li><input type="checkbox" name="" id="id3"><label for="id3">Stainless Steel</label></li>
							<li><input type="checkbox" name="" id="id4"><label for="id4">Polished Nickel</label></li>
							<li><input type="checkbox" name="" id="id5"><label for="id5">Polished Brass</label></li>
							<li><input type="checkbox" name="" id="id6"><label for="id6">Golden Rose</label></li>
							<li><input type="checkbox" name="" id="id7"><label for="id7">Tuscany Bronze</label></li>
							<li><input type="checkbox" name="" id="id8"><label for="id8">Rubbed Bronze</label></li>
						</ul>
					</div>
					<h3>Price</h3>
					<div>
						<ul>
							<li><input type="checkbox" name="" id=""></li>
						</ul>
					</div>
					<h3>Installation</h3>
					<div>
						<ul>
							<li><input type="checkbox" name="" id=""></li>
						</ul>
					</div>
					<h3>Mounttype</h3>
					<div>
						<ul>
							<li><input type="checkbox" name="" id=""></li>
						</ul>
					</div>
				</div>
			</aside>
			<div class="content">
				<div class="category-holder">
					<h1 class="category-title">Kitchen Faucets</h1>
					<ul>
					<?php query_posts('post_type=kitchen' ); ?>
					<?php if(have_posts()) : while( have_posts() ) : the_post(); ?>
						<li>
					
							<?php if(get_field('available_finishes')): ?>
								<?php $i=1;?>
								<?php while(has_sub_field('available_finishes')): ?>
									<?php if ($i==1):?>
									<figure>
										<img src="<?php the_sub_field('product_image'); ?>" alt="">
										<a href="<?php echo get_permalink(); ?>" class="btn">more details</a>
									</figure>
									<?php endif; ?>
								<?php $i++; ?>
								<?php endwhile; ?>
							<?php else: ?> <img src="" alt="">
							<?php endif; ?>
							<h4><?php the_field('collection'); ?></h4>
							<h3><?php the_field('product_title'); ?></h3>

							<?php if(get_field('available_finishes')): ?>
								<?php $i=1;?>
								<?php while(has_sub_field('available_finishes')): ?>
									<?php if ($i==1):?>
										<dl>
											<dt>Model</dt>
											<dd> # <?php the_sub_field('model'); ?></dd>
											<dt>PRICE   </dt>
											<dd><?php the_sub_field('price'); ?></dd>
										</dl>
									<?php endif; ?>
								<?php $i++; ?>
								<?php endwhile; ?>
							<?php else: ?> <img src="" alt="">
							<?php endif; ?>
							<div class="finishes-list">
								<ul>
									<?php if(get_field('available_finishes')): ?>
										<?php $i=1;?>
										<?php while(has_sub_field('available_finishes')): ?>
											<?php if ($i<=4):?>
												<li>
													<figure >
														<a href="#<?php the_sub_field('model'); ?>" class="open_popup" rel="<?php the_sub_field('model'); ?>"><img src="<?php the_sub_field('color_swatch'); ?>" alt=""></a>
													</figure>
													<div  class="popup" id="<?php the_sub_field('model'); ?>">
														<div class="holder">
															<span class="model"><span>MODEL:</span>#<?php the_sub_field('model'); ?></span>
															<span class="title"><?php the_sub_field('finishes_name'); ?></span>
															<span class="price"><?php the_sub_field('price'); ?></span>
															<span class="disclaimer"><?php the_sub_field('finishes_disclaimer'); ?></span>
														</div>
													</div>
												</li>
											<?php endif; ?>
											<?php if ($i>4):?>
												<li>
													<a href="<?php echo get_permalink(); ?>" class="plus">+</a>
												</li>
											<?php endif; ?>
										<?php $i++; ?>
										<?php endwhile; ?>
									<?php else: ?> <img src="" alt="">
									<?php endif; ?>
								</ul>
							</div>
						<?php endwhile; ?>
					<?php endif; ?>
					<?php wp_reset_query();?>
					</ul>
				</div>
				<div class="btn-view-all">
					<a href="" class="btn">VIEW ALL</a>
				</div>
				<div class="about-links-section">
					<?php query_posts('post_type=page&page_id=239' ); ?>
					<?php if(have_posts()) : while( have_posts() ) : the_post(); ?>
						<h1>About Us</h1>
						<div class="holder">
							<div class="col">
								<div class="img-holder">
									<figure><a href=""><img src="<?php the_field('image_1'); ?>" alt=""></a></figure>
								</div>
								<h4><a href=""><?php the_field('title_1'); ?></a></h4>
								<p><?php the_field('text_1'); ?></p>
							</div>
							<div class="col">
								<div class="img-holder">
									<figure><a href=""><img src="<?php the_field('image_2'); ?>" alt=""></a></figure>
								</div>
								<h4><a href=""><?php the_field('title_2'); ?></a></h4>
								<p><?php the_field('text_2'); ?></p>
							</div>
							<div class="col">
								<div class="img-holder">
									<figure><a href=""><img src="<?php the_field('image_3'); ?>" alt=""></a></figure>
								</div>
								<h4><a href=""><?php the_field('title_3'); ?></a></h4>
								<p><?php the_field('text_3'); ?></p>
							</div>
						</div>
					<?php endwhile; ?>
					<?php endif; ?>
					<?php wp_reset_query();?>
				</div>
			</div>
		</div>
</div>
<!-- END  MAIN SECTION -->
<?php get_footer();?>





