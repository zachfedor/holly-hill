<?php

add_shortcode('recipe_list', 'lcm_recipe_list');
function lcm_recipe_list($atts)
{
    extract(shortcode_atts(array(
        'count' => 5
    ), $atts));

    ob_start();

    $args = array(
      'post_type' => 'recipe'
    , 'posts_per_page' => $count
    , 'orderby' => 'menu_order'
    , 'order' => 'ASC'
    );

    $the_query = new WP_Query($args);

    $i = 0;
    if ($the_query->have_posts()) {
        echo '<div class="recipe-list">';
        while ($the_query->have_posts()) {
            $the_query->the_post();

            $image = get_post_meta(get_the_ID(), '_recipe_image', true);

            ?>
            <div id="recipe-member-<?php echo get_the_ID(); ?>" class="recipe-member row">
                <div class="col-md-4">
                    <img src="<?php echo $image; ?>" />
                </div>
                <div class="col-md-8">
                    <h2 class="entry-title"><?php the_title(); ?> </h2>
                    <div class="entry-content">
                        <?php the_content(); ?>

                    </div>
                </div>
            </div>

            <?php

        }
        echo '</div>';
        wp_reset_postdata();
    } else {
        ?>

        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>

    <?php
    } // if

    $contents = ob_get_contents();
    ob_end_clean();

    return $contents;

}
