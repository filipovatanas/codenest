<?
/**
 * @desc attach custom admin login CSS file
 */
function custom_login_css() { 

  echo '<link rel="stylesheet" type="text/css" href="'.get_bloginfo('template_directory').'/inc/login.css" />';

}
add_action('login_head', 'custom_login_css');

?>