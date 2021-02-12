<?php
define('system_app', true);
require '../../init.php';
$title="phpMyCore | Application Error";
require 'head.php';
?>
<body id="pageError">
    <div id="error" class="centerbox">
        <div id="errorDescription" class="clear">
            <h1>Application Error</h1>
            <p>
                An error occurred when trying to complete your action. Please click the back button below
                and try again after few minutes. If the issue repeats, please contact the <a href="#">administrator</a>.
            </p>
            <dl class="clear">
                <dt>Error code:</dt>
                <dd>500</dd>
                <dt>Error description:</dt>
                <dd>Application System Error</dd>
            </dl>
            <a id="btnBack" href="index.php" class="button secondary">Back</a>
        </div>
    </div>
</body>
</html>
