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
            <div class="container">
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
                </div>
            </div>
            <!-- //container -->
        </header>
