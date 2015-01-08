<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one
 * of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query,
 * e.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Pioneer
 */

get_header(); ?>

<div class="page-holder">
<!-- BEGIN MAIN SECTION -->
	<div id="main">
	<?php if(have_posts()) : while( have_posts() ) : the_post(); ?>
					<div class="post-item">
						<span class="title">inspiration blog</span>
						<div class="holder">

							<?php if ( has_post_thumbnail() ) : ?>
								<figure><?php the_post_thumbnail(); ?></figure>
							<?php endif; ?>

							<?php the_date('d F Y', '<strong class="date">', '</strong>'); ?>
						 	<h1><?php the_title(); ?></h1>
							<?php the_content(); ?>
							<a href="<?php echo get_permalink(); ?>" class="btn">read more</a>
							
						</div>

					</div>
						<?php endwhile; ?>
				<?php endif; ?>
	</div>
	</div>
<!-- END  MAIN SECTION -->
<?php get_footer();?>

