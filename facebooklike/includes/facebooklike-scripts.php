 <?php
 //Add scripts
  function fbl_add_scripts(){
  	// Add Main CSS
  	wp_enqueue_style('fbl-main-style', plugins_url().'/facebooklike/css/style.css');
   //Add Main JS
  	wp_enqueue_script('fbl-main-script', plugins_url().'/facebooklike/js/main.js'); 

  	

  }

  add_action('wp_enqueue_scripts', 'fbl_add_scripts');