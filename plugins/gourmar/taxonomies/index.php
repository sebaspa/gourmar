<?php

function gourmar_taxonomies()
{
  require_once dirname(__FILE__) . '/recipe-categories.php';
}

add_action('init', 'gourmar_taxonomies');
