<div class="row">
<?php require("categories_$locale.html"); ?>
</div>
<div class="row">
  <div class="col-md-8">
<div style="float:right;margin: 0px 15px 10px 25px;">
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
<?php require("main_$locale.html"); ?>
  </div>

  <div class="col-md-4 contents">
    <h4 class="shadowtext">
      <?php echo GEOGRAPHY; ?>
    </h4>
    <ul class="contents">
      <?php
        if (!$conn->connect_errno) {
          mysqli_data_seek($g_courses, 0);
          while ($row = $g_courses->fetch_assoc()) {
            echo '<li><a href="/'.$locale.'-'.$row['course'].'">'.$row[$title].'</a></li>';
          }
        } else {
          foreach ($g_courses as $row) {
            echo '<li><a href="/'.$locale.'-'.$row['course'].'">'.$row[$title].'</a></li>';
          }
        }
      ?>
    </ul>

    <h4>
      <?php echo WORLD_HISTORY; ?>
    </h4>
    <ul class="contents">
      <?php
        if (!$conn->connect_errno) {
          mysqli_data_seek($wh_courses, 0);
          while ($row = $wh_courses->fetch_assoc()) {
            echo '<li><a href="/'.$locale.'-'.$row['course'].'">'.$row[$title].'</a></li>';
          }
        } else {
          foreach ($wh_courses as $row) {
            echo '<li><a href="/'.$locale.'-'.$row['course'].'">'.$row[$title].'</a></li>';
          }
        }
      ?>
    </ul>

    <h4>
      <?php echo UKRAINE_HISTORY; ?>
    </h4>
    <ul class="contents">
      <?php
        if (!$conn->connect_errno) {
          mysqli_data_seek($uh_courses, 0);
          while ($row = $uh_courses->fetch_assoc()) {
            echo '<li><a href="/'.$locale.'-'.$row['course'].'">'.$row[$title].'</a></li>';
          }
        } else {
          foreach ($uh_courses as $row) {
            echo '<li><a href="/'.$locale.'-'.$row['course'].'">'.$row[$title].'</a></li>';
          }
        }
      ?>
    </ul>
  </div>
</div>
