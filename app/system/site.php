<?php require 'logged.php';
if(!in_array("site", $userApp['permissions']))
  redirect('app/system/error.php?type=unauthorized');

$page['id']=3;
$page['subid']=4;
$page['title']="Website | phpMyCore | ". site_name;
require 'head.php';

?>
<body id="pageForm" class="withSubnav">
  <div id="wrapper">
      <?php require 'menu.php'; ?>
      <div id="content" class="clear">
          <div id="main" class="clear">
            <!-- <form id="default" action="" method="post" style="display:none">
              <input type="submit" name="system.default">
            </form> -->
            <form id="formEditor" class="mainForm clear" action="" method="post">
              <div id="head" class="clear">
                  <h1>Configuración del sitio</h1>
                  <div id="actions">
                      <!-- <button class="button secondary" type="button" onclick="$('#default').submit()">Predeterminado</button> -->
                      <button class="button primary" type="submit" name="system">Aplicar cambios</button>
                  </div>
                  <!-- end page actions-->
              </div>

                  <p id="asterisk"><span class="star">*</span> Fields marked with asterisk are required.</p>
                  <fieldset class="clear">
                      <!-- <legend><span>PHP versión</span></legend> -->
                      <div class="field clear">
                        <!-- class="error" -->
                          <label for="txtName" >Nombre del sitio: <span class="star">*</span></label>
                          <input id="txtName" class="text medium" type="text" name="site_name" value="<?= $app['settings']['site_name']; ?>" required>
                          <!-- <p class="error clear">Disponibles: 5.x - 7.x</p> -->
                      </div>
                      <div class="field clear">
                          <label for="txtName" >Tema: <span class="star">*</span></label>
                          <input id="txtName" class="text medium" type="text" name="site_theme" value="<?= $app['settings']['site_theme']; ?>" required>
                      </div>
                      <div class="field clear">
                          <label for="txtName" >URL del sitio: <span class="star">*</span></label>
                          <input id="txtName" class="text medium" type="url" name="site_url" value="<?= $app['settings']['site_url']; ?>" required>
                      </div>
                      <div class="field clear">
                          <label for="txtName" >Web API: <span class="star">*</span></label>
                          <input id="txtName" class="text medium" type="text" name="site_api" value="<?= $app['settings']['site_api']; ?>" required>
                      </div>
                      <div class="field clear">
                          <label for="txtName" >Web Services: <span class="star">*</span></label>
                          <input id="txtName" class="text medium" type="text" name="site_ws" value="<?= $app['settings']['site_ws']; ?>" required>
                      </div>
                      <div class="last field clear">
                          <span class="label">URL Access:</span>
                          <div class="multiple">
                              <input id="cbOption1" class="checkbox" type="checkbox" name="site_redirect" <?= ($app['settings']['site_redirect'] === true) ? 'checked="checked"' : null; ?>>
                              <label for="cbOption1">Redirection</label><br>
                              <!-- <input id="cbOption2" class="checkbox" type="checkbox" name="system_apiSecurity" <?= ($app['settings']['system_apiSecurity'] === true) ? 'checked="checked"' : null; ?>>
                              <label for="cbOption2">HTTPS</label> -->
                          </div>
                      </div>
                  </fieldset>

                  <!-- <div class="formActions clear">
                      <input id="btnSubmit" class="button primary" type="submit" value="Save changes">
                      <input id="btnCancel" class="button secondary" type="button" value="Cancel">
                  </div> -->
              </form>
          </div>
          <div id="sidebar">
            <div id="help" class="sidebox">
                <h1>Context help</h1>
                <div class="boxContent clear">
                    <h2>Topic 1</h2>
                    <p>
                        Lorem ipsum dolor sit amet consectetuer diam dis non ut aliquam.
                        Lorem nibh Pellentesque ut nibh Nunc Suspendisse ut nibh dignissim hac.
                        Nunc augue aliquet tempus non condimentum eget nibh Maecenas elit et.
                    </p>
                    <h2>Topic 2</h2>
                    <p>
                        Lorem ipsum dolor sit amet consectetuer diam dis non ut aliquam.
                        Lorem nibh Pellentesque ut nibh <a href="#">Nunc Suspendisse</a> ut nibh dignissim hac.
                        Nunc augue aliquet tempus non condimentum eget nibh Maecenas elit et.
                    </p>
                </div>
            </div>
          </div>
      </div>
  </div>
  <?php require 'footer.php'; ?>
</body>
</html>
