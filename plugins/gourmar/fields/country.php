<?php
add_action('cmb2_admin_init', 'gourmar_fields_country');
function gourmar_fields_country()
{

  $prefix = 'gourmar_fields_country_';

  $cmb = new_cmb2_box(
    array(
      'id' => $prefix . 'country',
      'title' => esc_html__('Country info', 'gourmar'),
      'object_types' => array('country'),
      'context' => 'normal',
      'priority' => 'high',
      'show_in_rest' => true,
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
      'name' => esc_html__('Flag', 'gourmar'),
      'id' => $prefix . 'flag',
      'show_in_rest' => true,
      'type' => 'text',
      'attributes' => array(
        'required' => 'required',
      )
    )
  );

}
