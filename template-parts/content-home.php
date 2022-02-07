<?php
/**
 *  * Template partial/part for the displaying all of the content for your homepage.
 * 
 * @package wp demos 
 * @since 1.0.0
 */
?>

<article <?php post_class(); ?> id="post-<?php the_ID();?>" >
    <section>
        <div class="content">
            <!-- displays the content that comes from the editor -->
            <?php the_content(); ?>
        </div>
    </section>

 
</article>
