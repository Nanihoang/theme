<?php
/**
 * Functions and definitions for myhoteltheme
 * @package myhoteltheme
 */

// ✅ Load Navwalker class sớm để tránh lỗi
require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

if ( ! defined( '_S_VERSION' ) ) {
	define( '_S_VERSION', '1.0.0' );
}

function myhoteltheme_setup() {
	load_theme_textdomain( 'myhoteltheme', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );

	// ✅ Đăng ký vị trí menu
	register_nav_menus([
		'primary' => __('Primary Menu', 'myhoteltheme'),
		'footer'  => __('Footer Menu', 'myhoteltheme'),
	]);

	add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script']);
	add_theme_support('custom-background', [
		'default-color' => 'ffffff',
		'default-image' => '',
	]);
	add_theme_support('customize-selective-refresh-widgets');
	add_theme_support('custom-logo', [
		'height'      => 250,
		'width'       => 250,
		'flex-width'  => true,
		'flex-height' => true,
	]);
}
add_action( 'after_setup_theme', 'myhoteltheme_setup' );

function myhoteltheme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'myhoteltheme_content_width', 640 );
}
add_action( 'after_setup_theme', 'myhoteltheme_content_width', 0 );

function myhoteltheme_widgets_init() {
	register_sidebar([
		'name'          => esc_html__('Sidebar', 'myhoteltheme'),
		'id'            => 'sidebar-1',
		'description'   => esc_html__('Add widgets here.', 'myhoteltheme'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	]);
}
add_action( 'widgets_init', 'myhoteltheme_widgets_init' );

function myhoteltheme_scripts() {
	wp_enqueue_style( 'myhoteltheme-style', get_stylesheet_uri(), [], _S_VERSION );
	wp_style_add_data( 'myhoteltheme-style', 'rtl', 'replace' );

	wp_enqueue_style( 'bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' );
	wp_enqueue_script( 'bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', [], null, true );

	wp_enqueue_script( 'myhoteltheme-navigation', get_template_directory_uri() . '/js/navigation.js', [], _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'myhoteltheme_scripts' );

// 📦 Load các file mở rộng
require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/customizer.php';

if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
