<?php
/**
 *  * This for displaying all the full blog post/article
 * @package wp demos a01
 * @since 1.0
 * 
 */
    //display header
    get_header(); 
?>
    <div class="container-full">
        <section class="banner">
            <h1>
                <?php _e('Blog'); ?>
            </h1>
        </section>
    </div>
    <div class="container-full">
        <div class="container">
            <!--  //if there are posts then display them... -->
            <?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post();
                    //template partial get's pulled into the loop
                    get_template_part('template-parts/content', 'single');   
                endwhile; ?>
                <?php else :
                    get_template_part('template-part/content', 'none');
                ?>
            <?php endif; ?>
        </div>
    </div>

<?php get_footer(); ?>
