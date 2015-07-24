<?php 
$group = array (
  'id' => '55b2594330cc8',
  'title' => 'Quote: Content',
  'fields' => 
  array (
    0 => 
    array (
      'key' => 'field_556cb88466f4c',
      'label' => 'Quote',
      'name' => 'quote',
      '_name' => 'quote',
      'type' => 'textarea',
      'order_no' => 0,
      'instructions' => '',
      'required' => 0,
      'id' => 'acf-field-quote',
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
            'value' => '',
          ),
        ),
        'allorany' => 'all',
      ),
      'default_value' => '',
      'placeholder' => '',
      'maxlength' => '',
      'rows' => '',
      'formatting' => 'html',
      'field_group' => 40,
    ),
    1 => 
    array (
      'key' => 'field_556cb9266c156',
      'label' => 'Said by',
      'name' => 'name',
      '_name' => 'name',
      'type' => 'text',
      'order_no' => 1,
      'instructions' => '',
      'required' => 0,
      'id' => 'acf-field-name',
      'class' => 'text',
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
      'default_value' => '',
      'placeholder' => 'Andy Smith, Wizzie Volunteer',
      'prepend' => '',
      'append' => '',
      'formatting' => 'none',
      'maxlength' => '',
      'field_group' => 40,
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
        'value' => 'quote',
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
      0 => 'the_content',
    ),
  ),
  'menu_order' => 0,
);