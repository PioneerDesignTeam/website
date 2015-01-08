<?php
/**
 * The template for displaying Search Results pages
 * @package Pioneer
 */

get_header(); 

include_once 'product-search.php';

 if($_GET['post']){
  $posts = $_GET['post'];
 }
?>
<?php if($posts != 'posts') {?>
<div class="page-holder  search-holder">
<div class="category-nav white">

	<div class="search-title">
    <h1>
      <?php
        $search_count = 0;
        $args = array(
          'post_type' => array('bath', 'kitchen'),
          'posts_per_page' => -1,
          's' => $s,
          'post_status' => 'publish'
        );
        $search = new WP_Query($args);
        if($search->have_posts()) : while($search->have_posts()) : $search->the_post();
        $search_count++;
        endwhile; endif;
        echo $search_count;
        wp_reset_query(); ?>
       
    Search Results for: <?php echo get_search_query(); ?></h1>
    <div class="search-box">
      <form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ) ?>" >
        <input type="text" value="" placeholder="Try another search..." name="s" id="s" />
        <input type="submit" id="searchsubmit" value="submit" />
      </form>
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
                //$postType = "bath, kitchen";
                  $values_style = array_merge(IRHelper::getValues('collection', 'bath'/*, $taxonomyId*/),IRHelper::getValues('collection', 'kitchen'/*, $taxonomyId*/));
                  $values_style = array_unique($values_style);   
                  foreach ($values_style as $arr) {
                      if ($arr) {
                          echo '<li><input type="checkbox" name="" value="' . $arr . '" id="collection-' . $i . '"><label for="collection-' . $i . '">' . $arr . '</label></li>';
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
								$values_handles = array_merge(IRHelper::getValues('handles', 'bath'/*, $taxonomyId*/), IRHelper::getValues('handles', 'kitchen'/*, $taxonomyId*/));
                $values_handles = array_unique($values_handles);                
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
								$values_styles = array_merge(IRHelper::getValues('style', 'bath'/*, $taxonomyId*/), IRHelper::getValues('style', 'kitchen'/*, $taxonomyId*/));
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
								$values_finish = array_merge(IRHelper::getValues('%finishes_name', 'bath'/*, $taxonomyId*/), IRHelper::getValues('%finishes_name', 'kitchen'/*, $taxonomyId*/));
                $values_finish = array_unique($values_finish);
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
                $price = array_merge(IRHelper::getValues('%price', 'bath'/*, $taxonomyId*/),IRHelper::getValues('%price', 'kitchen'/*, $taxonomyId*/));
                $price = array_unique($price);
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
								$values_mounttype = array_merge(IRHelper::getValues('mount_type', 'bath'/*, $taxonomyId*/),IRHelper::getValues('mount_type', 'kitchen'/*, $taxonomyId*/)); 
                $values_mounttype = array_unique($values_mounttype);
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
						<ul>
            <?php $paged = get_query_var('paged') ? get_query_var('paged') : 1;  ?>
            <?php $search = get_search_query();
              $args = array(
                
                'posts_per_page' => -1,
                's' => $search,
                'post_type' => array('bath', 'kitchen'),
                'post_status' => 'publish',
                'paged' => $paged,
                'orderby'=> 'date',
                'order'=> 'DESC'
              ); 
            ?>
            <?php query_posts($args); ?>
              
						<?php while( have_posts() ) : the_post(); ?>
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
                                  <span class="model"><span>MODEL:</span>#<?php the_field('model'); ?>-<?php the_sub_field('finish_code'); ?></span>
                                  <span class="title"><?php the_sub_field('finishes_name'); ?></span>
                                  <span class="price"><?php the_sub_field('price'); ?></span>
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
							<?php endwhile; ?>
              <?php wp_pagenavi(); ?>
              <?php wp_reset_query(); ?>
						</ul>
					</div><!-- End product container -->
						
				</div>
			</div>
		</div>
</div>
</div>
<?php } else { ?>
<div class="page-holder">
  <div class="category-nav white">

    <div class="search-title">
      <h1>
        <?php
          $search_count = 0;
          $args = array(
            'post_type' => array('post'),
            'posts_per_page' => -1,
            's' => $s,
            'post_status' => 'publish'
          );
          $search = new WP_Query($args);
          if($search->have_posts()) : while($search->have_posts()) : $search->the_post();
          $search_count++;
          endwhile; endif;
          echo $search_count;
          wp_reset_query(); ?>
         
      Search Results for: <?php echo get_search_query(); ?></h1>
      <div class="search-box">
        <form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ) ?>" >
          <input type="text" value="<?php echo get_search_query(); ?>" placeholder="Search" name="s" id="s" />
          <input type="hidden" name="post" value="posts" />
          <input type="submit" id="searchsubmit" value="submit" />
        </form>
      </div>
    </div>

  </div>
	<div id="main">
		<section class="blog-section">

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
				<div class="post-list">
					<ul>
					<?php $paged = get_query_var('paged') ? get_query_var('paged') : 1;  ?>

					<?php 
            $args = array(
              'post_type' => array('post'),
              'posts_per_page' => -1,
              's' => $s,
              'post_status' => 'publish',
              'paged' => $paged       
            );
            query_posts($args); ?>
					<?php if(have_posts()) : while( have_posts() ) : the_post(); ?>
						<li>
							<span class="post-category"><?php the_category(); ?></span>

							<?php if ( has_post_thumbnail() ) : ?>
								<a href="<?php echo get_permalink(); ?>"><figure><?php the_post_thumbnail(); ?></figure></a>
							<?php endif; ?>

							<div class="text">
								<span class="comment-num">
								<a href="<?php echo get_permalink(); ?>"><?php comments_number('0', '1', '%'); ?></a>
								</span>

								<strong class="date"><?php echo get_the_date('j F Y'); ?></strong>
									
								<a href="<?php echo get_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
								<?php the_excerpt(); ?>
							</div>
						</li>
						<?php endwhile; ?>

						<?php wp_pagenavi(); ?>

					<?php endif; ?>
					<?php wp_reset_query();?>
					</ul>
				</div>
			</div>
		</section>
	</div>
</div>
<?php } ?>
<!-- END  MAIN SECTION -->
<?php get_footer();?>


