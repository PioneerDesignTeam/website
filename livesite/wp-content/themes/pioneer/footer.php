<?php
/*
 * @package Pioneer
 */
?>



<!-- END  MAIN SECTION -->
</div>
<!-- BEGIN FOOTER -->
		<footer id="footer">
			<div class="footer-holder">
				<div class="top">
					<div class="frame">
						<div class="logo-holder">
							<h1 class="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php bloginfo( 'template_url' ); ?>/images/logo2.png" alt=""><span><?php bloginfo( 'name' ); ?></span></a></h1>
						</div>
						<div class="footer-nav">
							<?php wp_nav_menu( array('menu' => 'Footer Menu' )); ?>
						</div>
					</div>
					<div class="form-holder">
            <label>newsletter sign up</label>
            <?php
              if( function_exists( 'mc4wp_form' ) ) {
                mc4wp_form();
              }
            ?>
					</div>
				</div>
				<div class="bottom">
					<div style="float: left;">
            <div class="bottom-links">
              <?php wp_nav_menu( array('menu' => 58 )); ?>
            </div>
						<ul>
							<li>&copy; 2014 Pioneer Industries, Inc. All Rights Reserved</li>
							<!-- <li><a href="">Privacy Policy</a></li>
							<li><a href="">Terms and Conditions</a></li> -->
						</ul>
            
					</div>
					<span class="by">Handcrafted by <a href="http://isadoradesign.com" target="_blank">Isadora Design</a></span>
				</div>
			</div>
		</footer>
<!-- END FOOTER -->
		</div>
		<?php wp_footer(); ?>
		<!-- Placeholder -->
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script> 
		
	</body>

</html>