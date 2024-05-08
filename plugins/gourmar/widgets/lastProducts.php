<?php

class lastProducts extends WP_Widget
{

  public function __construct()
  {
    parent::__construct(
      'lastProducts',
      __('Last products', 'gourmar'),
      array(
        'description' => __('Last products', 'gourmar')
      )
    );
  }

  public function widget($args, $instance)
  {
    $numberPost = $instance['numberPost'];

    // Display widget content

    $products = new WP_Query(
      array(
        'paged' => get_query_var('paged', 1),
        'post_status' => 'publish',
        'posts_per_page' => $numberPost,
        'post_type' => 'product',
        'orderby' => 'date',
        'order' => 'DESC',
      )
    );
    ?>
    <div class="grid grid-cols-12 gap-4">
      <?php
      if ($products->have_posts()):
        while ($products->have_posts()):
          $products->the_post();
          // Get product data
          $product_id = get_the_ID();
          // Display product details
          if (has_post_thumbnail($product_id)):
            $product_image = get_the_post_thumbnail_url($product_id);
            ?>
            <div class="col-span-12 sm:col-span-6 md:col-span-4 cardLastProduct">
              <a href="<?php echo get_permalink(); ?>">
                <img src="<?php echo $product_image; ?>" alt="<?php echo get_the_title(); ?>" class="cardLastProduct__image">
              </a>
              <div class="cardLastProduct__content group animated-background">
                <a class="cardLastProduct__content-btn" href="<?php echo get_permalink(); ?>">
                  →
                </a>
                <p class="cardLastProduct__category"><?php echo get_the_term_list($product_id, 'product_cat'); ?></p>
                <p class="cardLastProduct__title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></p>
              </div>
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
    // Update widget options
    $instance['numberPost'] = strip_tags($new_instance['numberPost']);
    return $instance;
  }

  // Widget Settings Form
  public function form($instance)
  {
    // Retrieve widget options from $instance
    $numberPost = isset($instance['numberPost']) ? $instance['numberPost'] : 9;
    // Display widget settings form
    ?>
    <p>
      <label for="<?php echo $this->get_field_id('numberPost'); ?>"><?php _e('Number of posts'); ?>:</label>
      <input class="widefat" id="<?php echo $this->get_field_id('numberPost'); ?>"
        name="<?php echo $this->get_field_name('numberPost'); ?>" type="number" min="1" max="6"
        value="<?php echo esc_attr($numberPost); ?>" />
    </p>
    <?php
  }

}


register_widget('lastProducts');
