<?php
define('system_app', true);
require '../../init.php';

if($app['pmc']['installed'] == false):

    if($_SESSION['step'] == 1):
        if($post['password'] !== $post['confirm']):
            echo json_encode(array("success" => false, "message" => "The password confirmation does not match the main password"), true);
        elseif(!inputValid($post['password'], "password")):
            echo json_encode(array("success" => false, "message" => "There are characters not allowed in the password"), true);
        elseif(strlen($post['password']) < 8):
            echo json_encode(array("success" => false, "message" => "You must enter a password with at least 8 characters"), true);
        else:
            $ips=array();
            array_push($ips, remoteIP());
            
            $hashpass=encrypt($post['password']);

            $permissions=array();
            array_push($permissions, "users");
            array_push($permissions, "site");
            array_push($permissions, "router");
            array_push($permissions, "system");
            array_push($permissions, "mysql");
            array_push($permissions, "files");

            $_SESSION['step']=2;

            die(json_encode(
                ((new app)->edituser("admin", "admin", $hashpass, $permissions, $ips)) ?
                array("success" => true, "message" => "Usuario editado con éxito", "errorCode" => null) :
                array("success" => false, "message" => "No fue posible editar este usuario", "errorCode" => "FilePutError")
            ));

            
        endif;
    elseif($_SESSION['step'] == 2):
        $_SESSION['step']=3;
        die(json_encode(
            ((new app)->settings($post)) ?
            array("success" => true, "message" => "Configuración actualizada!", "errorCode" => null) :
            array("success" => false, "message" => "No fue posible actualizar la configuración del sistema", "errorCode" => "FilePutError")
          ));
    elseif($_SESSION['step'] == 3):

        $conn=mysqli_connect($post['server'].':'.$post['port'], $post['username'], $post['password']);

        if (mysqli_connect_errno()) {
            echo json_encode(array("success" => false, "message" => "Can not connect to Database\nDetails: ". mysqli_connect_error()), true);
        } else {
            $db=$post['database'];
            mysqli_query($conn, "CREATE DATABASE IF NOT EXISTS `$db`")or die(json_encode(array("success" => false, "message" => "Can not connect to Database\nDetails: ". mysqli_error()), true));
            mysqli_select_db($conn, $post['database']);// or db_error("Can not connect to Database");
            mysqli_query($conn, "CREATE TABLE IF NOT EXISTS `sessions_data` (
                `sessionId` int(11) UNSIGNED NOT NULL,
                `session_hash` varchar(250) NOT NULL,
                `account_id` int(11) NOT NULL,
                `ip` varchar(250) NOT NULL,
                `timestart` int(11) NOT NULL,
                `timexpire` int(11) NOT NULL
              ) ENGINE=InnoDB DEFAULT CHARSET=latin1;")or die(json_encode(array("success" => false, "message" => "Can not connect to Database\nDetails: ". mysqli_error()), true));;
              mysqli_query($conn, "CREATE TABLE IF NOT EXISTS `users_data` (
                `id` int(11) NOT NULL,
                `username` varchar(250) NOT NULL,
                `password` varchar(250) NOT NULL,
                `permissions` varchar(250) NOT NULL,
                `real_name` varchar(250) NOT NULL DEFAULT 'usuario',
                `last_login` varchar(255) DEFAULT NULL
              ) ENGINE=InnoDB DEFAULT CHARSET=latin1;")or die(json_encode(array("success" => false, "message" => "Can not connect to Database\nDetails: ". mysqli_error()), true));;
              mysqli_query($conn, "ALTER TABLE `sessions_data`
              ADD PRIMARY KEY (`sessionId`);");
              mysqli_query($conn, "ALTER TABLE `users_data`
              ADD PRIMARY KEY (`id`);");
              mysqli_query($conn, "ALTER TABLE `sessions_data`
              MODIFY `sessionId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;");
              mysqli_query($conn, "ALTER TABLE `users_data`
              MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
            COMMIT;");

            foreach ($app['users'] as $user):
                if($user['username'] == "admin"):
                    $hash=$user['hashpass'];
                    break;
                endif;
            endforeach;

            mysqli_query($conn, "INSERT INTO users_data (`username`, `password`, `permissions`, `real_name`) VALUES ('admin', '$hash', 'all', 'Administrator')");

            $php_encode="<?php if(!defined('system_webscr') && basename(";
            $php_encode .= '$_SERVER[\'PHP_SELF\']) == basename(__FILE__)) die(\'<h3>¡Acceso denegado!</h3>\');';
            $php_encode .="define('site_baseurl', baseURL(site_url));";
            $php_encode .= "define('mysql_hostname', '{$post['server']}');";
            $php_encode .= "define('mysql_username', '{$post['username']}');";
            $php_encode .= "define('mysql_password', '{$post['password']}');";
            $php_encode .= "define('mysql_dbname', '{$post['database']}');";
            $php_encode .= "define('mysql_port', {$post['port']}); ?>";
            
            $put=file_put_contents(PATH_SYSTEM . "config.php", $php_encode)or die(json_encode(array("success" => false, "message" => "Error! Configuration file could not be created"), true));;//, FILE_APPEND);
            
            $_SESSION['step']=4;

            echo json_encode(array("success" => true, "message" => "Database connected!"), true);
        }
    elseif($_SESSION['step'] == 4):
        unset($_SESSION['step']);
        die(json_encode(
            ((new app)->pmc("installed", true)) ?
            array("success" => true, "message" => "Instalación finalizada!", "errorCode" => null) :
            array("success" => false, "message" => "No fue posible finalizar la instalación", "errorCode" => "FilePutError")));
    endif;
else:
    echo json_encode(array("success" => false, "message" => "We are sorry! An installation has already been completed"), true);
endif;

?>

