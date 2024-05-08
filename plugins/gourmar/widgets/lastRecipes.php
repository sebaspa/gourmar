<?php

class lastRecipes extends WP_Widget
{

  public function __construct()
  {
    parent::__construct(
      'lastRecipes',
      __('Last Recipes', 'gourmar'),
      array(
        'description' => __('Last recipes', 'gourmar')
      )
    );
  }

  public function widget($args, $instance)
  {
    $numberPost = $instance['numberPost'];

    // Display widget content

    $recipes = new WP_Query(
      array(
        'paged' => get_query_var('paged', 1),
        'post_status' => 'publish',
        'posts_per_page' => $numberPost,
        'post_type' => 'recipe',
        'orderby' => 'date',
        'order' => 'DESC',
      )
    );
    ?>
    <div class="container max-w-7xl mx-auto px-4 py-8">
      <div class="grid grid-cols-12 gap-4 md:gap-8 mb-16">
        <?php if ($recipes->posts): ?>
          <?php foreach ($recipes->posts as $recipe): ?>
            <div class="col-span-12 md:col-span-6 lg:col-span-4">
              <div class="cardRecipe">
                <?php
                $recipeCategory = get_the_terms($recipe->ID, 'recipe-category');
                $shortDescription = get_post_meta($recipe->ID, 'gourmar_fields_recipe_shortDescription', true);
                $image_id = get_post_meta($recipe->ID, 'gourmar_fields_recipe_image_id', true);
                $image_size = 'recipe';
                $image_src = wp_get_attachment_image_src($image_id, $image_size);
                ?>
                <a href="<?php echo get_permalink($recipe->ID, false) ?>">
                  <div class="cardRecipe__image relative">
                    <img src="<?php echo get_template_directory_uri() . '/images/animate-loading.gif' ?>" alt="loading"
                      width="100" height="100" class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-0" />
                    <img src="<?php echo $image_src[0]; ?>" alt="<?php echo $recipe->post_title ?>" width="100%" height="auto"
                      class="cardRecipe__image-img relative z-10" loading="lazy" />
                  </div>
                </a>
                <p class="cardRecipe__title"><?php echo $recipe->post_title ?></p>
                <div class="flex gap-2 items-center mb-3">
                  <?php
                  $timestamp = strtotime($recipe->post_date);
                  $wpDate = new DateTime(date('Y-m-d H:i:s', $timestamp));
                  $wpDate->setTimezone(new DateTimeZone('America/Bogota'));
                  ?>
                  <p class="cardRecipe__date"><?php echo $wpDate->format('j F, Y'); ?></p>
                  <p class="cardRecipe__pipe">|</p>
                  <p class="cardRecipe__category"><?php echo $recipeCategory[0]->name; ?></p>
                </div>
                <div class="cardRecipe__separator"></div>
                <p class="cardRecipe__description"><?php echo mb_substr($shortDescription, 0, 100) . '...'; ?></p>
              </div>
            </div>
          <?php endforeach;
          wp_reset_postdata(); ?>
        <?php else: ?>
          <div class="col-span-12">
            <p class="text-center text-xl text-primary-500">No hay resultados</p>
          </div>
        <?php endif; ?>

      </div>
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


register_widget('lastRecipes');
