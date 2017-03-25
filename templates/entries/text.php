<?php
if (!isset($entry['text_with_title']) || !$entry['text_with_title']) {
  echo '<h1>'.$entry[$title].' <i style="color:grey;">('.t($entry['tutorial']).')</i></h1>';
}
if ($entry['id'] != 686 && $entry['id'] != 694) {
?>
<div style="float:left;margin:25px 25px 25px 0px;" class="hidden-sm hidden-xs">
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
<div style="float:right;margin:25px 0 25px 25px;" class="hidden-xs">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- ukrmap_soa_300x250 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:250px"
     data-ad-client="ca-pub-1279458121635194"
     data-ad-slot="1746024390"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>
<?php
}
show_entry_content($entry);
require('templates/entries/pager.php');
?>

