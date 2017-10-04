<?php

/*

Plugin Name: Music Director

*/
/**
 * @package Music Director
 * @version 1.0
 */
/*
Plugin Name: Music Director
Plugin URI: http://tonyjr.me/plugin/music-director
Description: A powerful and easy to use tool for the church Music Director. Song archive, scheduler and much more.
Author: Tony Shaw
Version: 1.0
Author URI: http://www.yaconiello.com/
*/

// Music Director

function music_director_songs() {

	/**
	 * Post Type: Songs.
	 */

	$labels = array(
		"name" => __( 'Songs', '' ),
		"singular_name" => __( 'Song', '' ),
		"menu_name" => __( 'Music Director', '' ),
		"all_items" => __( 'All Songs', '' ),
		"add_new" => __( 'Add New Song', '' ),
		"add_new_item" => __( 'Add New Song', '' ),
		"edit_item" => __( 'Edit Song', '' ),
		"new_item" => __( 'New Song', '' ),
		"view_item" => __( 'View Song', '' ),
		"view_items" => __( 'View Songs', '' ),
		"search_items" => __( 'Search Songs', '' ),
		"not_found" => __( 'No Songs Found', '' ),
		"not_found_in_trash" => __( 'No songs found in trash', '' ),
		"parent_item_colon" => __( 'Songs', '' ),
		"featured_image" => __( 'Featured image for this song', '' ),
		"set_featured_image" => __( 'Set featured image for this song', '' ),
		"remove_featured_image" => __( 'Remove featured image for this song', '' ),
		"use_featured_image" => __( 'Use as featured image fo this song', '' ),
		"archives" => __( 'Song Archives', '' ),
		"insert_into_item" => __( 'Insert into song', '' ),
		"uploaded_to_this_item" => __( 'Uploaded to this song', '' ),
		"filter_items_list" => __( 'Filter song list', '' ),
		"items_list_navigation" => __( 'Song list navigation', '' ),
		"items_list" => __( 'Song list', '' ),
		"attributes" => __( 'Song attributes', '' ),
		"parent_item_colon" => __( 'Songs', '' ),
	);

	$args = array(
		"label" => __( 'Songs', '' ),
		"labels" => $labels,
		"description" => "Official Praise Team Songlist",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => true,
		"show_in_menu" => true,
		"exclude_from_search" => true,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "music-director/songs", "with_front" => true ),
		"query_var" => true,
		"menu_icon" => "dashicons-playlist-audio",
		"supports" => array( "title", "editor", "thumbnail", "revisions" ),
		"taxonomies" => array( "key" ),
	);

	register_post_type( "songs", $args );
}

add_action( 'init', 'music_director_songs' );

function music_director_taxes() {

	/**
	 * Taxonomy: Keys.
	 */

	$labels = array(
		"name" => __( 'Keys', '' ),
		"singular_name" => __( 'Key', '' ),
		"menu_name" => __( 'Keys', '' ),
		"all_items" => __( 'All Keys', '' ),
		"edit_item" => __( 'Edit Key', '' ),
		"view_item" => __( 'View Key', '' ),
		"update_item" => __( 'Update Key', '' ),
		"add_new_item" => __( 'Add New Key', '' ),
		"new_item_name" => __( 'Add Key', '' ),
		"parent_item" => __( 'Key', '' ),
		"parent_item_colon" => __( 'Key:', '' ),
		"search_items" => __( 'Search Keys', '' ),
		"popular_items" => __( 'Popular Keys', '' ),
		"separate_items_with_commas" => __( 'Seperate keys with commas', '' ),
		"add_or_remove_items" => __( 'Add or remove keys', '' ),
		"choose_from_most_used" => __( 'Choose from most used keys', '' ),
		"not_found" => __( 'No keys found', '' ),
		"no_terms" => __( 'No Keys', '' ),
		"items_list_navigation" => __( 'List of Keys', '' ),
		"items_list" => __( 'Keys', '' ),
	);

	$args = array(
		"label" => __( 'Keys', '' ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => true,
		"label" => "Keys",
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'music-director/song-finder/key', 'with_front' => true, ),
		"show_admin_column" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"show_in_quick_edit" => true,
	);
	register_taxonomy( "key", array( "songs" ), $args );

	/**
	 * Taxonomy: Tempo.
	 */

	$labels = array(
		"name" => __( 'Tempos', '' ),
		"singular_name" => __( 'Tempo', '' ),
		"menu_name" => __( 'Tempo', '' ),
		"all_items" => __( 'All Tempos', '' ),
		"edit_item" => __( 'Edit Tempo', '' ),
		"view_item" => __( 'View Tempo', '' ),
		"update_item" => __( 'Update Tempo', '' ),
		"add_new_item" => __( 'Add New Tempo', '' ),
		"new_item_name" => __( 'New Tempo', '' ),
		"search_items" => __( 'Search Tempos', '' ),
		"popular_items" => __( 'Popular Tempos', '' ),
		"separate_items_with_commas" => __( 'Seperate tempos with commas', '' ),
		"add_or_remove_items" => __( 'Add or remove tempos', '' ),
		"choose_from_most_used" => __( 'Choose from most used tempos', '' ),
		"not_found" => __( 'No Tempos Found', '' ),
		"no_terms" => __( 'No Tempos', '' ),
		"items_list_navigation" => __( 'List of Tempos', '' ),
		"items_list" => __( 'Tempos', '' ),
	);

	$args = array(
		"label" => __( 'Tempo', '' ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => true,
		"label" => "Tempo",
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'music-director/song-finder/tempo', 'with_front' => true, ),
		"show_admin_column" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"show_in_quick_edit" => true,
	);
	register_taxonomy( "tempo", array( "songs" ), $args );

	/**
	 * Taxonomy: Themes.
	 */

	$labels = array(
		"name" => __( 'Themes', '' ),
		"singular_name" => __( 'Theme', '' ),
		"menu_name" => __( 'Themes', '' ),
		"all_items" => __( 'All Themes', '' ),
		"edit_item" => __( 'Edit Themes', '' ),
		"view_item" => __( 'View Themes', '' ),
		"update_item" => __( 'Update Theme', '' ),
		"add_new_item" => __( 'Add New Theme', '' ),
		"new_item_name" => __( 'New Theme', '' ),
		"search_items" => __( 'Search Themes', '' ),
		"popular_items" => __( 'Popular Themes', '' ),
		"separate_items_with_commas" => __( 'Seperate themes with commas', '' ),
		"add_or_remove_items" => __( 'Add or remove themes', '' ),
		"choose_from_most_used" => __( 'Choose from most used themes', '' ),
		"not_found" => __( 'No Themes Found', '' ),
		"no_terms" => __( 'No Themes', '' ),
		"items_list_navigation" => __( 'List of Themes', '' ),
		"items_list" => __( 'Themes', '' ),
	);

	$args = array(
		"label" => __( 'Themes', '' ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => true,
		"label" => "Themes",
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'music-director/song-finder/themes', 'with_front' => true, ),
		"show_admin_column" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"show_in_quick_edit" => true,
	);
	register_taxonomy( "themes", array( "songs" ), $args );
	/**
	 * Taxonomy: Writer/Performer.
	 */

	$labels = array(
		"name" => __( 'Performers', '' ),
		"singular_name" => __( 'Performer', '' ),
		"menu_name" => __( 'Performer', '' ),
		"all_items" => __( 'All Performers', '' ),
		"edit_item" => __( 'Edit Performer', '' ),
		"view_item" => __( 'View Performer', '' ),
		"update_item" => __( 'Update Performer', '' ),
		"add_new_item" => __( 'Add New Performer', '' ),
		"new_item_name" => __( 'New Performer', '' ),
		"search_items" => __( 'Search Performers', '' ),
		"popular_items" => __( 'Popular Performers', '' ),
		"separate_items_with_commas" => __( 'Seperate Performers with commas', '' ),
		"add_or_remove_items" => __( 'Add or remove Performers', '' ),
		"choose_from_most_used" => __( 'Choose from most used Performers', '' ),
		"not_found" => __( 'No Performers Found', '' ),
		"no_terms" => __( 'No Performers', '' ),
		"items_list_navigation" => __( 'List of Performers', '' ),
		"items_list" => __( 'Performers', '' ),
	);

	$args = array(
		"label" => __( 'Performer', '' ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => true,
		"label" => "Tempo",
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'music-director/song-finder/performer', 'with_front' => true, ),
		"show_admin_column" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"show_in_quick_edit" => true,
	);
	register_taxonomy( "performer", array( "songs" ), $args );
}

add_action( 'init', 'music_director_taxes' );

// Custom Fields //

// 1. customize ACF path
add_filter('acf/settings/path', 'my_acf_settings_path');
 
function my_acf_settings_path( $path ) {
 
    // update path
    $path = get_stylesheet_directory() . '%s/acf/';
    
    // return
    return $path;
    
}
 

// 2. customize ACF dir
add_filter('acf/settings/dir', 'my_acf_settings_dir');
 
function my_acf_settings_dir( $dir ) {
 
    // update path
    $dir = get_stylesheet_directory_uri() . '%s/acf/';
    
    // return
    return $dir;
    
}
 

// 3. Hide ACF field group menu item
add_filter('acf/settings/show_admin', '__return_false');


// 4. Include ACF
include_once( get_stylesheet_directory() . '%s/acf/acf.php' );

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_music-director-song-builder',
		'title' => 'Music Director: Song Builder',
		'fields' => array (
			array (
				'key' => 'field_587e606947d0d',
				'label' => 'Highlighted Lyrics',
				'name' => 'highlighted_lyrics',
				'type' => 'textarea',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => 4,
				'formatting' => 'br',
			),
			array (
				'key' => 'field_587e5f45967c2',
				'label' => 'Lead Sheet',
				'name' => 'lead_sheet',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_587e5fb9967c3',
				'label' => 'Chord Sheet',
				'name' => 'chord_sheet',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_587e6005967c4',
				'label' => 'Youtube Link',
				'name' => 'youtube_link',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_587e6027967c5',
				'label' => 'Spotify Link',
				'name' => 'spotify_link',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'songs',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}


?>