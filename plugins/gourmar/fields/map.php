<?php
add_action('cmb2_admin_init', 'gourmar_fields_map');
function gourmar_fields_map()
{

  $prefix = 'gourmar_fields_map_';

  $cmb = new_cmb2_box(
    array(
      'id' => $prefix . 'map',
      'title' => esc_html__('Provider info', 'gourmar'),
      'object_types' => array('provider'),
      'context' => 'normal',
      'priority' => 'high',
      'show_in_rest' => true,
    )
  );



  $cmb->add_field(
    array(
      'name' => esc_html__('Provider Name', 'gourmar'),
      'id' => $prefix . 'provider_name',
      'type' => 'text',
      'show_in_rest' => true,
      'attributes' => array(
        'required' => 'required',
      )
    )
  );

  $cmb->add_field(
    array(
      'name' => esc_html__('Coordinates', 'gourmar'),
      'id' => $prefix . 'coordinates',
      'show_in_rest' => true,
      'type' => 'text',
      'attributes' => array(
        'required' => 'required',
      )
    )
  );

  $cmb->add_field(
    array(
      'name' => esc_html__('Info', 'gourmar'),
      'id' => $prefix . 'info',
      'type' => 'wysiwyg',
      'attributes' => array(
        'required' => 'required',
      )
    )
  );

}
