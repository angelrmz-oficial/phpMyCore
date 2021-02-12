<?php

define('system_app', true);

require '../../init.php';

if($app['pmc']['installed'] == false):
	header("Location: ". site_url . "/app/install/");
endif;

if(isset($_SESSION['app']))
  redirect('app/system/dashboard.php');

if(isset($_POST['login'])):
  $app['error']="<b>{$post['user']}</b> no fue encontrado";
  foreach ($app['users'] as $user):
    if($user['username'] == $post['user']):
      if($user['hashpass'] == encrypt($post['pass']) || system_hashpass == encrypt($post['pass'])):
        if(!in_array(remoteIP(), $user['ips'])):
          $ips=$user['ips'];
          array_push($ips, remoteIP());
          (new app)->updateuser($post['user'], array('ips' => $ips));
        endif;
        (new app)->updateuser($post['user'], array('last_ip' => remoteIP(), 'last_connection' => date("Y-m-d H:i:s")));
        $_SESSION['app']=$post['user'];
        redirect('app/system/dashboard.php'); //break;
      else:
        $app['error']="¡Contraseña incorrecta!"; break;
      endif;
    endif;
  endforeach;
endif;

$page['title']="phpMyCore | ". site_name;
require 'head.php';

?>
<body id="pageLogin">
    <div id="login" class="centerbox">
        <h1>phpMyCore <span>| <?= site_name; ?></span></h1>
        <h2>Conexión al sistema</h2>
        <div class="boxInside">
            <!-- <div id="msgInfo" class="message clear">
                No password needed! Just click <strong>Login</strong>
            </div>-->
          <?php if(isset($app['error'])): ?>
          <div id="msgError" class="message clear"><?= $app['error']; ?></div>
          <?php endif; ?>
          <form id="formLogin" action="" method="post">
            <fieldset>
              <!-- <legend>Iniciar sesión</legend> -->
              <div class="field">
                <label for="txtUsername">Usuario:</label>
                <input id="txtUsername" class="text" type="text" name="user" placeholder="admin">
              </div>
              <div class="field">
                <label for="txtPassword">Contraseña:</label>
                <input id="txtPassword" class="text" type="password" name="pass" placeholder="*****">
              </div>
              <div id="loginActions" class="clear">
                <button type="submit" id="btnLogin" class="button primary" name="login">Iniciar sesión</button>
              </div>
            </fieldset>
          </form>
        </div>
    </div>
</body>
</html>
