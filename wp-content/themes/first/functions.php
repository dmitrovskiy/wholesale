<?php

require TEMPLATEPATH.'/custom_functions.php';
require TEMPLATEPATH.'/custom_widgets.php';


//enable menu supporting
//registering menus
if (function_exists('register_nav_menu')) {
    register_nav_menu('main_menu', 'main menu');
    register_nav_menu('about_aside_menu', 'aside menu');
    register_nav_menu('policy_menu', 'footer menu for policy information');
}

//register custom post types
function createCustomPostTypes() {

    //slide
    $labels = array(
        'name'               => __('Slides'),
        'singular_name'      => __('Slide'),
        'add_new'            => __('Add new'),
        'add_new_item'       => __( 'Add new slide' ),
        'edit_item'          => __( 'Edit slide' ),
        'new_item'           => __( 'New slide' ),
        'all_items'          => __( 'All slides' ),
        'view_item'          => __( 'Watch slide' ),
        'search_items'       => __( 'Search slides' ),
        'not_found'          => __( 'Slides are not found' ),
        'not_found_in_trash' => __( 'There is no slides' ),
        'menu_name'          => 'Slides'
    );
    $args = array(
        'labels'        => $labels,
        'description'   => 'Slides of the main slider on the main page',
        'public'        => true,
        'menu_position' => 5,
        'supports'      => array( 'title', 'editor', 'custom_fields' ),
        'has_archive'   => true,
    );
    register_post_type( 'ws_slides', $args );

    //resources
    $labels = array(
        'name'               => __('Resources'),
        'singular_name'      => __('Resource'),
        'add_new'            => __('Add new'),
        'add_new_item'       => __( 'Add new resource' ),
        'edit_item'          => __( 'Edit resource' ),
        'new_item'           => __( 'New resource' ),
        'all_items'          => __( 'All resources' ),
        'view_item'          => __( 'Watch resource' ),
        'search_items'       => __( 'Search resources' ),
        'not_found'          => __( 'Resources are not found' ),
        'not_found_in_trash' => __( 'There is no resources' ),
        'menu_name'          => 'Resources'
    );
    $args = array(
        'labels'        => $labels,
        'description'   => 'Resources for downloading',
        'public'        => true,
        'menu_position' => 5,
        'supports'      => array( 'title', 'editor', 'custom_fields' ),
        'has_archive'   => true,
    );
    register_post_type( 'ws_resources', $args );
}

//create custom sidebars
function createCustomSidebars() {
    //home left sidebar
    $args = array (
        'id' => 'ws_home_left_sidebar',
        'name' => 'left homepage sidebar',
        'description' => 'left sidebar of the home page',
        'before_widget' => '<li>',
        'after-widget' => '</li>'
    );
    register_sidebar( $args );


    //right column page sidebar
    $args = array (
        'id' => 'ws_page_right_slider',
        'name' => 'right page sidebar',
        'description' => 'right sidebar of a page',
        'before_widget' => '<li>',
        'after_widget' => '</li>'
    );
    register_sidebar( $args );


    //right column product sidebar
    $args = array (
        'id' => 'ws_product_right_sidebar',
        'name' => 'right product page sidebar',
        'description' => 'right product sidebar',
        'before_widget' => '<li>',
        'after_widget' => '</li>'
    );
    register_sidebar( $args );
}

//create custom widgets
function createCustomWidgets() {

    register_widget('WS_QS_Widget');
    register_widget('WS_Resource_Widget');

}

//adding the styles on the site
function theme_scripts_styles() {

    wp_enqueue_style('reset', get_template_directory_uri().'/css/reset.css');
    wp_enqueue_style('shadowbox', get_template_directory_uri().'/css/shadowbox.css');
    wp_enqueue_style( 'style', get_stylesheet_uri());

}

//adding the js scripts on the site
function theme_scripts_scripts() {

    $template = get_template_directory_uri();

    wp_enqueue_script('ws_jquery', 'http://code.jquery.com/jquery-latest.js');
    wp_enqueue_script('bootstrap', $template.'/js/bootstrap.min.js');

    wp_register_script('flexslider', $template.'/js/jquery.flexslider.min.js');
    wp_register_script('start_flexslider', $template.'/js/start_list-slider.js');

    wp_register_script('accordion-panel', $template.'/js/accordion.min.js');
    wp_register_script('start_panel-accordion', $template.'/js/start_panel-accordion.js');
    wp_register_script('start_product_accordion', $template.'/js/start_product-accordion.js');

    wp_register_script('shadowbox', $template.'/js/shadowbox.js');
    wp_register_script('start_shadowbox', $template.'/js/start_shadowbox.js');
}

//adding the styles links
add_action( 'wp_enqueue_scripts', 'theme_scripts_styles' );
//adding the scripts
add_action( 'wp_enqueue_scripts', 'theme_scripts_scripts' );
//custom post types
add_action( 'init', 'createCustomPostTypes' );
//Custom sidebars
add_action( 'widgets_init', 'createCustomSidebars' );
//Custom widgets
add_action( 'widgets_init', 'createCustomWidgets' );

