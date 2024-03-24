<?php
function enqueue_styles() {
    wp_enqueue_style( 'style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'enqueue_styles');

add_theme_support( 'post-thumbnails' );

if (function_exists('add_theme_support')) {
    add_theme_support('menus');
}

if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title'    => 'Theme options',
        'menu_title'    => 'Theme options',
        'menu_slug'     => 'theme-options',
        'capability'    => 'edit_posts',
        'parent_slug'   => '',
        'position'      => false,
        'icon_url'      => false
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Header',
        'menu_title'    => 'Header',
        'menu_slug'     => 'theme-options-header',
        'capability'    => 'edit_posts',
        'parent_slug'   => 'theme-options',
        'position'      => false,
        'icon_url'      => false
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Footer',
        'menu_title'    => 'Footer',
        'menu_slug'     => 'theme-options-footer',
        'capability'    => 'edit_posts',
        'parent_slug'   => 'theme-options',
        'position'      => false,
        'icon_url'      => false
    ));

}

function wph_add_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    $mimes['ico'] = 'image/ico';
    return $mimes;
};

add_filter('upload_mimes', 'wph_add_mime_types');

function my_acf_init() {

    acf_update_setting('google_api_key', 'AIzaSyB9hfpQcONa2ztXjaKMchkepxldwJsfago');
}

add_action('acf/init', 'my_acf_init');

function get_menu_items($menu_name){
    if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
        $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
        return wp_get_nav_menu_items($menu->term_id);
    }
}

function register_my_menu() {
    register_nav_menu('top-menu',__( 'Top Menu' ));
}
add_action( 'init', 'register_my_menu' );

function register_footer_menu() {
    register_nav_menu('footer-menu',__( 'Footer Menu' ));
}
add_action( 'init', 'register_footer_menu' );

function arphabet_widgets_init() {

    register_sidebar( array(
        'name'          => 'Sidebar',
        'id'            => 'sidebar',
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="title">',
        'after_title'   => '</h2>',
    ) );

}
add_action( 'widgets_init', 'arphabet_widgets_init' );

function custom_button( $atts ){
    $image = '';
    $params = shortcode_atts( array(
        'color' => '#5393d0',
        'icon' => '',
        'text' => 'button',
        'url' => '#',
        'target' => ''
    ), $atts );

    if ($params['icon'] != '') {
        $image = "<img src='{$params['icon']}' alt=''>";
    };

    return "<a href='{$params['url']}' target='{$params['target']}' style='color:{$params['color']};border-color:{$params['color']};' class='customLink'>". $image ."<span>{$params['text']}</span></a>";
}
add_shortcode('button', 'custom_button');

function true_add_mce_button() {
    if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {
        return;
    }
    if ( 'true' == get_user_option( 'rich_editing' ) ) {
        add_filter( 'mce_external_plugins', 'true_add_tinymce_script' );
        add_filter( 'mce_buttons', 'true_register_mce_button' );
    }
}
add_action('admin_head', 'true_add_mce_button');

function true_add_tinymce_script( $plugin_array ) {
    $plugin_array['custom_button'] = get_stylesheet_directory_uri() .'/js/true_button.js';
    return $plugin_array;
}

function true_register_mce_button( $buttons ) {
    array_push( $buttons, 'custom_button' );
    return $buttons;
}

add_filter( 'acf/fields/wysiwyg/toolbars' , 'my_toolbars'  );
function my_toolbars( $toolbars )
{
    array_push($toolbars['Full' ][2], 'custom_button');

    return $toolbars;
}

