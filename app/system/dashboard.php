<?php require 'logged.php';
$page['id']=1;
$page['title']="Dashboard | phpMyCore | ". site_name;
require 'head.php';
?>
<body id="pageDashboard" class="withoutSubnav">
    <div id="wrapper">
        <?php require 'menu.php'; ?>
        <div id="content" class="clear">
            <div id="main" class="clear">
                <div id="head" class="clear">
                    <h1>Bienvenido!</h1>
                </div>
                <div id="quick" class="clear">
                    <?php if(in_array("users", $userApp['permissions'])): ?>
                    <div class="quickLink">
                      <a href="users.php"><img src="img/ico/icoAddUser.png" alt="Add user"><span>Users</span></a>
                    </div><?php endif; ?>
                    <?php if(in_array("system", $userApp['permissions'])): ?>
                    <div class="quickLink">
                      <a href="system.php"><img src="img/ico/icoMaintenance.png" alt="Turn on Service Mode"><span>System</span></a>
                    </div><?php endif; ?>
                    <?php if(in_array("mysql", $userApp['permissions'])): ?>
                    <div class="quickLink">
                      <a href="mysql.php"><img src="img/ico/icoBackup.png" alt="Backup database"><span>MySQL</span></a>
                    </div><?php endif; ?>
                    <!-- <?php if(in_array("router", $userApp['permissions'])): ?>
                    <div class="quickLink">
                      <a href="router.php"><img src="img/ico/icoPublish.png" alt="Publish website"><span>Router</span></a>
                    </div><?php endif; ?> -->
                    <?php if(in_array("files", $userApp['permissions'])): ?>
                    <div class="quickLink">
                        <a href="files.php"><img src="img/ico/icoWriteArticle.png" alt="Write article"><span>Files Manager</span></a>
                    </div><?php endif; ?>
                    <?php if(in_array("site", $userApp['permissions'])): ?>
                    <div class="quickLink">
                        <a href="site.php"><img src="img/ico/icoViewWebsite.png" alt="View website"><span>Website</span></a>
                    </div><?php endif; ?>

                </div>
            </div>
            <div id="sidebar">
                <div id="summary" class="sidebox clear">
                    <h1>Resumen</h1>
                    <div class="boxContent clear">
                        <dl class="clear">
                            <dt>Server:</dt><dd><?= isset($_SERVER['SERVER_ADDR']) ? $_SERVER['SERVER_ADDR'] : $_SERVER['SERVER_NAME']; ?></dd>
                            <dt>Remote IP:</dt><dd><?= remoteIP(); ?></dd>
                            <dt>HTTPS:</dt><dd>off</dd>
                            <dt>PHP Version:</dt><dd><?= phpversion(); ?></dd>
                            <dt class="last"></dt><dd class="last"><a href="phpinfo.php" target="_blank">phpinfo()</a></dd>
                        </dl>
                    </div>
                </div>
                <div id="calendar" class="sidebox clear">
                    <h1>Latest Log</h1>
                    <div class="boxContent clear">
                      <?php if(count($app['logs']) > 0): foreach ($app['logs'] as $log): ?>
                        <h2><?= $log['date']; ?> : <?= $log['ip']; ?></h2>
                        <p><?= $log['log']; ?></p>
                      <?php endforeach; ?>
                      <a onclick="Form.Post('logsempty')" style="cursor:pointer" onMouseOver="this.style.textDecoration ='underline'" onMouseOut="this.style.textDecoration ='none'">Limpiar registros</a>
                      <?php else: echo "No hay registros por el momento"; endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require 'footer.php'; ?>
</body>
</html>
