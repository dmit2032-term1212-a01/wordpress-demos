<?php
/***
 * The footer template 
 * @package wp demos a01
 * @since 1.0.0
 */
?>


        <footer>
            <div class="container">
                <div class="row">
                    <div class="col col-one">
                        <?php if (is_active_sidebar('footer-col-one')) : ?>
                            <?php dynamic_sidebar( 'footer-col-one' ); ?>
                        <?php endif; ?>
                    </div>
                    <div class="col col-two">
                        <?php if (is_active_sidebar('footer-col-two')) : ?>
                            <?php dynamic_sidebar( 'footer-col-two' ); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <p><?php _e('Copyright &copy;'); ?> <?php echo date('Y'); ?> <?php _e('WP Demos | For educational purposes')?></p>
            </div>
        </footer>
    <?php wp_footer(); ?>
    </body>
</html>


