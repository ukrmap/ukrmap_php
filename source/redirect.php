<?php
if (isset($entry) && $_SERVER['REQUEST_URI'] != entry_path($entry, $locale)) {
  header('HTTP/1.1 301 Moved Permanently');
  header('Location: https://geomap.com.ua'.entry_path($entry, $locale));
  exit(0);
}
?>
