<?php

/*
 * Implements THEMENAME_alpha_preprocess_region
 */
function suitcase_interim_alpha_preprocess_region(&$vars) {
  if ($vars['region'] == 'content' && arg(0) == 'node' && is_numeric(arg(1)) && arg(2) !== 'edit') {
    $node = node_load(arg(1));
    if ($node->type == 'people' && !empty($node->field_people_category)) {
      $vars['categories'] = array();
      foreach ($node->field_people_category[LANGUAGE_NONE] as $category) {
        $tax = taxonomy_term_load($category['tid']);
        array_push($vars['categories'], $tax->name);
      }
    }
  }
  elseif ($vars['region'] == 'branding') {

    $vars['level_1'] = '';
    $vars['level_2'] = '';
    $vars['level_3'] = '';

    $wordmark_image_alt = variable_get('suitcase_interim_config_level_1');

    if ($wordmark_image_alt) {
      $wordmark_image_src = (theme_get_setting('default_logo', 'suitcase_interim')) ? file_create_url(drupal_get_path('theme', 'suitcase_interim') . '/images/isu.svg') : file_create_url(theme_get_setting('logo_path', 'suitcase_interim'));
      $wordmark_image = theme('image', array('path' => $wordmark_image_src, 'alt' => $wordmark_image_alt));
      $wordmark_url = variable_get('suitcase_interim_config_level_1_url');
      $vars['level_1'] = l($wordmark_image, $wordmark_url, array('attributes' => array('id' => 'isu_header_wordmark'), 'html' => TRUE));
    }

    $level_2 = variable_get('suitcase_interim_config_level_2');
    if ($level_2) {
      $level_2_url = variable_get('suitcase_interim_config_level_2_url');
      $vars['level_2'] = l($level_2, $level_2_url, array('html' => TRUE));
    }

    $level_3 = variable_get('suitcase_interim_config_level_3');
    if ($level_3) {
      $level_3_url = variable_get('suitcase_interim_config_level_3_url');
      $vars['level_3'] = l($level_3, $level_3_url, array('html' => TRUE));
    }

  }
  elseif ($vars['region'] == 'menu') {
    $main_menu_tree = menu_tree_page_data('main-menu');
    $main_menu_attributes = array(
      'id' => 'main-menu',
      'class' => array('sm'),
      'data-sm-options' => '{ subIndicatorsText: "+", subMenusMinWidth: "", subMenusMaxWidth: "", subIndicatorsPos: "append" }'
    );
    $vars['main_menu_smartmenu'] = suitcase_interim_smartmenu_tree_output($main_menu_tree, $main_menu_attributes);
  }
  elseif ($vars['region'] == 'search') {
    $vars['suitcase_interim_config_header_type'] = variable_get('suitcase_interim_config_header_type', 1);
  }
  elseif ($vars['region'] == 'secondary_menu') {
    $theme = alpha_get_theme();
    $vars['secondary_menu'] = $theme->page['secondary_menu'];
  }
  elseif (strpos($vars['region'], 'hero') === 0) {
    $vars['content_attributes_array']['class'][] = 'region-hero-inner';
    unset($vars['elements']['#grid']);
    unset($vars['elements']['#grid_container']);
  }
  elseif (strpos($vars['region'], 'sidebar') === 0) {
    $vars['attributes_array']['role'] = 'complementary';
  }
}