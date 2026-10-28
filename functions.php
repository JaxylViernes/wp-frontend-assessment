<?php
/**
 * Property Bootstrap theme functions.
 */

// Theme support.
add_action( 'after_setup_theme', function () {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', [ 'search-form', 'gallery', 'caption', 'style', 'script' ] );
} );

// Load Bootstrap 5, Font Awesome, Open Sans and the theme assets.
add_action( 'wp_enqueue_scripts', function () {
    $version = wp_get_theme()->get( 'Version' );

    wp_enqueue_style(
        'pb-open-sans',
        'https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap',
        [],
        null
    );
    wp_enqueue_style(
        'pb-bootstrap',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css',
        [],
        null
    );
    wp_enqueue_style(
        'pb-fontawesome',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css',
        [],
        null
    );
    wp_enqueue_style( 'pb-style', get_stylesheet_uri(), [ 'pb-bootstrap' ], $version );

    wp_enqueue_script(
        'pb-bootstrap-js',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js',
        [],
        null,
        true
    );

    if ( is_front_page() ) {
        wp_enqueue_script(
            'pb-reviews',
            get_template_directory_uri() . '/assets/js/reviews-slider.js',
            [ 'pb-bootstrap-js' ],
            $version,
            true
        );
    }
} );

// SEO: a descriptive page title for the home page.
add_filter( 'pre_get_document_title', function ( $title ) {
    if ( is_front_page() ) {
        return 'Featured Properties For Sale & To Let | ' . get_bloginfo( 'name' );
    }
    return $title;
} );

// SEO: meta description and Open Graph tags for the home page.
add_action( 'wp_head', function () {
    if ( ! is_front_page() ) {
        return;
    }
    $description = 'Browse our featured properties for sale and to let, and read what customers say about us in our Google reviews.';

    printf( '<meta name="description" content="%s">' . "\n", esc_attr( $description ) );
    printf( '<meta property="og:type" content="website">' . "\n" );
    printf( '<meta property="og:title" content="%s">' . "\n", esc_attr( wp_get_document_title() ) );
    printf( '<meta property="og:description" content="%s">' . "\n", esc_attr( $description ) );
    printf( '<meta property="og:url" content="%s">' . "\n", esc_url( home_url( '/' ) ) );
}, 1 );
