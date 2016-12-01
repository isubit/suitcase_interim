<?php

function suitcase_interim_form_system_theme_settings_alter(&$form, &$form_state) {
  $form['alpha_settings']['alpha_suitcase'] = array(
    '#type'        => 'fieldset',
    '#title'       => t('Suitcase Interim specific elements'),
    '#description' => t('Elements specific to Suitcase Interim'),
  );

  $form['alpha_settings']['alpha_suitcase']['suitcase_interim_config_level_1_url'] = array(
    '#type'          => 'textfield',
    '#title'         => t('Wordmark URL'),
    '#description'   => t('Full URL the Iowa State University wordmark should link to. Defaults to \'http://www.iastate.edu/\''),
    '#default_value' => variable_get('suitcase_interim_config_level_1_url', 'http://www.iastate.edu/'),
    '#weight'        => 2,
  );

  $form['alpha_settings']['alpha_suitcase']['suitcase_interim_config_level_2'] = array(
    '#type'          => 'textfield',
    '#attributes'    => array(
      'id' => 'edit-site-name',
    ),
    '#title'         => t('Level 2 Text (Department, College, or Consortium)'),
    '#description'   => t('Displays under the wordmark & defaults to "Iowa State University"'),
    '#default_value' => variable_get('suitcase_interim_config_level_2', NULL),
  );

  $form['alpha_settings']['alpha_suitcase']['suitcase_interim_config_level_2_url'] = array(
    '#type'          => 'textfield',
    '#attributes'    => array(
      'id' => 'edit-dept-url',
    ),
    '#title'         => t('Level 2 URL'),
    '#description'   => t('Full URL to the Level 2 Text - defaults to site front page'),
    '#default_value' => variable_get('suitcase_interim_config_level_2_url', NULL),
  );


  $form['alpha_settings']['alpha_suitcase']['suitcase_interim_config_level_3'] = array(
    '#type'          => 'textfield',
    '#attributes'    => array(
      'id' => 'edit-site-slogan',
    ),
    '#title'         => t('Level 3 Text (Lab or Entity name)'),
    '#description'   => t('Displays under the Level 2 Text'),
    '#default_value' => variable_get('suitcase_interim_config_level_3', NULL),
  );


  $form['alpha_settings']['alpha_suitcase']['suitcase_interim_config_header_type'] = array(
    '#type'          => 'textfield',
    '#attributes'    => array(
      'id' => 'edit-header-type',
    ),
    '#title'         => t('Header type'),
    '#description'   => t('The type of header to display: 1,2 or 3. Examples below.'),
    '#default_value' => variable_get('suitcase_interim_config_header_type', 1),
  );

  $form['alpha_settings']['alpha_suitcase']['header_demo'] = array(
    '#markup' => '<p><img style="width:300px" src="/sites/all/themes/suitcase_interim/images/header_1.png"></p><p><img style="width:300px" src="/sites/all/themes/suitcase_interim/images/header_2.png"></p><p><img style="width:300px" src="/sites/all/themes/suitcase_interim/images/header_3.png"></p>',

  );


  $form['alpha_settings']['alpha_suitcase']['suitcase_interim_config_blackbar_display'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('Show black bar'),
    '#description'   => t('The black bar contains the Iowa State University links to ISU Sign-ons, Directory, Maps, ISU Contact Us, and the index.'),
    '#default_value' => variable_get('suitcase_interim_config_blackbar_display', 1),
  );

  $form['alpha_settings']['alpha_suitcase']['suitcase_interim_config_isu_nameplate_display'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('Show ISU nameplate'),
    '#description'   => t('The ISU nameplate identifies Iowa State University above the site name and department title.'),
    '#default_value' => variable_get('suitcase_interim_config_isu_nameplate_display', 1),
  );

  unset($form['theme_settings']);
  unset($form['logo']);
  array_unshift($form['#submit'], 'suitcase_interim_config_form_submit');

}


function suitcase_interim_config_form_submit($form, &$form_state) {

  variable_set('suitcase_interim_config_level_1_url', $form_state['values']['suitcase_interim_config_level_1_url']);

  variable_set('suitcase_interim_config_level_2_url', $form_state['values']['suitcase_interim_config_level_2_url']);

  // Level 2
  $suitcase_interim_config_level_2 = $form_state['values']['suitcase_interim_config_level_2'];
  variable_set('suitcase_interim_config_level_2', $suitcase_interim_config_level_2);

  // Level 3
  $suitcase_interim_config_level_3 = $form_state['values']['suitcase_interim_config_level_3'];
  variable_set('suitcase_interim_config_level_3', $suitcase_interim_config_level_3);

  // Type of header
  $header_type = $form_state['values']['suitcase_interim_config_header_type'];
  variable_set('suitcase_interim_config_header_type', $header_type);

  variable_set('suitcase_interim_config_blackbar_display', $form_state['values']['suitcase_interim_config_blackbar_display']);

  variable_set('suitcase_interim_config_isu_nameplate_display', $form_state['values']['suitcase_interim_config_isu_nameplate_display']);

  // Decide which level the site name should be set to
  $site_name = NULL;
  if (_suitcase_interim_config_is_showing_this_header_level(3, $header_type)) {
    $site_name = $suitcase_interim_config_level_3;
  }
  elseif (_suitcase_interim_config_is_showing_this_header_level(2, $header_type)) {
    $site_name = $suitcase_interim_config_level_2;
  }

  if (!$site_name) {
    $site_name = 'Iowa State University';
  }

  variable_set('site_name', $site_name);

}






