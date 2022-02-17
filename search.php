<?php
/**
 * 
 * This is the template for displaying all search results
 * @package wp demos a01
 * @since 1.0.0
 * 
 */
    get_header();
?>

    <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

        <div class="container">
            <?php if ( have_posts() ) : ?>
                <!-- content that only gets displayed once -->
                <h1 class="banner">
                    <?php 
                        printf(
                            //%s - translates your query term
                            esc_html__('Searched for: %s'), '<span>' . get_search_query() . '</span>'
                        );
                    ?>
                </h1>
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part('template-parts/content', 'search'); ?>
                <?php endwhile;?>
                <?php else : ?>
                    <?php get_template_part('template-parts/content', 'none'); ?>
            <?php endif; ?>
        </div>

    </article>






<?php get_footer(); ?>
