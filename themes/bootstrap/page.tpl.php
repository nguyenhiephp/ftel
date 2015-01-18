<?php
if (drupal_is_front_page()) {
    $variables['title']="";
    unset($variables['page']['content']['system_main']['default_message']);
}
?>

