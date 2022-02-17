<?php
/**
 * Search results partial template (template that gets pulled into search.php)
 *@package wp demos a01
 *@since 1.0.0 
 */
?>

<div class="">

    <!-- display title/heading: page/post... -->
    <?php 
        the_title( 
            sprintf('<h2><a href="%s">', esc_url( get_permalink() ) ), 
                    '</a></h2>' );
    ?>
    <!-- if statement below only displays the additional content if a post type template. Page templates will only display the title. -->
    <?php if ( 'post' == get_post_type() ) :?>

        <?php echo get_the_post_thumbnail($post->ID, 'large' ); ?>
        <?php the_date(); ?>
        <?php the_category(); ?>
        <?php the_excerpt(); ?>

    <?php endif; ?>



</div>
