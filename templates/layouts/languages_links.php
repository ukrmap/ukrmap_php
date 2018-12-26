<ul class="nav navbar-nav navbar-right">
<?php if (isset($entry)) { ?>
  <li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
      <img src="/css/images/blank.png" class="flag flag-<?php echo $locale ?>" alt="Select language"/> <?php echo $languages[$locale] ?> <b class="caret"></b>
    </a>
    <ul class="dropdown-menu">
    <?php foreach ($languages as $loc => $language) { if ($loc == $locale) { continue; } ?>
      <li>
        <a href="<?php echo entry_path($entry, $loc); ?>">
          <img src="/css/images/blank.png" class="flag flag-<?php echo $loc ?>" alt="Select language"/>
          <?php echo $language; ?>
        </a>
      </li>
    <?php } ?>
    </ul>
  </li>
<?php } elseif ($_SERVER['SCRIPT_NAME'] == '/index.php') { ?>
  <li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
      <img src="/css/images/blank.png" class="flag flag-<?php echo $locale ?>" alt="Select language"/> <?php echo $languages[$locale] ?> <b class="caret"></b>
    </a>
    <ul class="dropdown-menu">
    <?php foreach ($languages as $loc => $language) { if ($loc == $locale) { continue; } ?>
      <li>
        <a href="<?php echo index_path($loc); ?>">
          <img src="/css/images/blank.png" class="flag flag-<?php echo $loc ?>" alt="Select language"/>
          <?php echo $language; ?>
        </a>
      </li>
    <?php } ?>
    </ul>
  </li>
<?php } elseif ($_SERVER['SCRIPT_NAME'] == '/404.php') { ?>
  <li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
      <img src="/css/images/blank.png" class="flag flag-<?php echo $locale ?>" alt="Select language"/> <?php echo $languages[$locale] ?> <b class="caret"></b>
    </a>
    <ul class="dropdown-menu">
    <?php foreach ($languages as $loc => $language) { if ($loc == $locale) { continue; } ?>
      <li>
        <a href="<?php echo '/404.html?locale='.$loc.'&uri='.urlencode($uri); ?>">
          <img src="/css/images/blank.png" class="flag flag-<?php echo $loc ?>" alt="Select language"/>
          <?php echo $language; ?>
        </a>
      </li>
    <?php } ?>
    </ul>
  </li>
<?php } ?>
</ul>
