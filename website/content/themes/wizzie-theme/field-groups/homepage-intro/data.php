<?php 
$group = array (
  'id' => '55b259432d663',
  'title' => 'Homepage: Intro',
  'fields' => 
  array (
    0 => 
    array (
      'key' => 'field_556cabcb771b4',
      'label' => 'Intro',
      'name' => 'intro',
      '_name' => 'intro',
      'type' => 'repeater',
      'order_no' => 0,
      'instructions' => '',
      'required' => 0,
      'id' => 'acf-field-intro',
      'class' => 'repeater',
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
      'sub_fields' => 
      array (
        0 => 
        array (
          'key' => 'field_556cabe8771b5',
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
          'column_width' => '',
          'default_value' => '',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'formatting' => 'none',
          'maxlength' => '',
        ),
        1 => 
        array (
          'key' => 'field_556cac84771b6',
          'label' => 'Copy',
          'name' => 'copy',
          '_name' => 'copy',
          'type' => 'textarea',
          'order_no' => 1,
          'instructions' => '',
          'required' => 0,
          'id' => 'acf-field-copy',
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
          'column_width' => '',
          'default_value' => '',
          'placeholder' => '',
          'maxlength' => '',
          'rows' => '',
          'formatting' => 'html',
        ),
      ),
      'row_min' => '',
      'row_limit' => 3,
      'layout' => 'row',
      'button_label' => 'Add Intro Item',
      'field_group' => 26,
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
      0 => 'the_content',
    ),
  ),
  'menu_order' => 0,
);