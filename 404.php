<?php
/**
 * Template for displaying a 404 page
 * 
 * @package wp demos a01
 * @since 1.0.0
 */
    get_header();
?>

    <div <?php post_class(); ?> id="post-<?php the_ID(); ?>" >
        <div class="container">
            <section>
                <div class="error-heading">
                    <h1>
                        <?php esc_html_e('Sorry, page not found', 'theme name/domain'); ?>
                    </h1>
                    <p>
                        <?php esc_html_e('It looks like nothing was found here. Maybe try using the search below'); ?>
                    </p>
                </div>
                <div class="">
                    <!-- display the search form -->
                    <?php get_search_form(); ?>
                </div>
            </section>
        </div>
    </div>



<?php get_footer(); ?>
