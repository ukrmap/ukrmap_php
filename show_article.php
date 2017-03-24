<?php
require('source/setup.php');

$id = intval($_GET['id']);
if ($id > 0) {
  $article = $conn->query('SELECT `id`, `slug`, `title`, `advertising`, `description`, `keywords`, `content`, `created_on` FROM `articles` WHERE `id` = '.$id)->fetch_assoc();
}

if ($article && $_SERVER['REQUEST_URI'] != article_path($article)) {
  header('HTTP/1.1 301 Moved Permanently');
  header('Location: http://ukrmap.su'.article_path($article));
  exit(0);
}

require('templates/articles/header.php');
require('templates/layouts/navigation.php');
if ($article) {
  require('templates/articles/navbar_lover.php');
}
require('templates/layouts/container.php');
if ($article) {
  require('templates/articles/show.php');
} else {
  require('templates/layouts/404.php');
}
require('templates/articles/footer.php');
?>
