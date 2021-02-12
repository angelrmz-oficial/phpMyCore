<?php require 'logged.php';
if(!in_array("system", $userApp['permissions']))
  redirect('app/system/error.php?type=unauthorized');

$page['id']=3;
$page['subid']=1;
$page['title']="System | phpMyCore | ". site_name;
require 'head.php';

$zones="America/Adak;America/Anchorage;America/Anguilla;America/Antigua;America/Araguaina;America/Argentina/Buenos_Aires;America/Argentina/Catamarca;America/Argentina/Cordoba;America/Argentina/Jujuy;America/Argentina/La_Rioja;America/Argentina/Mendoza;America/Argentina/Rio_Gallegos;America/Argentina/Salta;America/Argentina/San_Juan;America/Argentina/San_Luis;America/Argentina/Tucuman;America/Argentina/Ushuaia;America/Aruba;America/Asuncion;America/Atikokan;America/Bahia;America/Bahia_Banderas;America/Barbados;America/Belem;America/Belize;America/Blanc-Sablon;America/Boa_Vista;America/Bogota;America/Boise;America/Cambridge_Bay;America/Campo_Grande;America/Cancun;America/Caracas;America/Cayenne;America/Cayman;America/Chicago;America/Chihuahua;America/Costa_Rica;America/Creston;America/Cuiaba;America/Curacao;America/Danmarkshavn;America/Dawson;America/Dawson_Creek;America/Denver;America/Detroit;America/Dominica;America/Edmonton;America/Eirunepe;America/El_Salvador;America/Fort_Nelson;America/Fortaleza;America/Glace_Bay;America/Godthab;America/Goose_Bay;America/Grand_Turk;America/Grenada;America/Guadeloupe;America/Guatemala;America/Guayaquil;America/Guyana;America/Halifax;America/Havana;America/Hermosillo;America/Indiana/Indianapolis;America/Indiana/Knox;America/Indiana/Marengo;America/Indiana/Petersburg;America/Indiana/Tell_City;America/Indiana/Vevay;America/Indiana/Vincennes;America/Indiana/Winamac;America/Inuvik;America/Iqaluit;America/Jamaica;America/Juneau;America/Kentucky/Louisville;America/Kentucky/Monticello;America/Kralendijk;America/La_Paz;America/Lima;America/Los_Angeles;America/Lower_Princes;America/Maceio;America/Managua;America/Manaus;America/Marigot;America/Martinique;America/Matamoros;America/Mazatlan;America/Menominee	America/Merida;America/Metlakatla;America/Mexico_City;America/Miquelon;America/Moncton;America/Monterrey;America/Montevideo;America/Montserrat;America/Nassau;America/New_York;America/Nipigon;America/Nome;America/Noronha;America/North_Dakota/Beulah;America/North_Dakota/Center;America/North_Dakota/New_Salem;America/Ojinaga;America/Panama;America/Pangnirtung;America/Paramaribo;America/Phoenix;America/Port-au-Prince;America/Port_of_Spain;America/Porto_Velho	America/Puerto_Rico;America/Punta_Arenas;America/Rainy_River;America/Rankin_Inlet;America/Recife;America/Regina;America/Resolute;America/Rio_Branco;America/Santarem;America/Santiago;America/Santo_Domingo;America/Sao_Paulo	America/Scoresbysund;America/Sitka;America/St_Barthelemy;America/St_Johns;America/St_Kitts;America/St_Lucia;America/St_Thomas;America/St_Vincent;America/Swift_Current;America/Tegucigalpa;America/Thule;America/Thunder_Bay;America/Tijuana;America/Toronto;America/Tortola;America/Vancouver;America/Whitehorse;America/Winnipeg;America/Yakutat	America/Yellowknife";
$mysqlcharset="big5;dec8;cp850;hp8;koi8r;latin1;latin2;swe7;ascii;ujis;sjis;hebrew;tis620;euckr;koi8u;gb2312;greek;cp1250;gbk;latin5;armscii8;utf8;ucs2;cp866;keybcs2;macce;macroman;cp852;latin7;utf8mb4;cp1251;utf16;cp1256;cp1257;utf32;binary;geostd8;cp932;eucjpms";
?>
<body id="pageForm" class="withSubnav">
  <div id="wrapper">
      <?php require 'menu.php'; ?>
      <div id="content" class="clear">
          <div id="main" class="clear">
            <form id="default" action="" method="post" style="display:none">
              <input type="submit" name="system.default">
            </form>
            <form id="formEditor" class="mainForm clear" action="" method="post">
              <div id="head" class="clear">
                  <h1>Configuración del sistema</h1>
                  <div id="actions">
                      <button class="button secondary" type="button" onclick="$('#default').submit()">Predeterminado</button>
                      <button class="button primary" type="submit" name="system">Aplicar cambios</button>
                  </div>
                  <!-- end page actions-->
              </div>

                  <p id="asterisk"><span class="star">*</span> Fields marked with asterisk are required.</p>
                  <fieldset class="clear">
                      <!-- <legend><span>PHP versión</span></legend> -->
                      <div class="field clear">
                        <!-- class="error" -->
                          <label for="txtName" >PHP versión: <span class="star">*</span></label>
                          <input id="txtName" class="text medium" type="text" name="system_phpv" value="<?= $app['settings']['system_phpv']; ?>" required>

                          <p class="error clear">Disponibles: 5.x - 7.x</p>
                      </div>
                      <div class="field clear">
                        <!-- <span class="star">*</span> -->
                          <label for="selSingleDropdown">Time Zone:</label>
                          <select id="selSingleDropdown" class="medium" name="system_timezone">
                              <?php foreach (explode(";", $zones) as $zone): ?>
                                <option value="<?= $zone; ?>" <?= ($zone == $app['settings']['system_timezone']) ? 'selected="selected"' : null; ?>><?= $zone; ?></option>
                              <?php endforeach; ?>
                          </select>
                          <!-- <p class="error clear">Validation error goes here</p> -->
                          <a class="hint" href="#">
                              <img src="img/ico/icoHint.png" alt="Hint" class="hint">
                              <span>Selecciona el huso horario sobre el que nuestro sistema debe trabajar.</span>
                          </a>
                      </div>

                      <div class="field clear">
                        <!-- <span class="star">*</span> -->
                          <label for="selSingleDropdown">System charset:</label>
                          <select id="selSingleDropdown" class="medium" name="system_charset">
                              <?php foreach (mb_list_encodings() as $charset): ?>
                                <option value="<?= $charset; ?>" <?= ($charset == $app['settings']['system_charset']) ? 'selected="selected"' : null; ?>><?= $charset; ?></option>
                              <?php endforeach; ?>
                          </select>
                          <!-- <p class="error clear">Validation error goes here</p> -->
                          <a class="hint" href="#">
                              <img src="img/ico/icoHint.png" alt="Hint" class="hint">
                              <span>Formato de codificación en que se desarrolla el sistema</span>
                          </a>
                      </div>

                      <div class="field clear">
                        <!-- <span class="star">*</span> -->
                          <label for="selSingleDropdown">MySQL charset:</label>
                          <select id="selSingleDropdown" class="medium" name="system_mysqlcharset">
                              <?php foreach (explode(";", $mysqlcharset) as $charset): ?>
                                <option value="<?= $charset; ?>" <?= ($charset == $app['settings']['system_mysqlcharset']) ? 'selected="selected"' : null; ?>><?= $charset; ?></option>
                              <?php endforeach; ?>
                          </select>
                          <!-- <p class="error clear">Validation error goes here</p> -->
                          <a class="hint" href="#">
                              <img src="img/ico/icoHint.png" alt="Hint" class="hint">
                              <span>Tipo de codificación de caracteres utilizado en la base de datos del sistema</span>
                          </a>
                      </div>
                      <div class="field clear">
                          <span class="label">System Mode:</span>
                          <div class="multiple">
                              <input id="rbOption1" class="radio" name="system_debug" value="true" type="radio" <?= ($app['settings']['system_debug'] === true) ? 'checked="checked"' : null; ?>>
                              <label for="rbOption1">Debug</label><br>
                              <input id="rbOption2" class="radio" name="system_debug" value="false" type="radio" <?= ($app['settings']['system_debug'] === false) ? 'checked="checked"' : null; ?>>
                              <label for="rbOption2">Compiled</label>
                          </div>
                          <a class="hint" href="#">
                              <img src="img/ico/icoHint.png" alt="Hint" class="hint">
                              <span>Modo de depuración es una interfaz con acceso restringido a los usuarios. Permite al desarrollador ver y manipular el estado interno del sistema con el propósito de actualizar y/o reparar código a compilar.</span>
                          </a>
                      </div>
                      <div class="last field clear">
                          <span class="label">Security:</span>
                          <div class="multiple">
                              <input id="cbOption1" class="checkbox" type="checkbox" name="system_sessions" <?= ($app['settings']['system_sessions'] === true) ? 'checked="checked"' : null; ?>>
                              <label for="cbOption1">Session Cookies</label><br>
                              <input id="cbOption2" class="checkbox" type="checkbox" name="system_apiSecurity" <?= ($app['settings']['system_apiSecurity'] === true) ? 'checked="checked"' : null; ?>>
                              <label for="cbOption2">WebApi Protection</label>
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
