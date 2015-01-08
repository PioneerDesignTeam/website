<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<div id="main-content" class="main-content">

<?php
	if ( is_front_page() && twentyfourteen_has_featured_posts() ) {
		// Include the featured content template.
		get_template_part( 'featured-content' );
	}
?>
	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();

					// Include the page content template.
					get_template_part( 'content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
				endwhile;
			?>
	<?php if ( get_field('test_field') ) : ?>
		
		<h1><?php the_field('test_field'); ?></h1>


    <?php endif; ?>

    	<?php if ( get_field('test_img') ) : ?>
		
		<img src="<?php the_field('test_img'); ?>" alt="">


    <?php endif; ?>
 
















<?php query_posts('post_type=slider'); ?>

	<?php if(have_posts()) : while( have_posts() ) : the_post(); ?>

            <?php if( have_rows('test_repeater') ): ?>
		 
				    <ul>
				 
					    <?php while( have_rows('test_repeater') ): the_row(); ?>
					 
					        <li>
					        	<img src="<?php the_sub_field('img'); ?> " alt="">
					        		<?php if ( get_field('description') ) : ?>
					        			
					        			<h1><?php the_field('description'); ?></h1>


					        	    <?php else : ?>

                                              tyru65tru5ru5ru  

					        	    <?php endif; ?>
					        </li>

					        
					    <?php endwhile; ?>
					 
				    </ul>
			 
			<?php endif; ?>

			<?php the_excerpt(); ?>

		
		<?php endwhile; ?>
	<?php endif; ?>

<?php wp_reset_query();?> 	













		</div><!-- #content -->
	</div><!-- #primary -->
	<?php get_sidebar( 'content' ); ?>
</div><!-- #main-content -->

<?php
get_sidebar();
get_footer();
