	
<div class="blog-lists-blog clearfix">
	 <div id="themepacific_infinite" class="blogposts-tp-site-wrap clearfix"> 
 		 <?php  if (have_posts()) : while (have_posts()) : the_post(); 
				get_template_part( 'content'); 
				endwhile;
		 ?>
				 
		<?php  else: ?>
 				<h2 class="noposts"><?php _e('Sorry, no posts to display!', 'silvermag'); ?></h2> 
	
 <?php endif;?>
			</div>	
</div>					 <?php wp_reset_query();?>
  		<div class="pagination clearfix">
			<?php silvermag_themepacific_tpcrn_pagination();   ?>
		</div>
 
 