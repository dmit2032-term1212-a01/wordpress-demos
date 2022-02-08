<?php
/**
 * This is the archive template
 * this is the template that display all things: collections of posts, pages, categories, tags/tag clouds, authors, dates - literally anything you want it to display.  
 * 
 * @package wp demos a01
 * @since 1.0.0
 * 
 */
    //display header
    get_header();
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

    <section class="banner">
        <h1>
            <!-- _e(); translates a string into text similar to an echo(); -->
            <?php _e('Archives');?>
        </h1>
    </section>

    <section>
        <div class="container">
            <div class="row">   
                <div class="col col-1">
                    <!-- displaying blog posts -->
                    <h2><?php _e('Recent Blogs');?></h2>
                    <ul class="blog-list">
                        <!-- to display all blogs post: type=postbypost -->
                        <!-- limit posts: type=postbypost&limit=6 -->
                        <?php wp_get_archives('type=postbypost&limit=6'); ?>
                    </ul>
                </div>
                <div class="col col-2">
                    <!-- displaying pages -->
                    <h2> <?php _e('Pages');?></h2>
                    <!-- displays a list of pages -->
                    <ul class="page-list">
                        <?php wp_list_pages('title_li='); ?>
                    </ul>
                </div>
                <div class="col col-3">
                    <!-- displaying categories/tags -->
                    <h2> <?php _e('Categories');?></h2>
                    <ul class="cat-list">
                        <!-- 
                        to remove or hide the the default list heading add: 'title_li' to be set to null or empty. This can be done in a couple of different ways:
                            1. if you only have the one parameter then you don't need to add an array for a list of arguements:
                            <?php //wp_list_categories( 'title_li=' ); ?>
                            2. If you have a list of parameters than create an array with a list of parameters to be passed. See below.
                        -->
                        <?php wp_list_categories( 
                            array(
                               'depth' => 1, 
                               'title_li' => '', 
                            ),
                            
                        ); ?>
                    </ul>
                </div>
                <div class="col col-4 remove-default-widget-heading">
                    <!-- displaying all archives by month -->
                    <h2> <?php _e('Monthly Archives');?></h2>
                    <!-- display monthly archives as a list -->
                    <?php the_widget('WP_Widget_Archives',
                        array(
                            'orderby'       => 'count',
                            'order'         => 'DESC',
                            'show_count'    => 1,
                        )
                    );?>
                    <!-- display as a dropdown -->
                    <?php the_widget('WP_Widget_Archives', 'dropdown=1'); ?>
                </div>
            </div>
        </div>
    </section>

</article>






<?php get_footer(); ?>
