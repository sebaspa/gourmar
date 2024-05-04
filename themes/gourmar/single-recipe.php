<?php

$recipe = new WP_Query(
  array(
    'post_type' => 'recipe',
    'p' => get_the_ID()
  )
);

get_header();

$image_id = get_post_meta(get_the_ID(), 'gourmar_fields_recipe_image_id', true);
$image_size = 'full';
$image_src = wp_get_attachment_image_src($image_id, $image_size);
$recipeText = get_post_meta(get_the_ID(), 'gourmar_fields_recipe_recipeDescription', true);
?>

<div class="containe max-w-7xl mx-auto px-4 py-10">
  <h1 class="font-adelica-brush text-2xl md:text-6xl text-primary-500 mb-10 text-center"><?php echo get_the_title() ?>
  </h1>
  <div class="relative w-full bg-gray-bg-500 min-h-[200px] md:min-h[600px]">
    <img src="<?php echo get_template_directory_uri() . '/images/animate-loading.gif' ?>" alt="loading" width="200"
      height="200" class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-0" />
    <img src="<?php echo $image_src[0]; ?>" alt="<?php echo get_the_title(); ?>"
      class="mb-8 w-full h-auto relative z-10" width="100%" height="auto" />
  </div>
  <p class="text-base">
    <?php echo $recipeText; ?>
  </p>
</div>
<?php get_footer(); ?>