<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a Simple Catch theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @package Catch Themes
 * @subpackage Simple_Catch
 * @since Simple Catch 1.0
 */

get_header(); 
	
	if ( function_exists( 'simplecatch_display_div' ) ) {
		$themeoption_layout = simplecatch_display_div();
	}

echo '<img src="http://cdn.slamonline.com/online/wp-content/uploads/2013/01/kevin_durant_wallpaper.jpg" alt="some_text">';
	echo '<h4>LGU NEWS</h4>';
		echo '<div class="div1"></div>';
    get_template_part( 'content' );
	echo '<div class="div1"></div>';
	
	   	?>
		<?php echo '<img src="http://wallfoy.com/wp-content/uploads/2014/02/Kevin-Durant-Wallpaper-28.jpg" alt="some_text">';?>  	
				
	</div><!-- #content -->

	<?php 
	
    if ( $themeoption_layout == 'right-sidebar' ) {
		
        get_sidebar(); 
    }?>
       
	</div><!-- #main --> 
	
       <?php echo '<center>____________________________________________________________________________________________________________________';?> 
<?php get_footer(); ?>