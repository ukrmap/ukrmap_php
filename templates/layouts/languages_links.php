<ul class="nav navbar-nav navbar-right">
<?php if (!$conn->connect_errno) { ?>
  <form class="navbar-form navbar-left" action="/<?php echo $locale; ?>/" method="GET" role="search" class="search_form" style="margin-top:6px;margin-bottom:4px;">
    <div class="form-group">
      <input type="text" name="q" id="search_query" value="<?php echo (isset($_GET['q']) ? escapehtmlchars($_GET['q']) : ''); ?>" class="form-control input-sm" size="30"/>
    </div>
    <input type="submit" class="btn btn-default btn-sm" value="<?php echo SEARCH; ?>"/>
  </form>
<?php } ?>
<?php if (isset($entry)) { ?>
  <li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
      <img src="/css/images/blank.png" class="flag flag-<?php echo $locale ?>"/> <?php echo $languages[$locale] ?> <b class="caret"></b>
    </a>
    <ul class="dropdown-menu">
<?php foreach ($languages as $loc => $language) { if ($loc == $locale) { continue; } ?>
      <li>
        <a href="<?php echo entry_path($entry, $loc); ?>">
          <img src="/css/images/blank.png" class="flag flag-<?php echo $loc ?>"/>
          <?php echo $language; ?>
        </a>
      </li>
<?php } ?>
    </ul>
  </li>
<?php } elseif ($_SERVER['SCRIPT_NAME'] == '/index.php') { ?>
  <li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
      <img src="/css/images/blank.png" class="flag flag-<?php echo $locale ?>"/> <?php echo $languages[$locale] ?> <b class="caret"></b>
    </a>
    <ul class="dropdown-menu">
<?php foreach ($languages as $loc => $language) { if ($loc == $locale) { continue; } ?>
      <li>
        <a href="<?php echo index_path($loc); ?>">
          <img src="/css/images/blank.png" class="flag flag-<?php echo $loc ?>"/>
          <?php echo $language; ?>
        </a>
      </li>
<?php } ?>
    </ul>
  </li>
<?php } ?>
</ul>
