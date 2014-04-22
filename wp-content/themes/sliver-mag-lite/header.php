<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>	
<!-- Meta info -->
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<!-- Title -->
<?php global $themepacific_data;?>
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
 
<?php if($themepacific_data['custom_favicon']): ?>
<link rel="shortcut icon" href="<?php echo esc_url($themepacific_data['custom_favicon']); ?>" /> <?php endif;  ?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
 
<?php 	
if ( is_singular() && get_option( 'thread_comments' ) )		wp_enqueue_script( 'comment-reply' );  
	wp_head();
  	wp_enqueue_script('html5');  
	wp_enqueue_script('css3-mediaqueries');  
 ?>
 
</head>  

<body <?php body_class();?>> 

<!-- #tp-site-wrap -->	
<div id="tp-site-wrap" class="container clearfix"> 
 <?php 
     if ( has_nav_menu('topNav') ){ 
   ?>
	<!-- #CatNav -->  
	<div id="catnav">	
		<?php wp_nav_menu(array('theme_location' => 'topNav','container'=> '','menu_id'=> 'catmenu','menu_class'=> ' topmenu container clearfix','fallback_cb' => 'false','depth' => 3)); ?>
	</div> 
	<!-- /#CatNav -->  
	<?php } ?>
 <!-- /#Header --> 
<div id="tp-site-wrap-container"> 

<div id="header">	
	<div id="head-content" class="clearfix ">
 	 
			<!-- Logo --> 
			<div id="logo">   
				<?php if($themepacific_data['custom_logo'] !='') { 
				if($themepacific_data['custom_logo']) {  $logo = $themepacific_data['custom_logo']; 		
				} else { $logo = get_template_directory_uri() . '/images/logo.png'; 	
				} ?>  <a href="<?php echo esc_url( home_url( '/' ) );  ?>" title="<?php bloginfo( 'name' ); ?>" rel="home"><img src="<?php echo esc_url($logo); ?>" alt="<?php bloginfo( 'name' ) ?>" /></a>    
				<?php } else { ?>   
				<?php if (is_home()) { ?>     
				<h1><a href="<?php echo esc_url( home_url( '/' ) );  ?>" title="<?php bloginfo( 'name' ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1> <span><?php bloginfo( 'description' ); ?></span>
				<?php } else { ?>  
				<h2><a href="<?php echo esc_url( home_url( '/' ) );  ?>" title="<?php bloginfo( 'name' ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h2>  
				<?php } } ?>   
			</div>	 	
			<!-- /#Logo -->
 		
  					<!-- Header Ad -->
 		<div id="header-banner468" class="clearfix">
 			</div>
 
		<!-- /#Header Ad -->
	 	
 	</div>	
</div>
<!-- /#Header --> 

   <?php 
     if ( has_nav_menu('mainNav') ){ 
   ?>
	<!-- #CatNav secondary -->  
<div id="catnav" class="secondary">	
		<?php wp_nav_menu(array('theme_location' => 'mainNav','container'=> '','menu_id'=> 'catmenu','menu_class'=> 'catnav  container clearfix','fallback_cb' => 'false','depth' => 3,)); ?>
</div> 
	<?php } ?>
 
  	<!--[if lt IE 8]>
		<div class="msgnote"> 
			Your browser is <em>too old!</em> <a rel="nofollow" href="http://browsehappy.com/">Upgrade to a different browser</a> to experience this site. 
		</div>
	<![endif]-->
