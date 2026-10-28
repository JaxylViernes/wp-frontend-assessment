# Property Bootstrap (front-end assessment)

A standalone WordPress theme built with Bootstrap 5.3, Font Awesome 6 and the Open Sans Google font.

## What it contains
- **Design 1**: three-column featured properties grid (stacks to 2 and 1 columns on smaller screens)
- **Design 2**: Google reviews slider, 6 reviews, 3 per slide on desktop, 2 on tablet, 1 on mobile (Bootstrap carousel, built by `assets/js/reviews-slider.js`)
- Standard Bootstrap navbar with collapsing mobile menu
- Header and footer (`header.php`, `footer.php`)
- Font Awesome icons throughout

## SEO
- `title-tag` theme support plus a descriptive home page title
- Meta description and Open Graph tags on the home page
- One `h1`, then a logical `h2` / `h3` heading order
- Semantic HTML (`header`, `nav`, `main`, `section`, `article`, `figure`, `footer`)
- Descriptive image `alt` text, explicit width/height, lazy loading
- Skip link, ARIA labels and reduced-motion support

## Setup
1. Copy the `property-bootstrap` folder into `wp-content/themes/`.
2. Activate **Property Bootstrap** under Appearance > Themes.
3. Visit the home page. `front-page.php` is used automatically, whatever the Settings > Reading option is.

Property images are simple placeholders in `assets/images/`. Reviews are lorem ipsum, as in the design.
