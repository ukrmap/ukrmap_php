<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Cache-control" content="public">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo isset($page_title) ? $page_title : TITLE; ?></title>
<?php if ($_SERVER['SCRIPT_NAME'] == '/index.php') { ?>
  <meta name="description" content="<?php echo META_DESCRIPTION; ?>">
<?php } ?>
  <link rel="stylesheet" media="all" href="/css/bootstrap-3.3.7.min.css">
  <link rel="stylesheet" media="all" href="/css/ukrmap-1.min.css">
  <link rel="stylesheet" media="all" href="/css/photoswipe.css">
  <link rel="stylesheet" media="all" href="/css/pswp/default-skin.css">
  <link rel="apple-touch-icon" sizes="57x57" href="/css/favicon/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="/css/favicon/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="/css/favicon/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="/css/favicon/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="/css/favicon/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="/css/favicon/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="/css/favicon/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="/css/favicon/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="/css/favicon/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192" href="/css/favicon/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/css/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="/css/favicon/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/css/favicon/favicon-16x16.png">
  <link rel="manifest" href="/css/favicon/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="/css/favicon/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">
</head>
<body><?php require('analyticstracking.php'); ?>
