<?php

define('system_app', true);

require '../../init.php';

if($app['pmc']['installed'] == true):
	header("Location: ". site_url . "/index.php");
endif;

if(isset($_SESSION['step'])):
	unset($_SESSION['step']);
endif;

$page['title']="phpMyCore | ". site_name;
//require 'head.php';
?>
<!DOCTYPE HTML>
<html>
<style>
html {height:100%}
body {min-height:100%}
</style>
<?php require 'head.php'; ?>
<body>
<!--wrapper starts-->
<div id="wrapper">

		<!--header_top starts-->
		<div id="header_top"><a href="index.html"> <img src="./images/logo.png" width="195" height="30" alt="logo" class="logo"></a>
				<p>Version + <?= system_version; ?> | <a href="https://pmc.angelrmz.com/changelogs/<?= system_version; ?>">Changelogs</a></p>
				<div class="clear"></div>
		</div>
		<!--header_top ends-->

		<!--divider here-->
		<div class="divider"></div>

		<!--header starts-->
		<div id="header">

				<!--column_2 for text in header-->
				<div class="column_2">
						<h1>Start developing your projects!</h1>

						<!--steps starts-->
						<ul class="steps">
								<li>
										<div class="icon_bg"><img src="images/processing.png" width="32" height="32" alt="icon"></div>
										<h4>Web Manager</h4>
										<p>Make changes to the framework configuration through its web manager</p>
								</li>
								<li class="arrow"></li>
								<li>
										<div class="icon_bg"><img src="images/leaves.png" width="32" height="32" alt="icon"></div>
										<h4>Routing</h4>
										<p>Quick and easy access to web project routes</p>
								</li>
								<li class="arrow"></li>
								<li>
										<div class="icon_bg"><img src="images/plane.png" width="32" height="32" alt="icon"></div>
										<h4>API & Services</h4>
										<p>PMC is protected by a strict security scheme</p>
								</li>
						</ul>
						<!--steps ends-->

						<!--do not remove this clear-->
						<div class="clear"></div>

						<!--quote starts-->
						<span class="quote">"PMC Framework (PhpMyCore) was developed with the intention of meeting the basic needs of every good programmer."</span>
						<!--quote ends-->

				</div>
				<!--column_2 ends-->

				<!--column_2_last starts-->
				<div class="column_2_last">

						<!--video starts-->
						<div id="video">
								<iframe src="http://player.vimeo.com/video/7449107" width="446" height="268"></iframe>
						</div>
						<!--video ends-->

						<!--do not remove this clear-->
						<div class="clear"></div>

						<!--button here-->
						<p class="buy_tagline">First setup, then develop</p>
						<div class="button_1"><a href="setup.php">Install Now</a></div>
				</div>
				<!--column_2_last ends-->

				<div class="clear"></div>
		</div>
		<!--header ends-->

		<?php //require 'bottom.php'; ?>

		<div class="clear"></div>
</div>
<!--wrapper ends-->

<!--footer_bg starts-->
<?php require 'footer.php'; ?>
<!--footer_bg ends-->

<!--Attached jquery files here-->
<?php require 'scripts.php'; ?>

</body>
</html>
