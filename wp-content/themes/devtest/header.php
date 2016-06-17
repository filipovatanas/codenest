<?php
/**
 * The header for our theme.
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<title><?=get_bloginfo( 'name' );?></title>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="icon" type="image/x-icon" href="<?=get_template_directory_uri();?>/images/favicon.ico">
    <link href="http://allfont.net/allfont.css?fonts=montserrat-hairline" rel="stylesheet" type="text/css" />
    <meta name='robots' content='noindex,follow' />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>