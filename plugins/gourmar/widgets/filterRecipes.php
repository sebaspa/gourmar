<?php

class filterRecipes extends WP_Widget
{

  public function __construct()
  {
    parent::__construct(
      'filterRecipes',
      __('Filter Recipes', 'gourmar'),
      array(
        'description' => __('Filter recipes by name and category', 'gourmar')
      )
    );
  }

  public function widget($args, $instance)
  {
    $numberPost = $instance['numberPost'];

    // Display widget content
    if (!isset($_GET['recipeSearch'])) {
      $recipeSearch = '';
    } else {
      $recipeSearch = $_GET['recipeSearch'];
    }

    if (!isset($_GET['recipeCategory'])) {
      $recipeCategory = '';
    } else {
      $recipeCategory = $_GET['recipeCategory'];
    }

    $argsRecipeCategory = array(
      'taxonomy' => 'recipe-category',
      'orderby' => 'name',
      'order' => 'ASC'
    );

    $cats = get_categories($argsRecipeCategory);

    $tax_query = array(
      array(
        'taxonomy' => 'recipe-category',
        'field' => 'slug',
        'terms' => array($recipeCategory)
      )
    );

    $recipes = new WP_Query(
      array(
        'paged' => get_query_var('paged', 1),
        'post_status' => 'publish',
        'posts_per_page' => $numberPost,
        'post_type' => 'recipe',
        'orderby' => 'date',
        'order' => 'DESC',
        's' => $recipeSearch,
        'tax_query' => ($recipeCategory != '') ? $tax_query : ''
      )
    );
    ?>
    <div class="bg-gray-bg-500 w-full pb-10">
      <div class="container max-w-4xl mx-auto px-4">
        <form action="<?php echo get_permalink(); ?>" method="get">
          <div class="grid grid-cols-12 gap-6">
            <div class="col-span-12 md:col-span-5">
              <select name="recipeCategory" id="recipeCategory"
                class="w-full py-3 px-4 rounded-lg border border-primary-500 text-black-500 text-base">
                <option value="">Seleccione</option>
                <?php foreach ($cats as $cat): ?>
                  <option value="<?php echo $cat->slug; ?>" <?php echo ($cat->slug == $recipeCategory) ? 'selected' : ''; ?>>
                    <?php echo $cat->name; ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="col-span-12 md:col-span-4">
              <input type="text" name="recipeSearch" id="recipeSearch" placeholder="Buscar artículo..."
                value="<?php echo $recipeSearch; ?>"
                class="w-full py-3 px-4 rounded-lg border border-primary-500 text-black-500 text-base" />
            </div>
            <div class="col-span-12 md:col-span-3">
              <button class="bg-primary-500 text-white uppercase text-base rounded-full px-6 py-3 flex items-center gap-3"
                type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 512 512" width="16" class="text-white">
                  <path fill="currentColor"
                    d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" />
                </svg>
                <span>Buscar</span>
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="container max-w-7xl mx-auto px-4 py-8 md:py-20">
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
                <p class="cardRecipe__description"><?php echo $shortDescription ?></p>
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
      <div class="pagination">
        <?php
        echo paginate_links(
          array(
            'total' => $recipes->max_num_pages,
            'prev_text' => '←',
            'next_text' => '→',
          )
        );
        ?>
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
        name="<?php echo $this->get_field_name('numberPost'); ?>" type="number" min="1" max="12"
        value="<?php echo esc_attr($numberPost); ?>" />
    </p>
    <?php
  }

}


register_widget('filterRecipes');
