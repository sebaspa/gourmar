<?php

function gourmar_widgets()
{
  require_once dirname(__FILE__) . '/filterRecipes.php';
  require_once dirname(__FILE__) . '/lastRecipes.php';
}

add_action('widgets_init', 'gourmar_widgets');
