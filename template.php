<?php

/**
 * Implements hook_css_alter().
 */
function spruit_sass_css_alter(&$css) {

  /**
   * If stylesheets from core or modules cause trouble in your theme add the path to spruit.info
   * before you start overriding classes
   */
  $stylesheets = theme_get_setting('unset_styles');
  foreach($stylesheets as $path) {
    unset($css[$path]);
  }
}

/**
 * Implements template_preprocess_page().
 */
function spruit_sass_preprocess_page(&$variables) {

/* Adding theme path to JS, for MyFonts */
  drupal_add_js('jQuery.extend(Drupal.settings, { "pathToTheme": "' .base_path().drupal_get_path('theme', 'spruit_sass'). '" });', 'inline');

  /**
   * Templates for content type pages
   * page--type-name.tpl.php
   */
  if (isset($variables['node']->type)) {
    $variables['theme_hook_suggestions'][]='page__'.$variables['node']->type;
  }

  $variables['logo_url'] = 'https://www.sp.nl/?landing=0';
  if (user_is_logged_in()) {
    $variables['logo_url'] =  url('<front>');
  }

}

function spruit_sass_html_head_alter(&$head_elements) {
  // Remove Drupal generator meta tag.
  if (isset($head_elements['system_meta_generator'])) {
    unset($head_elements['system_meta_generator']);
  }
}
