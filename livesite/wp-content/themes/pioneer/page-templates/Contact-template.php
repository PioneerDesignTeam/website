
<?php
/**
 * Template Name: Contact Template
 */

get_header(); ?>



<div class="page-holder">
	<a href="#main" class="scrollTo top-btn"></a>
	<!-- BEGIN MAIN SECTION -->
	<div id="main">
		<!-- BEGIN contact-info E SECTION -->
		<section class="page-section contact-info">
			<?php query_posts('post_type=page&page_id=347' ); ?>
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
							<div class="container">
								<div class="row">
									<div class="span6">
										<div class="info-box">
											<?php		
											if( have_rows('emails') ):
											while ( have_rows('emails') ) : the_row();?>
												<strong><?php the_sub_field('name');?></strong>
												<span><a href="mailto:<?php the_sub_field('email');?>"><?php the_sub_field('email');?></a></span>
											<?php endwhile;
											endif;?></div>
									</div>
									<div class="span6">
										<div class="info-box telephones">
											<?php		
											if( have_rows('numbers') ):
											while ( have_rows('numbers') ) : the_row();?>
												<strong><?php the_sub_field('title');?></strong>
												<em><?php the_sub_field('number');?>
													<span><?php the_sub_field('description');?></span>
												</em>
											<?php endwhile;
											endif;?>
											<p><?php the_field('numbers_description');?></p>

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php endwhile; ?>
			<?php endif; ?>
			<?php wp_reset_query();?>
		</section>
		<!-- END contact-info SECTION -->

		<!-- BEGIN MAP SECTION -->
		<section class="page-section contact-map-section">
			<?php query_posts('post_type=page&page_id=347' ); ?>
			<?php if(have_posts()) : while( have_posts() ) : the_post(); ?>
					<div class="page-content">

							<div class="heading">
								<img src="<?php echo get_template_directory_uri(); ?>/images/address-ico-2.png" alt="">
								<h4>address</h4>
								<span><?php the_field('address');?></span>
							</div>
							<div class="map-holder">
								<a href="javascript:;" class="btn map-opener opener-btn">VIEW map</a>
								<div class="map-frame">
									<a href="#" class="btn map-opener close-btn">close map</a>
									<div class="map"><div id="map_canvas" class="google-map">
										<script>
													 function mapOne(){
											      var latlng = new google.maps.LatLng(<?php the_field('latitude');?>, <?php the_field('longitude');?>);  
											      var myOptions = {
											          zoom: 14,
											          center: latlng,
                                scrollwheel: false,
											          mapTypeId: google.maps.MapTypeId.ROADMAP,
											          mapTypeControl:false
											      };
											      var map = new google.maps.Map(document.getElementById("map_canvas"),myOptions);
											      
											      var marker = new google.maps.Marker({
											        position: latlng ,
											        visible: true,
											        icon: '<?php echo get_template_directory_uri(); ?>/images/map-ico.png'           //Please use abolute path here
											      });
											      marker.setMap(map);
											   

											  // Creating an InfoWindow object
												var infowindow = new google.maps.InfoWindow({
													content: 'Custom popup  text here'
												});
												google.maps.event.addListener(marker, 'click', function() {
													  infowindow.open(map, marker);
													}); 
											  
											  }
											  
											jQuery(window).load(function(){  
												if ( jQuery('#map_canvas').length ) {
													mapOne(); 
												}
											});	</script>
								</div>
							</div>
					</div>
					<?php endwhile; ?>
			<?php endif; ?>
			<?php wp_reset_query();?>
		</section>
		<!-- END MAP SECTION -->
		<!-- BEGIN MAP SECTION -->
		<section class="page-section map-sec">
			<?php query_posts('post_type=page&page_id=347' ); ?>
			<?php if(have_posts()) : while( have_posts() ) : the_post(); ?>

						<div class="contact-form">
							<div class="title-holder">
								<div class="title">
									<strong>Contact</strong>
									<span>FORM</span>
								</div>
								<p>Pioneer is here to help, we’d like to hear from you!</p>
							</div>
							<div class="form-holder">
								<?php echo do_shortcode(get_post_meta(get_the_ID(), 'contact_form', true)); ?>
								<span class="required">all fields are reQuired</span>
							</div>
						</div>

					<?php endwhile; ?>
			<?php endif; ?>
			<?php wp_reset_query();?>
		</section>
		<!-- END MAP SECTION -->

		

	</div>
<!-- END  MAIN SECTION -->
<?php get_footer();?>


		
