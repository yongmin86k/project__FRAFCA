<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * @package FRAFCA_Theme
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function frafca_theme_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'frafca_theme_body_classes' );


// Remove "Editor" links from sub-menus
function frafca_remove_submenus() {
    remove_submenu_page( 'themes.php', 'theme-editor.php' );
    remove_submenu_page( 'plugins.php', 'plugin-editor.php' );
}
add_action( 'admin_menu', 'frafca_remove_submenus', 110 );


// Create CFS shorthand
function frafca_cfs($make_var) {
	//** Custom Field Suite plugin is required
	$frafca_cfs = CFS() -> get($make_var);
	return $frafca_cfs;
}
add_action('plugins_loaded', 'frafca_cfs');