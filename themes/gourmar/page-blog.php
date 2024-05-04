<?php

/**
 * Template Name: Blog
 */

get_header();

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

$args = array(
  'taxonomy' => 'recipe-category',
  'orderby' => 'name',
  'order' => 'ASC'
);

$cats = get_categories($args);

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
    'posts_per_page' => 9,
    'post_type' => 'recipe',
    'orderby' => 'date',
    'order' => 'DESC',
    's' => $recipeSearch,
    'tax_query' => ($recipeCategory != '') ? $tax_query : ''
  )
);
?>
<div class="bg-gray-bg-500 w-full py-12">
  <div class="container max-w-7xl mx-auto px-4">
    <p class="font-novecento text-lg text-secondary-500 text-center mb-4 md:mb-10">NOTICAS Y RECETAS</p>
    <p class="font-adelica-brush text-4xl md:text-6xl text-center text-primary-500 mb-8 md:mb-14">
      Nuestras<br />publicaciones
    </p>
  </div>
  <div class="container max-w-4xl mx-auto px-4">
    <form action="<?php echo get_permalink(); ?>" method="get">
      <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 md:col-span-5">
          <select name="recipeCategory" id="recipeCategory"
            class="w-full py-3 px-4 rounded-lg border border-primary-500 text-black-500 text-base">
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
            <?php $recipeImage = get_post_meta($recipe->ID, 'gourmar_fields_recipe_image', true); ?>
            <?php $recipeCategory = get_the_terms($recipe->ID, 'recipe-category'); ?>
            <?php $shortDescription = get_post_meta($recipe->ID, 'gourmar_fields_recipe_shortDescription', true); ?>
            <img src="<?php echo $recipeImage; ?>" alt="<?php echo $recipe->post_title ?>" width="100%" height="auto"
              class="cardRecipe__image" />
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
          <h2><a href="<?php echo get_permalink($recipe->ID, false) ?>"><?php echo $recipe->post_title ?></a></h2>
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
get_footer();
