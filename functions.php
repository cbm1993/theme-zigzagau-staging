<?php

//ADD MOBILE THEME COLOURS
function sgv6_head() {
  $apple_statusbar = "black"; #OPTIONS: black / default / black-translucent
  $webkit = "#000"; #ANY HEX COLOUR

  echo '<meta name="apple-mobile-web-app-capable" content="yes"><meta name="apple-mobile-web-app-status-bar-style" content="'.$apple_statusbar.'">';
  echo '<meta name="msapplication-navbutton-color" content="'.$webkit.'"><meta name="msapplication-TileColor" content="'.$webkit.'"><meta name="theme-color" content="'.$webkit.'">';
}
add_action('wp_head', 'sgv6_head');

function sgv6_child_enqueue() {

  if ( ! defined( '_SG_FILE_VERSION' ) ) {
    $saved_file_version = get_option('file_version');
    if (empty($saved_file_version)) { $published_file_version = "1.0.0.0"; } else { $published_file_version = $saved_file_version; };
    define( '_SG_FILE_VERSION', $published_file_version );
  }
	
	wp_enqueue_style( 'sgv6-child', get_stylesheet_directory_uri().'/salonguru.css', array(), _SG_FILE_VERSION, 'all' );
	wp_enqueue_script( 'sgv6-child', get_stylesheet_directory_uri().'/salonguru.js', array('jquery'), _SG_FILE_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'sgv6_child_enqueue', 80 ); //priority is important, parent is 75
