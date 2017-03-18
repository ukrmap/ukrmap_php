<ul class="nav navbar-nav navbar-right">
  <li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
      <img src="/css/images/blank.png" class="flag flag-<?php echo $locale ?>"/> <?php echo $languages[$locale] ?> <b class="caret"></b>
    </a>
    <ul class="dropdown-menu">
<?php foreach ($languages as $loc => $language) { if ($loc == $locale) { continue; } ?>
      <li>
        <a href="<?php echo entry_path($entry, $loc); ?>">
          <img src="/css/images/blank.png" class="flag flag-<?php echo $loc ?>"/>
          <?php echo $language ?>
        </a>
      </li>
<?php } ?>
    </ul>
  </li>
</ul>
