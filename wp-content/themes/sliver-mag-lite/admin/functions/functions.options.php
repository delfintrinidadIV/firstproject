<?php

add_action('init','silvermag_themepacific_of_options');

if (!function_exists('silvermag_themepacific_of_options'))
{
	function silvermag_themepacific_of_options()
	{ 
	  	$framework = 'tpcrn_';
		function silvermag_themapacific_tpcrn_strcasecmp_name( $a, $b ) {
		return strcasecmp( $a->name, $b->name );
		}
 		//Access the WordPress Categories via an Array
		$of_categories = array();  
		$of_categories_obj = get_categories('hide_empty=0');
		foreach ($of_categories_obj as $of_cat) {
		    $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;
			}
		
		$categories_tmp 	= array_unshift($of_categories, "Recent Posts");    
	    $categories_tmp 	= array_unshift($of_categories, "Select a category:");
		//Access the WordPress Tags via an Array
				$tpcrn_tags = Array();
				$tags = get_tags( array( 'number' => 1000, 'orderby' => 'count', 'order' => 'DESC' ) );
				usort( $tags, 'silvermag_themapacific_tpcrn_strcasecmp_name');

				foreach ( $tags as $tag ) {
 				$tpcrn_tags[$tag->term_id] = $tag->name;
				}   
		   $tags_tmp 	= array_unshift($tpcrn_tags, "Select a Tag:");    
		   
		   
		//Access the WordPress Pages via an Array
		$of_pages 			= array();
		$of_pages_obj 		= get_pages('sort_column=post_parent,menu_order');    
		foreach ($of_pages_obj as $of_page) {
		    $of_pages[$of_page->ID] = $of_page->post_name; }
		$of_pages_tmp 		= array_unshift($of_pages, "Select a page:");       
	
		//Testing 
		$of_options_select 	= array("one","two","three","four","five"); 
		$of_options_radio 	= array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five");
		
 
		/*-----------------------------------------------------------------------------------*/
		/* TO DO: Add options/functions that use these */
		/*-----------------------------------------------------------------------------------*/
		
		//More Options
		$uploads_arr 		= wp_upload_dir();
		$all_uploads_path 	= $uploads_arr['path'];
		$all_uploads 		= get_option('of_uploads');
		$other_entries 		= array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
		$body_repeat 		= array("no-repeat","repeat-x","repeat-y","repeat");
		$body_pos 			= array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");
		
		// Image Alignment radio box
		$of_options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"); 
		
		// Image Links to Options
		$of_options_image_link_to = array("image" => "The Image","post" => "The Post"); 

 	  
 
/*-----------------------------------------------------------------------------------*/
/* The Options Array */
/*-----------------------------------------------------------------------------------*/

// Set the Options Array
global $of_options;
$of_options = array();
$of_options[] = array( "name" => __('General Settings','silvermag'),
                    "type" => "heading");
$of_options[] = array( "name" => "General",
					"desc" => "",
					"id" => "introduction",
					"std" => __('<h3>General Settings</h3>','silvermag'),
					"icon" => true,
					"type" => "info");
					
					
$of_options[] = array( "name" => __('Custom Favicon','silvermag'),
					"desc" =>  __('Upload a 16px x 16px Png/Gif image that will represent your website favicon','silvermag'),
					"id" => "custom_favicon",
					"std" => "",
					"type" => "media"); 
$logo = get_template_directory_uri() . '/images/logo.png';					
$of_options[] = array( "name" => __('Custom Logo','silvermag'),
					"desc" => __('Upload a Png/Gif image that will represent your website Logo.','silvermag'),
					"id" => "custom_logo",
					"std" => $logo,
					"type" => "media"); 
 					
 $of_options[] = array( "name" => __('Show Footer Widgets', 'silvermag'),
					"desc" => __('Select to show the Footer Widgets.', 'silvermag'),
					"id" => "shw_footer_widg",
					"std" => "yes",
					"type" => "select",
					"options" => array('yes'=>'Yes','no'=>'No'));
$of_options[] = array( "name" =>__('Footer Text','silvermag'),
                    "desc" => __('Add the Copyright text info.','silvermag'),
                    "id" => "cus_footer_text",
                    "std" => "",
                    "type" => "textarea");   
 
 
					
$of_options[] = array( "name" => __('Home Settings','silvermag'),
					"type" => "heading");
 

 
    					
$of_options[] = array( "name" =>__('Single Posts','silvermag'),
					"type" => "heading");
$of_options[] = array( "name" => "General",
					"desc" => "",
					"id" => "introduction",
					"std" => __('<h3>Single Posts Settings</h3>','silvermag'),
					"icon" => true,
					"type" => "info");
										
 $of_options[] = array( "name" => __('Show Single Post Next/Prev navigation','silvermag'),
					"desc" => '',
					"id" => "posts_navigation",
					"std" 		=> 1,
					"on" 		=> "Show",
					"off" 		=> "Hide",
					"type" 		=> "switch"	
						);
  						
 					
 
 					
 					
					
$of_options[] = array( "name" => __('Backup Options','silvermag'),
					"type" => "heading");
$of_options[] = array( "name" => "General",
					"desc" => "",
					"id" => "introduction",
					"std" => __('<h3>Backup and Restore</h3>','silvermag'),
					"icon" => true,
					"type" => "info");
										
$of_options[] = array( "name" => __('Backup and Restore Options','silvermag'),
                    "id" => "of_backup",
                    "std" => "",
                    "type" => "backup",
					"desc" => __('You can use the two buttons below to backup your current options, and then restore it back at a later time. This is useful if you want to experiment on the options but would like to keep the old settings in case you need it back.','silvermag'),
					);
					
$of_options[] = array( "name" => __('Transfer Theme Options Data','silvermag'),
                    "id" => "of_transfer",
                    "std" => "",
                    "type" => "transfer",
					"desc" => __('You can tranfer the saved options data between different installs by copying the text inside the text box. To import data from another install, replace the data in the text box with the one from another install and click "Import Options".
						','silvermag'),
					);
					
	}
}
?>