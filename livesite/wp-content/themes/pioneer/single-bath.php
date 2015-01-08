<?php

get_header(); 

if(isset($_GET["filter"])){
  $filter = $_GET["filter"];
} else {
  $filter = 1;
}
 $filter_slide = $filter-1;
  
?>
<script>
  jQuery(document).ready(function(){
    jQuery('#product-slider-carousel').flexslider({
      animation: "slide",
      controlNav: true,
      animationLoop: false,
      slideshow: false,
      itemWidth: 143,
      itemMargin: 25,
      //startAt: <?php echo $filter; ?>,  
      asNavFor: '#product-slider',
    });
    jQuery('#product-slider').flexslider({
      animation: "slide",
      controlNav: false,
      animationLoop: false,
      slideshow: false,
      startAt: <?php echo $filter_slide; ?>,  
      sync: "#product-slider-carousel",
      after: function(slider){
        jQuery(".zoomContainer").remove();
        setTimeout(function(){jQuery(".flex-active-slide .zoom_01").elevateZoom()},500);
      }
    });
  })
</script>

<div class="page-holder">
	<div class="breadcrumbs"><div class="breadcrumbs-holder"><?php if(function_exists('bcn_display')) { bcn_display(); }?> <div class="file-text">Technical File and Downloads</div></div></div>

	<a class="top-btn"></a>
<!-- BEGIN MAIN SECTION -->
	<div id="main" >
		<?php if(have_posts()) : while( have_posts() ) : the_post(); ?>

		<div class="product">
			<div class="visual">
				<div id="product-slider" class="flexslider ">
					<ul class="slides">
					<?php if(get_field('available_finishes')): ?>
					<?php while(has_sub_field('available_finishes')): ?>
						<li>
              <div class="product-zoom">
                <img class="zoom_01" src='<?php the_sub_field('product_image'); ?>' data-zoom-image="<?php the_sub_field('product_image'); ?>"/>			
              </div>
						</li>
					<?php endwhile; ?>
					<?php endif; ?>
					<!-- items mirrored twice, total of 12 -->
					</ul>
          <div class="zoom-icon">Roll over image to zoom in</div>
				</div>
				<div id="product-slider-carousel" class="flexslider">
					<ul class="slides">
						<?php if(get_field('available_finishes')): ?>
						<?php while(has_sub_field('available_finishes')): ?>
							<li>
								<img src="<?php the_sub_field('product_image'); ?>" alt="">
							</li>
						<?php endwhile; ?>
						<?php else: ?> <img src="<?php bloginfo( 'template_url' ); ?>/images/p-image.jpg" alt="">
						<?php endif; ?>
					<!-- items mirrored twice, total of 12 -->
					</ul>
				</div>
				<div id="product-slider-carousel-mobile" class="flexsider">
					<ul class="slides">
						<?php if(get_field('available_finishes')): ?>
						<?php while(has_sub_field('available_finishes')): ?>
							<li>
								<img src="<?php the_sub_field('product_image'); ?>" alt="">
							</li>
						<?php endwhile; ?>
						<?php else: ?> <img src="<?php bloginfo( 'template_url' ); ?>/images/p-image.jpg" alt="">
						<?php endif; ?>
					<!-- items mirrored twice, total of 12 -->
					</ul>
				</div>
			</div>
			<div class="info">
				<h4><?php the_field('collection'); ?></h4>
				<h1><?php the_title(); ?></h1>
				<?php if(get_field('available_finishes')): ?>
					<?php $i=1;?>
					<?php while(has_sub_field('available_finishes')): ?>
						<?php if ($i == $filter): ?>
							<dl>
								<dt>Model </dt>
								<dd> # <?php the_field('model'); ?></dd>
								<dt>PRICE</dt>
								<dd> $<?php the_sub_field('price'); ?></dd>
							</dl>
						<?php endif; ?>
					<?php $i++; ?>
					<?php endwhile; ?>
				<?php else: ?> 
				<?php endif; ?>
				<div class="finishes-list">
					<h4 class="title">Available  Finishes </h4>
					<ul>
						<?php if(get_field('available_finishes')): ?>
							<?php $i=1; ?>
							<?php while(has_sub_field('available_finishes')): ?>
								<li <?php if($filter==$i){ echo "class='active'"; } ?>>
									<figure >
										<a href="#<?php the_sub_field('model'); ?>" class="open_popup" title="<?php echo $i; ?>" rel="<?php the_sub_field('model'); ?>"><img src="<?php the_sub_field('color_swatch'); ?>" alt=""></a>
									</figure>
									<div class="popup" id="<?php the_field('model'); ?>">
										<div class="holder">
											<span class="model"><span>MODEL:</span>#<?php the_field('model'); if(get_sub_field('finish_code')){ ?>-<?php the_sub_field('finish_code'); }?></span>
											<span class="title"><?php the_sub_field('finishes_name'); ?></span>
											<span class="price">$<?php the_sub_field('price'); ?></span>
											<span class="disclaimer"><?php the_sub_field('finishes_disclaimer'); ?></span>
										</div>
									</div>
								</li>
							<?php $i++; endwhile; ?>
						<?php endif; ?>
					</ul>
          <form id="filter-form" action="" method="GET" style="display: none;">
            <input type="text" name="filter" value="" />
            <input type="submit" />
          </form>
				</div>
				<div class="certifications">
					<h4 class="title">certifications </h4>
					<ul>
            <?php 
              $certifications = get_field("certifications"); 
              $val = explode(";", $certifications)
              
            ?>
            <?php query_posts( "page_id=69" ); ?>
            <?php while ( have_posts() ) : the_post();?>
              <?php if( have_rows('certifications') ): ?>
                <?php foreach($val as $item){ ?>          
                <?php  $i = 1; while ( have_rows('certifications') ) : the_row(); ?>
                  <?php if($item == $i){ ?>
                    <li>
                      <a href="<?php the_sub_field('link'); ?>"><img src="<?php the_sub_field('image'); ?>" alt=""></a>
                      <div class="tooltip">
                        <div class="holder">
                          <span><?php the_sub_field('tooltip'); ?></span>
                        </div>
                      </div>
                    </li>
                  <?php } ?>
                <?php $i++; endwhile; } ?>
              <?php endif; ?>
            <?php endwhile; ?>
             <?php wp_reset_query(); ?> 
					</ul>
				</div>
				<div class="btn-holder">
					<ul>
						<li><a href="/where-to-buy" class="btn">where to buy</a></li>
						<li><a href="<?php the_field('replacement_parts'); ?>" target="_blank" class="replacement_parts">Find replacement parts</a></li>
					</ul>
				</div>
				<span class="disclaimer">
          <span><?php the_field('disclaimer_text'); ?>  </span>
          <a href="<?php the_field('disclaimer_link'); ?>"><strong><?php if(get_field('part_number')) {?>&raquo; Part</strong> #<?php the_field('part_number'); ?><?php } ?></a>
        </span>
				<div class="share">
					<div class="addthis_toolbox addthis_default_style " addthis:url="<?php echo $share_url;?>" >
						<ul>
							<li><a class="addthis_button"><span>Share</span><img src="<?php bloginfo( 'template_url' ); ?>/images/add-plus.gif" width="25" height="25" border="0" alt="Share" /> </a> </li>
							<li><a class="addthis_button_email"><span>Mail</span><img src="<?php bloginfo( 'template_url' ); ?>/images/mail-to-ico.gif" width="25" height="25" border="0" alt="Share" /> </a> </li>
							<li><a class="addthis_button_print"><span>Print</span><img src="<?php bloginfo( 'template_url' ); ?>/images/print-ico.gif" width="25" height="25" border="0" alt="Share" /> </a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="product-description">
			<div class="wrap">
				<div class="container">
					<div class="row">
						<div class="span6 description">
							<h4>description</h4>
							<?php the_content(); ?>
						</div>
						<div class="span6 tech-info">
							<div class="holder">
                <?php if(get_field('mount_type') || get_field('second_mount_type')): ?>
                  <div class="mount-type">
                    <h4>mount type</h4>
                    <?php if(get_field('mount_type')): ?>
                      <div class="type<?php the_field('mount_type'); ?>">
                        <?php if(get_field('mount_type') ==1 ){ ?>
                          <img src="<?php echo get_template_directory_uri(); ?>/images/1-hole-installation.png" />
                          <span><?php the_field('mount_type'); ?> Hole installation</span>
                        <?php } ?>
                        <?php if(get_field('mount_type') ==2 ){ ?>
                          <img src="<?php echo get_template_directory_uri(); ?>/images/2-hole-installation.png" />
                          <span><?php the_field('mount_type'); ?> Hole installation</span>
                        <?php } ?>
                        <?php if(get_field('mount_type') ==3 ){ ?>
                          <img src="<?php echo get_template_directory_uri(); ?>/images/3-hole-installation.png" />
                          <span><?php the_field('mount_type'); ?> Hole installation</span>
                        <?php } ?>
                        <?php if(get_field('mount_type') ==4 ){ ?>
                          <img src="<?php echo get_template_directory_uri(); ?>/images/4-hole-installation.png" />
                          <span><?php the_field('mount_type'); ?> Hole installation</span>
                        <?php } ?>
                      </div>
                    <?php endif; ?>
                    <?php if(get_field('second_mount_type')): ?>
                      <div class="type<?php the_field('second_mount_type'); ?>">
                        <?php if(get_field('second_mount_type') ==1 ){ ?>
                          <img src="<?php echo get_template_directory_uri(); ?>/images/1-hole-installation.png" />
                          <span><?php the_field('second_mount_type'); ?> Hole installation</span>
                        <?php } ?>
                        <?php if(get_field('second_mount_type') ==2 ){ ?>
                          <img src="<?php echo get_template_directory_uri(); ?>/images/2-hole-installation.png" />
                          <span><?php the_field('second_mount_type'); ?> Hole installation</span>
                        <?php } ?>
                        <?php if(get_field('second_mount_type') ==3 ){ ?>
                          <img src="<?php echo get_template_directory_uri(); ?>/images/3-hole-installation.png" />
                          <span><?php the_field('second_mount_type'); ?> Hole installation</span>
                        <?php } ?>
                        <?php if(get_field('second_mount_type') ==4 ){ ?>
                          <img src="<?php echo get_template_directory_uri(); ?>/images/4-hole-installation.png" />
                          <span><?php the_field('second_mount_type'); ?> Hole installation</span>
                        <?php } ?>                    
                      </div>
                    <?php endif; ?>
                  </div>
                <?php endif; ?>
								<div class="technical_file_and_downloads">
									<h4>Technical File and Downloads</h4>
									<?php the_field('technical_file_and_downloads'); ?>
									<?php if(get_field('installation_videos')): ?>
										<a href="<?php the_field('installation_videos'); ?>" class="video-link">Installation Videos</a>
									<?php endif; ?>
								</div>
							</div>
						<?php if(get_field('additional_notes')): ?>
							<h4>additional notes</h4>
							<div class="additional_notes">
								<?php the_field('additional_notes'); ?>
							</div>
						<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<link media="all" rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/css/jcarousel.responsive.css">
		<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/js/jquery.jcarousel.min.js"></script>
		<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/js/jcarousel.responsive.js"></script>
		<?php 
      $val = get_field("collection");
      $post = get_the_ID();
      $cat = get_the_terms( $post, "bath_category" );
      $cat = array_shift($cat);
      $cat = $cat->slug;
      $args = array(
        'posts_per_page' => 9,
        'post__not_in' => array($post), 
        'post_type' => 'bath',
        // 'tax_query' => array(),
        'meta_query' => array(
          array(
            'key' => 'collection',
            'value' => $val,
            'compare' => 'LIKE'
          )
        )
      );
      // if($cat){  
        // $args['tax_query'][] = array(

            // 'taxonomy' => 'bath_category',
            // 'field'    => 'slug',
            // 'terms'    => $cat,
         
        // );
      // }
    query_posts($args); 

    ?>
    
    <?php if(have_posts()) : ?>
		<div id="related-products" class="category-holder flexslider">
			<h3 class="title">related products</h3>

			 <div class="jcarousel-wrapper category-holder">
                <div class="jcarousel">
                    <ul>
           <?php while( have_posts() ) : the_post(); ?>
						<li>
							<figure>
								<a href="<?php echo get_permalink(); ?>" class="btn">more details</a>
					
								<?php if(get_field('available_finishes')): ?>
									<?php $i=1;?>
									<?php while(has_sub_field('available_finishes')): ?>
										<?php if ($i==1):?>
											<?php if(get_sub_field('product_image')): ?>
												<img src="<?php the_sub_field('product_image'); ?>" alt="">
												<?php else: ?> 
								<img class="placeholder" src="<?php bloginfo( 'template_url' ); ?>/images/p-image.gif" alt="">
											<?php endif; ?>
										<?php endif; ?>
									<?php $i++; ?>
									<?php endwhile; ?>
								<?php else: ?> 
								<?php endif; ?>
							</figure>
							<h4><?php the_field('collection'); ?></h4>
							<h3><?php the_title(); ?></h3>

							<?php if(get_field('available_finishes')): ?>
								<?php $i=1;?>
								<?php while(has_sub_field('available_finishes')): ?>
									<?php if ($i==1):?>
										<dl>
											<dt>Model</dt>
											<dd> # <?php the_field('model'); ?> <?php if(get_sub_field('finish_code')){ ?>-<?php the_sub_field('finish_code'); } ?></dd>
											<dt>PRICE   </dt>
											<dd>$<?php the_sub_field('price'); ?></dd>
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
													<div  class="popup" id="<?php the_field('model'); ?>">
														<div class="holder">
															<span class="model"><span>MODEL:</span>#<?php the_field('model'); ?>-<?php the_sub_field('finish_code'); ?></span>
															<span class="title"><?php the_sub_field('finishes_name'); ?></span>
															<span class="price">$<?php the_sub_field('price'); ?></span>
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
						</li>
						<?php endwhile; ?>
            
                    </ul>
                    <div class="clear"></div>
                </div>

                <a href="#" class="jcarousel-control-prev">&lsaquo;</a>
                <a href="#" class="jcarousel-control-next">&rsaquo;</a>
                <div class="jcarousel-pagination">&rsaquo;</div>
               
            </div>
			<div class="clear"></div>
		</div>
    <?php endif; ?>
    <?php wp_reset_query();?>
    
		<div class="bottom-section">
				<h3 class="title">related blog post</h3>
			<div class="wrap">
				<?php query_posts('post_type=post&posts_per_page=2' ); ?>
				<?php if(have_posts()) : while( have_posts() ) : the_post(); ?>
					<div class="post-item">
						<div class="holder">

							<?php if ( has_post_thumbnail() ) : ?>
								<figure><?php the_post_thumbnail(); ?></figure>
							<?php endif; ?>

							<strong class="date"><?php echo get_the_date('j F Y'); ?></strong>
						 	<h1><?php the_title(); ?></h1>
							<?php the_excerpt(); ?>
							<a href="<?php echo get_permalink(); ?>" class="btn">read more</a>
							
						</div>
					</div>
						<?php endwhile; ?>
				<?php endif; ?>
				<?php wp_reset_query();?>
			</div>
		</div>
		<?php endwhile; ?>
		<?php endif; ?>
	</div>
</div>
<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4ff009402e9515ba"></script>
<!-- END  MAIN SECTION -->
<?php get_footer();?>





