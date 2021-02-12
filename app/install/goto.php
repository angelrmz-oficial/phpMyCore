<?php

define('system_app', true);

require '../../init.php';

if($app['pmc']['installed'] == true):
	header("Location: ". site_url . "/app/system/");
endif;

if(isset($get['step']) && isset($_SESSION['step'])):
    $_SESSION['step']=$get['step'];
    header("Location: ". site_url ."/app/install/setup.php");
else:
    header("Location: ". site_url ."/app/install/unset.php");
endif;


?>