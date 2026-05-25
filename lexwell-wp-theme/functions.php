<?php
function lexwell_enqueue_scripts() {
    wp_enqueue_style( 'lexwell-google-fonts', 'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap', array(), null );
    wp_enqueue_style( 'bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css', array(), '1.11.3' );
    wp_enqueue_style( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css', array(), '5.3.7' );
    wp_enqueue_style( 'swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), '11.0' );
    wp_enqueue_style( 'lexwell-style', get_template_directory_uri() . '/assets/css/style.css', array('bootstrap'), '1.0.0' );
    wp_enqueue_style( 'lexwell-wp-style', get_stylesheet_uri(), array('lexwell-style'), '1.0.0' );

    wp_enqueue_script( 'bootstrap-bundle', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js', array(), '5.3.7', true );
    wp_enqueue_script( 'swiper-bundle', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), '11.0', true );
    wp_enqueue_script( 'gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js', array(), '3.12.5', true );
    wp_enqueue_script( 'lexwell-script', get_template_directory_uri() . '/assets/js/script.js', array('bootstrap-bundle', 'swiper-bundle', 'gsap'), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'lexwell_enqueue_scripts' );

function lexwell_theme_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'lexwell' ),
        'footer'  => __( 'Footer Menu', 'lexwell' ),
    ) );
}
add_action( 'after_setup_theme', 'lexwell_theme_setup' );
?>