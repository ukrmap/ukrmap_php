<h1><?php echo $page_title ?></h1>

<div class="row">
  <div class="col-md-8">
    <table class="table table-hover course">
      <tbody>
<?php
if (!$conn->connect_errno) {
  while ($entry = $entries->fetch_assoc()) {
    echo '<tr><td><a href="/'.$locale.'-'.$course.'/'.$entry['id'].'.html">'.$entry[$title];
    if ($entry['tutorial']) { echo ' <i style="color:grey;">('.t($entry['tutorial']).')</i>'; }
    echo '</a></td></tr>';
  }
} else {
  foreach ($entries as $entry) {
    echo '<tr><td><a href="/'.$locale.'-'.$course.'/'.$entry['id'].'.html">'.$entry[$title];
    if (isset($entry['tutorial'])) { echo ' <i style="color:grey;">('.t($entry['tutorial']).')</i>'; }
    echo '</a></td></tr>';
  }
}
?>
      </tbody>
    </table>
  </div>
  <div class="col-md-4" style="margin-top:7px;">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- ukrmap_soa_300x600 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:600px"
     data-ad-client="ca-pub-1279458121635194"
     data-ad-slot="9269291196"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
  </div>
</div>
