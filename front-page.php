<?php
/**
 * Front page: featured properties grid (Design 1) and reviews slider (Design 2).
 */
get_header();

$img_dir = get_template_directory_uri() . '/assets/images/';

$properties = [
    [
        'img'       => 'property-1.svg',
        'alt'       => 'Bright open-plan living room with large windows',
        'price'     => '£1,600 PCM',
        'status'    => 'Let Agreed',
        'class'     => 'status-let-agreed',
        'title'     => '17 Carter Villas, Brockenhurst',
        'beds'      => 2,
        'baths'     => 0,
        'type'      => 'Other',
        'available' => 'Now',
    ],
    [
        'img'       => 'property-2.svg',
        'alt'       => 'Detached brick house with a front lawn',
        'price'     => '£1,400 PCM',
        'status'    => 'To Let',
        'class'     => 'status-to-let',
        'title'     => '56 Dumpton Cross, Exeter',
        'beds'      => 4,
        'baths'     => 4,
        'type'      => 'House',
        'available' => '6 November 2026',
    ],
    [
        'img'       => 'property-3.svg',
        'alt'       => 'Modern double bedroom with a large window',
        'price'     => '£290,000',
        'status'    => 'For Sale',
        'class'     => 'status-for-sale',
        'title'     => '118 Kingsdale Ford, Sherborne',
        'beds'      => 5,
        'baths'     => 1,
        'type'      => 'House',
        'available' => 'For Sale',
    ],
];

// Placeholder reviews (lorem ipsum, as in the design). Replace with real reviews.
$lorem   = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque aliquam cursus nulla. Morbi aliquet accumsan est et mollis. Nunc in quam orci. Quisque risus metus, aliquet nec metus sed, bibendum eleifend turpis.';
$authors = [ 'Reviewer One', 'Reviewer Two', 'Reviewer Three', 'Reviewer Four', 'Reviewer Five', 'Reviewer Six' ];
?>

<main id="main">

    <section class="hero text-center text-white py-5">
        <div class="container py-4">
            <h1 class="display-5 fw-bold">Find Your Next Home</h1>
            <p class="lead mb-4">Browse our featured properties for sale and to let.</p>
            <a class="btn btn-warning btn-lg" href="#featured">
                View featured listings <i class="fa-solid fa-arrow-down ms-1" aria-hidden="true"></i>
            </a>
        </div>
    </section>

    <!-- Design 1: featured properties, 3 column grid -->
    <section id="featured" class="featured-section py-5" aria-labelledby="featured-heading">
        <div class="container">
            <h2 id="featured-heading" class="section-title text-center mb-4">Our Featured Listing</h2>

            <div class="row g-4">
                <?php foreach ( $properties as $p ) : ?>
                    <div class="col-12 col-md-6 col-lg-4">
                        <article class="card property-card h-100 border-0 shadow-sm">
                            <div class="property-media position-relative">
                                <img src="<?php echo esc_url( $img_dir . $p['img'] ); ?>"
                                     alt="<?php echo esc_attr( $p['alt'] ); ?>"
                                     width="600" height="400" loading="lazy">
                                <div class="property-overlay d-flex justify-content-between align-items-end">
                                    <span class="property-price"><?php echo esc_html( $p['price'] ); ?></span>
                                    <span class="badge property-status <?php echo esc_attr( $p['class'] ); ?>">
                                        <?php echo esc_html( $p['status'] ); ?>
                                    </span>
                                </div>
                            </div>

                            <div class="card-body">
                                <h3 class="property-title h6"><?php echo esc_html( $p['title'] ); ?></h3>
                                <p class="property-meta small text-muted mb-0">
                                    <?php echo esc_html( $p['beds'] ); ?> Bedrooms<span class="sep">|</span>
                                    <?php echo esc_html( $p['baths'] ); ?> Bathrooms<span class="sep">|</span>
                                    <?php echo esc_html( $p['type'] ); ?>
                                </p>
                            </div>

                            <div class="card-footer property-footer d-flex justify-content-between align-items-center">
                                <button type="button" class="btn-fav"
                                        aria-label="Save <?php echo esc_attr( $p['title'] ); ?> to favourites">
                                    <i class="fa-regular fa-heart" aria-hidden="true"></i>
                                </button>
                                <span class="small text-muted">
                                    <i class="fa-regular fa-calendar me-1" aria-hidden="true"></i>
                                    Available: <?php echo esc_html( $p['available'] ); ?>
                                </span>
                            </div>
                        </article>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Design 2: Google reviews, 3 column slider (6 reviews) -->
    <section id="reviews" class="reviews-section py-5" aria-labelledby="reviews-heading">
        <div class="container">
            <div class="text-center mb-4">
                <h2 id="reviews-heading" class="reviews-title h1 mb-1">
                    <i class="fa-brands fa-google me-2" aria-hidden="true"></i>Google Reviews
                </h2>
                <div class="reviews-stars" role="img" aria-label="Rated 5 out of 5 stars">
                    <?php for ( $i = 0; $i < 5; $i++ ) : ?><i class="fa-solid fa-star" aria-hidden="true"></i><?php endfor; ?>
                </div>
            </div>

            <!-- Slider: built by assets/js/reviews-slider.js (hidden until JS runs) -->
            <div id="reviewsCarousel" class="carousel slide d-none" aria-label="Customer reviews">
                <div class="carousel-inner"></div>
                <div class="d-flex justify-content-center align-items-center gap-3 mt-4">
                    <button class="reviews-arrow" type="button" data-bs-target="#reviewsCarousel"
                            data-bs-slide="prev" aria-label="Previous reviews">
                        <i class="fa-solid fa-chevron-left" aria-hidden="true"></i>
                    </button>
                    <div class="carousel-indicators reviews-dots"></div>
                    <button class="reviews-arrow" type="button" data-bs-target="#reviewsCarousel"
                            data-bs-slide="next" aria-label="Next reviews">
                        <i class="fa-solid fa-chevron-right" aria-hidden="true"></i>
                    </button>
                </div>
            </div>

            <!-- Source reviews: shown as a plain grid if JavaScript is off -->
            <div id="reviewsSource" class="row g-4">
                <?php foreach ( $authors as $author ) : ?>
                    <div class="col-12 col-md-6 col-lg-4">
                        <figure class="review h-100">
                            <blockquote class="review-text">
                                <div class="review-stars" role="img" aria-label="5 out of 5 stars">
                                    <?php for ( $i = 0; $i < 5; $i++ ) : ?><i class="fa-solid fa-star" aria-hidden="true"></i><?php endfor; ?>
                                </div>
                                <p class="mb-0"><?php echo esc_html( $lorem ); ?></p>
                            </blockquote>
                            <figcaption class="review-author">
                                <i class="fa-brands fa-google me-1" aria-hidden="true"></i><?php echo esc_html( $author ); ?>
                            </figcaption>
                        </figure>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
