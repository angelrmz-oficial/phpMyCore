<?php

define('system_app', true);

require '../../init.php';

if($app['pmc']['installed'] == true):
	header("Location: ". site_url . "/index.php");
endif;

if(!isset($_SESSION['step'])):
	$_SESSION['step']=1;
endif;

$step=$_SESSION['step'];

switch($step):

	case 1:
		$title="Web Manager account settings";
		$buttonLink="index.php";
		$buttonText="Back to Home";
	break;

	case 2:
		$title="Web Settings";
		$buttonLink="goto.php?step=1";//goto 1.
		$buttonText="Back to Step 1";
	break;

	case 3:
		$title="MySQL Configuration";
		$buttonLink="goto.php?step=2";//goto 2.
		$buttonText="Back to Step 2";
	break;

	case 4:
		$title="Installation completed !";
		$buttonLink="goto.php?step=3";//goto 3.
		$buttonText="Back to Step 3";
	break;

	default:
		$title="Installation failed!"; //delete install??
		$buttonLink="unset.php";
		$buttonText="Reset";
	break;

endswitch;

/*step 1
	Step 1: Admin User | Web Manager
*/
$page['title']="phpMyCore | ". site_name;
//require 'head.php';
?>


<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="description" content="business corporate landing page" />
<meta name="keywords" content="business, corporate, marketing, seo, app landing page, software landing page, app page, registration form, login page, template" />
<meta name="author" content="Tansh" />
<title>Setup | PhpMyCore <?= system_version; ?></title>
<!--Attached CSS files here-->
<link rel="stylesheet" media="screen" href="./css/reset.css"/>
<link rel="stylesheet" media="screen" href="./css/style.css"/>
<script src="./js/modernizr-1.5.min.js" type="text/javascript"></script>
<script src="./js/jquery-1.6.3.min.js" type="text/javascript"></script>
<style>
html {height:100%}
body {min-height:100%}
</style>
</head>
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

		<!--sub_header starts-->
		<div class="sub_header">
				<h1><?= $title; ?></h1>
				<a href="<?= $buttonLink; ?>"><?= $buttonText; ?></a> </div>
		<!--sub_header ends-->

		<!--divider here-->
		<div class="divider"></div>
		<div class="clear"></div>

		<!--main starts-->
		<div class="main">
				<?php if($_SESSION['step'] == 1): ?>
				<!--contact starts, contact inner hides on form submit-->
				<div class="contact">
						<div class="contact_inner">
								<h3>Access as administrator to the web manager</h3>
								<p>The default username is "<strong>admin</strong>" and then you must set a password.</p>
								<form  class="contact_form" id="form" method="post" action="">
										<fieldset>
										<p>
														<label>Username*</label>
														<input name="first" value="admin" disabled/>
												</p>
												<p>
														<label>Password*</label>
														<input name="password" type="password" class="required"/>
												</p>
												<p>
														<label>Confirm Password*</label>
														<input name="confirm" type="password" class="required"/>
												</p>

												<p>
														<div class="button_1" style="margin-left: 145px;"><a onclick="$('#form').submit()">Continue</a></div>
												</p>
												<div id="result"></div>
										</fieldset>
								</form>
						</div>
				</div>
				<!--contact ends-->
				<?php elseif($_SESSION['step'] == 2): ?>
					<div class="contact">
						<div class="contact_inner">
								<h3>Configuration </h3>
								<!-- <p>The default username is "<strong>admin</strong>" and then you must set a password.</p> -->
								<form  class="contact_form" id="step2" method="post" action="">
										<fieldset>
										<p>
														<label>Proyect Name*</label>
														<input type="text" name="site_name" value="My First Proyect"/>
												</p>
												<p>
														<label>Theme*</label>
														<input name="site_theme" value="<?= $app['settings']['site_theme']; ?>" type="text" class="required"/>
												</p>
												<p>
														<label>URL*</label>
														<input name="site_url" type="text" value="<?= $current_url; ?>" class="required"/>
												</p>

												<p>
														<label>Web API*</label>
														<input name="site_api" type="text" value="<?= "{$current_url}/api"; ?>" class="required"/>
												</p>

												<p>
														<label>Web Services*</label>
														<input name="site_ws" type="text" value="<?= "{$current_url}/ws"; ?>" class="required"/>
												</p>

												<p>
														<label>URL Access (Redirection)</label>
														<input id="cbOption1" style="width: 280px;margin: 30px 10px 10px -125px;" class="checkbox" type="checkbox" name="site_redirect" <?= ($app['settings']['site_redirect'] === true) ? 'checked="checked"' : null; ?>>
												</p>
												<p>
														<div class="button_1" style="margin-left: 145px;"><a onclick="$('#step2').submit()">Continue</a></div>
												</p>
												<div id="result"></div>
										</fieldset>
								</form>
						</div>
				</div>

				<?php elseif($_SESSION['step'] == 3): ?>
					<div class="contact">
						<div class="contact_inner">
								<h3>Connect to Database </h3>
								<!-- <p>The default username is "<strong>admin</strong>" and then you must set a password.</p> -->
								<form  class="contact_form" id="step3" method="post" action="">
										<fieldset>
										<p>
														<label>Server*</label>
														<input type="text" name="server" value="127.0.0.1"/>
												</p>
												<p>
														<label>Port*</label>
														<input name="port" value="3306" type="number" class="required"/>
												</p>
												<p>
														<label>Username*</label>
														<input name="username" type="text" value="root" class="required"/>
												</p>

												<p>
														<label>Password*</label>
														<input name="password" type="text" value="" placeholder="Enter your password" class="required"/>
												</p>

												<p>
														<label>Database Name*</label>
														<input name="database" type="text" value="" placeholder="test" class="required"/>
												</p>

												<p>
														<div class="button_1" style="margin-left: 145px;"><a onclick="$('#step3').submit()">Continue</a></div>
												</p>
												<div id="result"></div>
										</fieldset>
								</form>
						</div>
					</div>
				<?php elseif($_SESSION['step'] == 4):?>
					<div class="contact">
					<form  class="contact_form" id="step4" method="post" action="">
					<h2>Thank You...</h2><p>You have successfully installed phpMyCore Framework <?= system_version; ?>!</p><p>Please click on the "finish" button to start using the framework.</p>
					<p><div class="button_1" style="margin-left: 145px;"><a onclick="$('#step4').submit()">Continue</a></div></p>
					</form>
					</div>
				<?php endif; ?>

				<div class="clear"></div>
		</div>
		<!--main ends-->

		<!--sidebar starts-->
		<?php require 'sidebar.php'; ?>
		<!--sidebar ends-->

		<div class="clear"></div>
</div>
<!--wrapper ends-->

<!--footer_bg starts-->
<?php require 'footer.php'; ?>
<!--footer_bg ends-->

<!--Attached jquery files here-->
<script src="./js/jquery.fancybox-1.3.4.js" type="text/javascript"></script>
<script src="./js/jquery.cycle.all.min.js" type="text/javascript"></script>
<script src="./js/twitter.js" type="text/javascript"></script>
<script src="./js/jquery.validate.js" type="text/javascript"></script>
<script src="./js/jquery.form.js" type="text/javascript"></script>
<script src="./js/cufon-yui.js" type="text/javascript"></script>
<script src="./js/Maven_Pro_500.font.js" type="text/javascript"></script>
<script src="./js/custom.js" type="text/javascript"></script>
<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>
