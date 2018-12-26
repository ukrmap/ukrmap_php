<?php
if (!isset($entry['text_with_title']) || !$entry['text_with_title']) {
  echo '<h1>'.$entry[$title].' <i style="color:grey;">('.t($entry['tutorial']).')</i></h1>';
}
?>
<div class="row">
  <div class="col-md-8">
<?php
show_entry_content($entry);
require('templates/entries/pager.php');
?>
  </div>
  <div class="col-md-4 sidebar">
<?php
$files_dir = files_dir($entry);
$maps = explode(';', $entry['maps']);
$maps_names = explode(';', $entry[$maps_names_locale]);

foreach ($maps as $index => $map) {
  $map_file = "images/$files_dir/Maps/$map.jpg";
  if (!file_exists($map_file)) { continue; }
  $name = $maps_names[$index];
  $size = getimagesize($map_file);
  echo '<div class="map_preview">';
  echo '<a href="/'.$map_file.'" class="map_link" data-w="'.$size[0].'" data-h="'.$size[1].'" data-title="'.escapehtmlchars($name).'" data-index="'.$index.'">';
  $thumbnail = '/images/'.$files_dir.'/Maps/'.$map.'_resize.jpg';
  echo '<img src="'.$thumbnail.'" width="200"/>';
  echo '</a>';
  echo '<br/>';
  echo '<span><i>'.$name.'</i></span>';
  echo '</div>';
}
?>
<div style="margin-bottom: 5px;">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- ukrmap_banner_200x200 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:200px;height:200px"
     data-ad-client="ca-pub-1279458121635194"
     data-ad-slot="7866491903"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>
<?php
if ($entry['pictures']) {
  $pictures = explode(';', $entry['pictures']);
  $index = 0;
  foreach ($pictures as $pictures_dir) {
    $t = 'content/pictures/'.$files_dir.'/'.$pictures_dir.'_'.$locale.'.xml';
    if (file_exists($t)) {
      $f = $t;
    } else {
      $f = "content/pictures/$files_dir/$pictures_dir.xml";
    }
    $xml = file_get_contents($f);
    $list = simplexml_load_string($xml);
    if (isset($list['Title'])) { echo '<p style="margin-top:-5px;">'.$list['Title'].'</p>'; }
    foreach ($list as $item) {
      $fname = $item['FileName'];
      $thumbnail = 'images/'.$files_dir.'/'.$pictures_dir.'/'.$fname.'_resize.jpg';
      $picture = "images/$files_dir/$pictures_dir/$fname.jpg";
      if (!file_exists($picture)) {
        continue;
      }
      if (!file_exists($thumbnail)) {
        $thumbnail = $picture;
      }
      $size = getimagesize($picture);
      $name = $item['Caption'];
      echo '<div class="picture_preview">';
      echo '<a href="/'.$picture.'" class="picture_link" data-w="'.$size[0].'" data-h="'.$size[1].'" data-title="'.escapehtmlchars($name).'" data-index="'.$index.'">';
      echo '<img src="/'.$thumbnail.'" width="200"/>';
      echo '</a>';
      echo '<br/>';
      echo "<span><i>$name</i></span>";
      echo '</div>';
      $index++;
    }
  }
}
?>
  </div>
</div>

<?php if ($entry['pictures']) { require('templates/entries/pswp.php'); } ?>
