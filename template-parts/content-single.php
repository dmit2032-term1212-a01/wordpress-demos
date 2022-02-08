<?php
/**
 *  * Template partial/part for the displaying all of the content of your article/blog post (partial for single.php).
 * 
 * @package wp demos 
 * @since 1.0.0
 */
?>

<article <?php post_class();?> id="post-<?php the_ID();?>" >

    <header>
        <!-- get page title -->
        <!-- by default title displays as a h1 tag -->
        <?php the_title('<h2 class="">','</h2>'); ?>
        <ul class="meta-info">
            <li><?php echo get_the_date(); ?></li>
            <li><?php _e('by');?> <?php the_author(); ?></li> 
        </ul>
        <!-- has built-in html structure & class - use your dev tools! -->
        <?php the_category(); ?>
    </header>

    <div class="content">
        <!-- the_content - displays all content that comes from the editor -->
        <?php the_content(); ?>
    </div>

</article>