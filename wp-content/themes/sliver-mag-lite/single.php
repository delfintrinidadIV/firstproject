<?php get_header(); ?>
<!-- #tp-section-wrap-->
<div id="tp-section-wrap" class="clearfix">
    <?php if (have_posts()) : while (have_posts()) : the_post();  ?> 
	
	<!-- /blocks Left -or -right -->
	<div id="tp-section-left" <?php post_class('eleven columns');?>>	 		
		
		<!-- .post-content-->
		<div class="post-content">
 
		<!--/.post-outer -->
			<div class="post-outer clearfix">
			
 				<!--.post-title-->
 				  <div class="post-title"><h1 class="entry-title"><?php the_title(); ?></h1></div>
				  <!--/.post-title-->
 		<!--/#post-meta --> 
			<div class="post-meta-blog">
			<span class="meta_author vcard author"><span class="fn">  <?php the_author_posts_link(); ?></span></span>
			<span class="meta_date updated"> <?php the_time('F d, Y'); ?></span>
  			<span class="meta_comments">  <a href="<?php comments_link(); ?>"><?php comments_number('0 Comment', '1 Comment', '% Comments'); ?></a></span>
 			<?php edit_post_link( __( 'Edit', 'silvermag' ), '<span class="edit-link">', '</span>' ); ?>
 			</div>
			<!--/#post-meta --> 
 
 			  <div class = 'post_content entry-content'>
  					<?php the_content(); ?>
  					<div class="clear"></div>
  			 </div>	
			 <!-- /.post_content -->
					<?php wp_link_pages(); ?>
   					<div class='clear'></div>
				
			</div>
		<!--/.post-outer -->
	<?php  if(isset($themepacific_data['posts_tags'] )) {if($themepacific_data['posts_tags'] == '1'){ ?>
					<p class="post-tags">
						<strong><?php _e('TOPICS', 'silvermag'); ?> </strong><?php the_tags('',''); ?>					
						</p>
	<?php } }?>		
 
 		</div>
		<!-- post-content-->
 
			 <?php if(isset($themepacific_data['posts_navigation'] )) {if($themepacific_data['posts_navigation'] == '1'){ ?>
 		 		<!-- .single-navigation-->
			<div class="single-navigation clearfix">
					<div class="previous"><?php previous_post_link('%link', __( '<span>Previous: </span> %title', 'bresponZive' ) ); ?></div>
					<div class="next"><?php next_post_link('%link', __( '<span>Next: </span> %title', 'bresponZive' ) ); ?></div>
					 <?php  ?>
				</div>
				<!-- /single-navigation-->
 			<?php } } ?>
 
   					<?php comments_template(); ?>
 				<?php endwhile; endif; ?>
			
			</div>
			<!-- /blocks Left-->
 			
<?php  get_sidebar(); ?>
			
<?php get_footer(); ?>
