
<?php
/**
 * Template Name:  Bath list page Template
 */

get_header(); ?>
<?php get_template_part( 'product','search' ); ?>
<?php
   // include_once dirname(__DIR__).'/product-search.php';
    $postType = 'bath';
?>

<div class="page-holder bath-holder">
	<?php query_posts('post_type=page&page_id=705' ); ?>
  <?php if(have_posts()) : while( have_posts() ) : the_post(); ?>
  <?php
    $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
    $url = $thumb['0'];    
  ?>
	<div class="category-img main-img"  style="background-image: url(<?php echo $url; ?>);">
		
		<div class="text">
      <div class="catalog">
        <div class="holder">
          <h1><?php the_title(); ?></h1>
          <?php the_content(); ?>
        </div>
      </div>
		</div>
    
	</div>
  <?php endwhile; ?>
  <?php endif; ?>
  <?php wp_reset_query();?>
	<a href="#main" class="scrollTo top-btn"></a>
<div class="category-nav white">

	<div class="programms">
		<div class="category-nav">
			<ul>
				<li class="sort-by"><a href="#">sort by</a></li>
				<li class="mob-view"><a href="/bath-faucets">All</a></li>
				<?php 
					//list terms in a given taxonomy using wp_list_categories (also useful as a widget if using a PHP Code plugin)

					$taxonomy     = 'bath_category';
					$orderby      = 'menu_order'; 
					$show_count   = 0;      // 1 for yes, 0 for no
					$pad_counts   = 0;      // 1 for yes, 0 for no
					$hierarchical = 1;      // 1 for yes, 0 for no
					$title        = '';

					$cat_args = array(
					  'taxonomy'     => $taxonomy,
					  'orderby'      => $orderby,
					  'show_count'   => $show_count,
					  'pad_counts'   => $pad_counts,
					  'hierarchical' => $hierarchical,
					  'title_li'     => $title
					);
					?>
					<?php $categories = get_categories($cat_args); ?>
					<?php 
						foreach($categories as $category) {
							
							
							// echo '<pre>';
							// print_r($category);
							// echo '</pre>';
							
							$catid = $category->term_id;
							$catname = $category->name;
							$catslug = $category->slug;
							
							
							echo '<li class="mob-view name hover"><a href="'.esc_url( home_url( '/' ) ).'bath_category/'.$catslug.'" class="link">'.$catname.'</a></li>';
							
						} 
					?>
				</ul>
			</div>
	</div>

</div>
<!-- BEGIN MAIN SECTION -->
	<div id="main" >
		<div class="catalog kitchen">
			<div class="aside-holder">
				<span class="aside-btn">FILTER BY</span>
				<aside>
					<dl class="accordion">
						<?php $i=1; ?>
						<dt><a href="">Collections</a></dt>
						<dd class="collection-row">
							<ul>
							<?php 
								$values_style = IRHelper::getValues('collection', $postType); 
                
								foreach ($values_style as $arr) {		
									if($arr) {
										echo '<li><input type="checkbox" name="" value="'. $arr .'" id="collection-'.$i.'"><label for="collection-'.$i.'">'. $arr .'</label></li>';	
										$i++;				  	
									}
								} 
							?>
							</ul>
						</dd>
						<dt><a href="">Handles</a></dt>
						<dd class="handless-row">
							<ul>
							<?php 
								$values_handles = IRHelper::getValues('handles', $postType);

								foreach ($values_handles as $arr) {		
									if($arr) {
										echo '<li><input type="checkbox" name="" value="'. $arr .'" id="handless-'.$i.'"><label for="handless-'.$i.'">'. $arr .'</label></li>';	
										$i++;				  	
									}
								}
							?>
							</ul>
						</dd>
						<dt><a href="">Style</a></dt>
						<dd class="style-row">
							<ul>
							<?php 
								$values_styles = IRHelper::getValues('style', $postType); ; 
								$res = array();
                foreach ($values_styles as $arr) {	
                  $res = array_merge($res, explode(",", $arr));
								}
                $res = array_unique($res);
                foreach($res as $arr){
                  if($arr) {
										echo '<li><input type="checkbox" name="" value="'. $arr .'" id="style-'.$i.'"><label for="style-'.$i.'">'. $arr .'</label></li>';	
										$i++;					  	
									}
                }
                 
							?>
							</ul>
						</dd>
						<dt class="active"><a href="">Finish</a></dt>
						<dd class="finish-row">
							<ul>
							<?php 
								$values_finish = IRHelper::getValues('%finishes_name', $postType);
                
								foreach ($values_finish as $arr) {
                    
									if($arr) {
										echo '<li><input type="checkbox" name="" value="'. $arr .'" id="finishes-'.$i.'"><label for="finishes-'.$i.'">'. $arr .'</label></li>';	
										$i++;				  	
									}
								}
							?>
							</ul>
						</dd>
						<dt><a href="">Price</a></dt>
						<dd class="price-row">
              <?php 
                $price = IRHelper::getValues('%price', $postType); 

                $price0_200 = 0;
                $price200_500 = 0;
                $price500_1000 = 0;
                foreach ($price as $value) {

                  if (!preg_match('/[^0-9]/', $value)){
                    $prices[] = $value;
  
                    $price0_200 += ($value>0 && $value<=200) ? 1 : 0;
                    $price200_500 += ($value>200 && $value<=500) ? 1 : 0;
                    $price500_1000 += ($value>500 && $value <=1000) ? 1 : 0;
                  }

                }
              ?>
							<ul>
                <?php if($price0_200){ ?>
                  <li><input type="checkbox" name="" value="0-200" id="price-1"><label for="price-1">$0 - $200</label></li>
                <?php } ?>
                <?php if($price200_500){ ?>
                  <li><input type="checkbox" name="" value="200-500" id="price-2"><label for="price-2">$200 - $500</label></li>
                <?php } ?>
                <?php if($price500_1000){ ?>
                  <li><input type="checkbox" name="" value="500-1000" id="price-3"><label for="price-3">$500 - $1000</label></li>            
                <?php } ?>
							</ul>
						</dd>
						<!-- <dt><a href="">Installation</a></dt>
						<dd class="instalation-row">
							<ul>
							<?php 
								/*$values = $wpdb->get_col("SELECT meta_value FROM $wpdb->postmeta WHERE meta_key = 'mount_type'" );
								$values = array_unique($values);	
								sort($values);
								foreach ($values as $arr) {		
									if($arr) {
										echo '<li><input type="checkbox" name="" value="'. $arr .'" id="mounttype-'.$i.'"><label for="mounttype-'.$i.'">'. $arr .'</label></li>';	
										$i++;					  	
									}
								}*/
							?>
							</ul>
						</dd> -->
						<dt><a href="">Mounttype</a></dt>
						<dd class="mountype-row">
							<ul>
							<?php 
								$values_mounttype = IRHelper::getValues('mount_type', $postType);               
								foreach ($values_mounttype as $arr) {		
									if($arr) {
										echo '<li><input type="checkbox" name="" value="'. $arr .'">'. $arr .'</li>';					  	
									}
								}
							?>
							</ul>
						</dd>
					</dl>
				</aside>
			</div>
			<div class="content">
				<div class="category-holder">
					
					<div class="product-list"><!-- Start product container -->
						
				  <?php 
            $cat_args = array(
              'exclude' => "",
              'taxonomy'     => 'bath_category',
              'orderby' => 'menu_order'
            );
					?>
					<?php $categories = get_categories($cat_args); ?>
					<?php 
            // echo "<pre>";
            // print_r($categories);
            // echo "</pre>";
            
						foreach($categories as $category) {	
          
              $args = array(
              'post_type' => 'bath',
              'posts_per_page' => 3,
              
                'tax_query' => array(
                  array(
                    'taxonomy' => 'bath_category',
                    'field'    => 'slug',
                    'terms'    => $category->slug,
                  ),
                ),
             );
             
          ?>
            
            <?php $myposts = get_posts( $args ); ?>
            <div class="cat-slug" style="display: none;"></div>
            <h1 class="category-title"><?php echo $category->name; ?></h1>
            
            <ul>
            <?php foreach ( $myposts as $post ) : 
                setup_postdata( $post ); ?>
							<li>  
								<figure>
                  <a href="<?php echo get_permalink(); ?>" class="btn">more details</a>
                  <?php if(get_field('available_finishes')): ?>
                    <?php $count=1; while(has_sub_field('available_finishes')): ?>
                      <?php if(get_sub_field('thumbnail')): ?>          
                        <a href="<?php echo get_permalink(); ?>" class="image-sel class-<?php echo $count?>" rel=""><img src="<?php the_sub_field('thumbnail'); ?>" alt=""></a>
                      <?php else: ?> 
                        <a href="<?php echo get_permalink(); ?>" class="" rel=""><img class="placeholder" src="<?php bloginfo( 'template_url' ); ?>/images/p-image.gif" alt=""></a>
                      <?php endif; ?>
                    <?php $count++; endwhile; ?>
                  <?php endif; ?>
                </figure>
                <div class="prod-desc">
                  <h4><?php the_field('collection'); ?></h4>
                  <h3><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>

                  <?php if(get_field('available_finishes')): ?>
                    <?php $i=1;?>
                    <?php while(has_sub_field('available_finishes')): ?>
                      <?php if ($i==1):?>
                        <dl style="margin-bottom: 0;">
                          <dt>Model </dt>
                          <dd># <?php the_field('model'); ?></dd>
                        </dl>
                        <dl>
                          <dt>PRICE </dt>
                          <dd>&nbsp; <?php 
                              $rows = $wpdb->get_col("SELECT meta_value FROM wp_postmeta met INNER JOIN wp_posts pst ON pst.id=met.post_id WHERE meta_key LIKE '%price%' AND pst.id='$post->ID'");
                                $prices = array();

                              foreach ($rows as $value) {
                                if (!preg_match('/[^0-9]/', $value)){
                                  $prices[] = $value; 
                                }
                              }
                              $start_price = min($prices);
                              $end_price = max($prices);
                              echo '<span class="min-value">$<span>'.$start_price.'</span></span>';
                              echo ' - ';
                              echo '<span class="max-value">$<span>'.$end_price.'</span></span>';
                            ?>							
                          </dd>
                        </dl>
                      <?php endif; ?>
                    <?php $i++; ?>
                    <?php endwhile; ?>
                  <?php else: ?>
                  <?php endif; ?>
                  <div class="finishes-list">
                    <ul>
                      <?php if(get_field('available_finishes')): ?>
                        <?php $i=1;?>
                        <?php while(has_sub_field('available_finishes')): ?>
                          <?php if ($i<=4):?>
                            <li>
                              <figure >
                                <a href="#<?php the_sub_field('model'); ?>" class="open_popup" rel="<?php the_sub_field('model'); ?>" rev="class-<?php echo $i; ?>"><img src="<?php the_sub_field('color_swatch'); ?>" alt=""></a>
                              </figure>
                              <div  class="popup">
                                <div class="holder">
                                  <span class="model"><span>MODEL:</span>#<?php the_field('model'); ?><?php if(get_sub_field('finish_code')){ ?>-<?php the_sub_field('finish_code'); } ?></span>
                                  <span class="title"><?php the_sub_field('finishes_name'); ?></span>
                                  <span class="price">$<?php the_sub_field('price'); ?></span>
                                  <span class="disclaimer"><?php the_sub_field('finishes_disclaimer'); ?></span>
                                </div>
                              </div>		
                            </li>

                          <?php endif; ?>
                          <?php if ($i>4):?>
                           
                          <?php endif; ?>
                        <?php $i++; ?>
                        <?php endwhile; ?>
                         <li>
                              <a href="<?php echo get_permalink(); ?>" class="plus">+</a>
                            </li>
                      <?php else: ?>
                      <?php endif; ?>
                    </ul>
                  </div>
                </div>
							</li>
              
            <?php endforeach; ?>
            <?php wp_reset_postdata(); ?> 
            </ul>
            
            <div class="btn-line">
              <div class="btn-view-all">
                <a href="<?php echo get_term_link($category->slug, 'bath_category'); ?> " class="btn">VIEW ALL</a>
              </div>
            </div>
						<?php } ?>

					</div><!-- End product container -->
						
				</div>
				
				<div class="about-links-section">
					<?php query_posts('post_type=page&page_id=239' ); ?>
					<?php if(have_posts()) : while( have_posts() ) : the_post(); ?>
						<h1>About Us</h1>
						<div class="holder">
							<div class="col">
								<div class="img-holder">
									<figure><a href="<?php the_field('link_1'); ?>"><img src="<?php the_field('image_1'); ?>" alt=""></a></figure>
								</div>
								<h4><a href="<?php the_field('link_1'); ?>"><?php the_field('title_1'); ?></a></h4>
								<p><?php the_field('text_1'); ?></p>
							</div>
							<div class="col">
								<div class="img-holder">
									<figure><a href="<?php the_field('link_2'); ?>"><img src="<?php the_field('image_2'); ?>" alt=""></a></figure>
								</div>
								<h4><a href="<?php the_field('link_2'); ?>"><?php the_field('title_2'); ?></a></h4>
								<p><?php the_field('text_2'); ?></p>
							</div>
							<div class="col">
								<div class="img-holder">
									<figure><a href="<?php the_field('link_3'); ?>"><img src="<?php the_field('image_3'); ?>" alt=""></a></figure>
								</div>
								<h4><a href="<?php the_field('link_3'); ?>"><?php the_field('title_3'); ?></a></h4>
								<p><?php the_field('text_3'); ?></p>
							</div>
						</div>

						<div class="holder-mobile flexslider">
							<ul class="slides">
								<li class="col">
									<div class="img-holder">
										<figure><a href="<?php the_field('link_1'); ?>"><img src="<?php the_field('image_1'); ?>" alt=""></a></figure>
									</div>
									<h4><a href="<?php the_field('link_1'); ?>"><?php the_field('title_1'); ?></a></h4>
									<p><?php the_field('text_1'); ?></p>
								</li>
								<li class="col">
									<div class="img-holder">
										<figure><a href="<?php the_field('link_2'); ?>"><img src="<?php the_field('image_2'); ?>" alt=""></a></figure>
									</div>
									<h4><a href="<?php the_field('link_2'); ?>"><?php the_field('title_2'); ?></a></h4>
									<p><?php the_field('text_2'); ?></p>
								</li>
								<li class="col">
									<div class="img-holder">
										<figure><a href="<?php the_field('link_3'); ?>"><img src="<?php the_field('image_3'); ?>" alt=""></a></figure>
									</div>
									<h4><a href="<?php the_field('link_3'); ?>"><?php the_field('title_3'); ?></a></h4>
									<p><?php the_field('text_3'); ?></p>
								</li>
							</ul>
						</div>

					<?php endwhile; ?>
					<?php endif; ?>
					<?php wp_reset_query();?>
				</div>
			</div>
		</div>
</div>
<a class="top-btn"></a>
<!-- END  MAIN SECTION -->
<?php get_footer();?>





