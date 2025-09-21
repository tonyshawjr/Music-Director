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
                "show_in_rest" => true,
                "rest_base" => "music-director-songs",
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
                "template" => array(
                        array(
                                'core/heading',
                                array(
                                        'level' => 3,
                                        'content' => __( 'Song Overview', 'music-director' ),
                                )
                        ),
                        array(
                                'core/paragraph',
                                array(
                                        'placeholder' => __( 'Capture rehearsal notes, service flow details, or vocal assignments.', 'music-director' ),
                                )
                        ),
                        array(
                                'core/separator',
                                array(),
                        ),
                        array(
                                'core/heading',
                                array(
                                        'level' => 4,
                                        'content' => __( 'Highlighted Lyrics', 'music-director' ),
                                )
                        ),
                        array(
                                'core/quote',
                                array(),
                                array(
                                        array(
                                                'core/paragraph',
                                                array(
                                                        'placeholder' => __( 'Paste a key lyric excerpt that the team should focus on.', 'music-director' ),
                                                )
                                        ),
                                )
                        ),
                        array(
                                'core/heading',
                                array(
                                        'level' => 4,
                                        'content' => __( 'Resources', 'music-director' ),
                                )
                        ),
                        array(
                                'core/list',
                                array(
                                        'placeholder' => __( 'List lead sheets, chord charts, and reference recordings.', 'music-director' ),
                                )
                        ),
                ),
                "template_lock" => "insert",
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
                "show_in_rest" => true,
                "rest_base" => "music-director-keys",
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
                "show_in_rest" => true,
                "rest_base" => "music-director-tempos",
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
                "show_in_rest" => true,
                "rest_base" => "music-director-themes",
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
                "show_in_rest" => true,
                "rest_base" => "music-director-performers",
		"show_in_quick_edit" => true,
	);
	register_taxonomy( "performer", array( "songs" ), $args );
}

add_action( 'init', 'music_director_taxes' );

function music_director_sanitize_highlighted_lyrics( $value ) {

        return wp_kses_post( $value );
}

function music_director_register_song_meta() {

        $meta_fields = array(
                'highlighted_lyrics' => array(
                        'type' => 'string',
                        'single' => true,
                        'sanitize_callback' => 'music_director_sanitize_highlighted_lyrics',
                        'show_in_rest' => array(
                                'schema' => array(
                                        'type' => 'string',
                                        'context' => array( 'view', 'edit' ),
                                ),
                        ),
                ),
                'lead_sheet' => array(
                        'type' => 'string',
                        'single' => true,
                        'sanitize_callback' => 'esc_url_raw',
                        'show_in_rest' => array(
                                'schema' => array(
                                        'type' => 'string',
                                        'format' => 'uri',
                                        'context' => array( 'view', 'edit' ),
                                ),
                        ),
                ),
                'chord_sheet' => array(
                        'type' => 'string',
                        'single' => true,
                        'sanitize_callback' => 'esc_url_raw',
                        'show_in_rest' => array(
                                'schema' => array(
                                        'type' => 'string',
                                        'format' => 'uri',
                                        'context' => array( 'view', 'edit' ),
                                ),
                        ),
                ),
                'youtube_link' => array(
                        'type' => 'string',
                        'single' => true,
                        'sanitize_callback' => 'esc_url_raw',
                        'show_in_rest' => array(
                                'schema' => array(
                                        'type' => 'string',
                                        'format' => 'uri',
                                        'context' => array( 'view', 'edit' ),
                                ),
                        ),
                ),
                'spotify_link' => array(
                        'type' => 'string',
                        'single' => true,
                        'sanitize_callback' => 'esc_url_raw',
                        'show_in_rest' => array(
                                'schema' => array(
                                        'type' => 'string',
                                        'format' => 'uri',
                                        'context' => array( 'view', 'edit' ),
                                ),
                        ),
                ),
        );

        foreach ( $meta_fields as $meta_key => $args ) {
                register_post_meta( 'songs', $meta_key, $args );
        }
}

add_action( 'init', 'music_director_register_song_meta', 11 );

function music_director_prepare_terms_for_rest( $post_id, $taxonomy ) {

        $terms = get_the_terms( $post_id, $taxonomy );

        if ( empty( $terms ) || is_wp_error( $terms ) ) {
                return array();
        }

        return array_values( array_map( function( $term ) {
                return array(
                        'id' => (int) $term->term_id,
                        'name' => $term->name,
                        'slug' => $term->slug,
                );
        }, $terms ) );
}

function music_director_prepare_song_for_rest( $object ) {

        if ( empty( $object['id'] ) ) {
                return array();
        }

        $post_id = (int) $object['id'];

        $highlighted_lyrics = get_post_meta( $post_id, 'highlighted_lyrics', true );
        $lead_sheet = get_post_meta( $post_id, 'lead_sheet', true );
        $chord_sheet = get_post_meta( $post_id, 'chord_sheet', true );
        $youtube_link = get_post_meta( $post_id, 'youtube_link', true );
        $spotify_link = get_post_meta( $post_id, 'spotify_link', true );

        return array(
                'highlighted_lyrics' => wp_kses_post( $highlighted_lyrics ),
                'resources' => array(
                        'lead_sheet' => $lead_sheet ? esc_url( $lead_sheet ) : '',
                        'chord_sheet' => $chord_sheet ? esc_url( $chord_sheet ) : '',
                        'youtube_link' => $youtube_link ? esc_url( $youtube_link ) : '',
                        'spotify_link' => $spotify_link ? esc_url( $spotify_link ) : '',
                ),
                'taxonomies' => array(
                        'keys' => music_director_prepare_terms_for_rest( $post_id, 'key' ),
                        'tempos' => music_director_prepare_terms_for_rest( $post_id, 'tempo' ),
                        'themes' => music_director_prepare_terms_for_rest( $post_id, 'themes' ),
                        'performers' => music_director_prepare_terms_for_rest( $post_id, 'performer' ),
                ),
        );
}

function music_director_register_song_rest_fields() {

        register_rest_field(
                'songs',
                'music_director',
                array(
                        'get_callback' => 'music_director_prepare_song_for_rest',
                        'schema' => array(
                                'description' => __( 'Additional metadata for Music Director songs.', 'music-director' ),
                                'type' => 'object',
                                'context' => array( 'view', 'edit' ),
                        ),
                )
        );
}

add_action( 'rest_api_init', 'music_director_register_song_rest_fields' );

function music_director_register_song_editor_support() {

        if ( function_exists( 'register_block_pattern_category' ) ) {
                register_block_pattern_category(
                        'music-director',
                        array(
                                'label' => __( 'Music Director', 'music-director' ),
                        )
                );
        }

        if ( function_exists( 'register_block_pattern' ) ) {
                register_block_pattern(
                        'music-director/song-resources',
                        array(
                                'title' => __( 'Song Resources Summary', 'music-director' ),
                                'description' => __( 'Starter layout for rehearsal notes, resource links, and highlighted lyrics.', 'music-director' ),
                                'categories' => array( 'music-director' ),
                                'content' => <<<'HTML'
<!-- wp:heading {"level":3} -->
<h3>Song Overview</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Add rehearsal notes, vocal assignments, or service flow reminders.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":4} -->
<h4>Resources</h4>
<!-- /wp:heading -->

<!-- wp:list -->
<ul><li>Lead Sheet: <a href="">Link to PDF</a></li><li>Chord Chart: <a href="">Link to PDF</a></li><li>Reference Recording: <a href="">YouTube or Spotify link</a></li></ul>
<!-- /wp:list -->

<!-- wp:heading {"level":4} -->
<h4>Highlighted Lyrics</h4>
<!-- /wp:heading -->

<!-- wp:quote -->
<blockquote class="wp-block-quote"><p>Paste the key lyric section that you want to emphasize.</p></blockquote>
<!-- /wp:quote -->
HTML
                        )
                );
        }
}

add_action( 'init', 'music_director_register_song_editor_support', 12 );

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