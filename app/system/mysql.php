<?php require 'logged.php';
if(!in_array("mysql", $userApp['permissions']))
  redirect('app/system/error.php?type=unauthorized');

$page['id']=3;
$page['subid']=2;
$page['title']="MySQL | phpMyCore | ". site_name;
require 'head.php';

$conn = new mysqli(mysql_hostname, mysql_username, mysql_password, mysql_dbname, mysql_port);
if($conn->connect_error)
  die("Error! No fue posible realizar la conexión");

$sql=$conn->query("SELECT @@sql_mode;");
$sqlmode=$sql->fetch_row();

?>
<body id="pageForm" class="withSubnav">
  <div id="wrapper">
      <?php require 'menu.php'; ?>
      <div id="content" class="clear">
          <div id="main" class="clear">
            <form class="mainForm clear" action="" method="post">
              <fieldset class="clear">
                  <legend><span>Copias de seguridad</span></legend>
                  <div class="field clear">
                      <label for="txtName">Nombre del archivo:</label>
                      <input id="txtName" class="text medium" type="text" name="backup_name" value="<?= mysql_dbname ?>_b<?= date("ymd") ?>" required>
                      <!-- <a class="hint">
                      <input id="btnSubmit" class="button primary" type="submit" name="mysqlbackup" value="Generar"></a> -->
                  </div>
                  <div class="field clear">
                    <label for="txtName">Respaldo:</label>
                    <select id="tables" class="select2" name="tables" multiple="multiple" required>
                      <?php $tables=$conn->query("SHOW TABLES");
                      while ($row = $tables->fetch_row()): ?>
                        <option value="<?= $row[0]; ?>"><?= $row[0]; ?></option>
                      <?php endwhile; ?>
                    </select>
                  </div>
                  <div class="last field clear">
                    <input id="btnSubmit" class="button primary" type="submit" name="mysqlbackup" value="Generar">
                  </div>

              </fieldset>
          </form>

          <!-- <form class="mainForm clear" action="" method="post">
            <fieldset class="clear">
                <legend><span>SQL Mode</span></legend>
                <div class="last field clear">
                    <label for="txtName">Value:</label>
                    <input id="txtName" class="text medium" type="text" name="mode" value="<?= $sqlmode[0]; ?>" required>
                    <a class="hint">
                    <input id="btnSubmit" class="button primary" type="submit" name="mysqlmode" value="SET"></a>
                </div>
                <div class="last field clear">
                    table
                </div>
            </fieldset>
        </form> -->
          </div>
          <div id="sidebar">
            <div id="help" class="sidebox">
                <h1>Información</h1>
                <div class="boxContent clear">
                  <dl class="clear">
                      <dt>Server:</dt><dd><?= mysql_hostname; ?></dd>
                      <dt>Port:</dt><dd><?= mysql_port; ?></dd>
                      <dt>Database:</dt><dd><?= mysql_dbname; ?></dd>
                      <dt>User:</dt><dd><?= mysql_username; ?></dd>
                      <dt class="last"></dt><dd class="last"><a href="javascript:Form.Post('mysqltest')">test connection</a></dd>
                  </dl>
                </div>
            </div>
          </div>
      </div>
  </div>
  <?php require 'footer.php'; ?>
  <script type="text/javascript">
    $('select2').select2({
      matcher: function(term, text, option) {
        return text.toUpperCase().indexOf(term.toUpperCase())>=0 || option.val().toUpperCase().indexOf(term.toUpperCase())>=0;
      }
    });
    $("#tables").select2({multiple: true, placeholder: "Seleccionar tablas", allowClear: true, minimumSelectionLength: 1});
  </script>
</body>
</html>
