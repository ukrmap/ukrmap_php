<?php
require('source/setup.php');

$query = mysqli_real_escape_string($conn, $_GET['query']);

$rows = $conn->query("SELECT `name` FROM `terms` WHERE `name` LIKE '".$query."%' AND `entries_count` > 0 ORDER BY `popularity` DESC LIMIT 10");

$values = array();

while ($row = $rows->fetch_assoc()) {
  $values[] = $row['name'];
}

echo json_encode(array('suggestions' => $values));
?>
