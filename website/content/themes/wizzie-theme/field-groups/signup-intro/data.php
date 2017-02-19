<?php 
$group = array (
  'id' => '55b25943324c5',
  'title' => 'SignUp: Intro',
  'fields' => 
  array (
    0 => 
    array (
      'key' => 'field_556edad5cd052',
      'label' => 'Headline',
      'name' => 'headline',
      '_name' => 'headline',
      'type' => 'text',
      'order_no' => 0,
      'instructions' => '',
      'required' => 0,
      'id' => 'acf-field-headline',
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
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'formatting' => 'none',
      'maxlength' => '',
      'field_group' => 54,
    ),
    1 => 
    array (
      'key' => 'field_556edae0cd053',
      'label' => 'Intro',
      'name' => 'intro',
      '_name' => 'intro',
      'type' => 'wysiwyg',
      'order_no' => 1,
      'instructions' => '',
      'required' => 0,
      'id' => 'acf-field-intro',
      'class' => 'wysiwyg',
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
      'toolbar' => 'basic',
      'media_upload' => 'no',
      'field_group' => 54,
    ),
  ),
  'location' => 
  array (
    0 => 
    array (
      0 => 
      array (
        'param' => 'page',
        'operator' => '==',
        'value' => '15',
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