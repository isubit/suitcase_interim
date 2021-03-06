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

    // Get the level 1 url
    $vars['level_1_url'] = token_replace(variable_get('suitcase_interim_config_level_1_url'));
    $vars['wordmark_alt_text'] = theme_get_setting('suitcase_interim_config_isu_nameplate_alt_text');

    $vars['suitcase_interim_config_level_2_url'] = variable_get('suitcase_interim_config_level_2_url');

    $vars['site_name_level_2'] = variable_get('suitcase_interim_config_level_2');
    $vars['linked_site_name_level_2'] = l($vars['site_name_level_2'], $vars['suitcase_interim_config_level_2_url'], array('html' => TRUE));

    $vars['site_name_level_3'] = variable_get('suitcase_interim_config_level_3');
    $vars['linked_site_name_level_3'] = l($vars['site_name_level_3'], '<front>', array('attributes' => array('title' => t('Home')), 'html' => TRUE));

    $vars['show_isu_nameplate'] = variable_get('suitcase_interim_config_isu_nameplate_display', 1);

    // The type of header that we need to output, default to show all
    $vars['suitcase_interim_config_header_type'] = variable_get('suitcase_interim_config_header_type', 1);

    // Get the uploaded wordmark if is exists and the header type allows
    $vars['wordmark_image'] = (theme_get_setting('default_logo')) ? file_create_url(drupal_get_path('theme', 'suitcase_interim') . '/images/isu.svg') : file_create_url(theme_get_setting('logo_path'));

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
}
