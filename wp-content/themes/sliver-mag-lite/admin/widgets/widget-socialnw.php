<?php
/*************************************************************************************
	Plugin Name: Social Network Icons Widget
	Description: It will display Social Nw Icons.
	Author: ThemePacific
	Author URI: http://themepacific.com					
***************************************************************************/
/**
 * Add function to widgets_init that'll load our widget.
 * @since 0.1
 */
add_action( 'widgets_init', 'silvermag_themepacific_social_widget_box' );
/**
 * Register our widget.
 * 'Example_Widget' is the widget class used below.
 * 
 * @since 0.1
 */
function silvermag_themepacific_social_widget_box() {
	register_widget( 'silvermag_themepacific_social_widget' );
}
/**
 * Example Widget class.
 * This class handles everything that needs to be handled with the widget:
 * the settings, form, display, and update.  Nice!
 *
 * @since 0.1
 */
class silvermag_themepacific_social_widget extends WP_Widget {

	function silvermag_themepacific_social_widget() {
		$widget_ops = array( 'classname' => 'tpcrn-social-icons-widget', 'description' => 'Display Social Icons' );
		$control_ops = array($control_ops = array('id_base' => 'silvermag_themepacific_social_icons-widget'));
		$this->WP_Widget( 'social','ThemePacific: Social Icons', $widget_ops, $control_ops );
	}
	
	function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters('widget_title', $instance['title'] );		 		
		$fb = $instance['fb'];		 		
		$gp = $instance['gp'];		 		
		$rss = $instance['rss'];		 		
		$tw = $instance['tw'];		
		$in = $instance['in'];		
		$yt = $instance['yt'];		
		$fr = $instance['fr'];		
/* Before widget (defined by themes). */
		echo $before_widget;
		if($title)
			echo $before_title . $title . $after_title;
		/* Display the widget title if one was input (before and after defined by themes). */ 		
  ?>
  
			<div class="widget">
	<div class="social-icons">
		<?php
		$icons_path =  get_stylesheet_directory_uri().'/images/social-icons';
		 $rss = get_bloginfo('rss2_url'); 
			?>
			
		<?php if($rss){ ?>	
		<a   title="RSS Feed" href="<?php echo $rss ; ?>" ><img src="<?php echo $icons_path; ?>/rss.png" alt="RSS Feed"  /></a> 
		 <?php } if($gp){ ?>
		 <a  title="Google+" href="<?php echo $gp; ?>" ><img src="<?php echo $icons_path; ?>/gp.png" alt="Google+"  /></a> 
		 <?php } if($fb){ ?>
		 <a  title="Facebook" href="<?php echo $fb; ?>" ><img src="<?php echo $icons_path; ?>/fb.png" alt="Facebook"  /></a> 
		 <?php } if($tw){ ?>
		 <a  title="Twitter" href="<?php echo $tw ; ?>" ><img src="<?php echo $icons_path; ?>/tw.png" alt="Twitter"  /></a> 
		 <?php } if($yt){ ?>
		<a  title="YouTube" href="<?php echo $yt ; ?>" ><img src="<?php echo $icons_path; ?>/yt.png" alt="YouTube"  /></a> 
		<?php } if($in){ ?>
		<a  title="LinkdeIn" href="<?php echo $in; ?>" ><img src="<?php echo $icons_path; ?>/in.png" alt="LinkedIn"  /></a> 
		<?php } if($fr){ ?>
		<a  title="Flickr" href="<?php echo $fr ; ?>" ><img src="<?php echo $icons_path; ?>/fr.png" alt="Flickr"  /></a> 
		<?php } ?>
	</div>
			</div>
		 		<?php	
	/* After widget (defined by themes). */
		echo $after_widget;		
	
	}
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['rss'] = strip_tags( $new_instance['rss'] );
		$instance['fb'] = strip_tags( $new_instance['fb'] );
		$instance['gp'] = strip_tags( $new_instance['gp'] );
		$instance['tw'] = strip_tags( $new_instance['tw'] );
		$instance['in'] = strip_tags( $new_instance['in'] );
		$instance['yt'] = strip_tags( $new_instance['yt'] );
		$instance['fr'] = strip_tags( $new_instance['fr'] );
 		return $instance;
	}

	function form( $instance ) {
		$defaults = array( 'title' =>__('Social' , 'silvermag') , 'rss' =>__('Feed URL' , 'silvermag') , 'fb' =>__('Facebook URL' , 'silvermag') , 'gp' =>__('Google+ URL' , 'silvermag') , 'tw' =>__('Twitter URL' , 'silvermag') , 'in' =>__('LinkedIn URL' , 'silvermag') , 'yt' =>__('YouTube URL' , 'silvermag') , 'fr' =>__('Flickr URL' , 'silvermag')   );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title : </label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat" type="text" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'rss' ); ?>">RSS </label>
			<input id="<?php echo $this->get_field_id( 'rss' ); ?>" name="<?php echo $this->get_field_name( 'rss' ); ?>" value="<?php echo $instance['rss']; ?>" class="widefat" type="text" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'fb' ); ?>">Facebook : </label>
			<input id="<?php echo $this->get_field_id( 'fb' ); ?>" name="<?php echo $this->get_field_name( 'fb' ); ?>" value="<?php echo $instance['fb']; ?>" class="widefat" type="text" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'gp' ); ?>">Google+ : </label>
			<input id="<?php echo $this->get_field_id( 'gp' ); ?>" name="<?php echo $this->get_field_name( 'gp' ); ?>" value="<?php echo $instance['gp']; ?>" class="widefat" type="text" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'tw' ); ?>">Twitter : </label>
			<input id="<?php echo $this->get_field_id( 'tw' ); ?>" name="<?php echo $this->get_field_name( 'tw' ); ?>" value="<?php echo $instance['tw']; ?>" class="widefat" type="text" />
		</p>

 		<p>
			<label for="<?php echo $this->get_field_id( 'in' ); ?>"> LinkedIn : </label>
			<input id="<?php echo $this->get_field_id( 'in' ); ?>" name="<?php echo $this->get_field_name( 'in' ); ?>" value="<?php echo $instance['in']; ?>" class="widefat" type="text" />
		</p>

 		<p>
			<label for="<?php echo $this->get_field_id( 'yt' ); ?>">YouTube : </label>
			<input id="<?php echo $this->get_field_id( 'yt' ); ?>" name="<?php echo $this->get_field_name( 'yt' ); ?>" value="<?php echo $instance['yt']; ?>" class="widefat" type="text" />
		</p>

 		<p>
			<label for="<?php echo $this->get_field_id( 'fr' ); ?>">Flickr : </label>
			<input id="<?php echo $this->get_field_id( 'fr' ); ?>" name="<?php echo $this->get_field_name('fr'); ?>" value="<?php echo $instance['fr']; ?>" class="widefat" type="text" />
		</p>

 
 
		


	<?php
	}
}
?>
