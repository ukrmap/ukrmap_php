<h1><?php echo $entry[$title]; ?></h1>

<center>
  <script type="text/javascript" src="/js/flowplayer-3.1.1.min.js"></script>
  <a href="/<?php echo $entry['video_file'] ?>" id="player" style="display:block;width:400px;height:300px;"></a>
  <script type="text/javascript">flowplayer("player", "/js/flowplayer-3.1.1.swf");</script>
</center>

<?php require('templates/entries/pager.php'); ?>
