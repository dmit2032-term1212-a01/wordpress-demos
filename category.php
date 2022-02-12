<?php
/**
 * Template ofr displaying all category types (generalized template)
 * 
 * @package wp demos a01
 * @since 1.0.0
 */
    get_header(); 
?>
    <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

    <?php if ( have_posts() ) : ?>
        <!-- items only displayed once -->
        <section class="banner">
            <h1>
                <?php _e('Category: '); ?>
                <!-- if single_cat_title is set to true then it will display the choosen category -->
                <?php single_cat_title('', true); ?>
            </h1>
            <!-- displaying a category description (typically optional feature)  -->
            <?php if ( category_description() ) : ?>
                <div><?php echo category_description(); ?></div>
            <?php endif; ?>
        </section> 
        <div class="container two-thirds-layout">
            <div class="main-content row two-thirds-col">   
        <?php while( have_posts() ) : the_post(); ?>
        <!-- cycles through content and displays everything associated with category you clicked until there is nothing left to be displayed. -->
                <div class="cat-post col">
                    <!-- thumbnail/featured image-->
                    <?php echo get_the_post_thumbnail($post->ID, 'large'); ?>
                    <h4>
                        <a href="<?php the_permalink(); ?>" title="Permanent link to <?php the_title_attribute(); ?>">
                            <?php the_title(); ?>
                        </a>
                        <p><?php echo get_the_date();?></p>
                        <?php the_category(); ?>
                        <?php the_excerpt(); ?>
                    </h4>
                </div>
        <?php endwhile; ?>
            </div>
            <div class="sidebar-content one-thrid-col">
                <!-- placeholder content -->
                <p>Placeholder content - coming soon!</p>
            </div>
        </div> <!-- container -->
    
        <?php else: ?>
            <?php get_template_part('template/content', 'none'); ?>
    <?php endif; ?>
    </article>




    <?php get_footer(); ?>
