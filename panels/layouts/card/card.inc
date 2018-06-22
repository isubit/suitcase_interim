<?php

/**
 * Implements hook_panels_layouts().
 */
function suitcase_interim_card_panels_layouts() {
  $items['card'] = array(
    'title' => t('Card'),
    'category' => t('Suitcase: Card'),
    'icon' => 'card.jpg',
    'theme' => 'card',
    'admin css' => 'card_admin.css',
    'regions' => array(
      'card_header' => t('Header'),
      'card_image' => t('Image'),
      'card_body' => t('Body'),
      'card_footer' => t('Footer'),
    ),
  );
  return $items;
}


