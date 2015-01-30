<?php

// Class for tables

function procyon_preprocess_views_view_table(&$vars) {
  $vars['classes_array'][] = 'table';
}

// Suggestions

function procyon_preprocess_page(&$variables) {
  global $user;
  if (!empty($variables['node']) && !empty($variables['node']->type)) {
    $variables['theme_hook_suggestions'][] = 'page__node__' . $variables['node']->type;
  }
  if(arg(0) == 'user' && !arg(1) && !$user->uid) {
    $variables['theme_hook_suggestions'][] = 'page__user__login';
    drupal_set_title('Вход');
  }
  if(arg(0) == 'user' &&arg(1) == 'password' && !$user->uid) {
    $variables['theme_hook_suggestions'][] = 'page__user__password';
  }
}

// Errors suggestions

function procyon_preprocess_html(&$variables) {
  global $user;
  $status = drupal_get_http_header("status");  
  if($status == "404 Not Found") {
    $variables['theme_hook_suggestions'][] = 'html__404';
  }
  if($status == "403 Forbidden") {
    $variables['theme_hook_suggestions'][] = 'html__403';
  }
  if(arg(0) == 'user' && !arg(1) && !$user->uid) {
    $variables['theme_hook_suggestions'][] = 'html__user__login';
  }
  if(arg(0) == 'user' && arg(1) == 'password' && !$user->uid) {
    $variables['theme_hook_suggestions'][] = 'html__user__login';
  }
}

// Field templates for Checkboxes & Radios

function procyon_theme_registry_alter(&$theme_registry) {
  $theme_path = path_to_theme();
  $dl_theme_path = drupal_get_path('theme', 'procyon');

  // Checkboxes
  
  if (isset($theme_registry['checkbox'])) {
    $theme_registry['checkbox']['type'] = 'theme';
    $theme_registry['checkbox']['theme path'] = $dl_theme_path;
    $theme_registry['checkbox']['template'] = $theme_path . '/templates/fields/field--type-checkbox';
    unset($theme_registry['checkbox']['function']);
  }

  // Radios
  
  if (isset($theme_registry['radio'])) {
    $theme_registry['radio']['type'] = 'theme';
    $theme_registry['radio']['theme path'] = $dl_theme_path;
    $theme_registry['radio']['template'] = $theme_path . '/templates/fields/field--type-radio';
    unset($theme_registry['radio']['function']);
  }
}

// Disable unnecessary css of drupal core

function procyon_css_alter(&$css) {
  unset($css[drupal_get_path('module', 'system') . '/system.messages.css']);
  unset($css[drupal_get_path('module', 'system') . '/system.menus.css']);
  unset($css[drupal_get_path('module', 'system') . '/system.theme.css']);
}
?>