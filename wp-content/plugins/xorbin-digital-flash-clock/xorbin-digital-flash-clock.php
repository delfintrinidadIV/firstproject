<?php
/*
Plugin Name: Xorbin Digital Flash Clock
Plugin URI: http://www.xorbin.com
Description: Customizable Digital Clock by Xorbin.com.
Version: 1.0
Author: www.xorbin.com
Author URI: http://www.xorbin.com
License: GPL2 or later
*/

	class XorDigitalClockWidget extends WP_Widget {
		
		private $xorDigitalClockParams = array();
		
		function xorDigitalClockWidget() {
			$widget_params = array( 'classname' => 'xorDigitalClockWidget', 'description' => 'Customizable Digital Clock by XorBin.com' );
			$this->WP_Widget('xorDigitalClockWidget', 'Digital Clock Widget', $widget_params);
			
			$this->xorDigitalClockParams['xorWidth'] = '200';
			$this->xorDigitalClockParams['xorHeight'] = '120';
			$this->xorDigitalClockParams['clockSkin'] = '1';
            $this->xorDigitalClockParams['digitWidth'] = 20;
            $this->xorDigitalClockParams['digitHeight'] = 32;
            $this->xorDigitalClockParams['digitsColor'] = '000000';
			$this->xorDigitalClockParams['secondsColor'] = '000000';
            $this->xorDigitalClockParams['showSeconds'] = 'yes';
            $this->xorDigitalClockParams['separatorWidth'] = '11';
            $this->xorDigitalClockParams['ampm'] = 'yes';
			$this->xorDigitalClockParams['ampmWidth'] = '23';
			$this->xorDigitalClockParams['ampmColor'] = '000000';
			$this->xorDigitalClockParams['panelColor'] = 'ffffff';
			$this->xorDigitalClockParams['panelPadding'] = '10';
			$this->xorDigitalClockParams['panelSkin'] = '';
            $this->xorDigitalClockParams['UTCTime'] = '0';
            $this->xorDigitalClockParams['timeOffset'] = '0';
            $this->xorDigitalClockParams['widgetUrl'] = '';
		}
		
		function widget($args, $instance) {
			$before_widget = '';
			$after_widget = '';
			$before_title = '';
			$after_title = ''; 
			extract($args);
			echo $before_widget;
			echo '<script type="text/javascript">';
			echo 'jQuery(document).ready(function(){';
    		echo 'var flashvars = {};';
			echo 'var params = {scale: "noScale"};';
			echo 'params.wmode = "transparent";';
			echo 'var attributes = {};';
			echo 'attributes.id = "xbDigitalClock-'.$this->number.'";';
			echo 'attributes.name = "xbDigitalClock-'.$this->number.'";';
    		$defaultSkins = array("-empty-", "skin001.png", "skin002.gif", "skin003.png", "skin011.png", "skin012.png", "skin013.png", "skin014.png", "skin015.png", "skin016.png", "skin017.png", "skin018.png");
    		foreach ($this->xorDigitalClockParams as $xorKey   => $xorValue) {
				if (($xorKey == 'clockSkin') && (empty($instance['clockSkinUrl']))) {
					if ($instance[$xorKey] == 0) {
					   echo 'flashvars.clockSkin = "empty";';
					} else {
						echo 'flashvars.clockSkin = "'.WP_PLUGIN_URL.'/xorbin-digital-flash-clock/media/skins/'.$defaultSkins[$instance[$xorKey]].'";';
					}
				} elseif (($xorKey == 'clockSkin') && (!empty($instance['clockSkinUrl']))) {
					echo 'flashvars.clockSkin = "'.$instance['clockSkinUrl'].'";';
				} elseif (($xorKey == 'UTCTime') && ($instance['UTCTime'] == true)) {
					echo 'flashvars.'.$xorKey.' = "'.gmdate('H:i:s').'";';
				} elseif (($xorKey == 'timeOffset') && ($instance['UTCTime'] == true)) {
					echo 'flashvars.'.$xorKey.' = "'.$instance['timeOffset'].'";';
				} elseif (($xorKey == 'widgetUrl') && ($instance['widgetUrl'] == '')) {
					echo 'flashvars.'.$xorKey.' = "";';
				} elseif (($xorKey == 'panelSkin') && ($instance['panelSkin'] == '')) {
					// do nothing
				} elseif (($xorKey != 'xorWidth') && ($xorKey != 'xorHeight') && ($xorKey != 'timeOffset') && ($xorKey != 'UTCTime') && ($xorKey != 'panelSkin')) {
					echo 'flashvars.'.$xorKey.' = "'.$instance[$xorKey].'";';
				}
			}
			echo 'swfobject.embedSWF("'.WP_PLUGIN_URL.'/xorbin-digital-flash-clock/media/xorDigitalClock.swf", "xbDigitalClock-'.$this->number.'", "'.$instance['xorWidth'].'", "'.$instance['xorHeight'].'", "8.0.0", "'.WP_PLUGIN_URL.'/xorbin-digital-flash-clock/media/expressInstall.swf", flashvars, params, attributes);';
			echo '});'; 
			echo '</script>';
			
			
			if(!empty($instance['title'])) {
				echo $before_title . $instance['title'] . $after_title;
			}
			echo '<div id="xbDigitalClock-'.$this->number.'"></div>';
			echo $after_widget;
		}
		
		function update($new_instance, $old_instance) {
		
		return $new_instance;
		
		}
		
		function form($instance) {
			$defaultSkins = array("-empty-", "skin001.png", "skin002.gif", "skin003.png", "skin011.png", "skin012.png", "skin013.png", "skin014.png", "skin015.png", "skin016.png", "skin017.png", "skin018.png");
			$offsetValues = array ('-12:00' => '-43200', '-11:00' => '-39600', '-10:00' => '-36000', '-09:30' => '-34200', '-09:00' => '-32400', '-08:00' => '-28800', '-07:00' => '-25200', '-06:00' => '-21600', '-05:00' => '-18000', '-04:30'=>'-16200', '-04:00' =>'-14400', '-03:30'=>'-12600','-03:00'=>'-10800','-02:00'=>'-7200','-01:00'=>'-3600','00:00'=>'0','+01:00'=>'3600', '+02:00'=>'7200','+03:00'=>'10800','+03:30'=>'12600', '+04:00' =>'14400', '+04:30'=>'16200','+05:00' => '18000', '+05:30'=>'19800', '+05:45'=>'20700', '+06:00' => '21600', '+06:30' => '23400', '+07:00' => '25200', '+08:00' => '28800', '+09:00' => '32400', '+09:30'=>'34200', '+10:00' => '36000', '+10:30' => '37800', '+11:00' => '39600', '+11:30' => '41400', '+12:00' => '43200', '+12:45' => '45900', '+13:00' => '46800', '+14:00' => '50400');
			if (empty($instance)) {
				foreach ($this->xorDigitalClockParams as $xorKey => $xorValue) {
					$instance[$xorKey] = empty($instance[$xorKey]) ? $xorValue: $instance[$xorKey];
				}
			}
			?>	
			
			<style type="text/css">
					.xorClockWidget label {
						display:block;
						padding-top:8px;
						padding-left:3px;
						clear:both;
					}
					.xorClockWidget select, input[type="text"] {
						width:218px;
					}
					.xorbinLogo {
						text-align:center;						 
					}
					
					.xorClockWidget .hide-options {
						display:none;
					}
					
					.xorClockWidget .small {
						font-size:10px;
					}
					
     		</style>
			<div class="xorClockWidget">
				<div class="xorbinLogo">
					<a href="http://www.xorbin.com"><img src="<?php echo WP_PLUGIN_URL; ?>/xorbin-digital-flash-clock/media/digital_clock_by_xorbin.png" /></a> 
				</div>
				<label for="<?php echo $this->get_field_id("title");?>">Title:</label>
				<input type="text" name="<?php echo $this->get_field_name("title"); ?>" id="<?php echo $this->get_field_id("title"); ?>" value="<?php echo $instance["title"]; ?>" />
				
				<label for="<?php echo $this->get_field_id("xorWidth");?>">Width:
					<input style="width:175px; margin-left:5px;" type="text" name="<?php echo $this->get_field_name("xorWidth"); ?>" id="<?php echo $this->get_field_id("xorWidth"); ?>" value="<?php echo $instance["xorWidth"]; ?>" />
				</label>
				
				<label for="<?php echo $this->get_field_id("xorHeight");?>">Height:
					<input style="width:175px;" type="text" name="<?php echo $this->get_field_name("xorHeight"); ?>" id="<?php echo $this->get_field_id("xorHeight"); ?>" value="<?php echo $instance["xorHeight"]; ?>" />
				</label>
				
				<label for="<?php echo $this->get_field_id("clockSkin");?>">Clock skin:</label>
				<select name="<?php echo $this->get_field_name("clockSkin"); ?>" id="<?php echo $this->get_field_id("clockSkin"); ?>">
					<?php foreach ($defaultSkins as $xorKey => $xorValue): ?>
						<option <?php if ($xorKey == $instance['clockSkin']): ?> selected="selected" <?php endif;?> value="<?php echo $xorKey;?>"><?php echo $xorValue; ?></option>
					<?php endforeach; ?>	
				</select>
				<span class="small">*for just activated widget press "SAVE" before changing </span>
				
				<label for="<?php echo $this->get_field_id("clockSkinUrl");?>">Custom clock skin [URL]:</label>
				<input type="text" name="<?php echo $this->get_field_name("clockSkinUrl"); ?>" id="<?php echo $this->get_field_id("clockSkinUrl"); ?>" value="<?php echo $instance["clockSkinUrl"]; ?>" />
				
				<div id="<?php echo $this->get_field_id("hide-options"); ?>" class="hide-options">
				
					<label for="<?php echo $this->get_field_id("digitWidth");?>">Digits width:</label>
					<input type="text" name="<?php echo $this->get_field_name("digitWidth"); ?>" id="<?php echo $this->get_field_id("digitWidth"); ?>" value="<?php echo $instance["digitWidth"]; ?>" />
					
					<label for="<?php echo $this->get_field_id("digitHeight");?>">Digits height:</label>
					<input type="text" name="<?php echo $this->get_field_name("digitHeight"); ?>" id="<?php echo $this->get_field_id("digitHeight"); ?>" value="<?php echo $instance["digitHeight"]; ?>" />
					
					<label for="<?php echo $this->get_field_id("separatorWidth");?>">Separator width:</label>
					<input type="text" name="<?php echo $this->get_field_name("separatorWidth"); ?>" id="<?php echo $this->get_field_id("separatorWidth"); ?>" value="<?php echo $instance["separatorWidth"]; ?>" />
					
					<label for="<?php echo $this->get_field_id("ampmWidth");?>">AM, PM symbol width:</label>
					<input type="text" name="<?php echo $this->get_field_name("ampmWidth"); ?>" id="<?php echo $this->get_field_id("ampmWidth"); ?>" value="<?php echo $instance["ampmWidth"]; ?>" />

				</div>
 
				<label for="<?php echo $this->get_field_id("digitsColor");?>">Digits color, [000000..FFFFFF]:</label>
				<input type="text" name="<?php echo $this->get_field_name("digitsColor"); ?>" id="<?php echo $this->get_field_id("digitsColor"); ?>" value="<?php echo $instance["digitsColor"]; ?>" />

				<label for="<?php echo $this->get_field_id("secondsColor");?>">Seconds color:</label>
				<input type="text" name="<?php echo $this->get_field_name("secondsColor"); ?>" id="<?php echo $this->get_field_id("secondsColor"); ?>" value="<?php echo $instance["secondsColor"]; ?>" />
				
				<label for="<?php echo $this->get_field_id("ampmColor");?>">AM, PM symbol color:</label>
				<input type="text" name="<?php echo $this->get_field_name("ampmColor"); ?>" id="<?php echo $this->get_field_id("ampmColor"); ?>" value="<?php echo $instance["ampmColor"]; ?>" />
				
				<label for="<?php echo $this->get_field_id("panelColor");?>">Panel color:</label>
				<input type="text" name="<?php echo $this->get_field_name("panelColor"); ?>" id="<?php echo $this->get_field_id("panelColor"); ?>" value="<?php echo $instance["panelColor"]; ?>" />
				
				<label for="<?php echo $this->get_field_id("panelPadding");?>">Panel padding:</label>
				<input type="text" name="<?php echo $this->get_field_name("panelPadding"); ?>" id="<?php echo $this->get_field_id("panelPadding"); ?>" value="<?php echo $instance["panelPadding"]; ?>" />
				
				<label for="<?php echo $this->get_field_id("panelSkin");?>">Panel skin [URL]:</label>
				<input type="text" name="<?php echo $this->get_field_name("panelSkin"); ?>" id="<?php echo $this->get_field_id("panelSkin"); ?>" value="<?php echo $instance["panelSkin"]; ?>" />

				<label for="<?php echo $this->get_field_id("showSeconds");?>">Display seconds:
					<input type="checkbox" name="<?php echo $this->get_field_name("showSeconds"); ?>" id="<?php echo $this->get_field_id("showSeconds"); ?>" <?php if($instance["showSeconds"] == 'yes' ):?> checked <?php endif; ?>value="yes" />
				</label>
				
				<label for="<?php echo $this->get_field_id("ampm");?>">Display AM, PM symbols:
					<input type="checkbox" name="<?php echo $this->get_field_name("ampm"); ?>" id="<?php echo $this->get_field_id("ampm"); ?>" <?php if($instance["ampm"] == 'yes' ):?> checked <?php endif; ?>value="yes" />
				</label>
				
				<label for="<?php echo $this->get_field_id("widgetUrl");?>">Clock url:</label>
				<input type="text" name="<?php echo $this->get_field_name("widgetUrl"); ?>" id="<?php echo $this->get_field_id("widgetUrl"); ?>" value="<?php echo $instance["widgetUrl"]; ?>" />

				<label for="<?php echo $this->get_field_id("timeOffset");?>">
				<input type="checkbox" name="<?php echo $this->get_field_name("UTCTime"); ?>" id="<?php echo $this->get_field_id("UTCTime"); ?>" <?php if($instance["UTCTime"] == true ):?> checked <?php endif; ?> value="true" />
				Time zone:
					<select style="width:133px;" name="<?php echo $this->get_field_name("timeOffset"); ?>" id="<?php echo $this->get_field_id("timeOffset"); ?>" >
						<?php foreach ($offsetValues as $xorKey => $xorValue): ?>
							<option <?php if ($xorValue == $instance['timeOffset']): ?> selected="selected" <?php endif;?> value="<?php echo $xorValue;?>"><?php echo $xorKey; ?></option>
						<?php endforeach; ?>	
					</select>
				</label>
			</div>
			<script type="text/javascript">
				function onReady<?php echo $this->number; ?> () {
	     		    var skinOptions = new Array();
	     		    var skinValues = new Array();
	     		    skinOptions = ['<?php echo $this->get_field_id("digitWidth"); ?>', '<?php echo $this->get_field_id("digitHeight"); ?>', '<?php echo $this->get_field_id("separatorWidth"); ?>', '<?php echo $this->get_field_id("ampmWidth"); ?>'];
	     		    skinValues[1] = [20, 32, 11, 23];
	     		    skinValues[2] = [14, 21, 6, 31];
	     		    skinValues[3] = [8, 14, 5, 24]; 
	     		    skinValues[4] = [7, 10, 6, 18];
	     		    skinValues[5] = [12, 12, 4, 30];
	     		    skinValues[6] = [12, 19, 6, 30];
	     		    skinValues[7] = [22, 24, 9, 44];
	     		    skinValues[8] = [17, 23, 12, 42];
	     		    skinValues[9] = [19, 33, 9, 27];
	     		    skinValues[10] = [17, 20, 10, 47];
	     		    skinValues[11] = [14, 21, 7, 36];
					  var selectField = jQuery('#<?php echo $this->get_field_id("clockSkin"); ?>');
					  var skinUrlField = jQuery('#<?php echo $this->get_field_id("clockSkinUrl"); ?>');
					  selectField.change(function(){
					  	var skinNumb = selectField.val();
					  	if (skinValues[skinNumb]) {
					  		jQuery.each(skinOptions, function(index, value) {
					  			jQuery('#'+value).val(skinValues[skinNumb][index]);
					  			jQuery('#<?php echo $this->get_field_id("hide-options"); ?>').hide();
					  		});
					  	}
					  });
					  if (jQuery('#<?php echo $this->get_field_id("clockSkinUrl"); ?>').val() != '') {
					  	jQuery('#'+skinOptions[0]).parent().show()
					  	selectField.unbind('click');
					  } else {
						  skinUrlField.click(function(){
						  	selectField.val(0);
						  	jQuery.each(skinOptions, function(index, value) {
					  			jQuery('#'+value).val(0); 
					  			jQuery('#<?php echo $this->get_field_id("hide-options"); ?>').show();
						  	});
						  })
					  }
	     		   }
     		    jQuery(document).ready(function() {
     		    	onReady<?php echo $this->number; ?>();
				});
     		</script>
			<?php 
		}
		
	}
	
	function frontUserHeaderDigital () {
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'swfobject.v2.2', WP_PLUGIN_URL.'/xorbin-digital-flash-clock/js/swfobject.v2.2.js');
		
	}
	
	add_action('widgets_init', create_function('', 'return register_widget("xorDigitalClockWidget");'));
    add_action('wp_enqueue_scripts', 'frontUserHeaderDigital');