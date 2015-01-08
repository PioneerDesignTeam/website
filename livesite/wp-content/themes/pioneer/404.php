<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

	<div id="primary" class="page-holder">
		<div id="content" class="site-content" role="main">
      <div class="inner">  

          <h1 class="page-title"><?php _e( '404 error: Page not found', 'twentyfourteen' ); ?></h1>
          <p class="first-child">The URL you requested was not found.</p>
          
          <p>Here are some things you might find helpful:</p>
          <ul>
            <li><a href="/">Homepage</a></li>
            <li><a href="/contact-us/">Contact</a></li>
          </ul>

      </div>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php
get_footer();
