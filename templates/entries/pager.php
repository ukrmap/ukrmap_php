<?php
if (!$conn->connect_errno) {
  $previous_entry = $conn->query("SELECT `id`, `course`, `$title` FROM `entries` WHERE `course` = '$course' AND `level` = 3 AND `sequence` < $entry[sequence] ORDER BY sequence DESC LIMIT 1")->fetch_assoc();
  $next_entry = $conn->query("SELECT `id`, `course`, `$title` FROM `entries` WHERE `course` = '$course' AND `level` = 3 AND `sequence` > $entry[sequence] ORDER BY sequence LIMIT 1")->fetch_assoc();
} else {
  $previous_entries = array();
  $next_entries = array();
  foreach ($all_entries as $row) {
    if (!isset($row['course'])) { continue; }
    if ($row['course'] == $course && $row['level'] == 3) {
      if ($row['sequence'] < $entry['sequence']) {
        $previous_entries[] = $row;
      } elseif ($row['sequence'] > $entry['sequence']) {
        $next_entries[] = $row;
      }
    }
  }
  usort($previous_entries, 'cmp_sequence');
  usort($next_entries, 'cmp_sequence');
  $previous_entry = end($previous_entries);
  $next_entry = $next_entries[0];
}
?>
<ul class="pager">
  <?php if ($previous_entry) { ?>
    <li class="previous"><a href="<?php echo show_entry_path($previous_entry); ?>">&larr; <?php echo $previous_entry[$title]; ?></a></li>
  <?php } else { ?>
    <li class="previous disabled"><a href="#">&larr; Previous</a></li>
  <?php } ?>
  <?php if ($next_entry) { ?>
    <li class="next"><a href="<?php echo show_entry_path($next_entry); ?>"><?php echo $next_entry[$title]; ?> &rarr;</a></li>
  <?php } else { ?>
    <li class="next disabled"><a href="#">Next &rarr;</a></li>
  <?php } ?>
</ul>
