<?php
/**
 * template for displaying the search form. 
 * @package wp demos a01
 * @since 1.0.0
 */
?>

<form method="get" id="searchform" role="search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label class="sr-only" for="s">Search</label>
    <input type="text" id="s" name="s" placeholder="<?php esc_attr_e('Search for something'); ?>" value="<?php the_search_query(); ?>" />
    <input type="submit" name="submit" value="<?php esc_attr_e('Search'); ?>"/>
</form>
