<?php
define('APPLICATION_PATH', dirname(__FILE__));
define('APP_ROOT', dirname(__FILE__) );
$application = new Yaf\Application( APPLICATION_PATH . "/conf/application.ini",\Yaf\ENVIRON);
//$application->getDispatcher()->returnResponse(true)->getApplication()->bootstrap()->run();
try{
    $application->bootstrap()->run();
}catch (Exception $e){
    echo $e->getMessage();
}


