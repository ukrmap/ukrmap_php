<?php
header('Content-type: text/html; charset=UTF-8');
require('source/locales.php');
require('source/helpers.php');

$cerl = error_reporting();
error_reporting(0);
$conn = new mysqli('localhost', 'root', '', 'ukrmap');
error_reporting($cerl);

if (!$conn->connect_errno) {
  $conn->set_charset('utf8');
  $g_courses = $conn->query("SELECT `id`, `course`, `$title` FROM `entries` WHERE `category` = 'g' AND `level` = 2 ORDER BY `sequence`");
  $wh_courses = $conn->query("SELECT `id`, `course`, `$title` FROM `entries` WHERE `category` = 'wh' AND `level` = 2 ORDER BY `sequence`");
  $uh_courses = $conn->query("SELECT `id`, `course`, `$title` FROM `entries` WHERE `category` = 'uh' AND `level` = 2 ORDER BY `sequence`");
} else {
  $data = simplexml_load_string(file_get_contents('source/entries.xml'));
  $g_courses = array();
  $wh_courses = array();
  $uh_courses = array();
  $all_entries = array();
  foreach ($data as $entry) {
    $row = convert_xml_entry_to_array($entry);
    $all_entries[] = $row;
    if (!isset($row['category'])) { continue; }
    if ($row['category'] == 'g' && $row['level'] == 2) { $g_courses[] = $row; }
    if ($row['category'] == 'wh' && $row['level'] == 2) { $wh_courses[] = $row; }
    if ($row['category'] == 'uh' && $row['level'] == 2) { $uh_courses[] = $row; }
  }
  usort($g_courses, 'cmp_sequence');
  usort($wh_courses, 'cmp_sequence');
  usort($uh_courses, 'cmp_sequence');
}
?>
