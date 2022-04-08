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
           <?php the_title('<h1>', '</h1>'); ?>
        </section>
    </div>
    <div class="container-full">
        <div class="container two-thirds-layout">
            <!--  //if there are posts then display them... -->
            <?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>
                   
                <div class="img-container">
                    <!-- add img using ACF fields -->
                    <?php 
                        $courses_img = get_field('plant_img');
                        if( !empty($courses_img) ): ?>
                        <!-- display img -->
                        <img src="<?php echo esc_url( $courses_img['url']); ?>" alt="<?php echo esc_attr($courses_img['alt']); ?>"/>
                    <?php endif; ?>
                </div>
                
                <?php the_content(); ?>






                <?php endwhile; ?>
                <?php else :
                    get_template_part('template-part/content', 'none');
                ?>
            <?php endif; ?>
            <div class="right-sidebar one-thrid-col">
                <?php dynamic_sidebar( 'right-sidebar' ); ?>
            </div>
        </div>
    </div>

<?php get_footer(); ?>
