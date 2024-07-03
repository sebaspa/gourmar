<?php

class FeaturedProducts extends WP_Widget
{

    public function __construct()
    {
        parent::__construct(
            'featuredProducts',
            __('Featured Products', 'gourmar'),
            array(
                'description' => __('Displays featured products', 'gourmar')
            )
        );
    }

    public function widget($args, $instance)
    {
        $numberPost = !empty($instance['numberPost']) ? $instance['numberPost'] : 5; // Default to 5 if not set

        // Query to retrieve products from the "Destacados" category
        $featured_products = new WP_Query(
            array(
                'post_status' => 'publish',
                'posts_per_page' => $numberPost,
                'post_type' => 'product',
                'orderby' => 'date',
                'order' => 'DESC',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'product_cat',
                        'field' => 'slug',
                        'terms' => 'destacados',
                    ),
                ),
            )
        );

        if (!$featured_products->have_posts()) {
            echo '<p>No featured products found.</p>';
            return;
        }

        ?>
        <div class="grid grid-cols-12 gap-4">
            <?php
            if ($featured_products->have_posts()):
                while ($featured_products->have_posts()):
                    $featured_products->the_post();
                    // Get product data
                    $product_id = get_the_ID();
                    // Display product details
                    if (has_post_thumbnail($product_id)):
                        $product_image = get_the_post_thumbnail_url($product_id);
                        ?>
                        <div class="col-span-12 sm:col-span-6 md:col-span-4 cardLastProduct">
                            <a href="<?php echo get_permalink(); ?>">
                                <img src="<?php echo $product_image; ?>" alt="<?php echo get_the_title(); ?>"
                                    class="cardLastProduct__image">
                            </a>
                            <div class="cardLastProduct__content group animated-background">
                                <a class="cardLastProduct__content-btn" href="<?php echo get_permalink(); ?>">
                                    →
                                </a>
                                <p class="cardLastProduct__category">
                                    <?php echo get_the_term_list($product_id, 'product_cat', '', ', ', ''); ?>
                                </p>
                                <p class="cardLastProduct__title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></p>
                            </div>
                        </div>
                        <?php
                    else:
                        ?>
                        <div class="col-span-12 sm:col-span-6 md:col-span-4 cardLastProduct">
                            <a href="<?php echo get_permalink(); ?>">
                                <p><?php the_title(); ?></p>
                            </a>
                        </div>
                        <?php
                    endif;
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
        <?php
    }

    // Widget Update Method
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['numberPost'] = (!empty($new_instance['numberPost'])) ? strip_tags($new_instance['numberPost']) : 5;
        return $instance;
    }

    // Widget Settings Form
    public function form($instance)
    {
        $numberPost = !empty($instance['numberPost']) ? $instance['numberPost'] : 5;
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('numberPost'); ?>"><?php _e('Number of posts'); ?>:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('numberPost'); ?>"
                name="<?php echo $this->get_field_name('numberPost'); ?>" type="number" min="1" max="10"
                value="<?php echo esc_attr($numberPost); ?>" />
        </p>
        <?php
    }
}

register_widget('FeaturedProducts');
