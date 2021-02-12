<?php require 'load.logged.php';
if(!in_array("users", $userApp['permissions']))
  die("No tiene permiso necesario para realizar esta acción");

foreach ($app['users'] as $user)
  if($user['username'] == $post['username'])
    $userEdit=$user;

?>
<form class="sideForm" action="" method="post">
    <fieldset>
        <!-- <legend>Filters</legend> -->
        <input type="hidden" name="user" value="<?= $userEdit['username']; ?>">
        <div class="field clear">
          <label for="txtNameSide">Username:</label>
          <input id="txtNameSide" class="text full" type="text" name="username" value="<?= $userEdit['username']; ?>" required>
        </div>
        <div class="field clear">
          <label for="txtNameSide">Password:</label>
          <input id="txtNameSide" class="text full" type="password" name="password">
        </div>
        <div class="field clear">
          <label for="txtNameSide">IP's:</label>
          <input id="txtNameSide" class="text full" type="text" name="ips" value="<?= implode(";", $userEdit['ips']); ?>" required>
        </div>
        <div class="field clear">
          <span class="label">Permissions:</span>
          <div class="multiple">
            <input id="permission_users" name="permission_users" class="checkbox" type="checkbox" <?= in_array("users", $userEdit['permissions']) ? 'checked' : null; ?>>
            <label for="permission_users">Users</label><br>
            <input id="permission_site" name="permission_site" class="checkbox" type="checkbox" <?= in_array("site", $userEdit['permissions']) ? 'checked' : null; ?>>
            <label for="permission_site">Site</label><br>
            <input id="permission_router" name="permission_router" class="checkbox" type="checkbox" <?= in_array("router", $userEdit['permissions']) ? 'checked' : null; ?>>
            <label for="permission_router">Router</label><br>
            <input id="permission_system" name="permission_system" class="checkbox" type="checkbox" <?= in_array("system", $userEdit['permissions']) ? 'checked' : null; ?>>
            <label for="permission_system">System</label><br>
            <input id="permission_mysql" name="permission_mysql" class="checkbox" type="checkbox" <?= in_array("mysql", $userEdit['permissions']) ? 'checked' : null; ?>>
            <label for="permission_mysql">MySQL</label><br>
            <input id="permission_files" name="permission_files" class="checkbox" type="checkbox" <?= in_array("files", $userEdit['permissions']) ? 'checked' : null; ?>>
            <label for="permission_files">Files</label>
          </div>
        </div>
        <input id="btnFind" class="button primary" type="submit" name="edituser" value="Editar">
    </fieldset>
</form>
