<?php
require('source/setup.php');

$category = $_GET['category'];
$entry = array('category' => $category, 'level' => 1);

if (!$conn->connect_errno) {
  $entries = $conn->query("SELECT `id`, `course`, `$title` FROM `entries` WHERE `category` = '$category' AND `level` = 2 ORDER BY `sequence`");
} else {
  switch ($category) {
    case 'g': $entries = $g_courses; break;
    case 'wh': $entries = $wh_courses; break;
    case 'uh': $entries = $uh_courses; break;
  }
}

switch ($category) {
  case 'g':
    $page_title = GEOGRAPHY;
    break;
  case 'wh':
    $page_title = WORLD_HISTORY;
    break;
  case 'uh':
    $page_title = UKRAINE_HISTORY;
    break;
}

// require('source/redirect.php');
require('templates/layouts/header.php');
require('templates/layouts/navigation.php');
require('templates/layouts/container.php');
require('templates/entries/category.php');
require('templates/layouts/footer_light.php');
?>
