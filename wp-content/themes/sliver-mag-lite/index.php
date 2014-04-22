<?php get_header(); ?>
<!--#tp-section-wrap-->
<div id="tp-section-wrap" class="clearfix">
 <!--#tp-section-left-or-right-->
 	<div id="tp-section-left" class="eleven columns clearfix">	
 						<div class="blogposts-wrap">
							<h2 class="blogpost-tp-site-wrap-title"><?php _e('Recent Posts', 'silvermag'); ?></h2>
						<?php
   							get_template_part( 'includes/blog', 'loop' );
 							?>
					 </div>
  					<?php dynamic_sidebar('Magazine Style Widgets)'); ?>
    	</div>
 	<!-- /blocks col -->
 <?php get_sidebar();  ?>
 <?php get_footer(); ?>
