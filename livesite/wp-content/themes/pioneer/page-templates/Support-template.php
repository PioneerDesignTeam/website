
<?php
/**
 * Template Name:  Support Template
 */

get_header(); ?>



<div class="page-holder support-page">
<a href="#main" class="scrollTo top-btn"></a>
	<div id="main">
		
		<?php query_posts('post_type=page&page_id=46' ); ?>
		<?php if(have_posts()) : while( have_posts() ) : the_post(); ?>
			<div class="blog-heading">
					<?php
				$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
				$url = $thumb['0'];
				?>
					<div class="main-img" style="background:url(<?php echo $url;?>) no-repeat center center; background-size:cover; height: 135px;"> 
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
		<div class="nav-container">
			<nav>
				<ul>
					<li><a class="scrollTo" href="#literature">Literature Download  </a></li>
					<li><a class="scrollTo" href="#warranty">Warranty </a></li>
					<li><a class="scrollTo" href="#faq">FAQ’s</a></li>
				</ul>
			</nav>
		</div>
		<div id="mobile" class="nav-container">
			<nav>
				<ul>
					<li><span>Select item</span></li>
          <li><a class="scrollTo" href="#literature">Literature Download</a></li>
					<li><a class="scrollTo" href="#warranty">Warranty </a></li>
					<li><a class="scrollTo" href="#faq">FAQ’s</a></li>
				</ul>
			</nav>
		</div>
		<!-- BEGIN R+D  literature  SECTION-->
    <span class="anchor" id="literature"></span>
		<section id="" class="page-section literature">
			<?php query_posts('post_type=page&page_id=388' ); ?>
			<?php if(have_posts()) : while( have_posts() ) : the_post(); ?>

					<div class="wrap">
						<div class="heading">
							<?php the_content(); ?>
						</div>
				<?php endwhile; ?>
				<?php endif; ?>
				<?php wp_reset_query();?>
				<div class="flexslider literature-slider">
					<ul class="slides">
					<?php query_posts('post_type=page&page_id=388' ); ?>
					<?php if(have_posts()) : while( have_posts() ) : the_post(); ?>
						<?php if(get_field('literature')): ?>
							<?php while(has_sub_field('literature')): ?>
							<li>
								

								<?php $attachment_id = get_sub_field('file');

								$url = wp_get_attachment_url( $attachment_id );
								$title = get_the_title( $attachment_id );

								// part where to get the filesize
								$filesize = filesize( get_attached_file( $attachment_id ) );
								$filesize = size_format($filesize, 2);

								// show custom field
								if (get_sub_field('file')): ?>
								<figure><a target="_blank" href="<?php echo $url; ?>" ><img src="<?php the_sub_field('image'); ?>" alt="<?php echo $title; ?>"></a></figure>
								<div class="title">
									<a target="_blank" href="<?php echo $url; ?>"><?php echo $title; ?></a>
								</div>
								<span class="filesize">(<?php echo $filesize; ?>)</span>
								<div class="links">
									<a href="<?php echo $url; ?>" target="_blank" >&raquo; View</a>
									<a href="<?php the_sub_field('zip_file'); ?>" target="_blank" >&raquo; Download</a>
									
								</div>


								<?php endif; ?>
							</li>

						<?php endwhile; ?>
						<?php endif; ?>

					<?php endwhile; ?>
					<?php endif; ?>
					<?php wp_reset_query();?>
					</ul>
				</div>
				</div>

		</section>
		<!-- END R+D  literature  SECTION -->
		<!-- BEGIN  Warranty  SECTION -->
    <span class="anchor" id="warranty"></span>
		<section id="" class="page-section warranty-section">
			<?php query_posts('post_type=page&page_id=375' ); ?>
			<?php if(have_posts()) : while( have_posts() ) : the_post(); ?>
					<div class="page-content">
						<div class="wrap">
							<h1 class="title"><?php the_title(); ?></h1>
							<div class="container">
								<div class="row">
									<div class="span6 left-col">
										<?php the_field('left_column'); ?>
									</div>
									<div class="span6 right-col">
										<?php the_field('right_column'); ?>
										<a href="/contact-us" class="btn">contact us</a>
										<span class="description"><?php the_content(); ?></span>
										<?php if(get_field('pdf')): ?>
											<div class="pdf-holder">
												<a href="<?php the_field('pdf'); ?>">PDF</a>
											</div>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>
					</div>
			<?php endwhile; ?>
			<?php endif; ?>
			<?php wp_reset_query();?>
		</section>
		<!-- END Warranty  SECTION -->

		<!-- BEGIN  Warranty  SECTION -->
    <span class="anchor" id="faq"></span>
		<section id="" class="faq-section">
			<?php query_posts('post_type=page&page_id=379' ); ?>
			<?php if(have_posts()) : while( have_posts() ) : the_post(); ?>
					<div class="faq-heading">
							<?php
				$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
				$url = $thumb['0'];
				?>
					<div class="main-img" style="background:url(<?php echo $url;?>) no-repeat; background-size:cover;"> 
							<?php //if ( has_post_thumbnail() ) {the_post_thumbnail();} ; ?>
						</div>
						<div class="page-content">
							<div class="wrap">
								<div class="wrap-holder">
								<h1><?php the_title(); ?></h1>
								<h2 class="title"><?php the_field('subtitle'); ?></h2>
								<?php the_content(); ?>
								</div>
							</div>
						</div>
					</div>
			<?php endwhile; ?>
			<?php endif; ?>
			<?php wp_reset_query();?>
					<div class="faq-holder">
						<div class="tabset-holder">
							<ul class="tabset">
								<?php query_posts('post_type=page&page_id=379' ); ?>
								<?php if(have_posts()) : while( have_posts() ) : the_post(); ?>
									<?php if(get_field('category')): ?>
									<?php $i=1;?>
									<?php while(has_sub_field('category')): ?>
										<li>
											<a href="#tab<?php echo $i ?>" class="tab"><?php the_sub_field('category_name'); ?></a>
										</li>
									<?php $i++; ?>
									<?php endwhile; ?>
									<?php endif; ?>
								<?php endwhile; ?>
								<?php endif; ?>
							</ul>
						</div>
						<ul class="tab-content-holder">
							<?php query_posts('post_type=page&page_id=379' ); ?>
							<?php if(have_posts()) : while( have_posts() ) : the_post(); ?>

								<?php if(get_field('category')): ?>
											<?php $iContent=1;?>
									<?php while(has_sub_field('category')): ?>
									<li id="tab<?php echo $iContent ?>" class="tab-content">
										<dl class="accordion">
											<?php if(get_sub_field('content')): ?>
											<?php while(has_sub_field('content')): ?>
													<dt class="title"><a href=""><?php the_sub_field('question'); ?></a></dt>
													<dd><?php the_sub_field('answer'); ?></dd>
											<?php endwhile; ?>
											<?php endif; ?>
										</dl>
									</li>
											<?php $iContent++; ?>
								<?php endwhile; ?>
								<?php $i++; ?>
								<?php endif; ?>
								

							<?php endwhile; ?>
							<?php endif; ?>
						</ul>
					</div>

			<?php wp_reset_query();?>
		</section>
		<!-- END Warranty  SECTION -->
	</div>
<!-- END  MAIN SECTION -->
<?php get_footer();?>







