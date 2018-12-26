<h1><?php echo $page_title ?></h1>

<table class="table table-hover course">
  <tbody>
<?php
if (!$conn->connect_errno) {
  while ($entry = $entries->fetch_assoc()) {
    echo '<tr><td><a href="/'.$locale.'-'.$entry['course'].'/">'.$entry[$title].'</a></td></tr>';
  }
} else {
  foreach ($entries as $entry) {
    echo '<tr><td><a href="/'.$locale.'-'.$entry['course'].'/">'.$entry[$title].'</a></td></tr>';
  }
}
?>
  </tbody>
</table>
