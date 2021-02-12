<style media="screen">
  #menu ul>li>ul{
    display: none;
  }
  #menu ul>li.active>ul{
    display: block !important;
  }
</style>
<div id="top">
  <div id="title" class="clear">
    <a href="dashboard.php">phpMyCore</a>
    <span> | <?= site_name; ?></span>
  </div>
  <div id="menu" class="clear">
    <ul>
      <li <?= ($page['id'] == 1) ? 'class="active"' : null; ?>><a href="dashboard.php">Dashboard</a></li>
      <?php if(in_array("users", $userApp['permissions'])): ?>
      <li <?= ($page['id'] == 2) ? 'class="active"' : null; ?>><a href="users.php">Users</a></li>
      <?php endif; if(in_array("system", $userApp['permissions']) || in_array("site", $userApp['permissions']) || in_array("mysql", $userApp['permissions']) || in_array("router", $userApp['permissions'])): ?>
      <li <?= ($page['id'] == 3) ? 'class="active"' : null; ?>><a href="settings.php">Settings</a>
        <ul>
          <?php if(in_array("system", $userApp['permissions'])): ?>
          <li <?= ($page['subid'] == 1) ? 'class="active"' : null; ?>><a href="system.php">System</a></li>
          <?php endif; if(in_array("mysql", $userApp['permissions'])): ?>
          <li <?= ($page['subid'] == 2) ? 'class="active"' : null; ?>><a href="mysql.php">MySQL</a></li>
        <?php endif; /*if(in_array("router", $userApp['permissions'])): ?>
          <li <?= ($page['subid'] == 3) ? 'class="active"' : null; ?>><a href="router.php">Router</a></li>
          <?php endif;*/ if(in_array("site", $userApp['permissions'])): ?>
          <li <?= ($page['subid'] == 4) ? 'class="active"' : null; ?>><a href="site.php" class="last">Website</a></li>
          <?php endif; ?>
        </ul>
      </li>
    <?php endif; if(in_array("files", $userApp['permissions'])): ?>
      <li <?= ($page['id'] == 4) ? 'class="active"' : null; ?>><a href="files.php">Files</a></li>
      <?php endif; ?>
    </ul>
  </div>
  <div id="toolbar" class="clear">
    <p id="user">Logged in as <a href="profile.php"><?= $userApp['username']; ?></a></p>
    <div id="buttons">
      <a href="<?= site_url; ?>" class="button tool" target="_blank">Visit website</a>
      <a href="logout.php" class="button tool">Log out</a>
    </div>
  </div>
</div>
