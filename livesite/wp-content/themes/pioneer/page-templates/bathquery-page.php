<?php
/**
 * Template Name: Bath query
 */
 
?>

<?php 

	function getArray($type) {
		if($_REQUEST[$type]) {
			return explode(',',str_replace('\\','',$_REQUEST[$type]));
		} else {
			return array();
		}
	}

	$array_collection = getArray('Collection');
	$array_handles = getArray('Handles');
	$array_style = getArray('Style');
	$array_finishes = getArray('Finishes');
	$array_mountype = getArray('Mounttype');
	$array_price = getArray('Price');
  
  $cat = str_replace('\\','',$_REQUEST['Cat']);

?>
<?php
	$args = array(
		'post_type' => 'bath',  
		'posts_per_page' => 9,
    'tax_query' => array(),
		'meta_query' => array( 
			'relation' => 'AND'
		)
	); 
  if($cat){  
    $args['tax_query'][] = array(

        'taxonomy' => 'bath_category',
        'field'    => 'slug',
        'terms'    => $cat,
     
    );
	}
	if ($array_collection) {
		$args['meta_query'][] = array(
		'key' => 'collection',
		'value' => $array_collection,
		'compare' => 'IN'       
		);
	}

	if ($array_handles) {
		$args['meta_query'][] = array(
		'key' => 'handles',
		'value' => $array_handles,
		'compare' => 'IN'      
		);
	}
	if ($array_style) {
		$args['meta_query'][] = array(
		'key' => 'style',
		'value' => $array_style,
		'compare' => 'IN'      
		);
	}
	
	if ($array_mountype) {
		$args['meta_query'][] = array(
		'key' => 'mount_type',
		'value' => $array_mountype,
		'compare' => 'IN'      
		);
	}
	if ($array_price) {
		$args['meta_query'][] = array(
		'key' => 'available_finishes_%_price',
		'value' => $array_price,
		'compare' => 'IN'      
		);
	}

	if ($array_finishes) {

		$args['meta_query'][] = array(
		'key' => 'available_finishes_%_finishes_name',
		'value' => $array_finishes,
		'compare' => 'IN'      
		);

	}
	
?>
<?php 
	/*echo "<pre>";
	print_r($args);
	echo "</pre>";*/
?>


<?php $query = new WP_Query($args); 
///echo $query->request;
?>
<ul>
<?php if ($query->have_posts()) :  ?>

	<?php while ( $query->have_posts()) : $query->the_post(); ?>
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
			<h3><?php the_title(); ?></h3>

			<?php if(get_field('available_finishes')): ?>
				<?php $i=1;?>
				<?php while(has_sub_field('available_finishes')): ?>
					<?php if ($i==1):?>
						<dl style="margin-bottom: 0;">
							<dt>Model</dt>
							<dd> # <?php the_field('model'); ?></dd>
            </dl>
            <dl>
							<dt>PRICE   </dt>
							<dd>
								<?php 
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
									<div  class="popup" >
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
		<?php endwhile; ?>
	<?php endif; ?>
<?php wp_reset_query();?>
</ul>





