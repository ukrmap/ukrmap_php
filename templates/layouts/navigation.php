<div class="navbar navbar-default navbar-static-top">
  <div class="container">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <span class="navbar-brand hidden-xs"><a href="/">geomap.com.ua</a></span>
    <div class="navbar-collapse collapse navbar-responsive-collapse">
      <ul class="nav navbar-nav">
        <?php require('navigation_links.php'); ?>
      </ul>
      <?php if ($_SERVER['SCRIPT_NAME'] != '/404.php') { require('languages_links.php'); } ?>
    </div>
  </div>
</div>
