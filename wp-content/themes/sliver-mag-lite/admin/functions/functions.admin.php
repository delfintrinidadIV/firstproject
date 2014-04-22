<?php
 /**
 * Head Hook
 *
 * @since 1.0.0
 */
function silvermag_themepacific_of_head() { do_action( 'silvermag_themepacific_of_head' ); }

/**
 * Add default options upon activation else DB does not exist
 *
 * DEPRECATED, Class_options_machine now does this on load to ensure all values are set
 *
 * @since 1.0.0
 */
function silvermag_themepacific_of_option_setup()	
{
	global $of_options, $options_machine;
	$options_machine = new silvermag_themepacific_Options_Machine($of_options);
		
	if (!silvermag_themepacific_of_get_options())
	{
		silvermag_themepacific_of_save_options($options_machine->Defaults);
	}
}

/**
 * Change activation message
 *
 * @since 1.0.0
 */
function silvermag_themepacific_optionsframework_admin_message() { 
	
	//Tweaked the message on theme activate
	?>
    <script type="text/javascript">
    jQuery(function(){
    	
        var message = '<p>This theme comes with an <a href="<?php echo admin_url("/admin.php?page=tpcrn_framework"); ?>">Themepacific Theme Panel</a> to configure settings. This theme also supports widgets, please visit the <a href="<?php echo admin_url('widgets.php'); ?>">widgets settings page</a> to configure them.</p>';
    	jQuery('.themes-php #message2').html(message);
    
    });
    </script>
    <?php
	
}

/**
 * Get header classes
 *
 * @since 1.0.0
 */
function silvermag_themepacific_of_get_header_classes_array() 
{
	global $of_options;
	
	foreach ($of_options as $value) 
	{
		if ($value['type'] == 'heading')
			$hooks[] = str_replace(' ','',strtolower($value['name']));	
	}
	
	return $hooks;
}

/**
 * Get options from the database and process them with the load filter hook.
 *
 * @author Jonah Dahlquist
 * @since 1.4.0
 * @return array
 */
function silvermag_themepacific_of_get_options($key = null, $themepacific_data = null) {
	global $smof_data;

	do_action('silvermag_themepacific_of_get_options_before', array(
		'key'=>$key, 'data'=>$themepacific_data
	));
	if ($key != null) { // Get one specific value
		$themepacific_data = get_theme_mod($key, $themepacific_data);
	} else { // Get all values
		$themepacific_data = get_theme_mods();	
	}
	$themepacific_data = apply_filters('of_options_after_load', $themepacific_data);
	if ($key == null) {
		$smof_data = $themepacific_data;
	} else {
		$smof_data[$key] = $themepacific_data;
	}
	do_action('silvermag_themepacific_of_option_setup_before', array(
		'key'=>$key, 'data'=>$themepacific_data
	));
	return $themepacific_data;

}

/**
 * Save options to the database after processing them
 *
 * @param $themepacific_data Options array to save
 * @author Jonah Dahlquist
 * @since 1.4.0
 * @uses update_option()
 * @return void
 */

function silvermag_themepacific_of_save_options($themepacific_data, $key = null) {
	global $smof_data;
    if (empty($themepacific_data))
        return;	
    do_action('of_save_options_before', array(
		'key'=>$key, 'data'=>$themepacific_data
	));
	$themepacific_data = apply_filters('of_options_before_save', $themepacific_data);
	if ($key != null) { // Update one specific value
		if ($key == BACKUPS) {
			unset($themepacific_data['smof_init']); // Don't want to change this.
		}
		set_theme_mod($key, $themepacific_data);
	} else { // Update all values in $themepacific_data
		foreach ( $themepacific_data as $k=>$v ) {
			if (!isset($smof_data[$k]) || $smof_data[$k] != $v) { // Only write to the DB when we need to
				set_theme_mod($k, $v);
			} else if (is_array($v)) {
				foreach ($v as $key=>$val) {
					if ($key != $k && $v[$key] == $val) {
						set_theme_mod($k, $v);
						break;
					}
				}
			}
	  	}
	}
    do_action('silvermag_themepacific_of_save_options_after', array(
		'key'=>$key, 'data'=>$themepacific_data
	));

}


/**
 * For use in themes
 *
 * @since forever
 */



$themepacific_data = silvermag_themepacific_of_get_options();
if (!isset($smof_details))
	$smof_details = array();