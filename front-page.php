<?php
/**
 *  * This main homepage template
 * @package wp demos a01
 * @since 1.0
 * 
 */
    //display header
    get_header(); 
?>

   <div class="container-full">
        <!--  //if there are posts then display them... -->
        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post();
                //template partial get's pulled into the loop
                get_template_part('template-parts/content', 'home');   
            endwhile; ?>
            <?php else :
                get_template_part('template-part/content', 'none');
            ?>
        <?php endif; ?>
    </div>

<?php get_footer(); ?>
