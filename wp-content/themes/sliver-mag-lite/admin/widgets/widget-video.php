<?php

add_action( 'widgets_init', 'silvermag_themepacific_video_widget_box' );
function silvermag_themepacific_video_widget_box() {
	register_widget( 'silvermag_themepacific_video_widget' );
}
class silvermag_themepacific_video_widget extends WP_Widget {

	function silvermag_themepacific_video_widget() {
		$widget_ops = array( 'classname' => 'silvermag_themepacific_video-widget', 'description' => 'Show YouTube and Viemo Video'  );
		$control_ops = array('id_base' => 'silvermag_themepacific_video-widget' );
		$this->WP_Widget( 'silvermag_themepacific_video-widget','ThemePacific: Video Widget', $widget_ops, $control_ops );
	}
	
	function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters('widget_title', $instance['title'] );
 		
		$embed_code = $instance['embed_code'];
		$width = 'width="100%"';
		$height = 'height="210"';
		$embed_code = preg_replace('/width="([3-9][0-9]{2,}|[1-9][0-9]{3,})"/',$width,$embed_code);
		$embed_code = preg_replace( '/height="([0-9]*)"/' , $height , $embed_code );
			
		$widthcol = 'width: 100%';
		$heightcol = 'height: 210';
		$embed_code = preg_replace('/width:"([3-9][0-9]{2,}|[1-9][0-9]{3,})"/',$widthcol,$embed_code);
		$embed_code = preg_replace( '/height: ([0-9]*)/' , $heightcol , $embed_code );  
			
		echo $before_widget;
		if ( $title )
			echo $before_title;
			echo $title ; ?>
		<?php echo $after_title; ?>
		
		<?php if ( $embed_code ): echo $embed_code ?>
 
		<?php endif; ?>
		
		
		
	<?php 
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['embed_code'] = $new_instance['embed_code'] ;
 		return $instance;
	}

	function form( $instance ) {
		$defaults = array( 'title' =>__(' Featured Video', 'silvermag'),'embed_code'=>'' );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title : </label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat" type="text" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'embed_code' ); ?>">Embed Code : </label>
			<textarea id="<?php echo $this->get_field_id( 'embed_code' ); ?>" name="<?php echo $this->get_field_name( 'embed_code' ); ?>" class="widefat" ><?php echo $instance['embed_code']; ?></textarea>
		</p>
 


	<?php
	}
}
?>