<?php get_header(); ?>		
<?php global $themepacific_data;?>
<div id="tp-section-wrap" class="clearfix">
	<div id="tp-section-left" class="eleven columns clearfix">	
 			<!--Archive content-->
		<!-- .blogposts-tp-site-wrap-->
  
 					 		<h2 class="blogpost-tp-site-wrap-title">
 							<?php if(is_day()): ?>
 								<?php printf(__('Daily Archives: %s', 'silvermag'), get_the_date()); ?>
 							<?php elseif(is_month()) : ?>
 								<?php printf(__('Monthly Archives: %s', 'silvermag'), get_the_date('F Y')); ?>
 							<?php elseif(is_year()) : ?>
 								<?php printf(__('Yearly Archives: %s', 'silvermag'), get_the_date('Y')); ?>
 							<?php elseif(is_category() || is_tag()): ?>
 								<?php printf(__('Category : %s  ', 'silvermag'), single_cat_title('', false)); ?>
 							<?php elseif(is_author()):  	?>	
 								<?php printf(__('Author : %s', 'silvermag'), $curauth->nickname);  ?>
 							<?php else: ?>
 								<?php _e('Blog Archives', 'silvermag'); ?>
 							<?php endif; ?>
  						</h2> 
						<?php 
						get_template_part( 'includes/blog', 'loop' );
						?>
  	</div>
 			<!-- END MAIN -->
 <?php get_sidebar(); ?>
 <?php get_footer(); ?>
