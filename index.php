<?php get_header(); ?>

<main id="main" class="container py-5">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <article <?php post_class( 'mb-5' ); ?>>
            <h1 class="h2"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
            <?php the_content(); ?>
        </article>
    <?php endwhile; else : ?>
        <p>Nothing found.</p>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
