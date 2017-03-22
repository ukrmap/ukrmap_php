<?php
require('source/setup.php');
$maps_names_locale = 'maps_names_'.$locale;

$course = $_GET['course'];
$id = intval($_GET['id']);

if ($id > 0) {
  if (!$conn->connect_errno) {
    $entry = $conn->query("SELECT `id`, `category`, `course`, `parent_id`, `level`, `dir2`, `tutorial`, `$title`, `text_file`, `maps`, `$maps_names_locale`, `pictures`, `xmlfile`, `video_file`, `text_with_title`, `sequence` FROM `entries` WHERE `id` = $id")->fetch_assoc();
    if ($entry) {
      $parent = $conn->query("SELECT `$title` FROM `entries` WHERE `id` = $entry[parent_id]")->fetch_assoc();
    }
  } else {
    foreach ($all_entries as $row) {
      if ($row['id'] == $id) { $entry = $row; }
    }
    foreach ($all_entries as $row) {
      if ($row['id'] == $entry['parent_id']) { $parent = $row; }
    }
  }

  if ($entry && $parent) {
    $page_title = $entry[$title].' | '.$parent[$title];
    $category = $entry['category'];
  }
}
require('source/redirect.php');
require('templates/layouts/header.php');
require('templates/layouts/navigation.php');
if ($entry && $parent) {
  require('templates/layouts/navbar_lover.php');
}
require('templates/layouts/container.php');

if (!$entry) {
  require('templates/layouts/404.php');
} elseif (isset($entry['xmlfile']) && $entry['xmlfile']) {
  require('templates/entries/questions.php');
} elseif (isset($entry['video_file']) && $entry['video_file']) {
  require('templates/entries/video.php');
} elseif (isset($entry['maps']) && $entry['maps'] || isset($entry['pictures']) && $entry['pictures']) {
  require('templates/entries/show.php');
} else {
  require('templates/entries/text.php');
}

require('templates/layouts/footer.php');
?>
