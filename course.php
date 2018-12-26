<?php
require('source/setup.php');

$course = $_GET['course'];

if (!$conn->connect_errno) {
  $entry = $conn->query("SELECT `id`, `category`, `course`, `$title`, `level` FROM `entries` WHERE `course` = '$course' AND `level` = 2")->fetch_assoc();
  $entries = $conn->query("SELECT `id`, `course`, `$title`, `tutorial` FROM `entries` WHERE `course` = '$course' AND `level` = 3 ORDER BY `sequence`");
} else {
  $entries = array();
  foreach ($all_entries as $row) {
    if (!isset($row['course'])) { continue; }
    if ($row['course'] == $course && $row['level'] == 2) { $entry = $row; }
    if ($row['course'] == $course && $row['level'] == 3) {
      $entries[] = $row;
    }
  }
}

$page_title = $entry[$title];
$category = $entry['category'];

// require('source/redirect.php');
require('templates/layouts/header.php');
require('templates/layouts/navigation.php');
require('templates/layouts/container.php');
require('templates/entries/course.php');
require('templates/layouts/footer_light.php');
?>
