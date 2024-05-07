<?php

function gourmar_post_types()
{
  require_once dirname(__FILE__) . '/recipes.php';
  require_once dirname(__FILE__) . '/providers.php';
  require_once dirname(__FILE__) . '/countries.php';
  //require_once dirname(__FILE__) . '/save-recipe.php';
}

add_action('init', 'gourmar_post_types');
