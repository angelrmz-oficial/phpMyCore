<form class="sideForm" action="" method="post">
    <fieldset>
        <!-- <legend>Filters</legend> -->
        <div class="field clear">
          <label for="txtNameSide">Username:</label>
          <input id="txtNameSide" class="text full" type="text" name="username" required>
        </div>
        <div class="field clear">
          <label for="txtNameSide">Password:</label>
          <input id="txtNameSide" class="text full" type="password" name="password" required>
        </div>
        <div class="field clear">
          <label for="txtNameSide">IP's:</label>
          <input id="txtNameSide" class="text full" type="text" name="ips" required>
        </div>
        <div class="field clear">
          <span class="label">Permissions:</span>
          <div class="multiple">
            <input id="permission_users" name="permission_users" class="checkbox" type="checkbox">
            <label for="permission_users">Users</label><br>
            <input id="permission_site" name="permission_site" class="checkbox" type="checkbox">
            <label for="permission_site">Site</label><br>
            <input id="permission_router" name="permission_router" class="checkbox" type="checkbox">
            <label for="permission_router">Router</label><br>
            <input id="permission_system" name="permission_system" class="checkbox" type="checkbox">
            <label for="permission_system">System</label><br>
            <input id="permission_mysql" name="permission_mysql" class="checkbox" type="checkbox">
            <label for="permission_mysql">MySQL</label><br>
            <input id="permission_files" name="permission_files" class="checkbox" type="checkbox">
            <label for="permission_files">Files</label>
          </div>
        </div>
        <input id="btnFind" class="button primary" type="submit" name="adduser" value="Agregar">
    </fieldset>
</form>
