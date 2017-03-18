<?php
if (preg_match('/^\/program2009\/(\w+)\/(.+)/', $_SERVER['REQUEST_URI'], $matches)) {
  $image = 'images/'.$matches[1].'a/'.$matches[2];
  if (file_exists($image)) {
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: http://ukrmap.su/'.$image);
    exit(0);
  }
}
if (preg_match('/^\/program2010\/(\w+)\/(.+)/', $_SERVER['REQUEST_URI'], $matches)) {
  $image = 'images/'.$matches[1].'b/'.$matches[2];
  if (file_exists($image)) {
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: http://ukrmap.su/'.$image);
    exit(0);
  }
}

require('source/setup_without_mysql.php');
require('templates/layouts/header.php');
require('templates/layouts/navigation.php');
require('templates/layouts/container.php');
require('templates/layouts/404.php');
require('templates/layouts/footer.php');
?>
