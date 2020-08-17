<?php
$installerFilename = "composer-installer.php";
$installer = file_get_contents('https://getcomposer.org/installer');
file_put_contents($installerFilename, $installer);
shell_exec('php composer-installer.php');
include($installerFilename);
