<?php 
$group = array (
  'id' => '55b25943352d3',
  'title' => 'Display Options',
  'fields' => 
  array (
    0 => 
    array (
      'key' => 'field_556f195336c8f',
      'label' => 'Colour Scheme',
      'name' => 'colour_scheme',
      '_name' => 'colour_scheme',
      'type' => 'select',
      'order_no' => 0,
      'instructions' => '',
      'required' => 0,
      'id' => 'acf-field-colour_scheme',
      'class' => 'select',
      'conditional_logic' => 
      array (
        'status' => 0,
        'rules' => 
        array (
          0 => 
          array (
            'field' => 'null',
            'operator' => '==',
          ),
        ),
        'allorany' => 'all',
      ),
      'choices' => 
      array (
        'red' => 'Red',
        'green' => 'Green',
      ),
      'default_value' => 'red',
      'allow_null' => 0,
      'multiple' => 0,
      'field_group' => 65,
    ),
  ),
  'location' => 
  array (
    0 => 
    array (
      0 => 
      array (
        'param' => 'post_type',
        'operator' => '==',
        'value' => 'page',
        'order_no' => 0,
        'group_no' => 0,
      ),
    ),
  ),
  'options' => 
  array (
    'position' => 'side',
    'layout' => 'default',
    'hide_on_screen' => 
    array (
    ),
  ),
  'menu_order' => 0,
);