<?php

get_header();

$recipe = new WP_Query(
  array(
    'post_type' => 'recipe',
    'p' => get_the_ID()
  )
);
function get_custom_post_type_category($post_id)
{
  $categories = get_the_terms($post_id, 'recipe-category');  // Replace 'your_taxonomy_slug' with your actual taxonomy slug
  if (!empty($categories)) {
    $category_name = $categories[0]->name; // Get the name of the first category
    return $category_name;
  } else {
    return 'Uncategorized';  // You can customize this default message
  }
}
$post_id = get_the_ID();
$category_name = get_custom_post_type_category($post_id);

$image_id = get_post_meta(get_the_ID(), 'gourmar_fields_recipe_image_id', true);
$image_size = 'full';
$image_src = wp_get_attachment_image_src($image_id, $image_size);
$recipeText = get_post_meta(get_the_ID(), 'gourmar_fields_recipe_recipeDescription', true);
$shortDescription = get_post_meta(get_the_ID(), 'gourmar_fields_recipe_shortDescription', true);
?>

<div class="container max-w-7xl mx-auto px-4 my-12">
  <div class="flex mb-4">
    <a href="<?php echo esc_url(get_home_url() . '/blog'); ?>" class="btn btn-primary">
      <?php echo __('Volver', 'gourmar') ?>
    </a>
  </div>
  <div class="grid grid-cols-12 gap-x-0 md:gap-x-8 gap-y-8 mb-12 md:mb-16">
    <div class="col-span-12 lg:col-span-8">
      <div class="relative w-full bg-gray-bg-500 min-h-[200px] md:min-h[600px]">
        <img src="<?php echo get_template_directory_uri() . '/images/animate-loading.gif' ?>" alt="loading" width="200"
          height="200" class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-0" />
        <img src="<?php echo $image_src[0]; ?>" alt="<?php echo get_the_title(); ?>"
          class="w-full h-auto relative z-10 rounded-lg" width="100%" height="auto" />
      </div>
    </div>
    <div class="col-span-12 lg:col-span-4">
      <h1 class="font-lato text-2xl md:text-4xl text-primary-500 mb-6 md:mb-10">
        <?php echo get_the_title() ?>
      </h1>
      <span class="font-bold uppercase text-xs mb-5 text-primary-500 bg-yellow-500 rounded-full px-4 py-2">
        <?php echo $category_name ?>
      </span>
      <p class="mt-5 text-base text-black-500"><?php echo $shortDescription; ?></p>
    </div>
  </div>
  <p class="font-lato text-2xl md:text-5xl text-primary-500 mb-6"><?php echo __('Receta', 'gourmar') ?>
  </p>
  <div class=" blogContent">
    <?php echo $recipeText; ?>
  </div>
</div>
<?php get_footer(); ?>