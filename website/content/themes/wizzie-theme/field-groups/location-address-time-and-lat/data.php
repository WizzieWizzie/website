<?php 
$group = array (
  'id' => '55b2594333a39',
  'title' => 'Location: Address, Time and Lat',
  'fields' => 
  array (
    0 => 
    array (
      'key' => 'field_556ef08df29ee',
      'label' => 'Address',
      'name' => 'address',
      '_name' => 'address',
      'type' => 'textarea',
      'order_no' => 0,
      'instructions' => '',
      'required' => 0,
      'id' => 'acf-field-address',
      'class' => 'textarea',
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
      'default_value' => '',
      'placeholder' => '',
      'maxlength' => '',
      'rows' => '',
      'formatting' => 'br',
      'field_group' => 56,
    ),
    1 => 
    array (
      'key' => 'field_556ef0c3f29ef',
      'label' => 'Club Times',
      'name' => 'club_times',
      '_name' => 'club_times',
      'type' => 'textarea',
      'order_no' => 1,
      'instructions' => '',
      'required' => 0,
      'id' => 'acf-field-club_times',
      'class' => 'textarea',
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
      'default_value' => '',
      'placeholder' => '',
      'maxlength' => '',
      'rows' => '',
      'formatting' => 'br',
      'field_group' => 56,
    ),
    2 => 
    array (
      'key' => 'field_556ef32a655b4',
      'label' => 'Location',
      'name' => 'location',
      '_name' => 'location',
      'type' => 'google_map',
      'order_no' => 2,
      'instructions' => '',
      'required' => 0,
      'id' => 'acf-field-location',
      'class' => 'google_map',
      'conditional_logic' => 
      array (
        'status' => 0,
        'rules' => 
        array (
          0 => 
          array (
            'field' => 'null',
            'operator' => '==',
            'value' => '',
          ),
        ),
        'allorany' => 'all',
      ),
      'center_lat' => '51.526322',
      'center_lng' => '-0.084298',
      'zoom' => '',
      'height' => '',
      'field_group' => 56,
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
        'value' => 'location',
        'order_no' => 0,
        'group_no' => 0,
      ),
    ),
  ),
  'options' => 
  array (
    'position' => 'normal',
    'layout' => 'default',
    'hide_on_screen' => 
    array (
    ),
  ),
  'menu_order' => 0,
);