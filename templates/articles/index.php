<?php
echo '<h1>'.ARTICLES.'</h1>';
$articles = $conn->query('SELECT `id`, `slug`, `title`, `advertising` FROM `articles` ORDER BY `id` DESC');
?>
<div class="row">
  <div class="col-md-8">
    <table class="table table-hover course">
      <tbody>
<?php
while ($article = $articles->fetch_assoc()) {
  echo '<tr><td><a href="'.article_path($article).'">'.$article['title'];
  if ($article['advertising']) { echo ADVERTISING_SUFFIX; }
  echo '</a></td></tr>';
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

