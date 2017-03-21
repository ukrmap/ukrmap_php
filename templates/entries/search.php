<?php
$q = mysqli_real_escape_string($conn, strtolower($_GET['q']));
$entries = $conn->query("SELECT `id`, `parent_id`, `course`, `$title`, `tutorial` FROM `entries` WHERE MATCH (title_uk, content_uk, title_ru, content_ru, title_en, content_en, title_be, content_be) AGAINST ('$q') AND `level` = 3");

// Collect parents titles into $courses
if ($entries->num_rows) {
  $parent_ids = array();
  while ($entry = $entries->fetch_assoc()) {
    $parent_ids[] = $entry['parent_id'];
  }
  $parents = $conn->query("SELECT `id`, `$title` FROM `entries` WHERE `id` IN (".join(',', $parent_ids).")");
  $courses = array();
  while ($parent = $parents->fetch_assoc()) {
    $courses[$parent['id']] = $parent[$title];
  }
}

// Insert or update search term.
$conn->query("INSERT INTO `terms` (`name`, `entries_count`, `popularity`, `created_at`, `updated_at`) VALUES ('$q', $entries->num_rows, 1, NOW(), NOW()) ON DUPLICATE KEY UPDATE `entries_count` = VALUES(`entries_count`), `popularity` = `popularity` + 1, `updated_at` = NOW()");


echo '<h1>'.SEARCH_RESULTS.'</h1>';
?>
<table class="table table-hover course">
  <tbody>
<?php
if ($entries->num_rows) {
  $entries->data_seek(0);
  while ($entry = $entries->fetch_assoc()) {
    echo '<tr><td><a href="/'.$locale.'-'.$entry['course'].'/'.$entry['id'].'.html">'.$entry[$title];
    if ($entry['tutorial']) { echo ' <i style="color:grey;">('.t($entry['tutorial']).')</i>'; }
    echo '</a>';
    echo $courses[$entry['parent_id']];
    echo '</td></tr>';
  }
} else {
  echo '<h4>'.NO_RESULTS.'</h4>';
}
?>
  </tbody>
</table>
