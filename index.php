<?php
require('source/setup.php');
require('templates/layouts/header.php');
require('templates/layouts/navigation.php');
require('templates/layouts/container.php');
if (isset($_GET['q'])) {
  require('templates/entries/search.php');
} else {
  require('templates/home/index.php');
}
require('templates/layouts/footer_light.php');
?>
