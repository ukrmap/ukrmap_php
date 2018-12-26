<li class="dropdown<?php echo isset($category) && $category == 'g' ? ' active' : '' ?>">
  <a href="/<?php echo $locale; ?>-g/" class="dropdown-toggle" data-toggle="dropdown">
    <?php echo GEOGRAPHY; ?> <b class="caret"></b>
  </a>
  <ul class="dropdown-menu">
<?php
if (isset($conn) && !$conn->connect_errno) {
  while ($row = $g_courses->fetch_assoc()) {
    echo '<li><a href="/'.$locale.'-'.$row['course'].'/">'.$row[$title].'</a></li>';
  }
} else {
  foreach ($g_courses as $row) {
    echo '<li><a href="/'.$locale.'-'.$row['course'].'/">'.$row[$title].'</a></li>';
  }
}
?>
  </ul>
</li>
<li class="dropdown<?php echo isset($category) && $category == 'wh' ? ' active' : '' ?>">
  <a href="/<?php echo $locale; ?>-wh/" class="dropdown-toggle" data-toggle="dropdown">
    <?php echo WORLD_HISTORY; ?> <b class="caret"></b>
  </a>
  <ul class="dropdown-menu">
<?php
if (isset($conn) && !$conn->connect_errno) {
  while ($row = $wh_courses->fetch_assoc()) {
    echo '<li><a href="/'.$locale.'-'.$row['course'].'/">'.$row[$title].'</a></li>';
  }
} else {
  foreach ($wh_courses as $row) {
    echo '<li><a href="/'.$locale.'-'.$row['course'].'/">'.$row[$title].'</a></li>';
  }
}
?>
  </ul>
</li>
<li class="dropdown<?php echo isset($category) && $category == 'uh' ? ' active' : '' ?>">
  <a href="/<?php echo $locale; ?>-uh/" class="dropdown-toggle" data-toggle="dropdown">
    <?php echo UKRAINE_HISTORY; ?> <b class="caret"></b>
  </a>
  <ul class="dropdown-menu">
<?php
if (isset($conn) && !$conn->connect_errno) {
  while ($row = $uh_courses->fetch_assoc()) {
    echo '<li><a href="/'.$locale.'-'.$row['course'].'/">'.$row[$title].'</a></li>';
  }
} else {
  foreach ($uh_courses as $row) {
    echo '<li><a href="/'.$locale.'-'.$row['course'].'/">'.$row[$title].'</a></li>';
  }
}
?>
  </ul>
</li>
