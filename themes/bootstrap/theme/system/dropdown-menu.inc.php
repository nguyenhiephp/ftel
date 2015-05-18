<?php
$main_menu = Array();
$main_menu['links'] = Array();
$item = Array('title' => 'Home','path' => '<front>');
array_push($main_menu['links'],$item);

$item = Array('title' => 'Dịch vụ','path' => 'taxonomyterm/1');
array_push($main_menu['links'],$item);

//var_dump($main_menu); exit;

//echo print_term_to_html(1);
//exit;

//$html = '<ul>';
//$result = db_query("SELECT th.tid FROM taxonomy_term_hierarchy th WHERE th.parent = '". 1 . "'");
//foreach ($result as $row) {
//    //  print_r($row->tid);
//    $html .= '<li>'. $row->tid .'</li>';
//}
//$html .= '</ul>';
//print $html;
//exit;
//print_main_menu();

//echo '<pre>';
//var_dump(taxonomy_get_tree(3));
//exit;

//$terms = taxonomy_get_tree(3);
//
//foreach($terms as $term){
//    if(isset($term->parents[0]) && $term->parents[0] == 0){
//        print_term_to_html($term->tid);
//    }
//}

//$html = print_vocabulary_to_html(3);
//echo $html;
//exit;

function print_main_menu($menu_html = NULL){
//    $dropdown_menu = print_vocabulary_to_html(3);
    $menu_html .= '<ul>';
    $menu_html .= '<li>' . l('Home', '<front>') . '</li>';
    $menu_html .= '<li>' . l('Giới thiệu', 'node/1') . '</li>';
    $menu_html .= '<li class="dropdown"><a role="button" data-toggle="dropdown" class="btn btn-primary">Dịch vụ</a><ul class="dropdown-menu multi-level">' . print_vocabulary_to_html(3) . '</ul></li>';
    $menu_html .= '<li>' . l('Tin tức', 'node/7') . '</li>';
    $menu_html .= '<li>' . l('Khuyến mại', 'node/8') . '</li>';
    $menu_html .= '</ul>';
    print $menu_html;
//    exit;
}
?>