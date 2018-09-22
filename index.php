<?php

define('APPLICATION_PATH', dirname(__FILE__));
define('APP_ROOT', dirname(__FILE__) );
$application = new Yaf\Application( APPLICATION_PATH . "/conf/application.ini",\Yaf\ENVIRON);
$application->bootstrap()->run();
?>
