<?php
/**
 *  Template Name: Courses
 *  description: displays all courses
 * @package wp demos a01
 * @since 1.0
 * 
 */
    //display header
    get_header(); 
?>

   
    <!-- displays content from the page template in WP editor -->
    <div class="container-full">
      <div class="container">
        <!-- if there are posts then do something -->
        <?php  if( have_posts() ) : ?>
          <!-- while loop - is going to execute code as long as something is true. -->
          <?php  while ( have_posts()) : the_post();?>
            <?php the_content(); ?>
          <?php endwhile; ?>
          <!-- closes the while loop -->
          <?php else: ?>
            <?php get_template_part('template-parts/content', 'none'); ?>
        <?php endif; ?>
      </div> <!-- //container -->

      <div class="container">
        <?php 
              $args = array(
                  'post_type' =>  'courses',
                  'posts_per_page'    => 100, //display # of posts
              );
              $courses_query  = new WP_Query($args);
          ?>
          <!-- loop for displaying custom content -->
          <?php if ($courses_query->have_posts() ) : ?>
              <div class="flex-card-row">
                  <?php while ($courses_query->have_posts() ) : $courses_query->the_post(); ?>
                    <!-- card layout -->
                    <div class="card">
                      <header>
                        <!-- featured images -->
                        <a href="<?php the_permalink(); ?>">
                          <?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>
                        </a>
                        <a href="<?php the_permalink(); ?>">
                          <?php the_title('<h3>', '</h3>'); ?>
                        </a>
                      </header>
                      <div class="card-body">
                        <p><?php the_excerpt(); ?></p>  
                      </div>
                      <footer>
                        <div class="left">
                          <p><?php the_author(); ?></p>
                        </div>
                        <div class="right">
                          <!-- categories -->
                          <ul>
                            <?php 
                              $term = get_the_category();
                              if ( $term ) {
                                foreach ( $term as $t ) {
                                  $t = get_term($t);
                                  //print out the url with a class that use the categories as a css selector
                                  print_r( '<li><a class="'.esc_html($t->slug).'" href="' . get_term_link($t) .'" >' . $t->name . '</a></li>' );
                                  //slug - part of the url (page/taxonomoy name)
                                  //name - shows the name of the category
                                }
                              }
                            ?>
                          </ul>
                        </div>
                      </footer>
                    </div>
                      <!-- content template go here -->
                     
                      
                  <?php endwhile; ?>
            </div>
              <?php wp_reset_postdata(); ?>
              <?php else : ?>
                  <p><?php _e('Sorry, no posts matched your criteria'); ?></p>
          <?php endif; ?>
      </div>
      
    </div>

<?php get_footer(); ?>
