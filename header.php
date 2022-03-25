<?php
/**
 * The header for our theme
 * @package wp demos a01
 * @since 1.0.0
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> >
    <head>
        <meta charset="<?php bloginfo('charset') ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?> >
        <header>
            <div class="container lg-flex">
                <!-- option 2: if you don't logo/image it will display the site title (has a fallback ) -->
                <div class="site-logo">
                    <?php if ( ! has_custom_logo() ) { ?>
                        <?php if ( is_front_page() && is_home() ) : ?>
                            <!-- //if your page is set to front-page or blog display the site title (appearance > customize) -->
                                <a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a>
                        <?php else : ?>
                            <!-- //if your page is not set to front-page or blog display the site title (appearance > customize) -->
                            <a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a>
                        <?php endif; ?>
                            <!-- //otherwise display the custom logo. -->
                    <?php } else {
                        the_custom_logo();
                    }?>
                </div>
                <!-- device specific (not the best method for overall responsiveness): wp_is_mobile() -->
                
                <!-- mobile screen only -->
                <div class="sm-screens mobile">
                    <a class="sm-logo" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url">
                        <!-- properly displaying images hard-coded into templates -->
                        <img src=" <?php bloginfo('template_directory');?>/assets/img/design+code-logo.svg " alt="<?php the_title(); ?>">
                        <span class="sr-only"><?php bloginfo( 'name' ); ?></span>
                    </a>
                    <!-- toggle icon -->
                    <div class="toggle-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
                
                <nav>
                    <?php
                        wp_nav_menu(
                            //array of aruguments
                            array(
                                'theme_location'    => 'main-menu', //most important
                                'container'         => '', //removes the div around the ul
                                'menu_class'        => 'main-menu',
                                'menu_id'           => 'main-menu',
                                'fallback_cb'       =>  '' //optional | if menu doesn't exist - then it fires a callback function.
                            )
                        );
                    ?>
                </nav>
                
                <div class="utility">
                    <ul>
                        <li>
                            <a href="">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M255.1 96L267.1 84.02C300.6 51.37 347 36.51 392.6 44.1C461.5 55.58 512 115.2 512 185.1V190.9C512 232.4 494.8 272.1 464.4 300.4L283.7 469.1C276.2 476.1 266.3 480 256 480C245.7 480 235.8 476.1 228.3 469.1L47.59 300.4C17.23 272.1 0 232.4 0 190.9V185.1C0 115.2 50.52 55.58 119.4 44.1C164.1 36.51 211.4 51.37 244 84.02L255.1 96zM255.1 141.3L221.4 106.6C196.1 81.31 160 69.77 124.7 75.66C71.21 84.58 31.1 130.9 31.1 185.1V190.9C31.1 223.6 45.55 254.7 69.42 277L250.1 445.7C251.7 447.2 253.8 448 255.1 448C258.2 448 260.3 447.2 261.9 445.7L442.6 277C466.4 254.7 480 223.6 480 190.9V185.1C480 130.9 440.8 84.58 387.3 75.66C351.1 69.77 315.9 81.31 290.6 106.6L255.1 141.3z"/></svg>
                                <span>Favs</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- //container -->
        </header>
