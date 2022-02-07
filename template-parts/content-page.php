<?php
/**
 *  * Template partial/part for the displaying all of the content for your homepage.
 * 
 * @package wp demos 
 * @since 1.0.0
 */
?>

<article <?php post_class(); ?> id="post-<?php the_ID();?>" >
    
    <div class="page-heading">
        <!-- page title -->
        <?php the_title('<h2 class="title">', '</h2>'); ?>
    </div>
    <section>
        <div class="content">
            <?php the_content(); ?>
        </div>
    </section>

 
</article>
