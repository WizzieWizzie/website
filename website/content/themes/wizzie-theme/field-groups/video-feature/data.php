<?php 
$group = array (
  'id' => '55b259433784e',
  'title' => 'Video feature',
  'fields' => 
  array (
    0 => 
    array (
      'key' => 'field_55afc4d3e602d',
      'label' => 'Youtube Video url',
      'name' => 'video_url',
      '_name' => 'video_url',
      'type' => 'text',
      'order_no' => 0,
      'instructions' => 'i.e. //www.youtube.com/embed/OjJ4JoIOUhg',
      'required' => 0,
      'id' => 'acf-field-video_url',
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
      'field_group' => 135,
    ),
    1 => 
    array (
      'key' => 'field_55afc4fee602e',
      'label' => 'Headline',
      'name' => 'headline',
      '_name' => 'headline',
      'type' => 'text',
      'order_no' => 1,
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
          ),
        ),
        'allorany' => 'all',
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'formatting' => 'html',
      'maxlength' => '',
      'field_group' => 135,
    ),
    2 => 
    array (
      'key' => 'field_55afc50ce602f',
      'label' => 'Copy',
      'name' => 'copy',
      '_name' => 'copy',
      'type' => 'text',
      'order_no' => 2,
      'instructions' => '',
      'required' => 0,
      'id' => 'acf-field-copy',
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
      'field_group' => 135,
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
        'value' => '10',
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