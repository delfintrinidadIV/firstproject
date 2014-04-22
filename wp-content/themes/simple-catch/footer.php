<?php
/**
 * The template for displaying the footer.
 *
 * @package Catch Themes
 * @subpackage Simple_Catch
 * @since Simple Catch 1.0
 */
?>
	<div id="footer">
    	<div class="layout-978">
			<?php //Displaying footer logo ?>
            <div class="col7 copyright no-margin-left">
				<?php if( function_exists( 'simplecatch_footerlogo' ) ) :
						simplecatch_footerlogo(); 
					  endif;	
				?><?php _e( 'Copyright', 'simplecatch' ); ?> &copy; <?php echo date("Y"); ?> <span><?php _e( 'Local Government Unit of Ocampo', 'simplecatch' );?></span>. <?php _e( 'All Rights Reserved.', 'simplecatch' ); ?>
            </div><!-- .col7 -->
            
          
            
		</div><!-- .layout-978 -->
	</div><!-- #footer -->      
<?php wp_footer(); ?>
</body>
</html>