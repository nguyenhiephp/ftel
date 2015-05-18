<?php
/**
 * @file
 * template.php
 *
 * This file should only contain light helper functions and stubs pointing to
 * other files containing more complex functions.
 *
 * The stubs should point to files within the `theme` folder named after the
 * function itself minus the theme prefix. If the stub contains a group of
 * functions, then please organize them so they are related in some way and name
 * the file appropriately to at least hint at what it contains.
 *
 * All [pre]process functions, theme functions and template implementations also
 * live in the 'theme' folder. This is a highly automated and complex system
 * designed to only load the necessary files when a given theme hook is invoked.
 * @see _bootstrap_theme()
 * @see theme/registry.inc
 *
 * Due to a bug in Drush, these includes must live inside the 'theme' folder
 * instead of something like 'includes'. If a module or theme has an 'includes'
 * folder, Drush will think it is trying to bootstrap core when it is invoked
 * from inside the particular extension's directory.
 * @see https://drupal.org/node/2102287
 */

/**
 * Include common functions used through out theme.
 */
include_once dirname(__FILE__) . '/theme/common.inc';

/**
 * Implements hook_theme().
 *
 * Register theme hook implementations.
 *
 * The implementations declared by this hook have two purposes: either they
 * specify how a particular render array is to be rendered as HTML (this is
 * usually the case if the theme function is assigned to the render array's
 * #theme property), or they return the HTML that should be returned by an
 * invocation of theme().
 *
 * @see _bootstrap_theme()
 */
function bootstrap_theme(&$existing, $type, $theme, $path) {
  bootstrap_include($theme, 'theme/registry.inc');
  return _bootstrap_theme($existing, $type, $theme, $path);
}

/**
 * Declare various hook_*_alter() hooks.
 *
 * hook_*_alter() implementations must live (via include) inside this file so
 * they are properly detected when drupal_alter() is invoked.
 */
bootstrap_include('bootstrap', 'theme/alter.inc');

function bootstrap_links__system_main_menu($variables) {
    $html = "<div class=\"dropdown\">\n";
    $html .= "  <ul>\n";
    foreach ($variables['links']["links"] as $link) {
        if(!isset($variables['links']["links"]["term"])){
            $html .= "<li>".l($link['title'], $link['path'], array('attributes' => array('title' => 'refresh'))) ."</li>";
        }else{

        }
    }
    $html .= "</ul>\n";
    $html .= "</div>\n";

    return $html;
}

function print_vocabulary_to_html($vid){
    $terms = taxonomy_get_tree($vid);

    $html = '';
    foreach($terms as $term){
        if(isset($term->parents[0]) && $term->parents[0] == 0 /*&& $term->tid != 1*/){
            $html .= '<li>';
            $html .= print_term_to_html($term->tid);
            $html .= '</li>';
        }
    }
    return $html;
}

function print_term_to_html($tid, $html = NULL, $is_first_item = true, $is_child_item = false){
    $result = db_query("SELECT th.tid FROM taxonomy_term_hierarchy th WHERE th.parent = '". $tid . "'");

    /* get term name */
    $term = taxonomy_term_load($tid);
    $name = $term->name;

//    $name = "Dịch vụ";

    if($result->rowCount() > 0){
        if(!$is_first_item){
            $html .= '<ul class="dropdown-submenu"><a>' . $name . '</a>';

            $inner_html = '';
            $record = $result->fetchAll();
            foreach ($record as $row) {
                $html .= print_term_to_html($row->tid, $inner_html,false,true);
            }

            $html .= '</ul>';
        }else{
            $html .= '<a>' . $name . '</a>';

            $inner_html = '';
            $record = $result->fetchAll();
            foreach ($record as $row) {
                $html .= print_term_to_html($row->tid, $inner_html,false,true);
            }
            $html .= '';
        }
    }else{
//        echo 'xxx';
        if($is_child_item){
            $html .= '<li>' . l($name, 'taxonomy/term/' . $tid) . '</li>';
        }else{
            $html .= l($name, 'taxonomy/term/' . $tid);
        }
    }

    return $html;
}