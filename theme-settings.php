<?php

/**
 * Implements hook_form_system_theme_settings_alter()
 */
function suitcase_interim_form_system_theme_settings_alter(&$form, &$form_state) {

  if ($GLOBALS['theme_key'] == $form_state['build_info']['args'][0]) {

    drupal_add_css(drupal_get_path('theme', 'suitcase_interim') . '/css/suitcase_theme_settings.css', array('group' => CSS_THEME, 'weight' => 100));

    if (variable_get('suitcase_interim_config_show_advanced_settings', 0) === 0) {
      $form['alpha_settings']['#prefix'] = '<div class="element-hidden">';
      $form['alpha_settings']['#suffix'] = '</div>';
      $form['favicon']['#access'] = FALSE;
      $form['theme_settings']['#access'] = FALSE;
    }

    $form['suitcase_interim_config'] = array(
      '#type' => 'fieldset',
      '#title' => t('Suitcase Interim Config'),
      '#collapsible' => FALSE,
      '#collapsed' => FALSE,
      '#description' => '',
      '#pre_render' => array(
        'suitcase_interim_config_form_pre_render',
      ),
      '#weight' => -100,
    );

    $form['suitcase_interim_config']['suitcase_interim_config_logo'] = array(
      '#type' => 'fieldset',
      '#title' => t('Wordmark'),
      '#collapsible' => FALSE,
      '#collapsed' => FALSE,
      '#description' => '',
    );

    unset($form['logo']);

    $form['suitcase_interim_config']['suitcase_interim_config_logo']['default_logo'] = array(
      '#type' => 'checkbox',
      '#title' => t('Use the default ISU wordmark'),
      '#default_value' => theme_get_setting('default_logo', 'suitcase_interim'),
      '#tree' => FALSE,
      '#description' => t('Check here if you want to use the default ISU wordmark.')
    );

    $form['suitcase_interim_config']['suitcase_interim_config_logo']['settings'] = array(
      '#type' => 'container',
      '#states' => array(
        // Hide the logo settings when using the default logo.
        'invisible' => array(
          'input[name="default_logo"]' => array('checked' => TRUE),
        ),
      ),
    );

    $form['suitcase_interim_config']['suitcase_interim_config_logo']['settings']['logo_path'] = array(
      '#type' => 'textfield',
      '#title' => t('Path to custom wordmark'),
      '#description' => t('The path to the file you would like to use as your logo file instead of the ISU wordmark.'),
      '#default_value' => theme_get_setting('logo_path', 'suitcase_interim'),
    );

    $form['suitcase_interim_config']['suitcase_interim_config_logo']['settings']['logo_upload'] = array(
      '#type' => 'file',
      '#title' => t('Upload wordmark image'),
      '#maxlength' => 40,
      '#description' => t("Upload your logo file to use instead of the ISU wordmark.")
    );

    $form['suitcase_interim_config']['suitcase_interim_config_logo']['suitcase_interim_config_level_1'] = array(
      '#type' => 'hidden',
      '#attributes' => array(
        'id' => 'edit-level-1',
      ),
      '#default_value' => variable_get('suitcase_interim_config_level_1', NULL),
    );

    $form['suitcase_interim_config']['suitcase_interim_config_logo']['suitcase_interim_config_level_1_url'] = array(
      '#type' => 'hidden',
      '#attributes' => array(
        'id' => 'edit-level-1-url',
      ),
      '#default_value' => variable_get('suitcase_interim_config_level_1_url', NULL),
    );

    $form['suitcase_interim_config']['suitcase_interim_config_logo']['suitcase_interim_config_level_2'] = array(
      '#type' => 'hidden',
      '#attributes' => array(
        'id' => 'edit-level-2',
      ),
      '#default_value' => variable_get('suitcase_interim_config_level_2', NULL),
    );

    $form['suitcase_interim_config']['suitcase_interim_config_logo']['suitcase_interim_config_level_2_url'] = array(
      '#type' => 'hidden',
      '#attributes' => array(
        'id' => 'edit-level-2-url',
      ),
      '#default_value' => variable_get('suitcase_interim_config_level_2_url', NULL),
    );

    $form['suitcase_interim_config']['suitcase_interim_config_logo']['suitcase_interim_config_level_3'] = array(
      '#type' => 'hidden',
      '#attributes' => array(
        'id' => 'edit-level-3',
      ),
      '#default_value' => variable_get('suitcase_interim_config_level_3', NULL),
    );

    $form['suitcase_interim_config']['suitcase_interim_config_logo']['suitcase_interim_config_level_3_url'] = array(
      '#type' => 'hidden',
      '#attributes' => array(
        'id' => 'edit-level-3-url',
      ),
      '#default_value' => variable_get('suitcase_interim_config_level_3_url', NULL),
    );

    $form['suitcase_interim_config']['suitcase_interim_config_advanced_settings'] = array(
      '#type' => 'fieldset',
      '#title' => t('Advanced Settings'),
      '#collapsible' => FALSE,
      '#collapsed' => FALSE,
      '#description' => '',
    );

    $form['suitcase_interim_config']['suitcase_interim_config_advanced_settings']['suitcase_interim_config_show_advanced_settings'] = array(
      '#type' => 'checkbox',
      '#title' => t('Show advanced settings'),
      '#description' => t('Show theme settings inherited from Drupal and the Omega base theme.'),
      '#default_value' => variable_get('suitcase_interim_config_show_advanced_settings', 0),
    );

    array_unshift($form['#submit'], 'suitcase_interim_config_form_submit');

  }

}

function suitcase_interim_config_form_pre_render($element) {

  $element['#prefix'] = theme_render_template(drupal_get_path('theme', 'suitcase_interim') . '/templates/form--system-theme-settings.tpl.php', array('form' => $element));

  return $element;

}

function suitcase_interim_config_form_submit($form, &$form_state) {

  $suitcase_interim_config_level_1 = $form_state['values']['suitcase_interim_config_level_1'];
  variable_set('suitcase_interim_config_level_1', $suitcase_interim_config_level_1);
  variable_set('suitcase_interim_config_level_1_url', $form_state['values']['suitcase_interim_config_level_1_url']);

  $suitcase_interim_config_level_2 = $form_state['values']['suitcase_interim_config_level_2'];
  variable_set('suitcase_interim_config_level_2', $suitcase_interim_config_level_2);
  variable_set('suitcase_interim_config_level_2_url', $form_state['values']['suitcase_interim_config_level_2_url']);

  $suitcase_interim_config_level_3 = $form_state['values']['suitcase_interim_config_level_3'];
  variable_set('suitcase_interim_config_level_3', $suitcase_interim_config_level_3);
  variable_set('suitcase_interim_config_level_3_url', $form_state['values']['suitcase_interim_config_level_3_url']);


  variable_set('suitcase_interim_config_show_advanced_settings', $form_state['values']['suitcase_interim_config_show_advanced_settings']);

  // Decide which level the site name should be set to
  $site_name = NULL;
  if (!empty($suitcase_interim_config_level_3)) {
    $site_name = $suitcase_interim_config_level_3;
  }
  elseif (!empty($suitcase_interim_config_level_2)) {
    $site_name = $suitcase_interim_config_level_2;
  }
  else {
    $site_name = $suitcase_interim_config_level_1;
  }

  variable_set('site_name', $site_name);

  // Populate empty theme regions with default content blocks if provided

  if (module_exists('block') && filter_format_exists('full_html')) {

    module_load_include('inc', 'block', 'block.admin');

    $block_template_files = file_scan_directory(drupal_get_path('theme', 'suitcase_interim') . '/templates/default_region_content_blocks', '/\.tpl.php$/', array('key' => 'name', 'min_depth' => 0));

    foreach ($block_template_files as $region_name => $block_template_file) {

      // Chop off the remaining extensions if there are any. $region_name already
      // has the rightmost extension removed, but there might still be more,
      // such as with .tpl.php, which still has .tpl in $region_name at this point.
      if (($pos = strpos($region_name, '.')) !== FALSE) {
        $region_name = substr($region_name, 0, $pos);
      }

      $block_name = 'Default ' . $region_name . ' content';

      // Skip creating block if it already exists
      $block_exists = (bool) db_query_range('SELECT 1 FROM {block_custom} WHERE info = :info', 0, 1, array(':info' => $block_name))->fetchField();

      if ($block_exists) {
        continue;
      }

      $add_block_form_state = array(
        'values' => array(
          'title' => '<none>',
          'info' => $block_name,
          'body' => array(
            'value' => theme_render_template($block_template_file->uri, array()),
            'format' => 'full_html',
          ),
          'regions' => array(
            'suitcase_interim' => $region_name,
          ),
          'op' => 'Save block',
        )
      );

      drupal_form_submit('block_add_block_form', $add_block_form_state, 'block', NULL);

    }

  }

  // Create social menu

  if (module_exists('menu')) {

    $menu = array(
      'menu_name' => 'menu-social',
      'title' => 'Social Menu',
      'description' => 'Social media links for this site',
    );

    $menu_exists = (bool) db_query_range('SELECT 1 FROM {menu_custom} WHERE menu_name = :menu_name', 0, 1, array(':menu_name' => $menu['menu_name']))->fetchField();
    $link_exists = db_query_range('SELECT 1 FROM {menu_links} WHERE menu_name = :menu_name', 0, 1, array(':menu_name' => $menu['menu_name']))->fetchField();

    if (!$menu_exists && !$link_exists) {

      menu_save($menu);

      $item = array(
        'link_title' => 'Facebook',
        'link_path' => 'https://www.facebook.com/',
        'menu_name' => 'menu-social',
      );

      menu_link_save($item);

      db_insert('block')->fields(array(
        'module' => 'menu',
        'delta' => 'menu-social',
        'theme' => 'suitcase_interim',
        'status' => 1,
        'weight' => '-28',
        'region' => 'footer_fourth',
        'visibility' => BLOCK_VISIBILITY_NOTLISTED,
        'pages' => '',
        'title' => '<none>',
        'cache' => DRUPAL_NO_CACHE,
      ))->execute();

    }

  }

}
