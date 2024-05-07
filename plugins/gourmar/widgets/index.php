<?php

function gourmar_widgets()
{
  require_once dirname(__FILE__) . '/filterRecipes.php';
  require_once dirname(__FILE__) . '/lastRecipes.php';
  require_once dirname(__FILE__) . '/lastProducts.php';
  require_once dirname(__FILE__) . '/mapsWidget.php';
  require_once dirname(__FILE__) . '/officesMap.php';
  require_once dirname(__FILE__) . '/products.php';
}

add_action('widgets_init', 'gourmar_widgets');
