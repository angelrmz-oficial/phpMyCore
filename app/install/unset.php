<?php

define('system_app', true);

require '../../init.php';

if($app['pmc']['installed'] == true):
	header("Location: ". site_url . "/app/system/");
endif;

unset($_SESSION['step']);

header("Location: ". site_url ."/app/install/setup.php");

?>