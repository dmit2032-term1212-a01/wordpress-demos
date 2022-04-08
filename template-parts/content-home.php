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

    <section>

    <!-- add heading using acf fields -->
    <!-- method #1 -->
    <h2><?php the_field('courses_title'); ?></h2>

    <!-- 
        method #2 
        - sets your field name as a varible
        - a little overkill for headings, but other more complex methods its better
    -->
    <!-- setting the variable -->
    <?php $courses_title = get_field('courses_title'); ?>
    <h2>
        <?php //if($courses_title) {
            //_e($courses_title);
        //} ?>
    </h2>

        <?php 
            $args = array(
                'post_type' =>  'courses',
                'posts_per_page'    => 4, //display # of posts
            );
            $courses_query  = new WP_Query($args);
        ?>
        <!-- loop for displaying custom content -->
        <?php if ($courses_query->have_posts() ) : ?>
            <div class="row">
                <?php while ($courses_query->have_posts() ) : $courses_query->the_post(); ?>
                    <!-- content template go here -->
                    <?php the_title('<h3>', '</h3>'); ?>
                    <?php the_excerpt(); ?>
                <?php endwhile; ?>
            </div>
            <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <p><?php _e('Sorry, no posts matched your criteria'); ?></p>
        <?php endif; ?>

        <!-- view all button -->
        <?php
            //created your variable and set your field name to that variable.
            $courses_btn = get_field('courses_view_all_button');
            
            if( $courses_btn) :
                //set variables to store information for the title of the button and the url
                $link_title = $courses_btn['title'];
                $link_url = $courses_btn['url'];
            ?>
            <!-- create link structure with variables above -->
            <a href="<?php print_r( esc_url($link_url) ); ?>"> <?php print_r( esc_html( $link_title) ); ?></a>
        <?php endif; ?>

    </section>

    <section>
        <!-- display featured posts/blogs on the homepage -->
        <?php 
            $args = array(
                'post_type'         =>  'post', //type of post (ie blogs)
                'posts_per_page'    => 2, //display # posts
                'orderby'           => 'date', //show by date
                'order'             =>  'DESC' //show by the last descendant
            );
            //variable ($blog) saved as the new WP_Query object
            $blog = new WP_Query($args);
        ?>

        <?php if ($blog->have_posts()) : ?> 
            <?php while ( $blog->have_posts() ) : $blog->the_post(); ?>
                <div class="home-blog-card">
                    <div class="home-blog-header">
                        <a href="<?php the_permalink(); ?>">
                            <?php echo the_post_thumbnail( $post->ID, 'large'); ?>
                        </a>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title('<h4>','</h4>'); ?>
                        </a>
                    </div>
                    <div class="home-blog-body">
                        <p><?php the_excerpt(); ?> </p>
                    </div>
                    <div class="home-blog-footer">
                        <a href="<?php the_permalink(); ?>"> <?php _e('Read More >'); ?></a>
                    </div>
                </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        <?php endif; ?>
    </section>
    


 
</article>
