<?php
// enqueue parent styles

function ns_enqueue_styles() {

    $parent_style = 'parent-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'ns_enqueue_styles' );

function ns_create_custom_widget () {
	register_sidebar( array(
	'name'          => 'Feature Box',
	'id'            => 'feature_box',
	'before_widget' => '<div class="feature-box">',
	'after_widget'  => '</div>',
	'before_title'  => '<h2 class="widget-title">',
	'after_title'   => '</h2>',
	) );
}

add_action( 'widgets_init', 'ns_create_custom_widget' );

function ns_add_feature_box () {
	if ( is_active_sidebar( 'feature_box' ) ) : 
		dynamic_sidebar( 'feature_box' );
	endif;
}

add_action( 'feature_box_hook', 'ns_add_feature_box' );

function ns_modify_read_more_link() {
	return '<a class="more-link" href="' . get_permalink() . '">Let me read more!</a>';
}

add_filter( 'the_content_more_link', 'ns_modify_read_more_link' );

function ns_load_scripts() {
	wp_enqueue_script('jquery');
	wp_enqueue_script('header-shrink', get_stylesheet_directory_uri() . '/scripts/shrink.js', false, '1.0', true );
}

add_action( 'wp_enqueue_scripts', 'ns_load_scripts' );

function ns_move_indexjs_to_child() {
	wp_dequeue_script( 'twentytwenty-js' );
	wp_deregister_script( 'twentytwenty-js' );
	
	wp_register_script('indexjs-child', get_stylesheet_directory_uri() . '/scripts/index.js');
	wp_enqueue_script('indexjs-child');
}

add_action('wp_enqueue_scripts', 'ns_move_indexjs_to_child', 11);